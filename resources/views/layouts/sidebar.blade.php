<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('materials.create') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Inku</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>


    <li class="nav-item {{ Route::is('materials.create') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('materials.create') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Material</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Produksi
    </div>

    <li class="nav-item {{ Route::is('product.materials') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('product.materials') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Produk Material</span></a>
    </li>

    <li class="nav-item {{ Route::is('product.plan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('product.plan') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Produk Plan</span></a>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
