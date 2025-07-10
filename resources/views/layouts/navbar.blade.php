<header class="main-header">
        <a href="{{ route('trending')}}" class="logo">
            <div class="logo-icon"><img src="{{ asset('image/naynologo.jpg')}}" alt="Nyano Haat Logo"></div>
            <h2 class="logo-text">Nyano Haath</h2>
        </a>
        <nav class="main-nav">
            <!-- Search Button/Input -->
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search campaigns...">
                <a href="#" class="search-icon"><i class="fas fa-search"></i></a>
            </div>

            <a href="#">Home</a>
            <a href="#campaigns">Campaigns</a>
            <a href="#how-it-works">How It Works</a>
            <a href="#about">About</a>
        </nav>
        <div class="header-action">
            <a href="{{ route('login')}}" class="btn btn-primary">Login</a>
        </div>

    </header>