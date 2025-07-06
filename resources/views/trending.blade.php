<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nyano Haath - Crowdfunding for a Cause</title>
    
    <!-- Link to your CSS stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/trending.css') }}">
    
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <!-- Header -->
    <header class="main-header">
        <a href="#" class="logo">
            <div class="logo-icon"><i class="fas fa-hand-holding-heart"></i></div>
            <h2 class="logo-text">Nyano Haath</h2>
        </a>
        <nav class="main-nav">
            <!-- Search Button/Input -->
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search campaigns...">
                <a href="#" class="search-icon"><i class="fas fa-search"></i></a>
            </div>

            <a href="#">Home</a>
            <a href="#campaigns">Campaigns</a>
            <a href="#how-it-works">How It Works</a>
            <a href="#about">About</a>
        </nav>
        <div class="header-action">
            <a href="{{ route('login')}}" class="btn btn-primary">Login</a>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content container fade-in-section">
                <h1>Your Cause Matters. <br> Let's Make a Difference.</h1>
                <a href="#" class="btn btn-primary btn-large">Donate Now</a>
            </div>
      </section>
               <!-- Circle Section -->
        <section class="circle fade-in-section">
            <div class="container">
                <div class="section-intro">
                    <h2>Fundraise for What Matters Most</h2>
                    <p style="text-align: center;">From personal emergencies to community projects, find your cause.</p>
                </div>
               <div class="category-circles">
                  <div class="circle-item">
                     <div class="circle-icon"><i class="fas fa-heart-pulse"></i></div>
                     <span>Medical</span>
                  </div>
                  <div class="circle-item">
                     <div class="circle-icon"><i class="fas fa-bolt"></i></div>
                       <span>Emergency</span>
                  </div>
                  <div class="circle-item">
                     <div class="circle-icon"><i class="fas fa-paw"></i></div>
                     <span>Animal</span>
                  </div>
                   <div class="circle-item">
                     <div class="circle-icon"><i class="fas fa-arrow-right"></i></div>
                     <span>More</span>
                   </div>
             </div>
        
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="how-it-works" class="how-it-works fade-in-section">
            <div class="container">
                <div class="section-intro">
                    <h2>Fundraising in 3 Easy Steps</h2>
                    <p>Get started in just a few minutes. We provide the tools to make your campaign a success.</p>
                </div>
                <div class="steps-container">
                    <div class="step-card">
                        <div class="step-icon"><i class="fas fa-rocket"></i></div>
                        <h3>1. Start Your Campaign</h3>
                        <p>Tell your story, set your goal, and add a compelling picture or video.</p>
                    </div>
                    <div class="step-card">
                        <div class="step-icon"><i class="fas fa-share-alt"></i></div>
                        <h3>2. Share With Friends</h3>
                        <p>Spread the word through social media, email, and text to build momentum.</p>
                    </div>
                    <div class="step-card">
                        <div class="step-icon"><i class="fas fa-wallet"></i></div>
                        <h3>3. Manage Donations</h3>
                        <p>Easily accept donations and thank your donors. Withdraw funds directly to your bank.</p>
                    </div>
                </div>
                <div class="campaign-btn"><a href="#" class="btn btn-primary btn-large">Start Campaign</a></div>
            </div>
               
        </section>
        
        <!-- Success Stories Section -->
        <section class="success-stories fade-in-section">
            <div class="container">
                <h2>Inspiring Success Stories</h2>
                <div class="stories-grid">
                    <article class="story-card">
                        <img src="{{ asset('image/naruto.jpg')}}" alt="School building">
                        <div class="story-content">
                            <span class="story-category">Education</span>
                            <h3>Building a Brighter Future</h3>
                            <p>Community comes together to rebuild a local school after it was damaged by floods.</p>
                            <a href="#">Read More →</a>
                        </div>
                    </article>
                    <article class="story-card">
                        <img src="{{ asset('image/one-piece.jpg')}}" alt="A happy dog">
                        <div class="story-content">
                            <span class="story-category">Animal Welfare</span>
                            <h3>A New Leash on Life</h3>
                            <p>Funds raised for a new animal shelter that now houses over 50 rescued street dogs.</p>
                             <a href="#">Read More →</a>
                        </div>
                    </article>
                    <article class="story-card">
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=2070&auto=format&fit=crop" alt="Doctor checking patient">
                        <div class="story-content">
                             <span class="story-category">Medical</span>
                            <h3>Hope for Hari's Heart</h3>
                            <p>Thousands of donors helped fund a life-saving heart surgery for a young boy from a rural village.</p>
                             <a href="#">Read More →</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer id="about" class="fade-in-section">
        <div class="container footer-container">
            <div class="footer-about">
                <h4>Nyano Haath</h4>
                <p>A warm hand for those in need. We are Nepal's leading platform for bringing ideas to life and supporting communities.</p>
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
                    <li><a href="#">Common questions</a></li>
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
            <p>© 2025 Nyano Haath. All Rights Reserved. | <a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a></p>
        </div>
    </footer>

    <!-- JS for Animations and Search Toggle -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Scroll Animation Logic
            const sections = document.querySelectorAll('.fade-in-section');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, {
                threshold: 0.1
            });
            sections.forEach(section => {
                observer.observe(section);
            });

            // NEW: Search Toggle Logic
            const searchIcon = document.querySelector('.search-icon');
            const searchContainer = document.querySelector('.search-container');
            const searchInput = document.querySelector('.search-input');

            searchIcon.addEventListener('click', function(e) {
                e.preventDefault();
                searchContainer.classList.toggle('active');
                if (searchContainer.classList.contains('active')) {
                    searchInput.focus();
                }
            });
        });
        // Hero Background Slideshow
        const hero = document.querySelector('.hero'); 

           const bgImages = [
            "image/one-piece-mobile-1690x2366-10902.jpg",
             "image/naruto.jpg",
            "image/bleach.jpg"
            
           ];

         let current = 0;
         setInterval(() => {
             hero.style.backgroundImage = `linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2)),  url('${bgImages[current]}`;
             current = (current + 1) % bgImages.length;
            }, 2000);

    </script>
</body>
</html>