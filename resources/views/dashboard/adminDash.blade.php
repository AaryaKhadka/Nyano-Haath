<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard - Nyano Haath</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    crossorigin="anonymous"
  />

  <!-- Link to external CSS -->
  <link rel="stylesheet" href="{{ asset('css/adminDash.css') }}" />
</head>
<body>

  <header class="header">
    <a href="#" class="logo">
      <i class="fas fa-hand-holding-heart"></i>
      <span>Nyano Haath Admin</span>
    </a>

    <div class="user-menu-wrapper" tabindex="0">
      <button id="userMenuButton" class="user-icon-btn" aria-haspopup="true" aria-expanded="false" title="Admin Menu">
        <i class="fas fa-user-circle fa-xl"></i>
      </button>

      <div id="userDropdown" class="user-dropdown" role="menu" aria-labelledby="userMenuButton" hidden>
        <a href="#" role="menuitem" class="dropdown-item" onclick="event.preventDefault(); alert('Logout!');">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </div>
  </header>

  <div class="dashboard-container">
    <aside class="sidebar">
      <nav>
        <ul>
          <li><a href="#"><i class="fas fa-user-shield"></i> Role Management</a></li>
          <li><a href="#"><i class="fas fa-bullhorn"></i> Campaign Management</a></li>
        </ul>
      </nav>
    </aside>

    <main class="main-content">
      <h1>Welcome to Admin Dashboard</h1>

      <section class="dashboard-stats">
        <div class="stat-card">
          <h2>Total Campaign Creators</h2>
          <p>150</p>
        </div>
        <div class="stat-card">
          <h2>Total Amount Raised</h2>
          <p>₹1,250,000</p>
        </div>
        <div class="stat-card">
          <h2>Total Campaigns</h2>
          <p>320</p>
        </div>
        <div class="stat-card">
          <h2>Active Users</h2>
          <p>450</p>
        </div>
      </section>
    </main>
  </div>

  @include('layouts.footer')

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const userMenuBtn = document.getElementById('userMenuButton');
      const userDropdown = document.getElementById('userDropdown');

      userMenuBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const isHidden = userDropdown.hasAttribute('hidden');
        if (isHidden) {
          userDropdown.removeAttribute('hidden');
          userMenuBtn.setAttribute('aria-expanded', 'true');
        } else {
          userDropdown.setAttribute('hidden', '');
          userMenuBtn.setAttribute('aria-expanded', 'false');
        }
      });

      document.addEventListener('click', function(e) {
        if (!userMenuBtn.contains(e.target) && !userDropdown.contains(e.target)) {
          userDropdown.setAttribute('hidden', '');
          userMenuBtn.setAttribute('aria-expanded', 'false');
        }
      });

      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          userDropdown.setAttribute('hidden', '');
          userMenuBtn.setAttribute('aria-expanded', 'false');
          userMenuBtn.focus();
        }
      });
    });
  </script>

</body>
</html>
