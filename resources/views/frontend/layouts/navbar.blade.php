<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('/') }}">

            @if($setting->logo ?? null)
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->site_name }}" height="40">
            @else
                {{ $setting->site_name ?? 'Betikrom Trade' }}
            @endif
        </a>



        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active fw-semibold' : '' }}" href="{{ url('/') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('cars*') ? 'active fw-semibold' : '' }}"
                        href="{{ url('/cars') }}">
                        Cars
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about-us') ? 'active fw-semibold' : '' }}"
                        href="{{ url('/about-us') }}">
                        About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('showrooms') ? 'active fw-semibold' : '' }}"
                        href="{{ url('/showrooms') }}">
                        Showrooms
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active fw-semibold' : '' }}"
                        href="{{ url('/contact') }}">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>