<ul class="navbar-nav bg-gray-800 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-newspaper"></i>
        </div>
        <div class="sidebar-brand-text mx-3">AKMALOID</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Data Master -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataMaster"
            aria-expanded="true" aria-controls="collapseDataMaster">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseDataMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.kategoriproduk') }}"><i class="fa-solid fa-boxes-packing"></i> Kategori Produk</a>
                <a class="collapse-item" href="{{ route('admin.penerbit') }}"><i class="fa-solid fa-industry"></i> Penerbit</a>
                <a class="collapse-item" href="{{ route('admin.periode') }}"><i class="fa-solid fa-calendar-days"></i> Periode</a>
                <a class="collapse-item" href="{{ route('admin.paket') }}"><i class="fa-solid fa-cubes"></i> Paket</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pemesanan') }}">
            <i class="fa-solid fa-list-check"></i>
            <span>Pemesanan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataPembayaran"
            aria-expanded="true" aria-controls="collapseDataPembayaran">
            <i class="fa-solid fa-comments-dollar"></i>
            <span>Pembayaran</span>
        </a>
        <div id="collapseDataPembayaran" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.validasipembayaran') }}"><i class="fa-solid fa-file-invoice-dollar"></i> Validasi Pembayaran</a>
                <a class="collapse-item" href="{{ route('admin.wallet') }}"><i class="fa-solid fa-wallet"></i> Wallet</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pemasukan') }}">
            <i class="fa-solid fa-chart-line"></i>
            <span>Laporan Pemasukan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.feedback') }}">
            <i class="fa-solid fa-comments"></i>
            <span>Feed Back</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.user') }}">
            <i class="fas fa-fw fa-users-gear"></i>
            <span>User Management</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.slideshow') }}">
            <i class="fas fa-fw fa-panorama"></i>
            <span>Slide Show</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
