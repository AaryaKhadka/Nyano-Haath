@extends('layouts.app')

@section('title', 'terms and condition')
@section('styles')
    <style>
        /* --- Font Imports --- */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&family=Montserrat:wght@400;600&display=swap');
        
        /* --- Root Variables for Easy Theme Customization --- */
        :root {
            --primary-color: #3498db; /* A friendly, trustworthy blue */
            --secondary-color: #2c3e50; /* A dark, professional slate */
            --background-color: #f0f2f5; /* A very light, clean gray */
            --text-color: #34495e; /* A softer, dark gray for text */
            --card-background: #ffffff;
            --border-color: #e1e4e8;
            --success-color: #2ecc71;
            --error-color: #e74c3c;
            --font-heading: 'Montserrat', sans-serif;
            --font-body: 'Roboto', sans-serif;
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            --border-radius: 12px;
        }

        /* --- General Body & Page Styling --- */
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

        /* --- Main Container --- */
        .covenant-container {
            max-width: 900px;
            margin: auto;
            background: var(--card-background);
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border-top: 5px solid var(--primary-color);
        }

        /* --- Header Section --- */
        .covenant-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .covenant-header h1 {
            font-family: var(--font-heading);
            font-size: 2.5em;
            color: var(--secondary-color);
            margin: 0;
        }

        .covenant-header p {
            font-size: 1.1em;
            color: #7f8c8d;
            margin-top: 10px;
        }

        /* --- Preamble / Introduction Blockquote --- */
        .preamble {
            background-color: #eaf5ff;
            border-left: 5px solid var(--primary-color);
            margin: 30px 0;
            padding: 20px 30px;
            font-style: italic;
            color: var(--secondary-color);
        }

        /* --- Accordion Styling using <details> and <summary> --- */
        .accordion-item {
            margin-bottom: 15px;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }
        
        /* This is the clickable header */
        .accordion-header {
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
        }
        
        /* Hide the default arrow marker */
        .accordion-header::-webkit-details-marker {
            display: none;
        }
        .accordion-header {
            list-style: none; /* For Firefox */
        }

        .accordion-header:hover {
            background-color: #f9f9f9;
        }

        .accordion-header .icon {
            font-size: 1.5em;
            transition: transform 0.3s ease;
            user-select: none; /* Prevents text selection of the icon */
        }

        /* This is the collapsible content area */
        .accordion-content {
            background-color: #fdfdfd;
            padding: 0 20px;
            border-top: 1px solid var(--border-color);
        }
        
        .accordion-content h3 {
             font-family: var(--font-heading);
             color: var(--primary-color);
             margin-top: 20px;
        }
        
        .accordion-content ul {
            list-style: none;
            padding-left: 0;
        }
        
        .accordion-content ul li {
            position: relative;
            padding-left: 25px;
            margin-bottom: 10px;
        }

        .accordion-content ul li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--success-color);
            font-weight: bold;
        }
        
        /* Style changes when the accordion item is open */
        details[open] .accordion-header .icon {
            transform: rotate(180deg);
        }
        
        details[open] .accordion-header {
            background-color: #f5f7fa;
        }

        /* --- Footer Section --- */
        .covenant-footer {
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

    <div class="covenant-container">
        
        <header class="covenant-header">
            <h1>Our Community Covenant</h1>
            <p>Your guide to navigating our community and services. <br/>Last updated: July 27, 2025</p>
        </header>

        <blockquote class="preamble">
            Welcome! This document isn’t just a list of rules; it's our mutual agreement to keep our community safe, respectful, and innovative. Think of it as our digital handshake. By using our services, you’re shaking hands with us and agreeing to this covenant.
        </blockquote>

        <!-- Accordion Item 1: The Basics -->
        <details class="accordion-item">
            <summary class="accordion-header">
                <span>🤝 Our Digital Handshake (Acknowledgement)</span>
                <span class="icon">▼</span>
            </summary>
            <div class="accordion-content">
                <h3>The Agreement</h3>
                <p>These are the terms governing your use of this Service and the agreement that operates between you and the Company. They set out the rights and responsibilities for all users. Your access to and use of the Service is conditioned on your acceptance of and compliance with this covenant. This applies to everyone: visitors, users, and all who access the Service.</p>
                <p><strong>By accessing or using the Service, you agree to be bound by these terms. If you disagree with any part of this covenant, then you may not access the Service.</strong></p>
            </div>
        </details>

        <!-- Accordion Item 2: Definitions -->
        <details class="accordion-item">
            <summary class="accordion-header">
                <span>📖 Key Terms Glossary (Definitions)</span>
                <span class="icon">▼</span>
            </summary>
            <div class="accordion-content">
                <p>To make sure we're on the same page, here are some key definitions:</p>
                <ul>
                    <li><strong>Covenant:</strong> This document, our Terms and Conditions.</li>
                    <li><strong>Company ("we", "us", "our"):</strong> Refers to [Your Company Name], located at [Your Company Address].</li>
                    <li><strong>Community Member ("you"):</strong> The individual or entity using our Service.</li>
                    <li><strong>Service:</strong> The Website, applications, and all related services provided by us.</li>
                    <li><strong>Website:</strong> Refers to [Your Website Name], accessible from [Your Website URL].</li>
                    <li><strong>Content:</strong> Refers to any text, images, data, or other information that you or we post on the Service.</li>
                </ul>
            </div>
        </details>

        <!-- Accordion Item 3: User Accounts -->
        <details class="accordion-item">
            <summary class="accordion-header">
                <span>🔑 Your Community Passport (User Accounts)</span>
                <span class="icon">▼</span>
            </summary>
            <div class="accordion-content">
                <h3>Creating Your Account</h3>
                <p>To access the full features of our Service, you may need to create an account. You agree to provide information that is accurate, complete, and current. Providing false information is a breach of this covenant and may lead to immediate account termination.</p>
                <h3>Protecting Your Password</h3>
                <p>Your password is your key to the community. You are responsible for keeping it safe and for all activities that occur under your account. You agree not to share your password with anyone. Notify us immediately if you suspect any unauthorized use of your account.</p>
            </div>
        </details>

        <!-- Accordion Item 4: Ground Rules -->
        <details class="accordion-item">
            <summary class="accordion-header">
                <span>⚖️ The Ground Rules (User Conduct)</span>
                <span class="icon">▼</span>
            </summary>
            <div class="accordion-content">
                <h3>Your Commitments</h3>
                <p>As a member of our community, you agree to:</p>
                <ul>
                    <li>Respect others and not engage in harassment, hate speech, or bullying.</li>
                    <li>Not post illegal, defamatory, or infringing content.</li>
                    <li>Not use the Service to conduct fraudulent activities.</li>
                    <li>Not attempt to disrupt or compromise the integrity of our systems (e.g., by uploading viruses or attempting to hack the service).</li>
                </ul>
                <h3>Content Ownership</h3>
                <p>You retain ownership of the Content you create and post. However, by posting it, you grant us a non-exclusive, worldwide, royalty-free license to use, display, and distribute your Content in connection with the Service.</p>
            </div>
        </details>
        
        <!-- Accordion Item 5: Our Rights -->
        <details class="accordion-item">
            <summary class="accordion-header">
                <span>🛡️ Our Role & Responsibilities</span>
                <span class="icon">▼</span>
            </summary>
            <div class="accordion-content">
                <h3>Our Intellectual Property</h3>
                <p>The Service itself—the design, logo, features, and functionality—is our exclusive property and is protected by copyright, trademark, and other laws. You may not use our branding or assets without our express written permission.</p>
                <h3>Our Right to Moderate</h3>
                <p>We are building a positive community, which means we reserve the right (but not the obligation) to monitor, edit, or remove Content that violates this covenant. We may also terminate or suspend accounts that repeatedly breach the ground rules, with or without notice.</p>
                <h3>Service Availability ("AS IS")</h3>
                <p>We strive to provide a reliable and excellent Service, but it is provided "AS IS" and "AS AVAILABLE" without any warranties. We cannot guarantee that the Service will always be perfect, secure, or available at any particular time.</p>
            </div>
        </details>

        <!-- Accordion Item 6: Termination -->
        <details class="accordion-item">
            <summary class="accordion-header">
                <span>🚪 Parting Ways (Termination)</span>
                <span class="icon">▼</span>
            </summary>
            <div class="accordion-content">
                <p>You are free to leave our community at any time by deleting your account. We may also terminate or suspend your account if you breach this covenant. Upon termination, your right to use the Service will immediately cease.</p>
            </div>
        </details>

        <!-- Accordion Item 7: Legal Stuff -->
        <details class="accordion-item">
            <summary class="accordion-header">
                <span>📜 The Important Legal Stuff</span>
                <span class="icon">▼</span>
            </summary>
            <div class="accordion-content">
                <h3>Limitation of Liability</h3>
                <p>To the maximum extent permitted by law, the Company shall not be liable for any indirect, incidental, or consequential damages resulting from your use of the Service. Our total liability to you for any claims will be limited to the amount you paid us, if any, in the last 12 months, or $100, whichever is greater.</p>
                <h3>Governing Law</h3>
                <p>This covenant and your use of the Service are governed by the laws of [Your State/Country], without regard to its conflict of law provisions.</p>
                <h3>Resolving Disputes</h3>
                <p>We hope we never have a dispute, but if we do, you agree to first contact us informally at [Your Support Email] to try and resolve it. If we can't resolve it informally, we agree to resolve any claim through binding arbitration or in small claims court, rather than in a court of general jurisdiction.</p>
            </div>
        </details>

        <!-- Accordion Item 8: Changes -->
        <details class="accordion-item">
            <summary class="accordion-header">
                <span>🌱 Evolving Our Covenant (Changes to Terms)</span>
                <span class="icon">▼</span>
            </summary>
            <div class="accordion-content">
                <p>Our community and Service will evolve over time, so we may need to update this covenant. We reserve the right to modify these terms at any time. If we make a change that we believe is material, we will make reasonable efforts to notify you (for example, by email or a notice on the Website) at least 30 days before the new terms take effect. By continuing to use the Service after the changes become effective, you agree to the revised covenant.</p>
            </div>
        </details>

       @endsection