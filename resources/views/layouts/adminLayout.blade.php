<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Admin Dashboard - Nyano Haath')</title>

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

  {{-- Important: Yield head section for page-specific CSS or scripts --}}
  @yield('head')
</head>
<body>

  <header class="header">


    <a href="{{ route('home')}}" class="logo">
      <img src="{{ asset('image/nyanologo.jpg')}}" alt="Nyano Haat Logo" >
    </a> 

    <div class="user-menu-wrapper" tabindex="0">
      <button id="userMenuButton" class="user-icon-btn" aria-haspopup="true" aria-expanded="false" title="Admin Menu">
        <i class="fas fa-user-circle fa-xl"></i>
      </button>

      <div id="userDropdown" class="user-dropdown" role="menu" aria-labelledby="userMenuButton" hidden>
        <a href="{{ route('logout') }}" role="menuitem" class="dropdown-item"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </div>
  </header>

  <div class="dashboard-container">
    <aside class="sidebar">
  <nav>
    <ul>
      <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-house"></i> Dashboard</a></li>
      <li><a href="{{ route('admin.roles.index') }}"><i class="fas fa-user-shield"></i> Role Management</a></li>
      <li><a href="{{ route('admin.campaigns.index') }}"><i class="fas fa-bullhorn"></i> Campaign Management</a></li>
      <li><a href="{{ route('admin.withdrawals.index') }}"><i class="fas fa-wallet"></i> Withdrawal Management</a></li>
      <!-- <li><a href="#"><i class="fas fa-star"></i> Featured Campaigns</a></li> -->
      <li><a href="{{ route('admin.earnings') }}"><i class="fas fa-wallet"></i> Platform Earnings</a></li>
    </ul>
  </nav>
</aside>


    <main class="main-content">
      @yield('content')
    </main>
  </div>

  @include('layouts.footer')

  {{-- Hidden logout form for POST request --}}
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>

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
