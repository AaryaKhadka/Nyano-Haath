@extends('layouts.custom')

@section('title', 'Donate to ' . $campaign->title)

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dform.css') }}">
@endsection

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('donation.process', $campaign) }}">
            @csrf

            <div class="form-group">
                <label for="name">Full Name <span>*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required />
            </div>

            <div class="form-group">
                <label for="email">Email Address <span>*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required />
            </div>

            <div class="form-group">
                <label for="phone">Phone Number (optional)</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" />
            </div>

            <div class="form-group">
                <label for="amount">Donation Amount (NPR) <span>*</span></label>
                <input type="number" id="amount" name="amount" min="10" value="{{ old('amount') }}" required />
                <small>Minimum donation is 10 NPR.</small>
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="anonymous" name="anonymous" {{ old('anonymous') ? 'checked' : '' }} />
                <label for="anonymous">Donate anonymously</label>
            </div>

            <div class="form-group" id="password-section">
                <label for="password">Set a Password (optional)</label>
                <input type="password" id="password" name="password" minlength="6" />
                <p class="note">Allows you to login and track your donations later.</p>
            </div>

            <button type="submit" class="btn donate-btn">Donate with Khalti</button>
        </form>
    </section>

</div>
@endsection

@section('scripts')
<script>
    const anonymousCheckbox = document.getElementById('anonymous');
    const passwordSection = document.getElementById('password-section');

    function togglePasswordSection() {
        passwordSection.style.display = anonymousCheckbox.checked ? 'none' : 'block';
    }

    anonymousCheckbox.addEventListener('change', togglePasswordSection);
    window.addEventListener('load', togglePasswordSection);
</script>
@endsection
