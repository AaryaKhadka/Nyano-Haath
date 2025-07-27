<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'password' => 'nullable|string|min:6'
        ]);

        $purchaseOrderId = Str::uuid()->toString();

        // Create donation record with status Pending
        $donation = Donation::create([
            'campaign_id' => $campaign->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'amount' => $validated['amount'],
            'anonymous' => false,
            'purchase_order_id' => $purchaseOrderId,
            'status' => 'Pending',
        ]);

        // Store password temporarily in session if provided
        if (!empty($validated['password'])) {
            session(['donation_password' => $validated['password']]);
        }

        // Store donation ID in session to reference after payment verification
        session(['donation_id' => $donation->id]);

        $payload = [
            "return_url" => 'http://127.0.0.1:8000/donate/verify',
            "website_url" => config('app.url'),
            "amount" => $validated['amount'] * 100,
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

            return redirect($data['payment_url']);
        } else {
            // Log full response for debugging errors on payment initiation
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
        $donationId = session('donation_id');

        // Validate presence of pidx and donation ID session
        if (!$pidx || !$donationId) {
            return redirect()->route('donation.form', ['campaign' => 1]) // fallback campaign id
                ->withErrors('Invalid payment response or session expired.');
        }

        $donation = Donation::find($donationId);
        if (!$donation) {
            return redirect()->route('donation.form', ['campaign' => 1])
                ->withErrors('Donation record not found.');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->withoutVerifying()
          ->post(env('KHALTI_API_URL') . '/epayment/lookup/', ['pidx' => $pidx]);

        if ($response->successful()) {
            $data = $response->json();

            // Log the full response for debugging
            Log::info('Khalti lookup response:', $data);

            if (($data['status'] ?? '') === 'Completed') {

                // Removed purchase_order_id check because Khalti lookup doesn't return it

                // Update donation status to Completed
                $donation->status = 'Completed';

                // Retrieve password from session (not stored in donation record)
                $password = session('donation_password');

                // Create user if password was provided and user doesn't exist
                if (!empty($password)) {
                    $user = User::firstOrCreate(
                        ['email' => $donation->email],
                        [
                            'name' => $donation->name,
                            'password' => Hash::make($password),
                            'role' => 'donor', // adjust if your roles differ
                        ]
                    );
                    $donation->user_id = $user->id;

                    // Remove password from session after use for security
                    session()->forget('donation_password');
                }

                $donation->save();

                // Update campaign's raised amount
                $campaign = $donation->campaign;
                $campaign->raised_amount += $donation->amount;
                $campaign->save();

                // Remove donation ID from session after successful verification
                session()->forget('donation_id');

                return view('donations.success', ['campaign' => $campaign]);
            }

            return view('donations.failed', ['status' => $data['status'] ?? 'Unknown']);
        }

        return redirect()->route('donation.form', ['campaign' => $donation->campaign_id])
                         ->withErrors('Payment verification failed. Please contact support.');
    }

public function donorDashboard()
{
    $user = auth()->user();

    // Fetch all donations by this user with related campaigns
    $donations = $user->donations()->with('campaign')->latest()->get();

    // Count total donations and total amount donated
    $totalDonations = $donations->count();
    $totalAmount = $donations->sum('amount');

    return view('donations.dBoard', compact('donations', 'totalDonations', 'totalAmount'));
}


}
