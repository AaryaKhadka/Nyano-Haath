<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>View Campaign - Nyano Haath</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
</head>
<body>

<header class="dashboard-header">
    <h1>{{ $campaign->title }}</h1>
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('logout.redirect') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
           Logout
        </a>
        <form id="logout-form" action="{{ route('logout.redirect') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </nav>
</header>

<main class="dashboard-main">
    <h2>Description</h2>
    <p>{{ $campaign->description }}</p>

    <h3>Goal Amount: Rs. {{ number_format($campaign->goal_amount, 2) }}</h3>
    <h3>Raised Amount: Rs. {{ number_format($campaign->raised_amount, 2) }}</h3>
    <h3>Status: {{ ucfirst($campaign->status) }}</h3>
</main>

<footer class="dashboard-footer">
    <p>© 2025 Nyano Haath. All rights reserved.</p>
</footer>

</body>
</html>
