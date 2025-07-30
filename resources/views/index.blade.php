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
    <header class="main-header">

         <a href="{{ route('home')}}" class="logo">
            <img src="{{ asset('image/nyanologo.jpg')}}" alt="Nyano Haat Logo" >
         </a> 
      

        <nav class="main-nav">
            <!-- Search Button/Input -->
            <!-- <div class="search-container">
                <input type="text" class="search-input" placeholder="Search campaigns...">
                <a href="#" class="search-icon"><i class="fas fa-search"></i></a>
            </div> -->

            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('feed') }}">Campaigns</a>
            <a href="{{ route('how') }}">How It Works</a>
            <a href="{{ route('aboutus') }}">About</a>
        </nav>
       <div class="header-action">
    @auth
        <div class="dropdown">
            <button class="profile-btn">
                <i class="fas fa-user-circle fa-2x"></i>
            </button>
            <div class="dropdown-content">
                @php
                    if (Auth::user()->role === 'admin') {
                        $dashboardRoute = route('admin.dashboard');
                    } elseif (Auth::user()->role === 'donor') {
                        $dashboardRoute = route('donor.dashboard');
                    } else {
                        // default to fundraiser dashboard or generic dashboard route
                        $dashboardRoute = route('dashboard');
                    }
                @endphp
                <a href="{{ $dashboardRoute }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <form method="POST" action="{{ route('logout.redirect') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ route('login')}}" class="btn btn-primary">Login</a>
    @endauth
</div>


    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content container fade-in-section">
                <h1>Your Cause Matters. <br> Let's Make a Difference.</h1>
                <a href="{{ route('feed') }}" class="btn btn-primary btn-large">Donate Now</a>
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
   <a href="{{ route('categories.detail', 'medical') }}">
        <div class="circle-item">
            <div class="circle-icon"><i class="fas fa-heart-pulse"></i></div>
            <span>Medical</span>
        </div>
    <a href="{{ route('categories.detail', 'emergency') }}">
        <div class="circle-item">
            <div class="circle-icon"><i class="fas fa-bolt"></i></div>
            <span>Emergency</span>
        </div>
    <a href="{{ route('categories.detail', 'animal') }}">
        <div class="circle-item">
            <div class="circle-icon"><i class="fas fa-paw"></i></div>
            <span>Animal Welfare</span>
        </div>
   <a href="{{ route('categories') }}">
  <div class="circle-item">
    <div class="circle-icon"><i class="fas fa-arrow-right"></i></div>
    <span>More</span>
  </div>
</a>

</div>

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
                    <div class="campaign-btn">
                        <a href="{{ url('login') }}" class="btn btn-primary btn-large">Start a Fundraiser</a>
                    </div>

            </div>
        </section>
        
   <!-- Success Stories Section -->
<section class="success-stories fade-in-section">
    <div class="container">
        <h2>Featured Stories</h2>
        <div class="stories-grid">

            @foreach ($featuredCampaigns->take(3) as $campaign)
                <article class="story-card">
                    <img src="{{ asset('storage/' . $campaign->campaign_image) }}" alt="{{ $campaign->title }}">
                    <div class="story-content">
                        <span class="story-category">{{ $campaign->category }}</span>
                        <h3>{{ \Illuminate\Support\Str::limit($campaign->title, 40) }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit($campaign->description, 100) }}</p>
                        <a href="{{ route('user.view', $campaign->id) }}">Read More →</a>
                    </div>
                </article>
            @endforeach

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
                <li><a href="{{ route('categories.detail', 'medical') }}">Medical</a></li>
                <li><a href="{{ route('categories.detail', 'emergency') }}">Emergency</a></li>
                <li><a href="{{ route('categories.detail', 'animal') }}">Animal Welfare</a></li>
                <li><a href="{{ route('categories.detail', 'education') }}">Education</a></li>
            </ul>
        </div>
        <div class="footer-links">
            <h4>Learn More</h4>
            <ul>
                <li><a href="{{ route('how') }}">How it works</a></li>
                <li><a href="{{ route('why') }}">Why Nyano Haath?</a></li>
                <li><a href="{{ route('common') }}">Common questions</a></li>
                <li><a href="{{route('feed')}}">Browse Campaigns</a></li>
            </ul>
        </div>
        <div class="footer-links">
            <h4>Resources</h4>
            <ul>
                <li><a href="{{ route('contactus') }}">Contact Us</a></li>
                <li><a href="{{ route('feed') }}">Blog</a></li>
                <li><a href="{{ route('terms') }}">Terms of Service</a></li>
                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2024 Nyano Haath. All Rights Reserved.</p>
    </div>
</footer>

    <!-- JS for Animations and NEW Search Toggle -->
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
             "image/image1.jpg",
            "image/img2.png",
            "image/img3.png"
            
           ];

         let current = 0;
         setInterval(() => {
             hero.style.backgroundImage = `linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2)),  url('${bgImages[current]}`;
             current = (current + 1) % bgImages.length;
            }, 3000);

    </script>
</body>
</html>