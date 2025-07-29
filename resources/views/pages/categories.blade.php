@extends('layouts.app')
@section('title', 'Categories')
@section('styles')
    <link rel="stylesheet" href="/css/categories.css">
@endsection

@section('content')
     <!-- Stats Section -->
        <section class="stats fade-in-section">
            <div class="container">
                <div class="section-intro">
                    <h2>Fundraise for What Matters Most</h2>
                    <p style="text-align: center;">From personal emergencies to community projects, find your cause.</p>
                 </div>
               
                <div class="stats-content">
                     <a href="{{ route('category.show', 'medical') }}">
                     <div class="stat-item">
                        <i class="fas fa-heart-pulse"></i>
                        <h3>Medical</h3>
                        <p>Support life-saving treatments</p>
                     </div>
                    </a>

                     <a href="{{ route('category.show', 'emergency') }}">
                        <div class="stat-item">
                        <i class="fas fa-bolt"></i>
                        <h3>Emergency</h3>
                        <p>Provide immediate relief</p>
                      </div>
                    </a> 

                     <a href="{{ route('category.show', 'education') }}">
                       <div class="stat-item">
                        <i class="fas fa-graduation-cap"></i>
                        <h3>Education</h3>
                        <p>Build a brighter future</p>
                      </div>
                    </a> 

                     <a href="{{ route('category.show', 'animal') }}">
                      <div class="stat-item">
                        <i class="fas fa-paw"></i>
                        <h3>Animal</h3>
                        <p>Help our furry friends</p>
                      </div>
                    </a>

                   <a href="{{ route('category.show', 'disaster') }}">
                     <div class="stat-item">
                      <i class="fa-solid fa-house-damage"></i>
                        <h3>Disaster Relief</h3>
                        <p>Disaster Relief Support</p>
                     </div>
                    </a>

                    <a href="{{ route('category.show', 'sports') }}">
                     <div class="stat-item">
                        <i class="fa-solid fa-futbol"></i>
                        <h3>Sports</h3>
                        <p> Empower Through Sports</p>
                     </div>
                    </a>

                    <a href="{{ route('category.show', 'environmental-cause') }}">
                     <div class="stat-item">
                        <i class=" fa-solid fa-leaf"></i>
                        <h3> Environmental</h3>
                        <p>Protect Our Planet</p>
                     </div>
                    </a>

                    <a href="{{ route('category.show', 'community-project') }}">
                    <div class="stat-item">
                        <i class="fa-solid fa-house-user"></i>
                        <h3>Community</h3>
                        <p> Strengthen Your Community</p>
                     </div>
                    </a>
                </div>
            </div>
        </section>


@endsection