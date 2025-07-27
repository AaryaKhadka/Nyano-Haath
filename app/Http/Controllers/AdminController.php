<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Withdrawal;

class AdminController extends Controller
{
    public function __construct()
    {
        // Ensure the user is authenticated and is an admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }
    }

    // Show admin dashboard stats
    public function dashboard()
    {
        $totalCreators = User::where('role', 'fundraiser')->count();
        $totalAmountRaised = Campaign::sum('raised_amount');
        $totalCampaigns = Campaign::count();
        $activeUsers = User::count();

        return view('dashboard.adminDash', compact(
            'totalCreators',
            'totalAmountRaised',
            'totalCampaigns',
            'activeUsers'
        ));
    }

    // Show Role Management page with list of users
    public function showRoles()
    {
        $users = User::all();
        return view('dashboard.roleManagement', compact('users'));
    }

    // Update a user's role
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,fundraiser,donor',
        ]);

        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'User role updated successfully.');
    }

    // Show all campaigns to admin
    public function campaigns()
    {
        $campaigns = Campaign::with('user')->latest()->get();
        return view('dashboard.campaign', compact('campaigns'));
    }

    // Approve a pending campaign
    public function approveCampaign(Campaign $campaign)
    {
        $campaign->status = 'active';
        $campaign->save();

        return back()->with('success', 'Campaign approved successfully.');
    }

    public function rejectCampaign(Campaign $campaign)
{
    if ($campaign->status !== 'pending') {
        return redirect()->route('admin.campaigns.index')->with('error', 'Cannot reject this campaign.');
    }

    $campaign->status = 'rejected';
    $campaign->save();

    return redirect()->route('admin.campaigns.index')->with('success', 'Campaign rejected successfully.');
}



    

    // View a single campaign
    public function showCampaign(Campaign $campaign)
    {
        return view('dashboard.adminCampaignView', compact('campaign'));
    }

    // Feature a campaign
public function featureCampaign(Campaign $campaign)
{
    if ($campaign->status !== 'active') {
        return back()->with('error', 'Only active campaigns can be featured.');
    }

    $campaign->status = 'featured';
    $campaign->save();

    return back()->with('success', 'Campaign has been featured successfully.');
}

// Unfeature a campaign
public function unfeatureCampaign(Campaign $campaign)
{
    if ($campaign->status !== 'featured') {
        return back()->with('error', 'Only featured campaigns can be unfeatured.');
    }

    $campaign->status = 'active';
    $campaign->save();

    return back()->with('success', 'Campaign has been unfeatured successfully.');
}

public function withdrawals()
{
    $withdrawals = Withdrawal::with('user', 'campaign')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('withdraw.adminW', compact('withdrawals'));
}

public function approveWithdrawal(Withdrawal $withdrawal)
{
    if ($withdrawal->status !== 'pending') {
        return back()->with('error', 'Only pending withdrawals can be approved.');
    }

    $withdrawal->status = 'approved';
    $withdrawal->save();

    return back()->with('success', 'Withdrawal approved successfully.');
}

public function rejectWithdrawal(Withdrawal $withdrawal)
{
    if ($withdrawal->status !== 'pending') {
        return back()->with('error', 'Only pending withdrawals can be rejected.');
    }

    $withdrawal->status = 'rejected';
    $withdrawal->save();

    return back()->with('success', 'Withdrawal rejected successfully.');
}

public function releaseWithdrawal(Withdrawal $withdrawal)
{
    if ($withdrawal->status !== 'approved') {
        return back()->with('error', 'Only approved withdrawals can be marked as released.');
    }

    $withdrawal->status = 'released';
    $withdrawal->save();

    return back()->with('success', 'Withdrawal marked as released.');
}



}
