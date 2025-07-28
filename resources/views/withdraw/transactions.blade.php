<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Transaction History - Nyano Haath</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/transactions.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />
</head>
<body>

<div class="dashboard-container">
    <header class="header">
        <a href="{{ route('home')}}" class="logo">
            <img src="{{ asset('image/nyanologo.jpg')}}" alt="Nyano Haath Logo" >
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
                        <a href="{{ route('withdraw.index') }}">
                            <i class="fas fa-wallet"></i>
                            <span>Withdraw</span>
                        </a>
                    </li>
                    <li class="nav-item active">
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
            <h1>Transaction History</h1>

            <section class="donations-section">
                <h2>Donations Received</h2>
                @if($donations->count())
                    <table class="history-table">
                        <thead>
    <tr>
        <th>Date</th>
        <th>Campaign</th>
        <th>Donor</th>
        <th>Amount (NPR)</th>
        <th>Platform Fee (NPR)</th>
        <th>Net Amount (NPR)</th>
    </tr>
</thead>

                        <tbody>
@foreach($donations as $donation)
    <tr>
        <td>{{ $donation->created_at->format('Y-m-d') }}</td>
        <td>{{ $donation->campaign->title ?? 'N/A' }}</td>
        <td>{{ $donation->donor_name ?? 'Anonymous' }}</td>
        <td>{{ number_format($donation->amount, 2) }}</td>
        <td>{{ number_format($donation->fee, 2) }}</td>
        <td>{{ number_format($donation->netAmount, 2) }}</td>
    </tr>
@endforeach
</tbody>

                    </table>
                @else
                    <p class="no-data">No donations received yet.</p>
                @endif
            </section>

            <section class="withdrawals-section" style="margin-top: 2rem;">
                <h2>Withdrawal Requests</h2>
                @if($withdrawals->count())
                    <table class="history-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Campaign</th>
                                <th>Amount (NPR)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($withdrawals as $withdrawal)
                                <tr>
                                    <td>{{ $withdrawal->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $withdrawal->campaign->title ?? 'N/A' }}</td>
                                    <td>{{ number_format($withdrawal->amount, 2) }}</td>
                                    <td>{{ ucfirst($withdrawal->status) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="no-data">No withdrawal requests yet.</p>
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
