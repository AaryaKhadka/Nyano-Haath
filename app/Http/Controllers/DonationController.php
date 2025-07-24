<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DonationController extends Controller
{
    /**
     * Show donation form for a campaign.
     */
    public function showDonationForm($campaignId)
    {
        $campaign = Campaign::findOrFail($campaignId);
        return view('donations.dform', compact('campaign'));
    }

    /**
     * Initiate Khalti payment.
     */
    public function initiatePayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'purchase_order_name' => 'required|string|max:255',
            'campaign_id' => 'required|exists:campaigns,id',
            'anonymous' => 'boolean',
            'name' => 'required_without:anonymous|string|max:255',
            'email' => 'required_without:anonymous|email|max:255',
            'password' => 'nullable|string|min:6',
            'return_url' => 'required|url',
            'website_url' => 'required|url',
        ]);

        $campaign = Campaign::findOrFail($request->campaign_id);
        $amountInPaisa = $request->amount * 100;

        // Handle anonymous donor info
        $donorName = $request->anonymous ? null : $request->name;
        $donorEmail = $request->anonymous ? null : $request->email;

        // Save donation with status pending
        $donation = Donation::create([
            'user_id' => $request->anonymous ? null : Auth::id(),
            'name' => $donorName,
            'email' => $donorEmail,
            'amount' => $request->amount,
            'campaign_id' => $campaign->id,
            'anonymous' => $request->anonymous,
            'status' => 'pending',
        ]);

        // Prepare Khalti payload
        $payload = [
            'return_url' => $request->return_url,
            'website_url' => $request->website_url,
            'amount' => $amountInPaisa,
            'purchase_order_id' => 'DON-' . $donation->id,
            'purchase_order_name' => $request->purchase_order_name,
            'customer_info' => [
                'name' => $donorName,
                'email' => $donorEmail,
            ],
        ];

        $khaltiSecretKey = config('services.khalti.secret_key');
        $apiUrl = config('services.khalti.base_url', 'https://a.khalti.com/api/v2');

        // Ensure base URL ends with a slash
        if (substr($apiUrl, -1) !== '/') {
            $apiUrl .= '/';
        }

        try {
            Log::info('Sending Payload to Khalti', $payload);

            $response = Http::withToken($khaltiSecretKey)
                ->post($apiUrl . 'epayment/initiate/', $payload);

            Log::info('Khalti Response Body', ['body' => $response->body()]);
            Log::info('Khalti Response Status', ['status' => $response->status()]);

            if ($response->successful() && $response->json('payment_url')) {
                return response()->json(['payment_url' => $response->json('payment_url')]);
            } else {
                $errorMessage = $response->json('message') ?? 'Payment initiation failed.';
                Log::error('Payment initiation failed', ['response_body' => $response->body(), 'status' => $response->status()]);
                return response()->json(['error' => $errorMessage], 422);
            }
        } catch (\Exception $e) {
            Log::error('Payment initiation error', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Server error. Please try again later.'], 500);
        }
    }

    /**
     * Verify Khalti payment after redirect.
     */
    public function verifyPayment(Request $request)
    {
        $pidx = $request->query('pidx');

        if (!$pidx) {
            return redirect()->route('feed')->with('error', 'Payment verification failed: missing payment ID.');
        }

        $khaltiSecretKey = config('services.khalti.secret_key');
        $apiUrl = config('services.khalti.base_url', 'https://a.khalti.com/api/v2/');

        try {
            $response = Http::withToken($khaltiSecretKey)
                ->post($apiUrl . 'epayment/lookup/', ['pidx' => $pidx]);

            if (!$response->successful()) {
                return redirect()->route('feed')->with('error', 'Payment verification failed at Khalti.');
            }

            $responseData = $response->json();

            $purchaseOrderId = $responseData['purchase_order_id'] ?? null;
            if (!$purchaseOrderId) {
                return redirect()->route('feed')->with('error', 'Invalid payment data received.');
            }

            if (!preg_match('/DON-(\d+)/', $purchaseOrderId, $matches)) {
                return redirect()->route('feed')->with('error', 'Invalid payment reference.');
            }

            $donationId = $matches[1];
            $donation = Donation::find($donationId);

            if (!$donation) {
                return redirect()->route('feed')->with('error', 'Donation record not found.');
            }

            if ($responseData['state'] === 'Completed') {
                $donation->status = 'success';
                $donation->save();

                // Update campaign raised amount
                $campaign = $donation->campaign;
                $campaign->amount_raised += $donation->amount;
                $campaign->save();

                // Optional: create user account if password was provided at initiation
                // (You can implement this part here if you want)

                return view('donations.success', ['donation' => $donation]);
            } else {
                $donation->status = 'failed';
                $donation->save();

                return view('donations.failure', ['donation' => $donation]);
            }
        } catch (\Exception $e) {
            Log::error('Khalti payment verification error: ' . $e->getMessage());
            return redirect()->route('feed')->with('error', 'Payment verification encountered an error.');
        }
    }
}
