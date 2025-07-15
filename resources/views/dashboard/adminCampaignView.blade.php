@extends('layouts.adminLayout')

@section('title', 'View Campaign - Nyano Haath')

@section('head')
  <link rel="stylesheet" href="{{ asset('css/adminView.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="campaign-view">
  <a href="{{ route('admin.campaigns.index') }}" class="back-btn">
    <i class="fas fa-arrow-left"></i> Back to Campaigns
  </a>

  <h1>{{ $campaign->title }}</h1>

  <div class="campaign-details">
    <p><strong>Fundraiser:</strong> {{ $campaign->user->name ?? 'N/A' }}</p>
    <p><strong>Goal:</strong> Rs. {{ number_format($campaign->goal_amount) }}</p>
    <p><strong>Raised:</strong> Rs. {{ number_format($campaign->raised_amount) }}</p>
    <p><strong>Status:</strong> {{ ucfirst($campaign->status) }}</p>
    <p><strong>Country:</strong> {{ $campaign->country }}</p>
    <p><strong>Category:</strong> {{ $campaign->category }}</p>
    <p><strong>Description:</strong><br>{{ $campaign->description }}</p>

    @if($campaign->campaign_image)
    <div class="media-section">
      <p><strong>Campaign Image:</strong></p>
      <a href="{{ asset('storage/' . $campaign->campaign_image) }}" target="_blank" class="view-link">
        View Image <i class="fas fa-external-link-alt" style="margin-left: 0.3rem;"></i>
      </a>
    </div>
    @endif

    @if($campaign->verification_document)
    <div class="media-section">
      <p><strong>Verification Document:</strong></p>
      <a href="{{ asset('storage/' . $campaign->verification_document) }}" target="_blank" class="view-link">
        View Document <i class="fas fa-external-link-alt" style="margin-left: 0.3rem;"></i>
      </a>
    </div>
    @endif
  </div>
</div>
@endsection
