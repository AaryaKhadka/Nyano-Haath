@extends('layouts.app')

@section('title', 'Login')

  @section('styles')
   

   <style>
        :root {
            --primary-color: #7B61FF;
            --secondary-color: #F8C424;
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
            overflow: hidden;
        }

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

        .contact-wrapper {
            display: flex;
            padding: 3rem;
            gap: 3rem;
        }

        .contact-form {
            flex: 2;
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
            font-size: 1rem;
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
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
        }

        .contact-info {
            flex: 1;
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
            font-size: 1.5rem;
            color: #25D366;
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
            <!-- Left: Form -->
            <div class="contact-form">
                <form id="contactForm">
                    <h2>Send Us a Message</h2>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required />
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required />
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">
                        <i class="fab fa-whatsapp"></i> Send via WhatsApp
                    </button>
                </form>
            </div>

            <!-- Right: Info -->
            <aside class="contact-info">
                <h3>Contact Information</h3>

                <div class="info-item">
                    <i class="icon fas fa-map-marker-alt" style="color: var(--primary-color);"></i>
                    <p>
                        <strong>Our Office</strong>
                        Mid Baneshwor, Kathmandu<br />
                        Bagmati, Nepal
                    </p>
                </div>

                <div class="info-item">
                    <i class="icon fab fa-whatsapp"></i>
                    <p>
                        <strong>WhatsApp</strong>
                        +977 9765429741
                    </p>
                </div>

                <div class="info-item">
                    <i class="icon fas fa-phone-alt" style="color: var(--primary-color);"></i>
                    <p>
                        <strong>Call Us</strong>
                        +977 9812345678
                    </p>
                </div>

                <div class="social-links">
                    <h4>Connect With Us</h4>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const contactForm = document.getElementById('contactForm');

            contactForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const whatsappNumber = '9779765429741';
                const name = document.getElementById('name').value;
                const subject = document.getElementById('subject').value;
                const message = document.getElementById('message').value;

                const whatsappMessage = `Hello Nyano Haath,

Name: ${name}
Subject: ${subject}
Message: ${message}`;

                const encodedMessage = encodeURIComponent(whatsappMessage);
                const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;

                window.open(whatsappURL, '_blank');
            });
        });
    </script>

@endsection