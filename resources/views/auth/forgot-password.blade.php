<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Forgot Password - Nyano Haath</title>

    <!-- Your CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
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
            <a href="{{ route('how') }}">How It Works</a>
            <a href="{{ route('aboutus') }}">About</a>
        </nav>
        <div class="header-action">
            <a href="{{ route('login')}}" class="btn btn-primary">Login</a>
        </div>

    </header>

    <!-- Forgot Password Form Container -->
    <div class="container container-forgot" style="margin-top: 80px; max-width: 400px; padding: 40px 30px;">
        <h2 style="color: #28a745; text-align: center; margin-bottom: 20px;">Forgot Your Password?</h2>
        <p style="text-align:center; color: #555; margin-bottom: 25px;">
            Enter your email below and we'll send you a password reset link.
        </p>

        @if(session('status'))
            <div style="background-color: #c6f6d5; color: #22543d; padding: 10px; border-radius: 5px; margin-bottom: 20px; text-align:center;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" style="display: flex; flex-direction: column;">
            @csrf
            <input type="email" name="email" placeholder="Enter your email" required autofocus style="margin-bottom: 15px;" />
            
            @error('email')
                <span style="color: #e53e3e; margin-bottom: 15px; font-size: 14px;">{{ $message }}</span>
            @enderror
            
            <button type="submit" class="btn btn-primary" style="padding: 12px; font-weight: 600;">Send Reset Link</button>
        </form>
    </div>
</body>
</html>

