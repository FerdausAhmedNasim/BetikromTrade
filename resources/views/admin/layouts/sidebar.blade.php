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

</div>
