<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nyano Haath - Crowdfunding for a Cause</title>
    
    <!-- Link to your CSS stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/campaignpage.css') }}">
    
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
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search campaigns...">
                <a href="#" class="search-icon"><i class="fas fa-search"></i></a>
            </div>

            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('campaign.public') }}">Campaigns</a>
            <a href="#how-it-works">How It Works</a>
            <a href="{{ route('aboutus') }}">About</a>
        </nav>
        <div class="header-action">
            <a href="{{ route('login')}}" class="btn btn-primary">Login</a>
        </div>

    </header>

    <div class="main-grid">
        <!-- ==========================================================================
           Left Sidebar
           ========================================================================== -->
        <aside class="sidebar-left">
            <a href="#" class="sidebar-button active"><i class="fa-solid fa-pen-to-square"></i><span>Start Petition</span></a>
            <a href="#" class="sidebar-button"><i class="fa-solid fa-magnifying-glass"></i><span>Search</span></a>
            <a href="#" class="sidebar-button"><i class="fa-solid fa-bell"></i><span>Notifications</span></a>
            <a href="#" class="sidebar-button"><i class="fa-solid fa-gear"></i><span>Settings</span></a>
        </aside>

        <!-- ==========================================================================
           Main Content Area
           ========================================================================== -->
        <main class="main-content">
            <!-- Featured Success Stories Slider -->
            <section class="slider-container-header">
                <h2><i class="fa-solid fa-star"></i> Success Stories</h2>
            </section>
            
            <div class="main-slider">
                <div class="slider-viewport">
                    <div class="slider-content-track">
                        <!-- Slide 1: Corruption -->
                        <div class="content-slide">
                            <div class="slide-image-container">
                                <img src="https://images.unsplash.com/photo-1589216532372-1c2a36790049?q=80&w=2070&auto=format&fit=crop" alt="A judge's gavel symbolizing justice against corruption">
                                <div class="victory-banner">VICTORY</div>
                            </div>
                            <div class="slide-details">
                                <h3>Stop the Clock on Corruption</h3>
                                <p class="slide-date">22 Aug, 2024</p>
                                <p class="slide-description">A major victory for transparency! After a widespread public campaign, lawmakers have scrapped the proposed five-year time limit for prosecuting corruption cases, ensuring accountability is not bound by time.</p>
                                <a href="#" class="read-more-link">Read More</a>
                                <div class="slide-analytics">
                                    <span class="analytics-item"><i class="fa-solid fa-pen-nib"></i> 573</span>
                                    <span class="analytics-item"><i class="fa-solid fa-file-excel"></i> 23</span>
                                    <span class="analytics-item"><i class="fa-solid fa-folder-open"></i> 3</span>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2: Justice for Sumad Rani Tharu -->
                        <div class="content-slide">
                            <div class="slide-image-container">
                                <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=2070&auto=format&fit=crop" alt="People protesting for justice with signs">
                                <div class="victory-banner">VICTORY</div>
                            </div>
                            <div class="slide-details">
                                <h3>Justice for Sumad Rani Tharu</h3>
                                <p class="slide-date">15 Jul, 2024</p>
                                <p class="slide-description">Following immense public pressure and a petition that gathered thousands of signatures, the case of Sumad Rani Tharu was reopened, leading to a fair investigation and justice for her family.</p>
                                <a href="#" class="read-more-link">Read More</a>
                                <div class="slide-analytics">
                                    <span class="analytics-item"><i class="fa-solid fa-pen-nib"></i> 890</span>
                                    <span class="analytics-item"><i class="fa-solid fa-file-excel"></i> 112</span>
                                    <span class="analytics-item"><i class="fa-solid fa-folder-open"></i> 15</span>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3: TU Exam Accountability -->
                        <div class="content-slide">
                            <div class="slide-image-container">
                                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop" alt="University students studying together in a library">
                                <div class="victory-banner">VICTORY</div>
                            </div>
                            <div class="slide-details">
                                <h3>Accountability from TU for Exam Papers</h3>
                                <p class="slide-date">01 Jun, 2024</p>
                                <p class="slide-description">Students' voices were heard! Tribhuvan University has implemented a new digital tracking system for exam papers after a successful campaign demanded an end to misplaced results and administrative negligence.</p>
                                <a href="#" class="read-more-link">Read More</a>
                                <div class="slide-analytics">
                                    <span class="analytics-item"><i class="fa-solid fa-pen-nib"></i> 1.2K</span>
                                    <span class="analytics-item"><i class="fa-solid fa-file-excel"></i> 45</span>
                                    <span class="analytics-item"><i class="fa-solid fa-folder-open"></i> 8</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 4: Save Phewa Lake -->
                        <div class="content-slide">
                            <div class="slide-image-container">
                                <img src="https://images.unsplash.com/photo-1594967323310-39a36838569c?q=80&w=2070&auto=format&fit=crop" alt="Phewa Lake in Pokhara with boats">
                                <div class="victory-banner">VICTORY</div>
                            </div>
                            <div class="slide-details">
                                <h3>Save Phewa Lake from Encroachment</h3>
                                <p class="slide-date">10 May, 2024</p>
                                <p class="slide-description">A landmark decision was made to halt illegal construction around Phewa Lake after a powerful citizen-led movement highlighted the environmental risks and demanded preservation of this natural heritage.</p>
                                <a href="#" class="read-more-link">Read More</a>
                                <div class="slide-analytics">
                                    <span class="analytics-item"><i class="fa-solid fa-pen-nib"></i> 2.5K</span>
                                    <span class="analytics-item"><i class="fa-solid fa-file-excel"></i> 250</span>
                                    <span class="analytics-item"><i class="fa-solid fa-folder-open"></i> 21</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="slider-navigation prev-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="slider-navigation next-button"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>

            <!-- Main Feed Section with Sticky Header -->
            <section class="news-feed">
                <div class="news-feed-header-sticky">
                    <h1 class="news-feed-title"><i class="fa-solid fa-people-group"></i> Whats Happening In Nyanohaath</h1>
                    <nav class="feed-navigation">
                        <a class="nav-tab" data-tab="popular">Popular</a>
                        <a class="nav-tab active" data-tab="latest">Latest</a>
                        <a class="nav-tab" data-tab="success-feed">Success Stories</a>
                    </nav>
                    <div class="category-filters">
                        <button class="category-button active">Environment</button>
                        <button class="category-button">Wellbeing Matters</button>
                        <button class="category-button">Public Infrastructure</button>
                        <button class="category-button">Transport Management</button>
                    </div>
                </div>

                <div class="feed-content-area">
                    <!-- ======================================================================
                       Popular Tab Content
                       ======================================================================= -->
                    <div id="popular-content" class="content-section">
                        <article class="news-card">
                            <div class="card-image-container"><img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=2070&auto=format&fit=crop" alt="Doctor with a stethoscope"></div>
                            <div class="card-text-content">
                                <h3>Improve Healthcare Access in Rural Karnali</h3>
                                <p class="card-info">Ministry of Health and Population | 12 Mar, 2025</p>
                            </div>
                        </article>
                        <article class="news-card">
                            <div class="card-image-container"><img src="https://images.unsplash.com/photo-1594819232822-e42c069b3504?q=80&w=2070&auto=format&fit=crop" alt="Person meditating peacefully"></div>
                            <div class="card-text-content">
                                <h3>Promote Mental Health Awareness in Schools</h3>
                                <p class="card-info">Ministry of Education, Science and Technology | 05 Apr, 2025</p>
                            </div>
                        </article>
                        <article class="news-card">
                            <div class="card-image-container"><img src="https://images.unsplash.com/photo-1598875184988-5e67b1a7ea91?q=80&w=2070&auto=format&fit=crop" alt="Dog in an animal shelter"></div>
                            <div class="card-text-content">
                                <h3>Increase Funding for Stray Animal Shelters</h3>
                                <p class="card-info">Kathmandu Metropolitan City | 02 Apr, 2025</p>
                            </div>
                        </article>
                        
                        <article class="news-card hidden">
                            <div class="card-image-container"><img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=2070&auto=format&fit=crop" alt="People collaborating with sticky notes"></div>
                            <div class="card-text-content">
                                <h3>Demand Transparency in Public Project Budgets</h3>
                                <p class="card-info">Public Accounts Committee | 05 Mar, 2025</p>
                            </div>
                        </article>
                        <article class="news-card hidden">
                            <div class="card-image-container"><img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?q=80&w=2070&auto=format&fit=crop" alt="Modern house exterior"></div>
                            <div class="card-text-content">
                                <h3>Ensure Safe Building Codes are Enforced Nationwide</h3>
                                <p class="card-info">Ministry of Urban Development | 18 Mar, 2025</p>
                            </div>
                        </article>
                        <article class="news-card hidden">
                            <div class="card-image-container"><img src="https://images.unsplash.com/photo-1509099836639-18ba1795216d?q=80&w=1931&auto=format&fit=crop" alt="Child studying in a library"></div>
                            <div class="card-text-content">
                                <h3>Upgrade Public School Libraries with Digital Resources</h3>
                                <p class="card-info">Ministry of Education | 19 Apr, 2025</p>
                            </div>
                        </article>
                        <article class="news-card hidden">
                            <div class="card-image-container"><img src="https://images.unsplash.com/photo-1611117775522-5a91361c4a0c?q=80&w=2070&auto=format&fit=crop" alt="Waste segregation bins for recycling"></div>
                            <div class="card-text-content">
                                <h3>Implement a City-Wide Waste Segregation Program</h3>
                                <p class="card-info">Ministry of Federal Affairs and General Administration | 21 Apr, 2025</p>
                            </div>
                        </article>
                        <article class="news-card hidden">
                            <div class="card-image-container"><img src="https://images.unsplash.com/photo-1517404899732-4721a3934b35?q=80&w=2070&auto=format&fit=crop" alt="Kathmandu Durbar Square"></div>
                            <div class="card-text-content">
                                <h3>Protect and Restore Kathmandu's Cultural Heritage Sites</h3>
                                <p class="card-info">Department of Archaeology | 25 Apr, 2025</p>
                            </div>
                        </article>
                        <article class="news-card hidden">
                            <div class="card-image-container"><img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=2070&auto=format&fit=crop" alt="Cyber security concept with a lock on a laptop"></div>
                            <div class="card-text-content">
                                <h3>Introduce Stronger Cybersecurity and Data Protection Laws</h3>
                                <p class="card-info">Ministry of Communication and Information Technology | 28 Apr, 2025</p>
                            </div>
                        </article>
                        <div class="load-more-section">
                            <button class="load-more-button">Load More</button>
                        </div>
                    </div>

                    <!-- ======================================================================
                       Latest Tab Content
                       ======================================================================= -->
                    <div id="latest-content" class="content-section active">
                        <article class="news-card"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=2070&auto=format&fit=crop" alt="Public bus on a city road"></div><div class="card-text-content"><h3>Improve Public Transportation in Lalitpur</h3><p class="card-info">Lalitpur Metropolitan City | 15 Apr, 2025</p></div></article>
                        <article class="news-card"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1559384772-18651c14a279?q=80&w=2070&auto=format&fit=crop" alt="Rhinoceros in Chitwan National Park"></div><div class="card-text-content"><h3>Strengthen Anti-Poaching Patrols in Chitwan National Park</h3><p class="card-info">Department of National Parks and Wildlife Conservation | 12 Apr, 2025</p></div></article>
                        <article class="news-card"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1599855129482-10a568b2098b?q=80&w=2070&auto=format&fit=crop" alt="Garment worker at a sewing machine"></div><div class="card-text-content"><h3>Ensure Fair Wages for Garment Industry Workers</h3><p class="card-info">Ministry of Labour, Employment and Social Security | 10 Apr, 2025</p></div></article>

                        <article class="news-card hidden"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1608253846337-37c28aa33f3e?q=80&w=2070&auto=format&fit=crop" alt="Person in wheelchair using a ramp"></div><div class="card-text-content"><h3>Make All Public Buildings Wheelchair Accessible</h3><p class="card-info">Department of Urban Development and Building Construction | 08 Apr, 2025</p></div></article>
                        <article class="news-card hidden"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?q=80&w=2070&auto=format&fit=crop" alt="Camping tent in the Himalayas"></div><div class="card-text-content"><h3>Regulate Trekking and Tourism for Sustainability</h3><p class="card-info">Nepal Tourism Board | 22 Mar, 2025</p></div></article>
                        <article class="news-card hidden"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1560707303-3486c85b584a?q=80&w=1964&auto=format=fit=crop" alt="Smog and air pollution over a city"></div><div class="card-text-content"><h3>Take Urgent Measures to Combat Air Pollution in Kathmandu Valley</h3><p class="card-info">Ministry of Forests and Environment | 18 Apr, 2025</p></div></article>
                        <article class="news-card hidden"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1579202673506-ca3ce28943ef?q=80&w=1974&auto=format=fit=crop" alt="Fresh organic vegetables at a market"></div><div class="card-text-content"><h3>Provide Subsidies for Organic Farming Initiatives</h3><p class="card-info">Ministry of Agriculture and Livestock Development | 20 Apr, 2025</p></div></article>
                        <article class="news-card hidden"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1629838043702-a1b725a95964?q=80&w=2070&auto=format&fit=crop" alt="Consumer looking at products on a shelf"></div><div class="card-text-content"><h3>Establish Stronger Consumer Rights Protection Agency</h3><p class="card-info">Ministry of Industry, Commerce and Supplies | 30 Apr, 2025</p></div></article>
                        <article class="news-card hidden"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1510076857177-7470076d4098?q=80&w=2072&auto=format=fit=crop" alt="Painter working on a canvas"></div><div class="card-text-content"><h3>Create a National Fund to Support Local Artists and Musicians</h3><p class="card-info">Ministry of Culture, Tourism and Civil Aviation | 02 May, 2025</p></div></article>
                        <div class="load-more-section"><button class="load-more-button">Load More</button></div>
                    </div>

                    <!-- ======================================================================
                       Success Stories Feed Tab Content
                       ======================================================================= -->
                    <div id="success-content" class="content-section">
                        <article class="news-card"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1589216532372-1c2a36790049?q=80&w=2070&auto=format&fit=crop" alt="Gavel symbolizing justice"></div><div class="card-text-content"><h3>VICTORY: No Time Limits for Corruption Cases</h3><p class="card-info">22 Aug, 2024</p></div></article>
                        <article class="news-card"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=2070&auto=format&fit=crop" alt="Community protest for justice"></div><div class="card-text-content"><h3>VICTORY: Justice Delivered for Sumad Rani Tharu</h3><p class="card-info">15 Jul, 2024</p></div></article>
                        <article class="news-card"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop" alt="Students in a classroom"></div><div class="card-text-content"><h3>VICTORY: TU Implements Digital Tracking for Exam Papers</h3><p class="card-info">01 Jun, 2024</p></div></article>

                        <article class="news-card hidden"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1594967323310-39a36838569c?q=80&w=2070&auto=format&fit=crop" alt="Phewa Lake view"></div><div class="card-text-content"><h3>VICTORY: Illegal Construction Halted at Phewa Lake</h3><p class="card-info">10 May, 2024</p></div></article>
                        <article class="news-card hidden"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1476231682828-37e571bc172f?q=80&w=2070&auto=format&fit=crop" alt="Lush green community forest"></div><div class="card-text-content"><h3>VICTORY: Community Forest Rights Secured for Local Villagers</h3><p class="card-info">25 Apr, 2024</p></div></article>
                        <article class="news-card hidden"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1508515053969-79c51384252e?q=80&w=2070&auto=format=fit=crop" alt="Solar panels on a village roof"></div><div class="card-text-content"><h3>VICTORY: Solar Power Initiative Lights Up Rural Village</h3><p class="card-info">18 Apr, 2024</p></div></article>
                        <article class="news-card hidden"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1528698827598-c1b5a59ef121?q=80&w=2070&auto=format=fit=crop" alt="Clean drinking water from a tap"></div><div class="card-text-content"><h3>VICTORY: Melamchi Water Supply Finally Reaches Homes</h3><p class="card-info">02 Apr, 2024</p></div></article>
                        <article class="news-card hidden"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1555529669-e69e7aa0ba9e?q=80&w=2070&auto=format=fit=crop" alt="Stack of banned plastic bags"></div><div class="card-text-content"><h3>VICTORY: Ban on Single-Use Plastic Bags Enforced in Major Cities</h3><p class="card-info">15 Mar, 2024</p></div></article>
                        <article class="news-card hidden"><div class="card-image-container"><img src="https://images.unsplash.com/photo-1588219452293-c06832644358?q=80&w=2070&auto=format=fit=crop" alt="Restored historical building"></div><div class="card-text-content"><h3>VICTORY: Rani Pokhari Restoration Completed with Traditional Materials</h3><p class="card-info">05 Feb, 2024</p></div></article>
                        <div class="load-more-section"><button class="load-more-button">Load More</button></div>
                    </div>
                </div>
            </section>
        </main>

        <!-- ==========================================================================
           Right Sidebar
           ========================================================================== -->
        <aside class="sidebar-right">
            <div class="trending-topics">
                <h3><i class="fa-solid fa-arrow-trend-up"></i> Trends for You</h3>
                <ul class="trending-list">
                    <li><a href="#">#stop</a><span>4 posts</span></li>
                    <li><a href="#">#Nepal</a><span>3 posts</span></li>
                    <li><a href="#">#parliament</a><span>1 post</span></li>
                    <li><a href="#">#rajbiraj</a><span>1 post</span></li>
                    <li><a href="#">#change</a><span>1 post</span></li>
                    <li><a href="#">#financebill2080</a><span>1 post</span></li>
                    <li><a href="#">#nepalbudgetbhasan</a><span>1 post</span></li>
                </ul>
                <a href="#" class="show-more-trends">Show More <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </aside>
    </div>

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
            <p>© 2024 Nyano Haath. All Rights Reserved. | <a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a></p>
        </div>
    </footer>
    
    <script src="{{ asset('JS/campaignpage.js') }}"></script>

</body>
</html>


