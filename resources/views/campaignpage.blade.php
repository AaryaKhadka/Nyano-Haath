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
                        @foreach ($featuredCampaigns as $index => $campaign)
                        <div class="content-slide"> 
                            <div class="slide-image-container">
                                <img src="{{ asset('storage/' . $campaign->campaign_image) }}" alt="{{ $campaign->title }}">
                                @if ($campaign->status === 'featured' || $campaign->raised_amount >= $campaign->goal_amount)
                                <div class="victory-banner">VICTORY</div>
                                    @endif
                                </div>
                                <div class="slide-details">
                                    <h3>{{ $campaign->title }}</h3>
                                    <p class="slide-date">{{ \Carbon\Carbon::parse($campaign->created_at)->format('d M, Y') }}</p>
                                    <p class="slide-description">{{ \Illuminate\Support\Str::limit($campaign->description, 160) }}</p>
                                    <a href="{{ route('user.view', $campaign) }}" class="read-more-link">Read More</a>
                                    <div class="slide-analytics">
                                        <span class="analytics-item"><i class="fa-solid fa-pen-nib"></i> {{ $campaign->signatures_count }}</span>
                                        <span class="analytics-item"><i class="fa-solid fa-file-excel"></i> {{ $campaign->documents_count }}</span>
                                        <span class="analytics-item"><i class="fa-solid fa-folder-open"></i> {{ $campaign->folders_count }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
                        @forelse ($successCampaigns as $index => $story)
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

                        @if ($successCampaigns->count() > $visibleCount)
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