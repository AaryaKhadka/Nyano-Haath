<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Profile - Nyano Haath</title>

    <!-- Link your CSS here -->
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
</head>
<body>

<div class="dashboard-container">
    <header class="header">
        <div class="logo">
            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4H17.3334V17.3334H30.6666V30.6666H44V44H4V4Z" fill="currentColor"></path>
            </svg>
            <h2>Nyano Haath</h2>
        </div>
        <div class="profile-dropdown-wrapper">
            <button class="profile-button" onclick="toggleDropdown()" title="Profile">
                <!-- 👤 User icon -->
                 <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.7 0 4.5-2 4.5-4.5S14.7 3 12 3 7.5 5 7.5 7.5 9.3 12 12 12zm0 1.5c-3 0-9 1.5-9 4.5V21h18v-3c0-3-6-4.5-9-4.5z"/>
                </svg>
            </button>
            <div id="dropdown-menu" class="dropdown-menu hidden">
                <a href="{{ route('dashboard') }}">Home</a>
                <form id="logout-form" action="{{ route('logout.redirect') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
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
                            <!-- dashboard icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                                <path d="M216,96.42V208a16,16,0,0,1-16,16H160a16,16,0,0,1-16-16V160H112v48a16,16,0,0,1-16,16H56a16,16,0,0,1-16-16V96.42a16,16,0,0,1,5.17-11.78l80-75.48.11-.11a16,16,0,0,1,21.53,0l.11.11,80,75.48A16,16,0,0,1,216,96.42Z"></path>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('campaigns.create') }}">
                            <!-- campaigns icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                                <path d="M216,40H136V24a8,8,0,0,0-16,0V40H40A16,16,0,0,0,24,56V176a16,16,0,0,0,16,16H79.36L57.75,219a8,8,0,0,0,12.5,10l29.59-37h56.32l29.59,37a8,8,0,1,0,12.5-10l-21.61-27H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,136H40V56H216V176ZM104,144a8,8,0,0,1-16,0V120a8,8,0,0,1,16,0Zm32,0a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm32,0a8,8,0,0,1-16,0V88a8,8,0,0,1,16,0Z"></path>
                            </svg>
                            <span>Add Campaign</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('profile.edit') }}">
                            <!-- user icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                 class="feather feather-user" viewBox="0 0 24 24" width="20" height="20">
                                <path d="M20 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M4 21v-2a4 4 0 0 1 3-3.87"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form id="sidebar-logout-form" action="{{ route('logout.redirect') }}" method="POST" style="display:none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">
                            <!-- logout icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                                <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                            </svg>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="content-area">
            <!-- Back Button -->
            <a href="{{ route('dashboard') }}" class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                     class="feather feather-arrow-left" viewBox="0 0 24 24" width="20" height="20" style="margin-right: 6px;">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Back
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
