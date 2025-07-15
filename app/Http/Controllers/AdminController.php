<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Campaign;

class AdminController extends Controller
{
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

    // Delete a campaign (only if not approved)
    public function deleteCampaign(Campaign $campaign)
    {
        if ($campaign->status === 'approved') {
            return back()->with('error', 'Approved campaigns cannot be deleted.');
        }

        $campaign->delete();

        return back()->with('success', 'Campaign deleted successfully.');
    }

    // // Mark campaign as featured
    // public function featureCampaign(Campaign $campaign)
    // {
    //     $campaign->featured = true;
    //     $campaign->save();

    //     return back()->with('success', 'Campaign marked as featured.');
    // }

    // // Remove featured status from campaign
    // public function unfeatureCampaign(Campaign $campaign)
    // {
    //     $campaign->featured = false;
    //     $campaign->save();

    //     return back()->with('success', 'Campaign unfeatured successfully.');
    // }

    public function showCampaign(Campaign $campaign)
{
    return view('dashboard.adminCampaignView', compact('campaign'));
}
}
