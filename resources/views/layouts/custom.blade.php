<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    @yield('head')
    @yield('styles')
</head>
<body>

    <!-- Header -->
    @include('layouts.navbar')

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    @include('layouts.footer')

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

        // Hero Background Slideshow
        const hero = document.querySelector('.hero');

        if (hero) {
            let current = 0;
            const bgImages = [
                "image/one-piece-mobile-1690x2366-10902.jpg",
                "image/naruto.jpg",
                "image/bleach.jpg"
            ];

            setInterval(() => {
                hero.style.backgroundImage = `linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2)), url('${bgImages[current]}')`;
                current = (current + 1) % bgImages.length;
            }, 2000);
        } else {
            console.warn("Hero element not found. Background slideshow won't run.");
        }
    });
</script>


    <!-- Yield per-page scripts here -->
    @yield('scripts')

</body>
</html>
