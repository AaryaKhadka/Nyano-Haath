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
        'district' => 'required|string|max:255',
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
        // 'district' => 'required|string|max:255',
        'goal_amount' => 'required|numeric',
    ]);

    $campaign->title = $request->title;
    $campaign->description = $request->description;
    $campaign->goal_amount = $request->goal_amount;

    
    $campaign->status = 'pending';

    $campaign->save();

    return redirect()->route('dashboard')->with('success', 'Campaign updated and sent for re-approval.');
}


    public function destroy(Campaign $campaign)
{
    // Optional: ensure the user is authorized
    if (auth()->id() !== $campaign->user_id) {
        abort(403, 'Unauthorized');
    }

    // Prevent deleting unless status is 'pending'
    if ($campaign->status !== 'pending') {
        return redirect()->back()->withErrors(['error' => 'Only pending campaigns can be deleted.']);
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


//campaignpage 

public function publicIndex(Request $request)
{
    $latestCampaigns = Campaign::where('status', '!=', 'pending')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    $successCampaigns = Campaign::where('status', '!=', 'pending')
        ->whereColumn('raised_amount', '>=', 'goal_amount')
        ->orderBy('updated_at', 'desc')
        ->take(10)
        ->get();

    $featuredCampaigns = Campaign::where('status', 'featured')
        ->orderBy('updated_at', 'desc')
        ->take(5)
        ->get();

    // Detect which route was called
    $currentRouteName = $request->route()->getName();

    if ($currentRouteName === 'home') {
        $viewName = 'index';
    } elseif ($currentRouteName === 'feed') {
        $viewName = 'campaignpage';
    } else {
        abort(404);
    }

    return view($viewName, compact('latestCampaigns', 'successCampaigns', 'featuredCampaigns'));
}


public function publicShow(Campaign $campaign)
{
    return view('campaignshow', compact('campaign'));
}

}