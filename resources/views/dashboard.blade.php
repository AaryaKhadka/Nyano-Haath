<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Dashboard - Nyano Haath</title>

    <!-- Link your CSS here -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />
</head>
<body>

<div class="dashboard-container">
    <header class="header">

        <a href="{{ route('home')}}" class="logo">
            <img src="{{ asset('image/nyanologo.jpg')}}" alt="Nyano Haat Logo" >
        </a> 
        

        <!-- User Dropdown -->
        <div class="user-menu-wrapper" tabindex="0">
            <button id="userMenuButton" class="user-icon-btn" aria-haspopup="true" aria-expanded="false" title="User Menu">
                <i class="fas fa-user-circle fa-xl"></i>
            </button>

            <div id="userDropdown" class="user-dropdown" role="menu" aria-labelledby="userMenuButton" hidden>
                <a href="{{ route('profile.edit') }}" role="menuitem" class="dropdown-item">
                    <i class="fas fa-user-edit"></i> Update Profile
                </a>
                <!-- <a href="#" role="menuitem" class="dropdown-item">
                    <i class="fas fa-bell"></i> Notifications
                </a> -->
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
            <li class="nav-item active">
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
                <a href="{{ route('withdraw.index') }}">
                    <i class="fas fa-wallet"></i>
                    <span>Withdraw</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('withdraw.transactions') }}">
                    <i class="fas fa-list"></i>
                    <span>Transaction History</span>
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
            <h1>Welcome, {{ auth()->user()->name }}</h1>

            <section class="campaigns-section">
                <h2>Your Campaigns</h2>

                @if(session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                @if($campaigns->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Goal Amount</th>
                                <th>Raised Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($campaigns as $campaign)
                                <tr>
                                    <td>{{ $campaign->title }}</td>
                                    <td>Rs. {{ number_format($campaign->goal_amount, 2) }}</td>
                                    <td>Rs. {{ number_format($campaign->raised_amount, 2) }}</td>
                                    <td>{{ ucfirst($campaign->status) }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('creators.view', $campaign) }}" class="view-btn">View</a>
                                            <a href="{{ route('campaigns.edit', $campaign) }}" class="edit-btn">Edit</a>
                                            @if($campaign->status === 'pending')
                                            <form action="{{ route('campaigns.destroy', $campaign) }}" method="POST" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this campaign?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-btn">Delete</button>
                                                </form>
                                                @endif

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>You have no campaigns yet. <a href="{{ route('campaigns.create') }}">Create one now</a>.</p>
                @endif
            </section>
        </main>
    </div>
    @include('layouts.footer')
</div>

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
