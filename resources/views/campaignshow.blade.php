@extends('layouts.custom')

@section('title', $campaign->title)

@section('styles')
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/campaignshow.css') }}">
@endsection

@section('content')

@php
   $percentage = $campaign->goal_amount > 0
    ? min(10000, number_format(($campaign->raised_amount / $campaign->goal_amount) * 100, 2, '.', ''))
    : 0;
@endphp

<div class="campaign-detail">

    <a href="{{ url()->previous() }}" class="back-button">
        <i class="fas fa-arrow-left"></i> Back
    </a>

    <div class="campaign-content"> <!-- white background container -->

        <h1 class="campaign-title">{{ $campaign->title }}</h1>

        <div class="campaign-image-wrapper">
            <img src="{{ asset('storage/' . $campaign->campaign_image) }}" alt="Campaign Image" class="campaign-image">
        </div>

        <h2 class="section-heading">Story Behind This Campaign</h2>

        <p>{{ $campaign->description }}</p>

        <p><strong>Goal Amount:</strong> NPR {{ number_format($campaign->goal_amount) }}</p>
        <p><strong>Raised Amount:</strong> NPR {{ number_format($campaign->raised_amount) }}</p>

        <!-- Progress Bar -->
        <div class="donation-progress-container">
            <div class="progress-bar">
                <div class="progress-fill" style="width: {{ $percentage }}%;"></div>
            </div>
            <p class="progress-text">
                NPR {{ number_format($campaign->raised_amount) }} / {{ number_format($campaign->goal_amount) }} Raised ({{ $percentage }}%)
            </p>
        </div>

        <!-- Buttons -->
        <div class="action-buttons">
            <a href="#" class="btn donate-button">
                <i class="fas fa-hand-holding-heart"></i> Donate Now
            </a>
            <a href="#" class="btn share-button">
                <i class="fas fa-share-alt"></i> Share
            </a>
        </div>

    </div>

</div>
@endsection
