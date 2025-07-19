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

@php
    $campaignUrl = route('user.view', $campaign->id);
    $encodedUrl = urlencode($campaignUrl);
    $encodedTitle = urlencode($campaign->title);
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

            <div id="share-menu" class="share-menu" style="display: none;">
                <p class="share-message">
                    Help <strong>{{ $campaign->user->name }}</strong> share their story
                </p>
                <div class="share-links">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedUrl }}" target="_blank" rel="noopener" title="Share on Facebook" class="share-link facebook">
                        <i class="fab fa-facebook"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ $encodedTitle }}&url={{ $encodedUrl }}" target="_blank" rel="noopener" title="Share on X" class="share-link twitter">
                        <i class="fab fa-twitter"></i> X (Twitter)
                    </a>
                    
                    <button id="copy-url-btn" title="Copy URL to Clipboard" class="share-link copy-link">
                        <i class="fas fa-link"></i> Copy Link
                    </button>
                </div>
            </div>


        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const shareBtn = document.querySelector('.share-button');
    const shareMenu = document.getElementById('share-menu');
    const copyBtn = document.getElementById('copy-url-btn');

    shareBtn.addEventListener('click', (e) => {
        e.preventDefault();
        if (shareMenu.style.display === 'none' || !shareMenu.style.display) {
            shareMenu.style.display = 'flex';
        } else {
            shareMenu.style.display = 'none';
        }
    });

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText('{{ $campaignUrl }}')
            .then(() => alert('URL copied to clipboard!'))
            .catch(() => alert('Failed to copy URL'));
    });

    // Optional: Hide share menu if clicked outside
    document.addEventListener('click', (e) => {
        if (!shareMenu.contains(e.target) && !shareBtn.contains(e.target)) {
            shareMenu.style.display = 'none';
        }
    });
});

</script>

@endsection
