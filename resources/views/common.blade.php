@extends('layouts.custom')

@section('title', 'Frequently Asked Questions')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
@endsection

@section('content')
<div class="faq-container">
    <h1 class="faq-title">Frequently Asked Questions</h1>
    <div class="faq-list">

        <div class="faq-item">
            <h2>1. Why was my campaign rejected?</h2>
            <p>Campaigns are rejected if they contain incomplete information, suspicious content, or fail verification requirements.</p>
        </div>

        <div class="faq-item">
            <h2>2. What is the platform fee?</h2>
            <p>Nyano Haath charges a 3% fee for normal campaigns and 8% for featured campaigns to cover operational and promotional costs.</p>
        </div>

        <div class="faq-item">
            <h2>3. How long does it take for a campaign to get approved?</h2>
            <p>Campaigns are usually reviewed within 24–48 hours after submission.</p>
        </div>

        <div class="faq-item">
            <h2>4. Can I edit my campaign after publishing?</h2>
            <p>Yes, but any changes require re-verification before they appear publicly.</p>
        </div>

        <div class="faq-item">
            <h2>5. How can I withdraw funds?</h2>
            <p>You can request a withdrawal from your dashboard once your campaign is approved and eligible. No minimum threshold is required.</p>
        </div>

        <div class="faq-item">
            <h2>6. Can I donate anonymously?</h2>
            <p>Yes, you can choose to hide your name and details. However, keep in mind that you won’t be able to view your donation records later.</p>
        </div>

        <div class="faq-item">
            <h2>7. Is it safe to use my card or Khalti?</h2>
            <p>Absolutely. We use secure payment gateways like Khalti to ensure your information is protected.</p>
        </div>

        <div class="faq-item">
            <h2>8. How can I report a suspicious campaign?</h2>
            <p>Please contact us directly via our contact page.</p>
        </div>

        <div class="faq-item">
            <h2>9. Can I raise funds for someone else?</h2>
            <p>Yes, but you must provide valid proof and authorization from the person or family.</p>
        </div>

        <div class="faq-item">
            <h2>10. How do I feature my campaign?</h2>
            <p>To request a featured campaign, please contact us via  Contact Us page.</p>
        </div>

        

    </div>
</div>
@endsection
