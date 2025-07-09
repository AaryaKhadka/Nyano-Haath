<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Dashboard - Nyano Haath</title>

    <!-- Link your CSS here -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
</head>
<body>

    <header class="dashboard-header">
        <h1>Welcome, {{ auth()->user()->name }}</h1>
        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('campaigns.create') }}">Add Campaign</a>
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
                            <a href="{{ route('campaigns.show', $campaign) }}" class="view-btn">View</a> |
                            <a href="{{ route('campaigns.edit', $campaign) }}" class="edit-btn">Edit</a> |
                            <form action="{{ route('campaigns.destroy', $campaign) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>You have no campaigns yet. <a href="{{ route('campaigns.create') }}">Create one now</a>.</p>
        @endif
    </main>

    <footer class="dashboard-footer">
        <p>© 2025 Nyano Haath. All rights reserved.</p>
    </footer>

</body>
</html>
