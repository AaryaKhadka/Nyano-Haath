@extends('layouts.app')

@section('title', 'About Us')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/campaignpage.css') }}">
@endsection

@section('content')

    <div class="page-grid">
        <!-- ==========================================================================
           Left Sidebar
           ========================================================================== -->
        <aside class="sidebar-left">
            <a href="#" class="sidebar-icon active"><i class="fa-solid fa-pen-to-square"></i><span>Start Petition</span></a>
            <a href="#" class="sidebar-icon"><i class="fa-solid fa-magnifying-glass"></i><span>Search</span></a>
            <a href="#" class="sidebar-icon"><i class="fa-solid fa-bell"></i><span>Notifications</span></a>
            <a href="#" class="sidebar-icon"><i class="fa-solid fa-gear"></i><span>Settings</span></a>
        </aside>

        <!-- ==========================================================================
           Main Content Area
           ========================================================================== -->
        <main class="main-content">
            <!-- Featured Success Stories Slider -->
            <section class="featured-slider-header">
                <h2><i class="fa-solid fa-star"></i> Success Stories</h2>
            </section>
            
            <div class="slider featured-slider">
                <div class="slider-view">
                    <div class="slider-track">
                        <!-- Slide 1: Corruption -->
                        <div class="slide">
                            <div class="slide-image">
                                <img src="https://images.unsplash.com/photo-1589216532372-1c2a36790049?q=80&w=2070&auto=format&fit=crop" alt="A judge's gavel symbolizing justice against corruption">
                                <div class="slide-banner">VICTORY</div>
                            </div>
                            <div class="slide-content">
                                <h3>Stop the Clock on Corruption</h3>
                                <p class="slide-meta">22 Aug, 2024</p>
                                <p class="slide-body">A major victory for transparency! After a widespread public campaign, lawmakers have scrapped the proposed five-year time limit for prosecuting corruption cases, ensuring accountability is not bound by time.</p>
                                <a href="#" class="slide-readmore">Read More</a>
                                <div class="slide-stats">
                                    <span class="stat-item"><i class="fa-solid fa-pen-nib"></i> 573</span>
                                    <span class="stat-item"><i class="fa-solid fa-file-excel"></i> 23</span>
                                    <span class="stat-item"><i class="fa-solid fa-folder-open"></i> 3</span>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2: Justice for Sumad Rani Tharu -->
                        <div class="slide">
                            <div class="slide-image">
                                <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=2070&auto=format&fit=crop" alt="People protesting for justice with signs">
                                <div class="slide-banner">VICTORY</div>
                            </div>
                            <div class="slide-content">
                                <h3>Justice for Sumad Rani Tharu</h3>
                                <p class="slide-meta">15 Jul, 2024</p>
                                <p class="slide-body">Following immense public pressure and a petition that gathered thousands of signatures, the case of Sumad Rani Tharu was reopened, leading to a fair investigation and justice for her family.</p>
                                <a href="#" class="slide-readmore">Read More</a>
                                <div class="slide-stats">
                                    <span class="stat-item"><i class="fa-solid fa-pen-nib"></i> 890</span>
                                    <span class="stat-item"><i class="fa-solid fa-file-excel"></i> 112</span>
                                    <span class="stat-item"><i class="fa-solid fa-folder-open"></i> 15</span>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3: TU Exam Accountability -->
                        <div class="slide">
                            <div class="slide-image">
                                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop" alt="University students studying together in a library">
                                <div class="slide-banner">VICTORY</div>
                            </div>
                            <div class="slide-content">
                                <h3>Accountability from TU for Exam Papers</h3>
                                <p class="slide-meta">01 Jun, 2024</p>
                                <p class="slide-body">Students' voices were heard! Tribhuvan University has implemented a new digital tracking system for exam papers after a successful campaign demanded an end to misplaced results and administrative negligence.</p>
                                <a href="#" class="slide-readmore">Read More</a>
                                <div class="slide-stats">
                                    <span class="stat-item"><i class="fa-solid fa-pen-nib"></i> 1.2K</span>
                                    <span class="stat-item"><i class="fa-solid fa-file-excel"></i> 45</span>
                                    <span class="stat-item"><i class="fa-solid fa-folder-open"></i> 8</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 4: Save Phewa Lake -->
                        <div class="slide">
                            <div class="slide-image">
                                <img src="https://images.unsplash.com/photo-1594967323310-39a36838569c?q=80&w=2070&auto=format&fit=crop" alt="Phewa Lake in Pokhara with boats">
                                <div class="slide-banner">VICTORY</div>
                            </div>
                            <div class="slide-content">
                                <h3>Save Phewa Lake from Encroachment</h3>
                                <p class="slide-meta">10 May, 2024</p>
                                <p class="slide-body">A landmark decision was made to halt illegal construction around Phewa Lake after a powerful citizen-led movement highlighted the environmental risks and demanded preservation of this natural heritage.</p>
                                <a href="#" class="slide-readmore">Read More</a>
                                <div class="slide-stats">
                                    <span class="stat-item"><i class="fa-solid fa-pen-nib"></i> 2.5K</span>
                                    <span class="stat-item"><i class="fa-solid fa-file-excel"></i> 250</span>
                                    <span class="stat-item"><i class="fa-solid fa-folder-open"></i> 21</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="slider-btn prev"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="slider-btn next"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>

            <!-- Main Feed Section with Sticky Header -->
            <section class="feed">
                <div class="feed-header-sticky">
                    <h1 class="feed-header"><i class="fa-solid fa-people-group"></i> Whats Happening In Nyanohaath</h1>
                    <nav class="feed-tabs">
                        <a class="feed-tab" data-tab="popular">Popular</a>
                        <a class="feed-tab active" data-tab="latest">Latest</a>
                        <a class="feed-tab" data-tab="success-feed">Success Stories</a>
                    </nav>
                    <div class="feed-filters">
                        <button class="filter-btn active">Environment</button>
                        <button class="filter-btn">Wellbeing Matters</button>
                        <button class="filter-btn">Public Infrastructure</button>
                        <button class="filter-btn">Transport Management</button>
                    </div>
                </div>

                <div class="feed-content">
                    <!-- Popular Tab Content -->
                    <div id="popular" class="feed-panel">
                        <article class="card"><div class="card-image"><img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=2070&auto=format&fit=crop" alt="Doctor with a stethoscope"></div><div class="card-body"><h3>Improve Healthcare Access in Rural Karnali</h3><p class="card-meta">Ministry of Health and Population | 12 Mar, 2025</p></div></article>
                        <article class="card"><div class="card-image"><img src="https://images.unsplash.com/photo-1594819232822-e42c069b3504?q=80&w=2070&auto=format&fit=crop" alt="Person meditating peacefully"></div><div class="card-body"><h3>Promote Mental Health Awareness in Schools</h3><p class="card-meta">Ministry of Education, Science and Technology | 05 Apr, 2025</p></div></article>
                        <article class="card"><div class="card-image"><img src="https://images.unsplash.com/photo-1598875184988-5e67b1a7ea91?q=80&w=2070&auto=format&fit=crop" alt="Dog in an animal shelter"></div><div class="card-body"><h3>Increase Funding for Stray Animal Shelters</h3><p class="card-meta">Kathmandu Metropolitan City | 02 Apr, 2025</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=2070&auto=format&fit=crop" alt="People collaborating with sticky notes"></div><div class="card-body"><h3>Demand Transparency in Public Project Budgets</h3><p class="card-meta">Public Accounts Committee | 05 Mar, 2025</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?q=80&w=2070&auto=format&fit=crop" alt="Modern house exterior"></div><div class="card-body"><h3>Ensure Safe Building Codes are Enforced Nationwide</h3><p class="card-meta">Ministry of Urban Development | 18 Mar, 2025</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1509099836639-18ba1795216d?q=80&w=1931&auto=format&fit=crop" alt="Child studying in a library"></div><div class="card-body"><h3>Upgrade Public School Libraries with Digital Resources</h3><p class="card-meta">Ministry of Education | 19 Apr, 2025</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1611117775522-5a91361c4a0c?q=80&w=2070&auto=format&fit=crop" alt="Waste segregation bins for recycling"></div><div class="card-body"><h3>Implement a City-Wide Waste Segregation Program</h3><p class="card-meta">Ministry of Federal Affairs and General Administration | 21 Apr, 2025</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1517404899732-4721a3934b35?q=80&w=2070&auto=format&fit=crop" alt="Kathmandu Durbar Square"></div><div class="card-body"><h3>Protect and Restore Kathmandu's Cultural Heritage Sites</h3><p class="card-meta">Department of Archaeology | 25 Apr, 2025</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=2070&auto=format&fit=crop" alt="Cyber security concept with a lock on a laptop"></div><div class="card-body"><h3>Introduce Stronger Cybersecurity and Data Protection Laws</h3><p class="card-meta">Ministry of Communication and Information Technology | 28 Apr, 2025</p></div></article>
                        <div class="load-more-container"><button class="btn-load-more">Load More</button></div>
                    </div>
                    
                    <!-- Latest Tab Content -->
                    <div id="latest" class="feed-panel active">
                        <article class="card"><div class="card-image"><img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=2070&auto=format&fit=crop" alt="Public bus on a city road"></div><div class="card-body"><h3>Improve Public Transportation in Lalitpur</h3><p class="card-meta">Lalitpur Metropolitan City | 15 Apr, 2025</p></div></article>
                        <article class="card"><div class="card-image"><img src="https://images.unsplash.com/photo-1559384772-18651c14a279?q=80&w=2070&auto=format&fit=crop" alt="Rhinoceros in Chitwan National Park"></div><div class="card-body"><h3>Strengthen Anti-Poaching Patrols in Chitwan National Park</h3><p class="card-meta">Department of National Parks and Wildlife Conservation | 12 Apr, 2025</p></div></article>
                        <article class="card"><div class="card-image"><img src="https://images.unsplash.com/photo-1599855129482-10a568b2098b?q=80&w=2070&auto=format&fit=crop" alt="Garment worker at a sewing machine"></div><div class="card-body"><h3>Ensure Fair Wages for Garment Industry Workers</h3><p class="card-meta">Ministry of Labour, Employment and Social Security | 10 Apr, 2025</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1608253846337-37c28aa33f3e?q=80&w=2070&auto=format&fit=crop" alt="Person in wheelchair using a ramp"></div><div class="card-body"><h3>Make All Public Buildings Wheelchair Accessible</h3><p class="card-meta">Department of Urban Development and Building Construction | 08 Apr, 2025</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?q=80&w=2070&auto=format&fit=crop" alt="Camping tent in the Himalayas"></div><div class="card-body"><h3>Regulate Trekking and Tourism for Sustainability</h3><p class="card-meta">Nepal Tourism Board | 22 Mar, 2025</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1560707303-3486c85b584a?q=80&w=1964&auto=format=fit=crop" alt="Smog and air pollution over a city"></div><div class="card-body"><h3>Take Urgent Measures to Combat Air Pollution in Kathmandu Valley</h3><p class="card-meta">Ministry of Forests and Environment | 18 Apr, 2025</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1579202673506-ca3ce28943ef?q=80&w=1974&auto=format&fit=crop" alt="Fresh organic vegetables at a market"></div><div class="card-body"><h3>Provide Subsidies for Organic Farming Initiatives</h3><p class="card-meta">Ministry of Agriculture and Livestock Development | 20 Apr, 2025</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1629838043702-a1b725a95964?q=80&w=2070&auto=format&fit=crop" alt="Consumer looking at products on a shelf"></div><div class="card-body"><h3>Establish Stronger Consumer Rights Protection Agency</h3><p class="card-meta">Ministry of Industry, Commerce and Supplies | 30 Apr, 2025</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1510076857177-7470076d4098?q=80&w=2072&auto=format&fit=crop" alt="Painter working on a canvas"></div><div class="card-body"><h3>Create a National Fund to Support Local Artists and Musicians</h3><p class="card-meta">Ministry of Culture, Tourism and Civil Aviation | 02 May, 2025</p></div></article>
                        <div class="load-more-container"><button class="btn-load-more">Load More</button></div>
                    </div>
                    
                    <!-- Success Stories Feed Tab Content -->
                    <div id="success-feed" class="feed-panel">
                        <article class="card"><div class="card-image"><img src="https://images.unsplash.com/photo-1589216532372-1c2a36790049?q=80&w=2070&auto=format&fit=crop" alt="Gavel symbolizing justice"></div><div class="card-body"><h3>VICTORY: No Time Limits for Corruption Cases</h3><p class="card-meta">22 Aug, 2024</p></div></article>
                        <article class="card"><div class="card-image"><img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=2070&auto=format&fit=crop" alt="Community protest for justice"></div><div class="card-body"><h3>VICTORY: Justice Delivered for Sumad Rani Tharu</h3><p class="card-meta">15 Jul, 2024</p></div></article>
                        <article class="card"><div class="card-image"><img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop" alt="Students in a classroom"></div><div class="card-body"><h3>VICTORY: TU Implements Digital Tracking for Exam Papers</h3><p class="card-meta">01 Jun, 2024</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1594967323310-39a36838569c?q=80&w=2070&auto=format&fit=crop" alt="Phewa Lake view"></div><div class="card-body"><h3>VICTORY: Illegal Construction Halted at Phewa Lake</h3><p class="card-meta">10 May, 2024</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1476231682828-37e571bc172f?q=80&w=2070&auto=format&fit=crop" alt="Lush green community forest"></div><div class="card-body"><h3>VICTORY: Community Forest Rights Secured for Local Villagers</h3><p class="card-meta">25 Apr, 2024</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1508515053969-79c51384252e?q=80&w=2070&auto=format&fit=crop" alt="Solar panels on a village roof"></div><div class="card-body"><h3>VICTORY: Solar Power Initiative Lights Up Rural Village</h3><p class="card-meta">18 Apr, 2024</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1528698827598-c1b5a59ef121?q=80&w=2070&auto=format&fit=crop" alt="Clean drinking water from a tap"></div><div class="card-body"><h3>VICTORY: Melamchi Water Supply Finally Reaches Homes</h3><p class="card-meta">02 Apr, 2024</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1555529669-e69e7aa0ba9e?q=80&w=2070&auto=format&fit=crop" alt="Stack of banned plastic bags"></div><div class="card-body"><h3>VICTORY: Ban on Single-Use Plastic Bags Enforced in Major Cities</h3><p class="card-meta">15 Mar, 2024</p></div></article>
                        <article class="card hidden-card"><div class="card-image"><img src="https://images.unsplash.com/photo-1588219452293-c06832644358?q=80&w=2070&auto=format&fit=crop" alt="Restored historical building"></div><div class="card-body"><h3>VICTORY: Rani Pokhari Restoration Completed with Traditional Materials</h3><p class="card-meta">05 Feb, 2024</p></div></article>
                        <div class="load-more-container"><button class="btn-load-more">Load More</button></div>
                    </div>
                </div>
            </section>
        </main>

        <!-- ==========================================================================
           Right Sidebar
           ========================================================================== -->
        <aside class="sidebar-right">
            <div class="trends">
                <h3><i class="fa-solid fa-arrow-trend-up"></i> Trends for You</h3>
                <ul class="trends-list">
                    <li><a href="#">#stop</a><span>4 posts</span></li>
                    <li><a href="#">#Nepal</a><span>3 posts</span></li>
                    <li><a href="#">#parliament</a><span>1 post</span></li>
                    <li><a href="#">#rajbiraj</a><span>1 post</span></li>
                    <li><a href="#">#change</a><span>1 post</span></li>
                    <li><a href="#">#financebill2080</a><span>1 post</span></li>
                    <li><a href="#">#nepalbudgetbhasan</a><span>1 post</span></li>
                </ul>
                <a href="#" class="trends-show-more">Show More <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </aside>
    </div>

   @endsection

@section('scripts')
    <script src="{{ asset('js/campaignpage.js') }}"></script>
@endsection
</html>