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
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Beranda Admin</span>
                </a>
            </li>
            <li class="nav-item nav-category">Pages</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#dataakun" role="button" aria-expanded="false"
                    aria-controls="dataakun">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Data Akun</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="dataakun">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('pengguna') }}" class="nav-link">Data Pengguna</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile') }}" class="nav-link">Data Profil</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Data Master</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('kriteria') }}" class="nav-link">Data Kriteria</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('diagnosis') }}" class="nav-link">Data Diagnosis</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('himpunan') }}" class="nav-link">Data Fuzzifikasi</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('aturan') }}" class="nav-link">Data Aturan Inferensi</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('solusi') }}" class="nav-link">Data Defuzzifikasi Solusi</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('pj') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Penanggung Jawab</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#laporan" role="button" aria-expanded="false"
                    aria-controls="laporan">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Data Laporan</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="laporan">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('laporan.master') }}" class="nav-link">Pratinjau Master</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('laporan.riwayat') }}" class="nav-link">Pratinjau Riwayat</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('slider') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Data Artikel</span>
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
