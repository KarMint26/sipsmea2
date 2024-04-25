<!-- Navbar -->
<nav class="navbar fixed-top shadow-sm navbar-expand-lg">
    <div class="container-fluid px-3 px-md-4 px-lg-5">
        <a class="navbar-brand" href="/"><img class="img-brand" src="{{ asset('src/assets/long-icon.svg') }}"
                alt="icon" /></a>
        <button
            style="
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
      "
            class="navbar-toggler ms-auto d-lg-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="fs-1">
                <i class="bi bi-list"></i>
            </span>
        </button>
        <ul class="navbar-nav w-100 d-none d-lg-flex justify-content-end align-items-center gap-3">
            <li class="nav-item">
                <a class="nav-link" href="/">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#list_pkl">Daftar Tempat PKL</a>
            </li>
            @if (Auth::user() && Auth::user()->role == 'admin')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn-custom-dropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/admin/dashboard"><i
                                    class="me-1 me-md-2 bi bi-grid-fill"></i> Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                    class="me-1 me-md-2 bi bi-box-arrow-left"></i> Logout</a></li>
                    </ul>
                </li>
            @elseif (Auth::user() && Auth::user()->role == 'siswa')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn-custom-dropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start">
                        <li><a class="dropdown-item" href="/student"><i class="me-1 me-md-2 bi bi-grid-fill"></i>
                                Sistem SPK</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                    class="me-1 me-md-2 bi bi-box-arrow-left"></i> Logout</a></li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a class="btn-sip" href="/login">Login</a>
                </li>
            @endif
        </ul>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <div class="offcanvas-title" id="offcanvasNavbarLabel">
                    <img class="img-brand" src="{{ asset('src/assets/long-icon.svg') }}" alt="icon" />
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body px-4 d-lg-none">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dtp" href="/#list_pkl">Daftar Tempat PKL</a>
                    </li>
                    @if (Auth::user() && Auth::user()->role == 'admin')
                        <li class="nav-item dropdown mt-2">
                            <a class="nav-link dropdown-toggle btn-custom-dropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-start">
                                <li><a class="dropdown-item" href="/admin/dashboard"><i
                                            class="me-1 me-md-2 bi bi-grid-fill"></i> Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                            class="me-1 me-md-2 bi bi-box-arrow-left"></i> Logout</a></li>
                            </ul>
                        </li>
                    @elseif (Auth::user() && Auth::user()->role == 'siswa')
                        <li class="nav-item dropdown mt-2">
                            <a class="nav-link dropdown-toggle btn-custom-dropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-start">
                                <li><a class="dropdown-item" href="/student"><i
                                            class="me-1 me-md-2 bi bi-grid-fill"></i> Sistem SPK</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                            class="me-1 me-md-2 bi bi-box-arrow-left"></i> Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn-sip" href="/login">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
