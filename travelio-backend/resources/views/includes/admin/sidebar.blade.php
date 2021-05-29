<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3">
            Travelio Admin
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item{{ request()->is('admin') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Paket Travel -->
    <li class="nav-item{{ request()->is('admin/travel-package') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('travel-package.index') }}">
            <i class="fas fa-fw fa-plane"></i>
            <span>Travel Package</span></a>
    </li>

    <!-- Nav Item - GaleriTravel -->
    <li class="nav-item{{ request()->is('admin/gallery') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('gallery.index') }}">
            <i class="fas fa-fw far fa-image"></i>
            <span>Travel Gallery</span></a>
    </li>

    <!-- Nav Item - Transaksi -->
    <li class="nav-item{{ request()->is('admin/transaction') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('transaction.index') }}">
            <i class="fas fa-fw fas fa-money-check-alt"></i>
            <span>Transaction</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    {{-- <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{ url('backend/img/undraw_rocket.svg') }}" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>
<!-- End of Sidebar -->