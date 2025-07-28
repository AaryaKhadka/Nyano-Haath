<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Profile - Nyano Haath</title>

    <!-- Font Awesome CDN -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- Link your CSS here -->
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
</head>
<body>

<div class="dashboard-container">
    <header class="header">
        <a href="{{ route('home')}}" class="logo">
            <img src="{{ asset('image/nyanologo.jpg')}}" alt="Nyano Haat Logo" >
        </a> 
        
        <div class="profile-dropdown-wrapper">
            <button class="profile-button" onclick="toggleDropdown()" title="Profile">
                <!-- User icon using Font Awesome -->
                <i class="fas fa-user-circle fa-xl"></i>
            </button>
            <div id="dropdown-menu" class="dropdown-menu hidden">
                <a href="{{ route('dashboard') }}">
                  <i class="fa-solid fa-house"></i> Home
                </a>
                <form id="logout-form" action="{{ route('logout.redirect') }}" method="POST">
                    @csrf
                    <button type="submit">
                      <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout.redirect') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </header>

    <div class="main-layout">
        <aside class="sidebar">
            <nav>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}">
                            <!-- Dashboard icon -->
                            <i class="fas fa-house"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('campaigns.create') }}">
                            <!-- Campaigns icon -->
                            <i class="fa-solid fa-bullhorn"></i>
                            <span>Add Campaign</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('profile.edit') }}">
                            <!-- User icon -->
                            <i class="fa-solid fa-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form id="sidebar-logout-form" action="{{ route('logout.redirect') }}" method="POST" style="display:none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">
                            <!-- Logout icon -->
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="content-area">
            <!-- Back Button -->
            <a href="{{ route('dashboard') }}" class="back-button">
                <i class="fa-solid fa-arrow-left" style="margin-right: 6px;"></i> Back
            </a>

            <h1>Profile Information</h1>
            <p>Update your account's profile information and email address.</p>

            <!-- Profile Information Form -->
            <form method="POST" action="{{ route('profile.update') }}" class="profile-form">
                @csrf
                @method('PATCH')

                <label for="name">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name', auth()->user()->name) }}" required autofocus autocomplete="name" />

                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}" required autocomplete="email" />

                <button type="submit" class="btn-save">Save</button>
            </form>

            <hr />

            <h2>Update Password</h2>
            <p>Ensure your account is using a long, random password to stay secure.</p>

            <!-- Password Update Form -->
            <form method="POST" action="{{ route('password.update') }}" class="profile-form">
                @csrf
                @method('PUT')

                <label for="current_password">Current Password</label>
                <input id="current_password" name="current_password" type="password" required autocomplete="current-password" />

                <label for="password">New Password</label>
                <input id="password" name="password" type="password" required autocomplete="new-password" />

                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" />

                <button type="submit" class="btn-save">Save</button>
            </form>

            <hr />

            <h2>Delete Account</h2>
            <p>
                Once your account is deleted, all of its resources and data will be permanently deleted.
                Before deleting your account, please download any data or information you wish to retain.
            </p>

            <!-- Delete Account Form -->
            <form method="POST" action="{{ route('profile.destroy') }}" class="profile-form" onsubmit="return confirm('Are you sure you want to delete your account?');">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn-delete">Delete Account</button>
            </form>
        </main>
    </div>
    @include('layouts.footer')
</div>

<script>
    function toggleDropdown() {
        document.getElementById("dropdown-menu").classList.toggle("hidden");
    }

    // Close dropdown when clicking outside
    window.addEventListener("click", function(e) {
        const dropdown = document.getElementById("dropdown-menu");
        const button = document.querySelector(".profile-button");
        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add("hidden");
        }
    });
</script>

</body>
</html>
