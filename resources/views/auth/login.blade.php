@extends('layouts.app')

@section('title', 'Login')

  @section('styles')
    <link rel="stylesheet" href="/css/login.css">
@endsection


@section('content')
<div class="nyano-login-container">
    <div class="nyano-form-container nyano-sign-up">
        <form action="#">
            <h1>Create Account</h1>
            <div class="nyano-social-container">
                <a href="#" class="nyano-social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="nyano-social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="nyano-social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your email</span>
            <input type="text" placeholder="Name" />
            <input type="email" placeholder="Email" />
            <input type="password" placeholder="Password" />
            <button>Sign Up</button>
        </form>
    </div>

    <div class="nyano-form-container nyano-sign-in nyano-active">
        <form action="#">
            <h1>Sign in</h1>
            <div class="nyano-social-container">
                <a href="#" class="nyano-social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="nyano-social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="nyano-social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>
            <input type="email" placeholder="Email" />
            <input type="password" placeholder="Password" />
            <a href="#">Forgot your password?</a>
            <button>Sign In</button>
        </form>
    </div>

    <div class="nyano-overlay-container">
        <div class="nyano-overlay">
            <div class="nyano-overlay-panel nyano-overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="nyano-ghost" id="signIn">Sign In</button>
            </div>
            <div class="nyano-overlay-panel nyano-overlay-right">
                <h1>Hello, Donor!</h1>
                <p>Enter your details to start your journey with us</p>
                <button class="nyano-ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.querySelector('.nyano-login-container');
    const signInForm = document.querySelector('.nyano-sign-in');
    const signUpForm = document.querySelector('.nyano-sign-up');

    signUpButton.addEventListener('click', () => {
        container.classList.add('nyano-right-panel-active');
        signInForm.classList.remove('nyano-active');
        signUpForm.classList.add('nyano-active');
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove('nyano-right-panel-active');
        signInForm.classList.add('nyano-active');
        signUpForm.classList.remove('nyano-active');
    });
</script>
@endsection
