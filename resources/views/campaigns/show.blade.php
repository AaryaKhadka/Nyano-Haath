<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>View Campaign - Nyano Haath</title>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>

<div class="dashboard-container">
  <header class="header">
      <div class="logo">
          <i class="fas fa-hand-holding-heart"></i>
          <h2>Nyano Haath</h2>
      </div>

      <!-- User Dropdown -->
      <div class="user-menu-wrapper" tabindex="0">
          <button id="userMenuButton" class="user-icon-btn" aria-haspopup="true" aria-expanded="false" title="User Menu">
              <i class="fas fa-user-circle fa-xl"></i>
          </button>

          <div id="userDropdown" class="user-dropdown" role="menu" aria-labelledby="userMenuButton" hidden>
              <a href="{{ route('profile.edit') }}" role="menuitem" class="dropdown-item">
                  <i class="fas fa-user-edit"></i> Update Profile
              </a>
              <a href="#" role="menuitem" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt"></i> Logout
              </a>
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
                      <i class="fas fa-house"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('campaigns.create') }}">
                      <i class="fas fa-bullhorn"></i>
                      <span>Add Campaign</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#">
                      <i class="fas fa-wallet"></i>
                      <span>Withdraw</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#">
                      <i class="fas fa-question-circle"></i>
                      <span>FAQ</span>
                  </a>
              </li>
              <li class="nav-item logout-item">
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fas fa-sign-out-alt"></i>
                      <span>Logout</span>
                  </a>
              </li>
          </ul>
      </nav>
    </aside>

    <main class="content-area">
        <a href="{{ route('dashboard') }}" class="back-button">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>

      <h1>{{ $campaign->title }}</h1>

      <section class="campaign-details">
          <h2>Description</h2>
          <p>{{ $campaign->description }}</p>

          <h3>Country: {{ $campaign->country ?? 'N/A' }}</h3>
          <h3>Category: {{ ucfirst(str_replace('_', ' ', $campaign->category)) ?? 'N/A' }}</h3>

          <h3>Goal Amount: Rs. {{ number_format($campaign->goal_amount, 2) }}</h3>
          <h3>Raised Amount: Rs. {{ number_format($campaign->raised_amount, 2) }}</h3>
          <h3>Status: {{ ucfirst($campaign->status) }}</h3>

          @if($campaign->campaign_image)
              <div class="image-link" style="margin-top: 1rem;">
                  <h3>Campaign Image:</h3>
                  <a href="{{ asset('storage/' . $campaign->campaign_image) }}" target="_blank" class="view-image-link">
                      View Image
                      <i class="fas fa-external-link-alt" style="margin-left: 0.3rem;"></i>
                  </a>
              </div>
          @endif

          @if($campaign->verification_document)
              <div style="margin-top: 1rem;">
                  <h3>Verification Document:</h3>
                  <a href="{{ asset('storage/' . $campaign->verification_document) }}" target="_blank" class="view-image-link">
                    View Document
                    <i class="fas fa-external-link-alt" style="margin-left: 0.3rem;"></i>
                  </a>
              </div>
          @endif
      </section>
    </main>
  </div>
  @include('layouts.footer')
</div>

<script>
  // User dropdown toggle logic
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