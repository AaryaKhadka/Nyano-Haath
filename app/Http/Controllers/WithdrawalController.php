<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Models\Donation;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    // Show withdraw page with available amount and withdrawal history
    public function index()
    {
        $user = Auth::user();

        // Get user's campaigns with status 'active' or 'featured'
        $campaigns = $user->campaigns()
            ->whereIn('status', ['active', 'featured'])
            ->get();

        $availableAmount = 0;

        foreach ($campaigns as $campaign) {
            $totalDonations = $campaign->donations()->sum('amount');

            if ($campaign->status === 'featured') {
                $feePercent = 0.08;
            } else {
                $feePercent = 0.03;
            }

            $netAmount = $totalDonations * (1 - $feePercent);
            $availableAmount += $netAmount;
        }

        // Subtract all approved withdrawals for this user
        $approvedWithdrawals = Withdrawal::where('user_id', $user->id)
            ->where('status', 'approved')
            ->sum('amount');

        $availableAmount -= $approvedWithdrawals;
        $availableAmount = max($availableAmount, 0);

        $withdrawals = Withdrawal::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Add $campaigns to compact() to pass them to Blade
        return view('withdraw.wpage', compact('availableAmount', 'withdrawals', 'campaigns'));

    }

    // Handle withdrawal request creation (no campaign)
    public function store(Request $request)
{
    $request->validate([
        'campaign_id' => 'required|exists:campaigns,id',
        'amount' => 'required|numeric|min:1',
    ]);

    $user = Auth::user();

    // Find the campaign
    $campaign = Campaign::findOrFail($request->campaign_id);

    // Calculate available amount for this campaign only
    $totalDonations = $campaign->donations()->sum('amount');
    $feePercent = $campaign->status === 'featured' ? 0.08 : 0.03;
    $netAmount = $totalDonations * (1 - $feePercent);

    $approvedWithdrawals = Withdrawal::where('user_id', $user->id)
        ->where('campaign_id', $campaign->id)
        ->where('status', 'approved')
        ->sum('amount');

    $availableAmount = max($netAmount - $approvedWithdrawals, 0);

    if ($request->amount > $availableAmount) {
        return redirect()->back()->withErrors(['amount' => 'Requested amount exceeds available balance for this campaign.']);
    }

    Withdrawal::create([
        'user_id' => $user->id,
        'campaign_id' => $campaign->id,
        'amount' => $request->amount,
        'status' => 'pending',
    ]);

    return redirect()->route('withdraw.index')->with('success', 'Withdrawal request submitted successfully.');
}


    // Transactions remain same
   public function transactions()
{
    $user = Auth::user();

    // Fetch donations with campaign info
    $donations = Donation::whereHas('campaign', function ($q) use ($user) {
        $q->where('user_id', $user->id);
    })->with('campaign')  // eager load campaign
      ->orderBy('created_at', 'desc')
      ->get();

    // Calculate fee and net amount per donation
    foreach ($donations as $donation) {
        $feePercent = ($donation->campaign->status === 'featured') ? 0.08 : 0.03;
        $donation->fee = $donation->amount * $feePercent;
        $donation->netAmount = $donation->amount - $donation->fee;
    }

    // Withdrawals
    $withdrawals = Withdrawal::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('withdraw.transactions', compact('donations', 'withdrawals'));
}

}
