<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>About Us - Nyano Haath</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
</head>
<body>
    <!-- Header -->
    <header class="main-header">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('image/nyanologo.jpg') }}" alt="Nyano Haath Logo" />
        </a>

        <nav class="main-nav">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search campaigns..." />
                <a href="#" class="search-icon"><i class="fas fa-search"></i></a>
            </div>

            <a href="{{ route('home') }}">Home</a>
            <a href="#campaigns">Campaigns</a>
            <a href="#how-it-works">How It Works</a>
            <a href="{{ route('aboutus') }}" class="active">About</a>
        </nav>

        <div class="header-action">
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        </div>
    </header>

    <!-- Main Content -->
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
                    <a href="#" class="button-primary">Explore Causes</a>
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
                        <img
                          class="team-photo"
                          src="https://i.pravatar.cc/150?u=aarya"
                          alt="Aarya Khadka"
                        />
                        <h4 class="team-name">Aarya Khadka</h4>
                    </div>
                    <div class="team-card animate">
                        <img
                          class="team-photo"
                          src="https://i.pravatar.cc/150?u=prasanna"
                          alt="Prasanna Malla"
                        />
                        <h4 class="team-name">Prasanna Malla</h4>
                    </div>
                    <div class="team-card animate">
                        <img
                          class="team-photo"
                          src="https://i.pravatar.cc/150?u=saroj"
                          alt="Saroj Shah"
                        />
                        <h4 class="team-name">Saroj Shah</h4>
                    </div>
                    <div class="team-card animate">
                        <img
                          class="team-photo"
                          src="https://i.pravatar.cc/150?u=shisir"
                          alt="Shisir Kafle"
                        />
                        <h4 class="team-name">Shisir Kafle</h4>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="fade-in-section">
        <div class="container footer-container">
            <div class="footer-about">
                <h4>Nyano Haath</h4>
                <p>
                    A warm hand for those in need. We are Nepal's leading platform for bringing ideas to life and supporting communities.
                </p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-links">
                <h4>Fundraise for</h4>
                <ul>
                    <li><a href="#">Medical</a></li>
                    <li><a href="#">Emergency</a></li>
                    <li><a href="#">Memorial</a></li>
                    <li><a href="#">Education</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Learn More</h4>
                <ul>
                    <li><a href="#">How it works</a></li>
                    <li><a href="#">Why Nyano Haath?</a></li>
                    <li><a href="#">Common Questions</a></li>
                    <li><a href="#">Success stories</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">Help center</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Press center</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>
                © 2024 Nyano Haath. All Rights Reserved. | <a href="#">Terms of Service</a> |
                <a href="#">Privacy Policy</a>
            </p>
        </div>
    </footer>
</body>
</html>
