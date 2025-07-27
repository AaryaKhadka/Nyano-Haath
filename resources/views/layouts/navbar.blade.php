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
            <a href="{{ route('feed') }}">Campaigns</a>
            <a href="#how-it-works">How It Works</a>
            <a href="{{ route('aboutus') }}">About</a>
        </nav>
     <div class="header-action">
    @auth
        <div class="dropdown">
            <button class="profile-btn">
                <i class="fas fa-user-circle fa-2x"></i>
            </button>
            <div class="dropdown-content">
                @php
                    if (Auth::user()->role === 'admin') {
                        $dashboardRoute = route('admin.dashboard');
                    } elseif (Auth::user()->role === 'donor') {
                        $dashboardRoute = route('donor.dashboard');
                    } else {
                        // default to fundraiser dashboard or generic dashboard route
                        $dashboardRoute = route('dashboard');
                    }
                @endphp
                <a href="{{ $dashboardRoute }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <form method="POST" action="{{ route('logout.redirect') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ route('login')}}" class="btn btn-primary">Login</a>
    @endauth
</div>

    </header>