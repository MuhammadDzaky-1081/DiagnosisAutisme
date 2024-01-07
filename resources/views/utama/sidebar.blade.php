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
                <a href="{{ route('halaman_utama') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Menu Utama</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Login</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
