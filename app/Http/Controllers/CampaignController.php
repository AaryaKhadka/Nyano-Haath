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
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'goal_amount' => 'required|numeric|min:1',
        'country' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'campaign_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'verification_document' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
    ]);

    // Handle image upload
    if ($request->hasFile('campaign_image')) {
        $imagePath = $request->file('campaign_image')->store('campaign_images', 'public');
        $validated['campaign_image'] = $imagePath;
    }

    // Handle verification document upload
    if ($request->hasFile('verification_document')) {
        $docPath = $request->file('verification_document')->store('verification_docs', 'public');
        $validated['verification_document'] = $docPath;
    }

    $validated['user_id'] = auth()->id();
    $validated['raised_amount'] = 0;
    $validated['status'] = 'pending';

    \App\Models\Campaign::create($validated);

    return redirect()->route('dashboard')->with('success', 'Campaign created successfully!');
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
