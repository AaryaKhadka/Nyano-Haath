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
            <!-- Featured  Stories Slider -->
            <section class="slider-container-header">
                <h2><i class="fa-solid fa-star"></i> Featured Stories</h2>
            </section>
            
            <div class="main-slider">
                <div class="slider-viewport">
                    <div class="slider-content-track">
                        <!-- Slide 1: Corruption -->
                        <div class="content-slide">
                            <div class="slide-image-container">
                                <img src="data:image/jpeg;base64,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" alt="A judge's gavel symbolizing justice against corruption">
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
                    <div class="campaignTitle">
                        <h1 class="main-text">
                            <i class="fa-solid fa-hand-holding-heart" style="color: var(--primary-color); margin-right: 8px;"></i>
                            Support a Story
                        </h1>
                        <p class="sub-text">Be someone's Nyano Haath</p>
                    </div>
                    <nav class="feed-navigation">
                        <!-- <a class="nav-tab" data-tab="popular">Popular</a> -->
                        <a class="nav-tab active" data-tab="latest">Latest</a>
                        <a class="nav-tab" data-tab="success">Success Stories</a>
                    </nav>
                    <!-- <div class="category-filters">
                        <button class="category-button active">Environment</button>
                        <button class="category-button">Wellbeing Matters</button>
                        <button class="category-button">Public Infrastructure</button>
                        <button class="category-button">Transport Management</button>
                    </div> -->
                </div>

                <div class="feed-content-area">
                    <!-- ======================================================================
                       Popular Tab Content
                       ======================================================================= -->
                    <!-- <div id="popular-content" class="content-section">
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
                    </div> -->

                    <!-- ======================================================================
                       Latest Tab Content
                       ======================================================================= -->

                      @php $visibleCount = 5; @endphp
                        <div id="latest-content" class="content-section active">
                            @forelse ($latestCampaigns as $index => $campaign)
                            <a href="{{ route('user.view', $campaign) }}" class="news-card-link">
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
                       
                   <div id="success-content" class="content-section ">
                        @forelse ($successStories as $index => $story)
                        <a href="{{ route('user.view', $story) }}" class="news-card-link">
                            <article class="news-card {{ $index >= $visibleCount ? 'hidden' : '' }}">
                                <div class="card-image-container">
                                    <img src="{{ asset('storage/' . $story->campaign_image) }}" alt="{{ $story->title }}">
                                </div>
                                <div class="card-text-content">
                                    <h3>{{ $story->title }}</h3>
                                    <p class="card-info">{{ $story->country }} | {{ optional($story->created_at)->format('d M, Y') ?? 'N/A' }}</p>
                                </div>
                            </article>
                        </a>
                        @empty
                        <p>No success stories available.</p>
                        @endforelse

                        @if ($successStories->count() > $visibleCount)
                        <div class="load-more-section">
                            <button class="load-more-button">Load More</button>
                        </div>
                        @endif
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