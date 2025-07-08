<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - Nyano Haath</title>
    <link rel="stylesheet" href="{{ asset('css/adminDash.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Move header here, outside dashboard container -->
    <header class="main-header">
        <a href="#" class="logo">
            <div class="logo-icon"><i class="fas fa-hand-holding-heart"></i></div>
            <h2 class="logo-text">Nyano Haath</h2>
        </a>

        <nav class="main-nav">
            <a href="#">Home</a>
            <a href="#campaigns">Campaigns</a>
            
            <!-- Removed gap by putting profile inside nav -->
            <div class="header-action">
                <div class="profile-dropdown" style="position: relative;">
                    <button id="profileBtn" class="profile-btn" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> Profile <i class="fas fa-caret-down"></i>
                    </button>
                    <div id="dropdownMenu" class="dropdown-content" role="menu" aria-labelledby="profileBtn">
                        <form method="POST" action="{{ route('logout.redirect') }}">
                            @csrf
                            <button type="submit" class="logout-btn">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo">Nyano Haath Admin</div>
            <nav>
                <ul>
                    <li><a href="#">Role Management</a></li>
                    <li><a href="#">Campaign Management</a></li>
                    <!-- Add more sidebar links as needed -->
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <section class="content">
                <h1>Welcome to Admin Dashboard</h1>
                <p>Manage roles and more from here.</p>
            </section>
        </main>
    </div>

<script>
    const profileBtn = document.getElementById('profileBtn');
    const dropdownMenu = document.getElementById('dropdownMenu');

    profileBtn.addEventListener('click', () => {
        const isShown = dropdownMenu.classList.toggle('show');
        profileBtn.setAttribute('aria-expanded', isShown);
    });

    window.onclick = function(event) {
        if (!event.target.closest('#profileBtn')) {
            if (dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.remove('show');
                profileBtn.setAttribute('aria-expanded', 'false');
            }
        }
    }
</script>

</body>
</html>
