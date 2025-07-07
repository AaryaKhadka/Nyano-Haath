<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/adminLogin.css') }}">
</head>
<body>
    
 
    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus />
       
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror

        <br/>

        <label>Password:</label>
        <input type="password" name="password" required />
        @error('password')
        <div class="error">{{ $message }}</div>
       @enderror

        <br/>

        <label>
            <input type="checkbox" name="remember" /> Remember Me
        </label>

        <br/>

        <button type="submit">Login</button>
    </form>
</body>
</html>
