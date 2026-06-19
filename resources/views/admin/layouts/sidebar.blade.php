<div class="sidebar">

    <div class="p-3 text-white border-bottom">
        <div class="brand">
            Betikrom Trade
        </div>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-primary' : '' }}">
        <i class="bi bi-speedometer2"></i>
        Dashboard
    </a>

    <a data-bs-toggle="collapse" href="#carMenu" class="{{ request()->routeIs('admin.cars.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-car-front-fill"></i>
        Cars
    </a>

    <div class="collapse show" id="carMenu">
        <a class="ps-5" href="{{ route('admin.cars.index') }}">
            All Cars
        </a>
        <a class="ps-5" href="{{ route('admin.cars.create') }}">
            Add Car
        </a>
    </div>

    <a data-bs-toggle="collapse" href="#showroomMenu"
        class="{{ request()->routeIs('admin.showrooms.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-shop"></i>
        Showrooms
    </a>

    <div class="collapse {{ request()->routeIs('admin.showrooms.*') ? 'show' : '' }}" id="showroomMenu">
        <a class="ps-5" href="{{ route('admin.showrooms.index') }}">
            All Showrooms
        </a>
        <a class="ps-5" href="{{ route('admin.showrooms.create') }}">
            Add Showroom
        </a>
    </div>

    <a href="{{ route('admin.banners.index') }}"
        class="{{ request()->routeIs('admin.banners.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-images"></i>
        Banners
    </a>

    <a href="{{ route('admin.messages.index') }}"
        class="{{ request()->routeIs('admin.messages.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-envelope"></i>
        Messages
    </a>

    <a href="{{ route('admin.about-us.edit') }}"
        class="{{ request()->routeIs('admin.about-us.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-info-circle"></i>
        About Us
    </a>

    <a href="{{ route('admin.social-media.edit') }}"
        class="{{ request()->routeIs('admin.social-media.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-share"></i>
        Social Media
    </a>

    <a href="{{ route('profile.edit') }}">
        <i class="bi bi-person-circle"></i>
        Profile
    </a>

    <a href="{{ route('admin.settings.edit') }}"
        class="{{ request()->routeIs('admin.settings.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-gear"></i>
        Settings
    </a>

</div>
