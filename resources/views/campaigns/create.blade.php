<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Campaigns - Nyano Haath</title>

    <!-- Link your CSS here -->
    <link rel="stylesheet" href="{{ asset('css/create.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
      integrity="sha512-..."
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>

<div class="dashboard-container">
    <header class="header">
        <a href="{{ route('home')}}" class="logo">
            <img src="{{ asset('image/nyanologo.jpg')}}" alt="Nyano Haat Logo" >
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
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}">
                            <i class="fa-solid fa-house"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('campaigns.create') }}">
                            <i class="fa-solid fa-bullhorn"></i>
                            <span>Add Campaign</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            <i class="fa-solid fa-wallet"></i>
                            <span>Withdraw</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            <i class="fa-solid fa-circle-question"></i>
                            <span>FAQ</span>
                        </a>
                    </li>
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
            
            <a href="{{ route('dashboard') }}" class="back-button">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>

            <h1>Create New Campaign</h1>

            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data" class="profile-form">
                @csrf

                <div class="form-group">
                    <label for="title">Campaign Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required />
                </div>

                <div class="form-group">
                    <label for="description">Campaign Description</label>
                    <textarea id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="goal_amount">Goal Amount (Rs.)</label>
                    <input type="number" id="goal_amount" name="goal_amount" value="{{ old('goal_amount') }}" required min="1" step="0.01" />
                </div>

                <div class="form-group">
                    <label for="country">District</label>
                    <input type="text" id="country" name="country" value="{{ old('country') }}" required />
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category" required>
                        <option value="" disabled selected>Select category</option>
                        <option value="education" {{ old('category') == 'education' ? 'selected' : '' }}>Education</option>
                        <option value="health" {{ old('category') == 'health' ? 'selected' : '' }}>Health</option>
                        <option value="disaster_relief" {{ old('category') == 'disaster_relief' ? 'selected' : '' }}>Disaster Relief</option>
                        <option value="animal_welfare" {{ old('category') == 'animal_welfare' ? 'selected' : '' }}>Animal Welfare</option>
                        <option value="environment" {{ old('category') == 'environment' ? 'selected' : '' }}>Environment</option>
                        <option value="arts_culture" {{ old('category') == 'arts_culture' ? 'selected' : '' }}>Arts & Culture</option>
                        <option value="community_development" {{ old('category') == 'community_development' ? 'selected' : '' }}>Community Development</option>
                        <option value="sports" {{ old('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="campaign_image">Campaign Image</label>
                    <input type="file" id="campaign_image" name="campaign_image" accept="image/*" required />
                </div>

                <div class="form-group">
                    <label for="verification_document">Verification Document (Proof)</label>
                    <input type="file" id="verification_document" name="verification_document" accept=".pdf,.jpg,.jpeg,.png" required />
                    <small>Please upload documents (PDF or image) to verify your cause is genuine.</small>
                </div>

                <div class="form-group buttons">
                    <button type="submit" class="submit-btn">Create Campaign</button>
                    <a href="{{ route('dashboard') }}" class="btn-cancel">Cancel</a>
                </div>
            </form>
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
        if (expanded) {
            dropdown.hidden = true;
        } else {
            dropdown.hidden = false;
        }
    }

    // Close dropdown when clicking outside
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
