@extends('layouts.custom')

@section('title', 'About Us')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
    <main>
        <!-- Section 1: Welcome Area -->
        <section id="about" class="section welcome-section">
            <div class="container text-center">
                <h1 class="title-large animate">
                    A <span class="gradient-text">Warm Hand</span> for Every Cause.
                </h1>
                <p class="subtitle animate">
                    We are a student-led project from Apex College, creating a simple, trusted platform to connect generous people with important causes across Nepal.
                </p>
                <div class="mt-10 animate">
                    <a href="{{ route('feed') }}" class="button-primary">Explore Causes</a>
                </div>
            </div>
        </section>

        <!-- Section 2: The Story -->
        <section class="section">
            <div class="container grid two-columns">
                <div class="animate">
                    <h2 class="title-medium">The Challenge</h2>
                    <p class="text-large">
                        Many great causes struggle to raise money because donors worry if their help will truly reach the right people.
                    </p>
                </div>
                <div class="card animate">
                    <h2 class="title-medium orange-text">Our Solution</h2>
                    <p class="text-large">
                        Nyano Haath provides a safe and clear platform so you can give with confidence and see your impact.
                    </p>
                </div>
            </div>
        </section>

        <!-- Section 3: How It Works -->
        <section id="how-it-works" class="section section-light-gray">
            <div class="container text-center">
                <h2 class="title-medium animate">Giving is Easy in 3 Steps</h2>
                <div class="grid three-columns mt-12">
                    <div class="step-card animate">
                        <div class="step-number">01</div>
                        <h3 class="title-small">Create a Fundraiser</h3>
                        <p>Quickly tell your story and set a goal for what you need.</p>
                    </div>
                    <div class="step-card animate">
                        <div class="step-number">02</div>
                        <h3 class="title-small">Share Your Story</h3>
                        <p>Share the link with friends, family, and our community.</p>
                    </div>
                    <div class="step-card animate">
                        <div class="step-number">03</div>
                        <h3 class="title-small">Receive Donations</h3>
                        <p>Collect support safely and share updates with your donors.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 4: Meet the Team -->
        <section id="team" class="section section-light-gray">
            <div class="container text-center">
                <h2 class="title-medium animate">Meet the Student Founders</h2>
                <div class="grid four-columns mt-12">
                    <div class="team-card animate">
                        <img class="team-photo" src="https://i.pravatar.cc/150?u=aarya" alt="Aarya Khadka">
                        <h4 class="team-name">Aarya Khadka</h4>
                    </div>
                    <div class="team-card animate">
                        <img class="team-photo" src="https://i.pravatar.cc/150?u=prasanna" alt="Prasanna Malla">
                        <h4 class="team-name">Prasanna Malla</h4>
                    </div>
                    <div class="team-card animate">
                        <img class="team-photo" src="https://i.pravatar.cc/150?u=saroj" alt="Saroj Shah">
                        <h4 class="team-name">Saroj Shah</h4>
                    </div>
                    <div class="team-card animate">
                        <img class="team-photo" src="https://i.pravatar.cc/150?u=shisir" alt="Shisir Kafle">
                        <h4 class="team-name">Shisir Kafle</h4>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection