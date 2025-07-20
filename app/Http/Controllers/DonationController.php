<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{
    // Show the donation form
    public function showForm(Campaign $campaign)
    {
        return view('donations.dform', compact('campaign'));
    }

    // Handle the donation submission
    public function store(Request $request, Campaign $campaign)
    {
        // Validate inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:1',
            'anonymous' => 'sometimes|accepted',
            'password' => 'required_without:anonymous|string|min:6|max:255',
            'khalti_token' => 'required|string',
            'khalti_idx' => 'required|string',
        ]);

        // Verify Khalti payment token with Khalti API
        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
        ])->post('https://dev.khalti.com/api/v2/payment/verify/', [  // Use sandbox or production URL accordingly
            'token' => $request->khalti_token,
            'amount' => intval($request->amount * 100), // amount in paisa, integer
        ]);

        if (!$response->successful()) {
            Log::error('Khalti verification failed', ['response' => $response->body()]);
            return back()->withErrors(['payment' => 'Payment verification failed. Please try again.']);
        }

        $responseData = $response->json();
        if (!isset($responseData['idx'])) {
            Log::error('Khalti verification missing idx', ['response' => $response->body()]);
            return back()->withErrors(['payment' => 'Payment verification failed. Please try again.']);
        }

        // Create user if NOT anonymous and password provided
        $user = null;
        if (!$request->has('anonymous')) {
            $user = User::firstOrCreate(
                ['email' => $request->email],
                [
                    'name' => $request->name,
                    'password' => Hash::make($request->password),
                    'role' => 'donor',
                ]
            );
        }

        // Save the donation
        $donation = new Donation();
        $donation->campaign_id = $campaign->id;
        $donation->name = $request->name;
        $donation->email = $request->email;
        $donation->amount = $request->amount;
        $donation->user_id = $user?->id;
        $donation->khalti_token = $request->khalti_token;
        $donation->khalti_idx = $request->khalti_idx;
        $donation->save();

        // Update campaign raised amount
        $campaign->raised_amount += $request->amount;
        $campaign->save();

        return redirect()->route('user.view', $campaign->id)
            ->with('success', 'Thank you for your donation!');
    }

    // Optional: separate Khalti verification endpoint for AJAX (if used)
    public function verifyKhalti(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'amount' => 'required|integer',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
        ])->post('https://dev.khalti.com/api/v2/payment/verify/', [
            'token' => $request->token,
            'amount' => $request->amount,
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Payment verification failed'], 422);
        }
    }

    // New: Payment success callback handler (to be set as return_url)
    public function paymentCallback(Request $request)
    {
        // Example URL params Khalti sends after payment (GET)
        // pidx, status, transaction_id, amount, purchase_order_id, purchase_order_name, etc.

        $pidx = $request->query('pidx');
        $status = $request->query('status');

        if (!$pidx) {
            return redirect()->route('feed')->withErrors('Invalid payment callback: missing payment id.');
        }

        // Call Khalti Lookup API to confirm payment status
        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
        ])->post('https://dev.khalti.com/api/v2/epayment/lookup/', [
            'pidx' => $pidx,
        ]);

        if (!$response->successful()) {
            Log::error('Khalti lookup failed', ['response' => $response->body()]);
            return redirect()->route('feed')->withErrors('Payment confirmation failed. Please contact support.');
        }

        $data = $response->json();

        if ($data['status'] === 'Completed') {
            // Payment successful
            // Here you can update donation status if you saved donations with pidx,
            // or notify user, etc.

            // For demo, redirect with success message
            return redirect()->route('feed')->with('success', 'Payment successful! Thank you.');
        } elseif (in_array($data['status'], ['Pending', 'Initiated'])) {
            return redirect()->route('feed')->with('warning', 'Payment is still pending. Please wait.');
        } else {
            return redirect()->route('feed')->withErrors('Payment failed or cancelled.');
        }
    }

    public function initiatePayment(Request $request, Campaign $campaign)
{
    $request->validate([
        'amount' => 'required|numeric|min:10', // min 10 NPR (1000 paisa)
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'nullable|string',
    ]);

    $purchaseOrderId = 'donation_' . uniqid();

    $payload = [
        'return_url' => route('payment.callback'),
        'website_url' => config('app.url'),
        'amount' => (int) ($request->amount * 100),
        'purchase_order_id' => $purchaseOrderId,
        'purchase_order_name' => 'Donation for ' . $campaign->title,
        'customer_info' => [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone ?? '',
        ],
    ];

    $response = Http::withHeaders([
        'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
        'Content-Type' => 'application/json',
    ])->post('https://dev.khalti.com/api/v2/epayment/initiate/', $payload);

    if ($response->successful()) {
        $data = $response->json();
        // Save purchase_order_id and pidx in DB (optional but recommended)
        return response()->json([
            'payment_url' => $data['payment_url'],
            'pidx' => $data['pidx'],
            'expires_at' => $data['expires_at'],
        ]);
    }

    return response()->json(['error' => 'Payment initiation failed.'], 500);
}

}
