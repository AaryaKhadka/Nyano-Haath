
@extends('layouts.app')
@section('title', 'Login')

@section('content')

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
                     <a href=""><div class="circle-icon"><i class="fas fa-heart-pulse"></i></div></a>
                     <span>Medical</span>
                  </div>
                  <div class="circle-item">
                     <a href=""><div class="circle-icon"><i class="fas fa-bolt"></i></div></a>
                       <span>Emergency</span>
                  </div>
                  <div class="circle-item">
                     <a href="#"><div class="circle-icon"><i class="fas fa-paw"></i></div></a>
                     <span>Animal</span>
                  </div>
                   <div class="circle-item">
                     <a href="{{ route('categories')}}"><div class="circle-icon"><i class="fas fa-arrow-right"></i></div></a>
                     <span>More</span>
                   </div>
             </div>
        
            </div>
        </section>

        <!-- How It Works Section -->
        @include('layouts.fundraisingstep')
        
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
@endsection
