@extends('layouts.app')
@section('title', 'Categories')
@section('styles')
    <link rel="stylesheet" href="/css/categories.css">
@endsection

@section('content')
     <!-- Stats Section -->
        <section class="stats fade-in-section">
            <div class="container">
                <div class="section-intro">
                    <h2>Fundraise for What Matters Most</h2>
                    <p style="text-align: center;">From personal emergencies to community projects, find your cause.</p>
                </div>
                <div class="stats-content">
                    <div class="stat-item">
                        <i class="fas fa-heart-pulse"></i>
                        <h3>Medical</h3>
                        <p>Support life-saving treatments</p>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-bolt"></i>
                        <h3>Emergency</h3>
                        <p>Provide immediate relief</p>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-graduation-cap"></i>
                        <h3>Education</h3>
                        <p>Build a brighter future</p>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-paw"></i>
                        <h3>Animal</h3>
                        <p>Help our furry friends</p>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-lightbulb"></i>
                        <h3>Your Cause</h3>
                        <p>Bring your ideas to life</p>
                    </div>
                     <div class="stat-item">
                        <i class="fas fa-bolt"></i>
                        <h3>Emergency</h3>
                        <p>Provide immediate relief</p>
                    </div>
                     <div class="stat-item">
                        <i class="fas fa-bolt"></i>
                        <h3>Emergency</h3>
                        <p>Provide immediate relief</p>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-briefcase"></i>
                        <h3>Business</h3>
                        <p>Launch a new venture</p>
                    </div>
                </div>
            </div>
        </section>


@endsection