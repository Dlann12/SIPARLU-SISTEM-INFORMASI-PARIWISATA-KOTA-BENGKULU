<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-start px-3" href="/admin" style="text-decoration: none;">
    <!-- Logo -->
    <div class="d-flex align-items-center justify-content-center me-2">
        <img src="{{ asset('assets/img/logo.png') }}" 
             alt="Logo" 
             class="img-fluid" 
             style="max-width: 40px; max-height: 40px;">
    </div>
    <!-- Tulisan Admin -->
    <div class="sidebar-brand-text mx-2" style="font-weight: bold; color: #fff;">HI Admin</div>
</a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>SIPARLU</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
<!-- Manajemen Pariwisata -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Manajemen Pariwisata</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opsi:</h6>
            <a class="collapse-item" href="{{ route('admin.pariwisata') }}">Data Pariwisata</a>
            <a class="collapse-item" href="{{ route('admin.pariwisata.tambah') }}">Tambah Pariwisata</a>
        </div>
    </div>
</li>

<!-- Manajemen Fasilitas -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Manajemen Fasilitas</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opsi:</h6>
            <a class="collapse-item" href="{{ route('admin.fasilitas') }}">Data Fasilitas</a>
            <a class="collapse-item" href="{{ route('admin.fasilitas.tambah') }}">Tambah Fasilitas</a>
        </div>
    </div>
</li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->