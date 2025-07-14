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
}
