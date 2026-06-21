<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Betikrom Trade Admin')
    </title>

    <meta name="description" content="@yield('description', 'Betikrom Trade Admin Panel')">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body { overflow-x: hidden; }

        .sidebar {
            min-height: 100vh;
            background: #212529;
            width: 260px;
            transition: width 0.3s ease, transform 0.3s ease;
            position: relative;
            z-index: 1040;
        }

        .sidebar.collapsed { width: 70px; }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            white-space: nowrap;
            overflow: hidden;
            position: relative;
        }

        .sidebar a i { font-size: 18px; min-width: 22px; }

        .sidebar a:hover { background: #343a40; }

        .sidebar .link-text { margin-left: 10px; }

        .sidebar.collapsed .link-text,
        .sidebar.collapsed .brand-text { display: none; }

        .sidebar.collapsed .submenu { display: none !important; }

        .content {
            flex-grow: 1;
            transition: 0.3s;
            min-width: 0;
        }

        .sidebar-toggle-btn {
            background: #343a40;
            border: none;
            color: #fff;
            width: 100%;
            padding: 14px 20px;
            text-align: left;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #495057;
        }

        .sidebar-toggle-btn:hover { background: #495057; }

        .sidebar-toggle-btn i {
            font-size: 20px;
            transition: transform 0.3s ease;
        }

        .sidebar.collapsed .sidebar-toggle-btn i { transform: rotate(180deg); }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1030;
        }

        .sidebar-overlay.show { display: block; }

        .mobile-toggle-btn {
            display: none;
            background: #212529;
            color: #fff;
            border: none;
            padding: 10px 14px;
            font-size: 20px;
            border-radius: 4px;
            position: relative;
            z-index: 1050;
        }

        @media (max-width: 768px) {

            .sidebar {
                position: fixed;
                top: 0; left: 0;
                height: 100vh;
                transform: translateX(-100%);
                width: 260px !important;
            }

            .sidebar.mobile-open { transform: translateX(0); }

            .mobile-toggle-btn { display: inline-block; }

            .sidebar-toggle-btn { display: none; }
        }
    </style>

</head>

<body>

<div class="d-flex">

    @include('admin.layouts.sidebar')

    <div class="content">

        @include('admin.layouts.navbar')

        <div class="container-fluid py-4">
            @yield('content')
        </div>

    </div>

</div>

<div id="sidebarOverlay" class="sidebar-overlay"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    const mobileToggleBtn = document.getElementById('mobileSidebarToggle');
    const toggleBtn = document.getElementById('sidebarToggleBtn');

    // Desktop state restore
    if (window.innerWidth > 768 &&
        localStorage.getItem('sidebarCollapsed') === 'true') {
        sidebar.classList.add('collapsed');
    }

    // Desktop toggle
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('collapsed');
            localStorage.setItem(
                'sidebarCollapsed',
                sidebar.classList.contains('collapsed')
            );
        });
    }

    // Open mobile sidebar
    function openSidebar() {
        sidebar.classList.add('mobile-open');
        overlay.classList.add('show');
    }

    // Close mobile sidebar
    function closeSidebar() {
        sidebar.classList.remove('mobile-open');
        overlay.classList.remove('show');
    }

    if (mobileToggleBtn) {
        mobileToggleBtn.addEventListener('click', openSidebar);
    }

    overlay.addEventListener('click', closeSidebar);

    // 🔥 IMPORTANT FIX: submenu logic
    sidebar.querySelectorAll('a').forEach(link => {

        link.addEventListener('click', function () {

            if (window.innerWidth > 768) return;

            // যদি parent menu (Car/Showroom) হয় → sidebar বন্ধ হবে না
            const isParentMenu =
                this.getAttribute('data-bs-toggle') === 'collapse' ||
                this.classList.contains('submenu-toggle');

            if (isParentMenu) return;

            // submenu item click → sidebar close
            closeSidebar();

        });

    });

    // resize reset
    window.addEventListener('resize', function () {
        if (window.innerWidth > 768) {
            closeSidebar();
        }
    });

});
</script>

@if (session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Success',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

@yield('scripts')

</body>

@include('admin.layouts.footer')

</html>