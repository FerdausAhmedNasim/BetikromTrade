<nav class="navbar navbar-light bg-light border-bottom navbar-wrapper">
    <div class="container-fluid">
        <div class="d-flex align-items-center gap-2">
            <button class="mobile-toggle-btn" id="mobileSidebarToggle" type="button">
                <i class="bi bi-list"></i>
            </button>
            <span class="navbar-brand mb-0">
                Admin Panel
            </span>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                {{ auth()->user()->name }}
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        Profile
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>