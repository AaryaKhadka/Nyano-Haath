<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    // List campaigns for logged-in user
    public function index()
    {
        $campaigns = Campaign::where('user_id', auth()->id())->latest()->get();
        return view('dashboard', compact('campaigns'));
    }

    // Show create form
    public function create()
    {
        return view('campaigns.create');
    }

    // Store new campaign
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric',
        ]);

        Campaign::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'goal_amount' => $request->goal_amount,
            'raised_amount' => 0,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Campaign created successfully.');
    }

    // Show edit form
    public function edit(Campaign $campaign)
    {
        // Authorization: only campaign owner can edit
        if ($campaign->user_id != auth()->id()) {
            abort(403);
        }

        return view('campaigns.edit', compact('campaign'));
    }

    // Update campaign
    public function update(Request $request, Campaign $campaign)
    {
        if ($campaign->user_id != auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric',
        ]);

        $campaign->update($request->only(['title', 'description', 'goal_amount']));

        return redirect()->route('dashboard')->with('success', 'Campaign updated successfully.');
    }

    // Delete campaign
    public function destroy(Campaign $campaign)
    {
        if ($campaign->user_id != auth()->id()) {
            abort(403);
        }

        $campaign->delete();

        return redirect()->route('dashboard')->with('success', 'Campaign deleted successfully.');
    }

    // Show a single campaign
public function show(Campaign $campaign)
{
    // Authorization: only campaign owner can view
    if ($campaign->user_id != auth()->id()) {
        abort(403);
    }

    return view('campaigns.show', compact('campaign'));
}

}
