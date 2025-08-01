<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="{{ route('dashboard') }}" aria-expanded="false" class="nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>
        </ul>

        {{-- Menu Regular User --}}
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Manajemen Berkas</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item">
                <a href="#berkas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-file fe-16"></i>
                    <span class="ml-3 item-text">Berkas Pribadi</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="berkas">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('berkas.index') }}"><span class="ml-1">Semua Berkas</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./files-shared"><span class="ml-1">Berkas Dibagikan</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./files-received"><span class="ml-1">Berkas Diterima</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#kategori" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-folder fe-16"></i>
                    <span class="ml-3 item-text">Kategori</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="kategori">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./category-list"><span class="ml-1">Daftar Kategori</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#tag" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-tag fe-16"></i>
                    <span class="ml-3 item-text">Tag</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="tag">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./tag-list"><span class="ml-1">Daftar Tag</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#pengaturan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-settings fe-16"></i>
                    <span class="ml-3 item-text">Pengaturan</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="pengaturan">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./settings/profile"><span class="ml-1">Profil</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./settings/password"><span class="ml-1">Password</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./settings/notifications"><span
                                class="ml-1">Notifikasi</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="./activities" class="nav-link">
                    <i class="fe fe-activity fe-16"></i>
                    <span class="ml-3 item-text">Aktivitas</span>
                </a>
            </li>
        </ul>

        {{-- Menu Admin --}}
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Administrator</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item">
                <a href="#pengguna" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Pengguna</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="pengguna">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./users"><span class="ml-1">Daftar Pengguna</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./users/create"><span class="ml-1">Tambah
                                Pengguna</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#storage" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-hard-drive fe-16"></i>
                    <span class="ml-3 item-text">Penyimpanan</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="storage">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./storage/overview"><span class="ml-1">Ringkasan</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./storage/settings"><span class="ml-1">Pengaturan</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#system" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-settings fe-16"></i>
                    <span class="ml-3 item-text">Sistem</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="system">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./backup"><span class="ml-1">Backup & Restore</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./logs"><span class="ml-1">Log Sistem</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
