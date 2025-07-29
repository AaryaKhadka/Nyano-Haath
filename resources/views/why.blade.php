@extends('layouts.custom')

@section('title', 'About Nyano')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/categoriesDetail.css') }}">
  <link rel="stylesheet" href="{{ asset('css/aboutnyano.css') }}">
@endsection


@section('content')
<div class="nyano-container">
  <section class="nh-section">
    <h2>A Bridge of Hope, Built on Trust</h2>
    <p>Nyano Haath simplifies fundraising across Nepal with trust, transparency, and technology.</p>

    <div class="nh-grid">
      <div class="nh-item">
        <i class="fas fa-shield-alt"></i>
        <h4>Secure & Verified</h4>
        <p>We use secure gateways like eSewa & Khalti and verify every campaign.</p>
      </div>

      <div class="nh-item">
        <i class="fas fa-eye"></i>
        <h4>Transparent Process</h4>
        <p>Track donations in real-time and receive updates from campaign creators.</p>
      </div>

      <div class="nh-item">
        <i class="fas fa-bolt"></i>
        <h4>Easy to Use</h4>
        <p>Create and share campaigns within minutes, no hassle.</p>
      </div>

      <div class="nh-item">
        <img src="{{ asset('image/nepal-flag.jpeg') }}" alt="Nepal Flag" style="width:60px">
        <h4>Made for Nepal</h4>
        <p>We understand local needs and tailor the platform for Nepali users.</p>
      </div>
    </div>
  </section>
   <section class="nh-section" style="background: #e8f5e9;">
                <h2>Our Commitment to Sustainability</h2>
                <h4>How we keep the platform safe, secure, and free for everyone to start a campaign.</h4>
                <p>
                    Nyano Haath is a social-impact organization. To operate our platform, ensure every transaction is secure, and provide support to our users, <strong>we apply a small platform fee of 3% to each donation and 8% for featured campaigns.</strong>
                </p>
                <p>
                    This small percentage covers essential costs like security, fraud prevention, campaign verification, and technology maintenance. This model allows us to offer a powerful fundraising tool with zero upfront costs to those in need.
                </p>
  </section>
   @include('layouts.donationstep')
   <section class="nh-cta">
    <h2>Ready to Make a Difference?</h2>
    <p>Your support can change a life. Start or support a campaign today.</p>
    <a href="{{ route('login') }}" class="btn btn-primary btn-large">Start a Campaign</a>
    <a href="{{ route('feed') }}" class="btn btn-primary btn-large">Explore Causes</a>
  </section>
  

@endsection
 