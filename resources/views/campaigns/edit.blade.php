<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Campaign - Nyano Haath</title>
    
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />
</head>
<body>
<div class="dashboard-container">
    <!-- Header -->
    <header class="header">
        <a href="{{ route('home')}}" class="logo">
            <img src="{{ asset('image/nyanologo.jpg')}}" alt="Nyano Haat Logo" >
        </a> 
        
        <div class="user-menu-wrapper" tabindex="0">
            <button id="userMenuButton" class="user-icon-btn">
                <i class="fas fa-user-circle fa-xl"></i>
            </button>
            <div id="userDropdown" class="user-dropdown" hidden>
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="fas fa-user-edit"></i> Update Profile
                </a>
                <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout.redirect') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </header>

    <!-- Layout -->
    <div class="main-layout">
        <aside class="sidebar">
            <nav>
                <ul class="nav-list">
                    <li class="nav-item"><a href="{{ route('dashboard') }}"><i class="fas fa-house"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a href="{{ route('campaigns.create') }}"><i class="fas fa-bullhorn"></i><span>Add Campaign</span></a></li>
                    <li class="nav-item"><a href="{{ route('withdraw.index') }}"><i class="fas fa-wallet"></i><span>Withdraw</span></a></li>
<a href="{{ route('withdraw.transactions') }}">
                            <i class="fas fa-list"></i>
                            <span>Transaction History</span>
                        </a>                    <li class="nav-item logout-item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="content-area">

         <a href="{{ route('dashboard') }}" class="back-button">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>


            <h1>Edit Campaign</h1>

            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('campaigns.update', $campaign) }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $campaign->title) }}" required />
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="5" required>{{ old('description', $campaign->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="goal_amount">Goal Amount (Rs.)</label>
                    <input type="number" id="goal_amount" name="goal_amount" value="{{ old('goal_amount', $campaign->goal_amount) }}" min="1" required />
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <select id="country" name="country" required>
                        <option value="Nepal" {{ old('country', $campaign->country) == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                        <option value="India" {{ old('country', $campaign->country) == 'India' ? 'selected' : '' }}>India</option>
                        <option value="Others" {{ old('country', $campaign->country) == 'Others' ? 'selected' : '' }}>Others</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Campaign Image</label>
                    <input type="file" id="image" name="image" accept="image/*" />
                </div>

                <div class="form-group">
                    <label for="documents">Supporting Documents</label>
                    <input type="file" id="documents" name="documents[]" multiple />
                </div>

                <div class="form-group form-actions">
                    <button type="submit" class="btn-save">Update Campaign</button>
                    <a href="{{ route('dashboard') }}" class="btn-cancel">Cancel</a>
                </div>
            </form>
        </main>
    </div>
    @include('layouts.footer')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userMenuBtn = document.getElementById('userMenuButton');
        const userDropdown = document.getElementById('userDropdown');

        userMenuBtn.addEventListener('click', function (e) {
            e.preventDefault();
            const isHidden = userDropdown.hasAttribute('hidden');
            if (isHidden) {
                userDropdown.removeAttribute('hidden');
            } else {
                userDropdown.setAttribute('hidden', '');
            }
        });

        document.addEventListener('click', function (e) {
            if (!userMenuBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.setAttribute('hidden', '');
            }
        });
    });
</script>
</body>
</html>
