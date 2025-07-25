<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DonationController extends Controller
{
    public function showForm(Campaign $campaign)
    {
        return view('donations.dform', compact('campaign'));
    }

    public function initiatePayment(Request $request, Campaign $campaign)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'amount' => 'required|integer|min:10',
        ]);

        $purchaseOrderId = Str::uuid()->toString();

        $payload = [
            "return_url" => route('donation.verify'), // Khalti redirect here after payment
            "website_url" => config('app.url'),
            "amount" => $validated['amount'] * 100,  // paisa
            "purchase_order_id" => $purchaseOrderId,
            "purchase_order_name" => "Donation for " . $campaign->title,
            "customer_info" => [
                "name" => $validated['name'],
                "email" => $validated['email'],
                "phone" => $validated['phone'] ?? '',
            ],
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->withoutVerifying()
          ->post(env('KHALTI_API_URL') . '/epayment/initiate/', $payload);

        if ($response->successful()) {
            $data = $response->json();

            session([
                'donation_data' => [
                    'campaign_id' => $campaign->id,
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'] ?? null,
                    'amount' => $validated['amount'],
                    'purchase_order_id' => $purchaseOrderId,
                ]
            ]);

            return redirect($data['payment_url']);
        } else {
            // Log full response to debug 400 errors
            Log::error('Khalti initiate payment failed', [
                'status' => $response->status(),
                'body' => $response->body(),
                'payload' => $payload,
            ]);
        }

        return back()->withErrors('Failed to initiate Khalti payment. Please try again.');
    }

    public function verifyPayment(Request $request)
    {
        $pidx = $request->query('pidx');

        if (!$pidx) {
            return redirect()->route('donation.form')->withErrors('Invalid payment response from Khalti.');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->withoutVerifying()
          ->post(env('KHALTI_API_URL') . '/epayment/lookup/', ['pidx' => $pidx]);

        if ($response->successful()) {
            $data = $response->json();

            if (($data['status'] ?? '') === 'Completed') {
                $donationData = session('donation_data');

                if (!$donationData || ($donationData['purchase_order_id'] ?? '') !== ($data['purchase_order_id'] ?? '')) {
                    return redirect()->route('donation.form')->withErrors('Donation session mismatch.');
                }

                Donation::create([
                    'campaign_id' => $donationData['campaign_id'],
                    'name' => $donationData['name'],
                    'email' => $donationData['email'],
                    'phone' => $donationData['phone'],
                    'amount' => $donationData['amount'],
                    'anonymous' => false,
                ]);

                session()->forget('donation_data');

                return view('donations.success', ['message' => 'Thank you for your donation!']);
            }

            return view('donations.failed', ['status' => $data['status'] ?? 'Unknown']);
        }

        return redirect()->route('donation.form')->withErrors('Payment verification failed. Please contact support.');
    }
}

