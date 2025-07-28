<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Donor Dashboard - Nyano Haath</title>

    <!-- Your donor dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('css/dBoard.css') }}" />

    <!-- Google Fonts and Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
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
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('image/nyanologo.jpg') }}" alt="Nyano Haath Logo" />
        </a>

        <!-- User Dropdown -->
        <div class="user-menu-wrapper" tabindex="0">
            <button
                id="userMenuButton"
                class="user-icon-btn"
                aria-haspopup="true"
                aria-expanded="false"
                title="User Menu"
                onclick="toggleUserDropdown()"
            >
                <i class="fa-solid fa-user-circle fa-xl"></i>
            </button>

            <div
                id="userDropdown"
                class="user-dropdown"
                role="menu"
                aria-labelledby="userMenuButton"
                hidden
            >
                <a href="{{ route('profile.edit') }}" role="menuitem" class="dropdown-item">
                    <i class="fa-solid fa-user-pen"></i> Update Profile
                </a>
                <a
                    href="#"
                    role="menuitem"
                    class="dropdown-item"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
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
                    <li class="nav-item active">
                        <a href="{{ route('donor.dashboard') }}">
                            <i class="fa-solid fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('feed') }}">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                            <span>Make a Donation</span>
                        </a>
                    </li>
                    <!-- Removed Edit Profile from sidebar -->
                    <li class="nav-item logout-item">
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="content-area">
            <h1>Welcome, {{ Auth::user()->name }}</h1>

            <div class="stats-cards">
                <div class="card">
                    <h2>Total Donations</h2>
                    <p>{{ $totalDonations }}</p>
                </div>
                <div class="card">
                    <h2>Total Amount Donated</h2>
                    <p>Rs. {{ number_format($totalAmount, 2) }}</p>
                </div>
            </div>

            <section class="donation-history">
                <h2>Your Donation History</h2>

                @if($donations->count())
                    <table>
                        <thead>
                            <tr>
                                <th>Campaign</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donations as $donation)
                                <tr>
                                    <td>{{ $donation->campaign->title }}</td>
                                    <td>Rs. {{ number_format($donation->amount, 2) }}</td>
                                    <td>{{ $donation->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>You haven't made any donations yet.</p>
                @endif
            </section>

            
        </main>
    </div>
    @include('layouts.footer')
</div>

<script>
    function toggleUserDropdown() {
        const dropdown = document.getElementById("userDropdown");
        const button = document.getElementById("userMenuButton");
        const expanded = button.getAttribute("aria-expanded") === "true";
        button.setAttribute("aria-expanded", !expanded);
        dropdown.hidden = expanded;
    }

    window.addEventListener("click", function (e) {
        const dropdown = document.getElementById("userDropdown");
        const button = document.getElementById("userMenuButton");
        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.hidden = true;
            button.setAttribute("aria-expanded", false);
        }
    });
</script>

</body>
</html>
