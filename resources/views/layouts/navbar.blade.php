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
            <a href="{{ route('login')}}" class="btn btn-primary btn-login">Login</a>
        </div>

    </header>