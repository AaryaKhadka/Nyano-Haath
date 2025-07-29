<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
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
                <li><a href="#">Common questions</a></li>
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
