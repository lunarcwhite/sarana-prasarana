<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('landing') }}">
        <div class="sidebar-brand-icon">
            <img src="{{asset('img/logo/logo2.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    @can('admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        <span class="text-dark"> Master Data</span>
    </div>
    <li class="nav-item">
        <a href="{{ route('dashboard.akun.index') }}" class="nav-link">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Kelola Akun</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('dashboard.kategori.index') }}" class="nav-link">
            <i class="fa fa-tags" aria-hidden="true"></i>
            <span>Kelola Kategori</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.sarana_prasarana.index')}}">
            <i class="fa fa-database" aria-hidden="true"></i>
            <span>Kelola Sarana Prasarana</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Menu
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
            aria-expanded="true" aria-controls="collapsePage">
            <i class="fas fa-fw fa-columns"></i>
            <span>Kelola Peminjaman</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('dashboard.peminjaman.pending')}}">Pending</a>
                <a class="collapse-item" href="{{route('dashboard.peminjaman.berlangsung')}}">Berlangsung</a>
                <a class="collapse-item" href="{{route('dashboard.peminjaman.ditolak')}}">Ditolak</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.rekapan.index')}}">
            <i class="fa fa-history" aria-hidden="true"></i>
            <span>Rekapan Peminjaman</span>
        </a>
    </li>
    @endcan
    @can('user')
    <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.user.peminjaman_berlangsung')}}">
            <i class="fa fa-fw fa-columns" aria-hidden="true"></i>
            <span>Peminjaman</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.user.riwayat_peminjaman')}}">
            <i class="fa fa-history" aria-hidden="true"></i>
            <span>Riwayat Peminjaman</span>
        </a>
    </li>
    @endcan
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
