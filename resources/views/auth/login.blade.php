<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Login/Registration</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="loginSign.css" />
</head>
<body>
    <header class="main-header">
      
         <a href="{{ route('home')}}" class="logo">
            <img src="{{ asset('image/nyanologo.jpg')}}" alt="Nyano Haat Logo" >
         </a> 
      

        <nav class="main-nav">
           

            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('feed') }}">Campaigns</a>
            <a href="#how-it-works">How It Works</a>
            <a href="{{ route('aboutus') }}">About</a>
        </nav>
        <div class="header-action">
            <a href="{{ route('login')}}" class="btn btn-primary">Login</a>
        </div>

    </header>

    <div class="container" id="container">
        <!-- Sign Up Form Container -->
        <div class="form-container sign-up-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Create Account</h1>

                @if ($errors->any())
                    <div >
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div> -->
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
                <button type="submit">Sign Up</button>
            </form>
        </div>

        <!-- Sign In Form Container -->
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Login</h1>

                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div> -->
                <span>or use your account</span>
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <a href="{{ route('password.request') }}">Forgot your password?</a>
                <button type="submit">Login</button>
            </form>
        </div>

        <!-- Overlay Container -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello!</h1>
                    <p>New here? Create your account and start helping today.</p>
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