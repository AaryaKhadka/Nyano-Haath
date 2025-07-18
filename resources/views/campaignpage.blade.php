@extends('layouts.custom')

@section('title', 'Campaigns')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/campaignpage.css') }}">
@endsection

@section('content')

  
   
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

                      @php $visibleCount = 3; @endphp
                        <div id="latest-content" class="content-section active">
                            @forelse ($latestCampaigns as $index => $campaign)
                            <a href="{{ route('campaign.show', $campaign) }}" class="news-card-link">
                                <article class="news-card {{ $index >= $visibleCount ? 'hidden' : '' }}">
                                    <div class="card-image-container">
                                        <img src="{{ asset('storage/' . $campaign->campaign_image) }}" alt="{{ $campaign->title }}">
                                    </div>
                                    <div class="card-text-content">
                                        <h3>{{ $campaign->title }}</h3>
                                        <p class="card-info">{{ $campaign->country }} | {{ $campaign->created_at->format('d M, Y') }}</p>
                                    </div>
                                </article>
                            </a>
                            @empty
                            <p>No active campaigns available.</p>
                            @endforelse

                            @if ($latestCampaigns->count() > $visibleCount)
                            <div class="load-more-section">
                                <button class="load-more-button">Load More</button>
                            </div>
                            @endif
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

<script src="{{ asset('JS/campaignpage.js') }}"></script>
@endsection