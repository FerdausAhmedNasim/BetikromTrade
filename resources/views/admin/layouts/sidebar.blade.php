<div class="sidebar" id="sidebar">
    <button class="sidebar-toggle-btn" id="sidebarToggleBtn" type="button">
        <span class="brand-text">Menu</span>
        <i class="bi bi-layout-sidebar-inset"></i>
    </button>

    <div class="p-3 text-white border-bottom brand-box">
        <p class="brand brand-text mb-0">
            Betikrom Trade
        </p>
    </div>

    <a href="{{ route('admin.dashboard') }}" data-title="Dashboard"
        class="{{ request()->routeIs('admin.dashboard') ? 'bg-primary' : '' }}">
        <i class="bi bi-speedometer2"></i>
        <span class="link-text">Dashboard</span>
    </a>

    <a data-bs-toggle="collapse" href="#carMenu" data-title="Cars"
        class="{{ request()->routeIs('admin.cars.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-car-front-fill"></i>
        <span class="link-text">Cars</span>
    </a>
    <div class="collapse show submenu" id="carMenu">
        <a class="ps-5" href="{{ route('admin.cars.index') }}">
            <span class="link-text">All Cars</span>
        </a>
        <a class="ps-5" href="{{ route('admin.cars.create') }}">
            <span class="link-text">Add Car</span>
        </a>
    </div>

    <a data-bs-toggle="collapse" href="#showroomMenu" data-title="Showrooms"
        class="{{ request()->routeIs('admin.showrooms.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-shop"></i>
        <span class="link-text">Showrooms</span>
    </a>
    <div class="collapse submenu {{ request()->routeIs('admin.showrooms.*') ? 'show' : '' }}" id="showroomMenu">
        <a class="ps-5" href="{{ route('admin.showrooms.index') }}">
            <span class="link-text">All Showrooms</span>
        </a>
        <a class="ps-5" href="{{ route('admin.showrooms.create') }}">
            <span class="link-text">Add Showroom</span>
        </a>
    </div>

    <a href="{{ route('admin.banners.index') }}" data-title="Banners"
        class="{{ request()->routeIs('admin.banners.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-images"></i>
        <span class="link-text">Banners</span>
    </a>
    <a href="{{ route('admin.messages.index') }}" data-title="Messages"
        class="{{ request()->routeIs('admin.messages.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-envelope"></i>
        <span class="link-text">Messages</span>
    </a>
    <a href="{{ route('admin.about-us.edit') }}" data-title="About Us"
        class="{{ request()->routeIs('admin.about-us.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-info-circle"></i>
        <span class="link-text">About Us</span>
    </a>
    <a href="{{ route('admin.social-media.edit') }}" data-title="Social Media"
        class="{{ request()->routeIs('admin.social-media.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-share"></i>
        <span class="link-text">Social Media</span>
    </a>
    <a href="{{ route('profile.edit') }}" data-title="Profile">
        <i class="bi bi-person-circle"></i>
        <span class="link-text">Profile</span>
    </a>
    <a href="{{ route('admin.settings.edit') }}" data-title="Settings"
        class="{{ request()->routeIs('admin.settings.*') ? 'bg-primary' : '' }}">
        <i class="bi bi-gear"></i>
        <span class="link-text">Settings</span>
    </a>
</div>

<div class="sidebar-overlay" id="sidebarOverlay"></div>