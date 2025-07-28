@extends('layouts.app')

@section('title', 'Login')

  @section('styles')
   

    <style>
        :root {
            --primary-color: #7B61FF; /* The vibrant purple from your theme */
            --secondary-color: #F8C424; /* The bright yellow from your theme */
            --text-color: #4A4A4A;
            --heading-color: #333;
            --bg-color: #FDFDFB;
            --card-bg: #FFFFFF;
            --border-color: #EAEAEA;
            --shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
            --handwriting-font: 'Caveat', cursive;
            --body-font: 'Poppins', sans-serif;
        }

        body {
            font-family: var(--body-font);
            color: var(--text-color);
            background-color: var(--bg-color);
            margin: 0;
            padding: 2rem;
        }

        .container {
            max-width: 1100px;
            margin: 2rem auto;
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden; /* To contain the child elements */
        }

        /* --- Header Section --- */
        .header {
            text-align: center;
            padding: 3rem 1.5rem;
            background-color: #f8f9fa;
        }

        .header h1 {
            font-family: var(--handwriting-font);
            font-size: 4rem;
            color: var(--primary-color);
            margin: 0;
            line-height: 1.1;
        }

        .header p {
            font-size: 1.1rem;
            max-width: 600px;
            margin: 1rem auto 0;
        }

        /* --- Main Content Wrapper (2-column layout) --- */
        .contact-wrapper {
            display: flex;
            padding: 3rem;
            gap: 3rem;
        }

        /* --- Left Side: Contact Form --- */
        .contact-form {
            flex: 2; /* Takes up 2/3 of the space */
        }

        .contact-form h2 {
            font-weight: 600;
            color: var(--heading-color);
            margin-top: 0;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-family: var(--body-font);
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(123, 97, 255, 0.15);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .submit-btn {
            display: inline-block;
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--primary-color), #A48BFF);
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(123, 97, 255, 0.3);
        }

        /* --- Right Side: Contact Info --- */
        .contact-info {
            flex: 1; /* Takes up 1/3 of the space */
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 12px;
        }

        .contact-info h3 {
            font-weight: 600;
            color: var(--heading-color);
            margin-top: 0;
            margin-bottom: 2rem;
        }
        
        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .info-item .icon {
            font-size: 1.2rem;
            color: var(--primary-color);
            margin-top: 4px;
        }
        
        .info-item p {
            margin: 0;
            line-height: 1.6;
        }
        
        .info-item strong {
            display: block;
            font-weight: 600;
            margin-bottom: 0.2rem;
        }

        .social-links {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
        }

        .social-links h4 {
            margin: 0 0 1rem 0;
            font-weight: 600;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
        }

        .social-icons a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            background-color: #e9ecef;
            color: var(--text-color);
            border-radius: 50%;
            text-decoration: none;
            font-size: 1.1rem;
            transition: background-color 0.3s, color 0.3s, transform 0.2s;
        }

        .social-icons a:hover {
            background-color: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        /* --- Google Map Section --- */
        .map-section {
            width: 100%;
            height: 400px; /* Adjust height as needed */
        }
        .map-section iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
        
        /* --- Success Message (hidden by default) --- */
        #success-message {
            display: none;
            text-align: center;
            padding: 3rem;
            background-color: #e9f9ee;
            border: 2px solid #5cb85c;
            border-radius: 12px;
        }
        #success-message h2 {
            color: #4CAF50;
            margin-top: 0;
        }

        /* --- Responsive Design --- */
        @media (max-width: 992px) {
            .contact-wrapper {
                flex-direction: column;
            }
        }
        @media (max-width: 768px) {
             body {
                padding: 1rem;
            }
            .contact-wrapper {
                padding: 1.5rem;
            }
        }
    </style>
    @endsection


@section('content')

    <div class="container">
        <header class="header">
            <h1>Get in Touch</h1>
            <p>Whether you have a question, a suggestion, or just want to say hello—we’d love to hear from you.</p>
        </header>

        <div class="contact-wrapper">
            <!-- Left Side: Contact Form -->
            <div class="contact-form">
                <div id="success-message">
                    <h2>Thank You!</h2>
                    <p>Your message has been sent successfully. We will get back to you shortly.</p>
                </div>
                
                <form id="contactForm">
                    <h2>Send Us a Message</h2>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>

            <!-- Right Side: Contact Information -->
            <aside class="contact-info">
                <h3>Contact Information</h3>
                
                <!-- <div class="info-item">
                    <i class="icon fas fa-map-marker-alt"></i>
                    <p>
                        <strong>Our Office</strong>
                        Mid Baneshwor, Kathmandu<br>
                        Bagmati, Nepal
                    </p>
                </div> -->

                <div class="info-item">
                    <i class="icon fas fa-envelope"></i>
                    <p>
                        <strong>Email Us</strong>
                        contact@nyanohaath.com
                    </p>
                </div>

                <div class="info-item">
                    <i class="icon fas fa-phone-alt"></i>
                    <p>
                        <strong>Call Us</strong>
                        +977 9812345678
                    </p>
                </div>

                <div class="social-links">
                    <h4>Connect With Us</h4>
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </aside>
        </div>

        <!-- Google Map Section -->
        <!-- <div class="map-section">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.417277708918!2d85.33535931500588!3d27.7042594827931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199f75f0ef33%3A0x86361a35445d8361!2sMid-Baneshwor%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1663412345678" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div> -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            const successMessage = document.getElementById('success-message');

            contactForm.addEventListener('submit', function(e) {
                // Prevent the default form submission (page reload)
                e.preventDefault();

                // --- In a real application, you would send the form data to a server here ---
                // For demonstration purposes, we will just show the success message.
                
                // Hide the form
                contactForm.style.display = 'none';
                
                // Show the success message
                successMessage.style.display = 'block';
            });
        });
    </script>
@endsection