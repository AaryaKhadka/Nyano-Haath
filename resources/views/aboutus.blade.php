<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Nyano Haath (CSS Animation)</title>
     <link rel="stylesheet" href="{{ asset('CSS/AboutUs.css') }}">
</head>
<body>

    <!-- ========== HEADER ========== -->
    <header class="header">
        <nav class="container nav-bar">
            <div class="logo">Nyano<span class="orange-text">Haath</span></div>
            <div class="nav-links">
                <a href="#about">About</a>
                <a href="#how-it-works">How It Works</a>
                <a href="#team">Team</a>
            </div>
        </nav>
    </header>

    <!-- ========== MAIN PAGE CONTENT ========== -->
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

        <!-- Section 2: The Story (Problem and Solution) -->
        <section class="section">
            <div class="container grid two-columns">
                <div class="animate">
                    <h2 class="title-medium">The Challenge</h2>
                    <p class="text-large">
                        Many great causes struggle to raise money because donors worry if their help will truly reach the right people. This lack of a trusted system holds back a lot of kindness.
                    </p>
                </div>
                <div class="card animate">
                    <h2 class="title-medium orange-text">Our Solution</h2>
                    <p class="text-large">
                        Nyano Haath provides a safe and clear platform. We make sure every donation is tracked and every story is shared, so you can give with confidence and see your impact.
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

        <!-- Section 5: Meet the Team -->
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

    <!-- ========== FOOTER ========== -->
    <footer class="footer">
        <div class="container">
            <p>© 2025 Nyano Haath. A Concept by Students of Apex College.</p>
        </div>
    </footer>

    <!-- NO SCRIPT TAG NEEDED! -->

</body>
</html>