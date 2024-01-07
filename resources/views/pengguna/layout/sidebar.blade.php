<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand" align="center">
            <img src="{{ asset('logo/logo2.png') }}" alt="" style="width:50px;">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('pasien.home') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Beranda Pasien</span>
                </a>
            </li>
            <li class="nav-item nav-category">Pages</li>
            <li class="nav-item">
                <a href="{{ route('pasien.profil') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Data Profil</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('konsultasi') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Konsultasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('riwayat') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Data Riwayat</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
