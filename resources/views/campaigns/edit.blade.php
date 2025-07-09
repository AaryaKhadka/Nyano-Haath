<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Campaign - Nyano Haath</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
</head>
<body>

<header class="dashboard-header">
    <h1>Edit Campaign</h1>
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

    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('campaigns.update', $campaign) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Campaign Title</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                value="{{ old('title', $campaign->title) }}" 
                required 
            />
        </div>

        <div class="form-group">
            <label for="description">Campaign Description</label>
            <textarea 
                id="description" 
                name="description" 
                rows="5" 
                required
            >{{ old('description', $campaign->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="goal_amount">Goal Amount (Rs.)</label>
            <input 
                type="number" 
                id="goal_amount" 
                name="goal_amount" 
                value="{{ old('goal_amount', $campaign->goal_amount) }}" 
                required 
                min="1" 
                step="0.01" 
            />
        </div>

        <div class="form-group buttons">
            <button type="submit" class="submit-btn">Update Campaign</button>
            <a href="{{ route('dashboard') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</main>

<footer class="dashboard-footer">
    <p>© 2025 Nyano Haath. All rights reserved.</p>
</footer>

</body>
</html>
