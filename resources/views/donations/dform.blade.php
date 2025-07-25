@extends('layouts.custom')

@section('title', 'Donate to ' . $campaign->title)

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dform.css') }}">
@endsection

@section('content')
<div class="donation-page">

    <aside class="campaign-info">
        <h2 class="campaign-title">{{ $campaign->title }}</h2>
        <img src="{{ asset('storage/' . $campaign->campaign_image) }}" alt="Campaign Image" class="campaign-image" />
        <h3>Description :</h3>
        <p class="campaign-description">{{ $campaign->description }}</p>
    </aside>

    <section class="donation-form-container">
        <a href="{{ route('feed') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Back to Campaigns
        </a>

        <h1 class="donation-title">Support: {{ $campaign->user->name }}'s Story</h1>

        <form id="donation-form" autocomplete="off" method="POST" action="{{ route('donation.process', $campaign) }}">
            @csrf

            <div class="form-group">
                <label for="name">Full Name <span>*</span></label>
                <input type="text" id="name" name="name" autocomplete="name" />
            </div>

            <div class="form-group">
                <label for="email">Email Address <span>*</span></label>
                <input type="email" id="email" name="email" autocomplete="email" />
            </div>

            <div class="form-group">
                <label for="amount">Donation Amount (NPR) <span>*</span></label>
                <input type="number" id="amount" name="amount" min="1" step="1" required />
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="anonymous" name="anonymous" />
                <label for="anonymous">Donate anonymously (your name/email won’t be shown publicly or stored with login)</label>
            </div>

            <div class="form-group" id="password-section" style="display:none;">
                <label for="password">Set a Password (to create a donor account & track donations)</label>
                <input type="password" id="password" name="password" minlength="6" autocomplete="new-password" />
                <p class="note">This will register your email and allow login to view donation history.</p>
            </div>

            <button type="submit" class="btn donate-btn">Donate with Khalti</button>
        </form>
    </section>

</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const anonymousCheckbox = document.getElementById('anonymous');
    const passwordSection = document.getElementById('password-section');
    if (!anonymousCheckbox || !passwordSection) return;

    function toggle() {
        passwordSection.style.display = anonymousCheckbox.checked ? 'none' : 'block';
        // If anonymous, clear name/email fields validation requirement
        document.getElementById('name').required = !anonymousCheckbox.checked;
        document.getElementById('email').required = !anonymousCheckbox.checked;
    }

    toggle();
    anonymousCheckbox.addEventListener('change', toggle);
});
</script>
@endsection
