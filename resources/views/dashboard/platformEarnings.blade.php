@extends('layouts.adminLayout')

@section('title', 'Platform Earnings')

@section('head')
  <link rel="stylesheet" href="{{ asset('css/platform.css') }}">
@endsection

@section('content')
<div class="main-content">
    <h1>Platform Earnings</h1>

    <section class="earnings-summary">
        <div class="stat-card">
            <h2>Active Campaign Earnings (3%)</h2>
            <p>₹{{ number_format($activeEarnings, 2) }}</p>
        </div>
        <div class="stat-card">
            <h2>Featured Campaign Earnings (8%)</h2>
            <p>₹{{ number_format($featuredEarnings, 2) }}</p>
        </div>
        <div class="stat-card total">
            <h2>Total Platform Earnings</h2>
            <p>₹{{ number_format($totalEarnings, 2) }}</p>
        </div>
    </section>
</div>
@endsection
