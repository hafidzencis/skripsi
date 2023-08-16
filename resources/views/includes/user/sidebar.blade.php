<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index-dashboard-user')}}">
        <img src="{{url('backend/img/logo-koperasi.png')}} " alt="" srcset="" class="img-fluid">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('index-dashboard-user') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('index-dashboard-user')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Route::is('simpanan*') ? 'active' : ''}} ">
        <a class="nav-link collapsed" href="{{ route('simpanan-user')}}">
            <i class='fas fa-warehouse'></i>
            <span>Simpanan</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Route::is('pinjaman*') ? 'active' : ''}} ">
        <a class="nav-link collapsed" href="{{ route('pinjaman-user')}}">
            <i class='fas fa-money-bill'></i>
            <span>Pinjaman</span>
        </a>
    </li>

    <li class="nav-item {{ Route::is('angsuran*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{ route('angsuran-user')}}">
            <i class='fas fa-money-bill-wave'></i>
            <span>Angsuran</span>
        </a>
    </li>

    <li class="nav-item {{ Route::is('ubahdatadiri*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{ route('ubahdatadiri-user')}}">
            <i class='fa fa-user-circle'></i>
            <span>Ubah data diri</span>
        </a>
    </li>

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->