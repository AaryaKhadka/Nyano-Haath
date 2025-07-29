@extends('layouts.app')

@section('title', 'How It Works')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/categoriesDetail.css') }}">
@endsection

@section('content')


@include('layouts.donationstep')

@include('layouts.fundraisingstep')

<section id="trust-safety" class="trust-section">
   <div class="container">
        <div class="section-intro">
            <h2>Our Commitment to Trust & Safety</h2>
            <p>Your security is our top priority. We've built Nyano Haath on a foundation of trust so you can give and receive with peace of mind.</p>
        </div>
        <div class="trust-features">
            <div class="trust-feature-item">
             <i class="fas fa-user-shield"></i>
                <h4>Campaign Verification</h4>
                <p>Our dedicated team reviews every campaign to protect donors from fraud and ensure authenticity.</p>
            </div>
            <div class="trust-feature-item">
                <i class="fas fa-lock"></i>
                <h4>Secure Payments</h4>
                <p>All donations are processed through industry-leading, encrypted payment gateways.</p>
            </div>
            <div class="trust-feature-item">
                <i class="fas fa-file-invoice-dollar"></i>
                <h4>Transparent Tracking</h4>
                <p>We provide tools for fundraisers to show how funds are being used, ensuring full accountability.</p>
            </div>
        </div>
    </div>
</section>

@endsection