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

<div class="dashboard-container">
    <aside class="sidebar">
        <div class="logo">Nyano Haath Admin</div>
        <nav>
            <ul>
                <li><a href="#">Role Management</a></li>
                <!-- Add more sidebar links as needed -->
            </ul>
        </nav>
    </aside>

    <main class="main-content">
        <header>
            <div class="profile-dropdown">
                <button id="profileBtn">Admin <i class="fas fa-caret-down"></i></button>
                <div id="dropdownMenu" class="dropdown-content">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </div>
        </header>

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
        dropdownMenu.classList.toggle('show');
    });

    window.onclick = function(event) {
        if (!event.target.matches('#profileBtn')) {
            if (dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.remove('show');
            }
        }
    }
</script>

</body>
</html>
