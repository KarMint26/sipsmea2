<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIP SMEA</title>
    <link rel="shortcut icon" href="{{ asset('src/assets/favicon.ico') }}" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}" />
</head>

<body>
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
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
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
                            <a class="nav-link" href="/#list_pkl">Daftar Tempat PKL</a>
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

    <!-- Landing Page -->
    <section id="hero_landing">
        <div
            class="wrapper-landing w-100 d-flex justify-content-between align-items-center flex-column flex-lg-row gap-5">
            <div class="content">
                <h1>SELAMAT DATANG</h1>
                <p>
                    Mulai Mempertimbangkan dan Memutuskan Tempat Praktek Kerja
                    Lapanganmu Lewat Website SIP SMEA Dengan Daftar Tempat Praktek Kerja
                    Lapangan Yang Disediakan.
                </p>
                @if (Auth::user() && Auth::user()->role == 'siswa')
                    <a href="/student" class="btn-sip-wide">
                        <i class="bi bi-skip-start-circle-fill me-2"></i> Mulai Sekarang
                    </a>
                @else
                    <a href="/login" class="btn-sip-wide">
                        <i class="bi bi-skip-start-circle-fill me-2"></i> Mulai Sekarang
                    </a>
                @endif
            </div>
            <img src="{{ asset('src/assets/hero-landing.svg') }}" alt="hero-landing" />
        </div>
    </section>

    <!-- Daftar Tempat PKL -->
    <section id="list_pkl">
        <h1><span style="color: var(--primaryColor)">DAFTAR</span> TEMPAT PKL</h1>
        <div class="grid-custom">
            @foreach ($pkl_places as $key => $pkl)
                <div class="card" style="width: 18rem">
                    <img src="{{ $pkl->image_url }}" class="card-img-top" style="width: 100%; height: 200px;" alt="card-1" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $pkl->title }}</h5>
                        <div class="d-flex">
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            <p>
                                {{ $pkl->location }}
                            </p>
                        </div>
                        <p><i class="bi bi-telephone-fill me-2"></i> {{ $pkl->telephone }}</p>
                        <p><i class="bi bi-clock-fill me-2"></i> {{ $pkl->open_time }}</p>
                        <a href="{{ $pkl->link_gmaps }}" target="_blank" class="btn-sip mt-2"><i
                                class="bi bi-map-fill me-1 me-md-2"></i>
                            Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
        integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('src/js/index.js') }}"></script>

    @if (session('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ session('message') }}")
        </script>
    @elseif (session('error'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.error("{{ session('error') }}")
        </script>
    @endif
</body>

</html>
