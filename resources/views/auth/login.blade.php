<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Sign-In/Sign-Up</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="loginSign.css">
</head>
<body>
    <!-- Header -->
    <header class="main-header">
        <a href="/trending" class="logo">
            <div class="logo-icon"><i class="fas fa-hand-holding-heart"></i></div>
            <h2 class="logo-text">Nyano Haath</h2>
        </a>
        <nav class="main-nav">
            <a href="#">Home</a>
            <a href="#campaigns">Campaigns</a>
            <a href="#how-it-works">How It Works</a>
            <a href="#about">About</a>
        </nav>
        <div class="header-action">
            <a href="loginSign.html" class="btn btn-primary">Login</a>
        </div>
    </header>

    <div class="container" id="container">
        <!-- Sign Up Form Container -->
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button>Sign Up</button>
            </form>
        </div>

        <!-- Sign In Form Container -->
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>

        <!-- Overlay Container -->
        <div class="overlay-container">
            <div class="overlay">
                <!-- Overlay Left Panel (Initially hidden, shown when "Sign Up" is active) -->
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <!-- Overlay Right Panel (Initially shown, shown when "Sign In" is active) -->
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Doner!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
     const signUpButton = document.getElementById('signUp');
     const signInButton = document.getElementById('signIn');
     const container = document.getElementById('container');

      signUpButton.addEventListener('click', () => {
       container.classList.add('right-panel-active');

      });

      signInButton.addEventListener('click', () => {
      container.classList.remove('right-panel-active');

       });

    </script>
</body>
</html>