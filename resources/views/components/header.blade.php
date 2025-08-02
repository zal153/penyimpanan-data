<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    {{-- Search form dengan placeholder yang sesuai --}}
    <form class="form-inline mr-auto searchform text-muted">
        <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
            placeholder="Cari berkas..." aria-label="Search">
    </form>
    <ul class="nav">
        {{-- Dark/Light mode toggle --}}
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
        {{-- Notifikasi dengan badge jumlah --}}
        <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="#" data-toggle="modal" data-target=".modal-notif">
                <span class="fe fe-bell fe-16"></span>
                <span class="dot dot-md bg-danger"></span>
            </a>
        </li>
        {{-- Profile dropdown dengan data statis --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="{{ asset('assets/avatars/face-1.jpg') }}" alt="Avatar" class="avatar-img rounded-circle">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <div class="dropdown-item text-muted">
                    <small>{{ auth()->user()->name }}</small><br>
                    <small>{{ auth()->user()->email }}</small>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fe fe-user fe-12 mr-2"></i>Profil Saya
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fe fe-settings fe-12 mr-2"></i>Pengaturan
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fe fe-log-out fe-12 mr-2"></i>Log Out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
