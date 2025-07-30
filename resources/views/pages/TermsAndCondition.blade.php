@extends('layouts.app')

@section('title', 'Terms and Conditions')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&family=Montserrat:wght@400;600&display=swap');

    :root {
        --primary-color: #3498db;
        --secondary-color: #2c3e50;
        --background-color: #f0f2f5;
        --text-color: #34495e;
        --card-background: #ffffff;
        --border-color: #e1e4e8;
        --success-color: #2ecc71;
        --error-color: #e74c3c;
        --font-heading: 'Montserrat', sans-serif;
        --font-body: 'Roboto', sans-serif;
        --shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        --border-radius: 12px;
    }

    body {
        font-family: var(--font-body);
        line-height: 1.7;
        margin: 0;
        padding: 40px 20px;
        background-color: var(--background-color);
        color: var(--text-color);
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .box {
        max-width: 900px;
        margin: auto;
        background: var(--card-background);
        padding: 40px;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        border-top: 5px solid var(--primary-color);
    }

    .head {
        text-align: center;
        margin-bottom: 40px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .head h1 {
        font-family: var(--font-heading);
        font-size: 2.5em;
        color: var(--secondary-color);
        margin: 0;
    }

    .head p {
        font-size: 1.1em;
        color: #7f8c8d;
        margin-top: 10px;
    }

    .note {
        background-color: #eaf5ff;
        border-left: 5px solid var(--primary-color);
        margin: 30px 0;
        padding: 20px 30px;
        font-style: italic;
        color: var(--secondary-color);
    }

    .item {
        margin-bottom: 15px;
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        overflow: hidden;
        transition: all 0.3s ease-in-out;
    }

    .title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        cursor: pointer;
        background-color: var(--card-background);
        font-family: var(--font-heading);
        font-size: 1.2em;
        font-weight: 600;
        color: var(--secondary-color);
        transition: background-color 0.3s ease;
        list-style: none;
    }

    .title::-webkit-details-marker {
        display: none;
    }

    .title:hover {
        background-color: #f9f9f9;
    }

    .arrow {
        font-size: 1.5em;
        transition: transform 0.3s ease;
        user-select: none;
    }

    .body {
        background-color: #fdfdfd;
        padding: 0 20px;
        border-top: 1px solid var(--border-color);
    }

    .body h3 {
        font-family: var(--font-heading);
        color: var(--primary-color);
        margin-top: 20px;
    }

    .body ul {
        list-style: none;
        padding-left: 0;
    }

    .body ul li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 10px;
    }

    .body ul li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--success-color);
        font-weight: bold;
    }

    details[open] .title .arrow {
        transform: rotate(180deg);
    }

    details[open] .title {
        background-color: #f5f7fa;
    }

    .foot {
        text-align: center;
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
        font-size: 0.9em;
        color: #7f8c8d;
    }
</style>
@endsection

@section('content')

<div class="box">

    <header class="head">
        <h1>Our Community Covenant</h1>
        <p>Your guide to navigating our community and services. <br/>Last updated: July 27, 2025</p>
    </header>

    <blockquote class="note">
        Welcome! This document isn’t just a list of rules; it's our mutual agreement to keep our community safe, respectful, and innovative. Think of it as our digital handshake. By using our services, you’re shaking hands with us and agreeing to this covenant.
    </blockquote>

    <details class="item">
        <summary class="title">
            <span>🤝 Our Digital Handshake (Acknowledgement)</span>
            <span class="arrow">▼</span>
        </summary>
        <div class="body">
            <h3>The Agreement</h3>
            <p>These are the terms governing your use of this Service...</p>
            <p><strong>By accessing or using the Service, you agree to be bound by these terms...</strong></p>
        </div>
    </details>

    <details class="item">
        <summary class="title">
            <span>📖 Key Terms Glossary (Definitions)</span>
            <span class="arrow">▼</span>
        </summary>
        <div class="body">
            <p>To make sure we're on the same page, here are some key definitions:</p>
            <ul>
                <li><strong>Covenant:</strong> This document, our Terms and Conditions.</li>
                <li><strong>Company:</strong> Refers to [Your Company Name], located at [Your Company Address].</li>
                <li><strong>Community Member:</strong> The individual or entity using our Service.</li>
                <li><strong>Service:</strong> The Website and related services.</li>
                <li><strong>Website:</strong> Refers to [Your Website Name], accessible from [Your Website URL].</li>
                <li><strong>Content:</strong> Any text, images, or data posted on the Service.</li>
            </ul>
        </div>
    </details>

    <details class="item">
        <summary class="title">
            <span>🔑 Your Community Passport (User Accounts)</span>
            <span class="arrow">▼</span>
        </summary>
        <div class="body">
            <h3>Creating Your Account</h3>
            <p>To access the full features of our Service, you may need to create an account...</p>
            <h3>Protecting Your Password</h3>
            <p>You are responsible for keeping it safe and for all activities under your account...</p>
        </div>
    </details>

    <details class="item">
        <summary class="title">
            <span>⚖️ The Ground Rules (User Conduct)</span>
            <span class="arrow">▼</span>
        </summary>
        <div class="body">
            <h3>Your Commitments</h3>
            <ul>
                <li>Respect others and not engage in harassment or hate speech.</li>
                <li>Not post illegal or harmful content.</li>
                <li>Not use the Service for fraud or hacking.</li>
            </ul>
            <h3>Content Ownership</h3>
            <p>You retain ownership, but grant us permission to use it within the Service.</p>
        </div>
    </details>

    <details class="item">
        <summary class="title">
            <span>🛡️ Our Role & Responsibilities</span>
            <span class="arrow">▼</span>
        </summary>
        <div class="body">
            <h3>Our Intellectual Property</h3>
            <p>The Service, branding, and features are protected by law and belong to us.</p>
            <h3>Our Right to Moderate</h3>
            <p>We can monitor or remove content that violates the rules.</p>
            <h3>Service Availability</h3>
            <p>The Service is provided "as is" without guarantees of uptime or perfection.</p>
        </div>
    </details>

    <details class="item">
        <summary class="title">
            <span>🚪 Parting Ways (Termination)</span>
            <span class="arrow">▼</span>
        </summary>
        <div class="body">
            <p>You may delete your account at any time. We may suspend accounts that violate terms.</p>
        </div>
    </details>

    <details class="item">
        <summary class="title">
            <span>📜 The Important Legal Stuff</span>
            <span class="arrow">▼</span>
        </summary>
        <div class="body">
            <h3>Limitation of Liability</h3>
            <p>We are not liable for indirect or incidental damages beyond $100 or the amount paid.</p>
            <h3>Governing Law</h3>
            <p>This agreement is governed by the laws of [Your Country or State].</p>
            <h3>Dispute Resolution</h3>
            <p>Contact us first. If unresolved, disputes go to arbitration or small claims court.</p>
        </div>
    </details>

    <details class="item">
        <summary class="title">
            <span>🌱 Evolving Our Covenant (Changes to Terms)</span>
            <span class="arrow">▼</span>
        </summary>
        <div class="body">
            <p>We may update these terms and notify users of major changes. Continued use means acceptance.</p>
        </div>
    </details>

    <div class="foot">
        <p>© 2025 Your Website. All rights reserved.</p>
    </div>

</div>

@endsection
