@extends('layouts.app')

@section('title', $title)

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/categoriesDetail.css') }}">
@endsection

@section('content')
<main class="cat-hero-angled">
    <div class="imageContainer">
        <img 
            src="{{ asset('image/' . $image) }}" 
            alt="{{ $title }}"
            class="background-image"
        >
    </div>

    <div class="textangled">
        <h1>{{ $title }}</h1>
        <p>{{ $description }}</p>
        <a href="#" class="btn btn-primary btn-large">Start a Fundraiser</a>
    </div>
</main>

<!-- HOW IT WORKS SECTION -->
<section class="cat-howItWorks">
    <h2>Getting Started is Easy</h2>
    <div class="cat-stepsContainer">
        <div class="cat-stepCard">
            <div class="cat-stepIcon"><i class="fa-solid fa-bullhorn"></i></div>
            <h3>1. Tell Your Story</h3>
            <p>Create your page in minutes. Explain your situation clearly and set your fundraising goal. Be authentic and personal.</p>
        </div>
        <div class="cat-stepCard">
            <div class="cat-stepIcon"><i class="fa-solid fa-share-nodes"></i></div>
            <h3>2. Share Your Link</h3>
            <p>Share your unique fundraiser link with friends, family, and on social media. The more you share, the more support you'll get.</p>
        </div>
        <div class="cat-stepCard">
            <div class="cat-stepIcon"><i class="fa-solid fa-piggy-bank"></i></div>
            <h3>3. Receive Funds</h3>
            <p>Securely transfer the funds you've raised directly to your bank account. You don't need to reach your goal to receive money.</p>
        </div>
    </div>
</section>

<!-- FAQ SECTION -->
<section class="faq-section">
    <h2>Frequently Asked Questions</h2>
    <div class="faq-container">
        <details class="faq-item">
            <summary class="faq-question">
                Can I start a fundraiser for a friend or family member?
            </summary>
            <div class="faq-answer">
                <p>Yes, absolutely! You can start a fundraiser on behalf of someone else. During setup, you can invite them to be the beneficiary, so they can receive the funds directly and securely.</p>
            </div>
        </details>

        <details class="faq-item">
            <summary class="faq-question">
                How much does it cost to start a fundraiser?
            </summary>
            <div class="faq-answer">
                <p>It is free to start a fundraiser. A standard transaction fee is automatically deducted from each donation. The rest goes directly to the beneficiary.</p>
            </div>
        </details>

        <details class="faq-item">
            <summary class="faq-question">
                Do I need to reach my goal to receive the money?
            </summary>
            <div class="faq-answer">
                <p>No, you don’t. You can withdraw your funds anytime even if you haven't reached your goal.</p>
            </div>
        </details>
    </div>
</section>
@endsection
