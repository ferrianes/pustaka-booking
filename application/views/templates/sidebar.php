<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a href="http://localhost/pustaka-booking/user" class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pustaka Booking</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Looping Menu -->
    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a href="<?= base_url('buku/kategori'); ?>" class="nav-link pb-0">
                <i class="fa fa-fw fa-book"></i>
                <span>Kategori Buku</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('buku'); ?>" class="nav-link pb-0">
                <i class="fa fa-fw fa-book"></i>
                <span>Data Buku</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('user/anggota'); ?>" class="nav-link pb-0">
                <i class="fa fa-fw fa-book"></i>
                <span>Data Anggota</span>
            </a>
        </li>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a href="<?= base_url('pinjam'); ?>" class="nav-link pb-0">
                <i class="fa fa-fw fa-shopping-cart"></i>
                <span>Data Peminjaman</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('pinjam/daftarBooking'); ?>" class="nav-link pb-0">
                <i class="fa fa-fw fa-list"></i>
                <span>Data Booking</span>
            </a>
        </li>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a href="<?= base_url('laporan/laporan_buku'); ?>" class="nav-link pb-0">
                <i class="fa fa-fw fa-address-book"></i>
                <span>Laporan Data Buku</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('laporan/laporan_anggota'); ?>" class="nav-link pb-0">
                <i class="fa fa-fw fa-address-book"></i>
                <span>Laporan Data Anggota</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('laporan/laporan_pinjam'); ?>" class="nav-link pb-0">
                <i class="fa fa-fw fa-address-book"></i>
                <span>Laporan Peminjaman</span>
            </a>
        </li>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Sidebar Toogler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of sidebar -->