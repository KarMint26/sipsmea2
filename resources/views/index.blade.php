<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIP SMEA</title>
    <link rel="shortcut icon" href="{{ asset('src/assets/favicon.svg') }}" type="image/svg" />
    <!-- PWA  -->
    <meta name="theme-color" content="#a00a52" />
    <link rel="apple-touch-icon" href="{{ asset('src/assets/favicon.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- GSAP Effect -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}" />

    {{-- Open Graph --}}
    <meta property="og:title" content="SIP SMEA" />
    <meta property="og:description"
        content="Website Sistem Informasi PKL Untuk Pendukung Keputusan Pemilihan Tempat PKL." />
    <meta property="og:image" itemprop="image" content="https://sipsmea.techtitans.id/src/assets/preview.png" />
    <meta property="og:url" content="https://sipsmea.techtitans.id" />
    <meta property="og:type" content="website" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="400" />
</head>

<body>
    <!-- Button back to top -->
    <div class="button-backtop">
        <i class="bi bi-arrow-down"></i>
    </div>

    {{-- Loading Screen --}}
    <div id="loading">
        <div class="custom-loader"></div>
        <div style="font-size: 0.8rem">Sedang mengunduh konten...</div>
    </div>

    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Landing Section -->
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
                    <a href="{{ route('student.index') }}" class="btn-sip-wide">
                        <i class="bi bi-backpack4-fill me-2"></i> Mulai Sekarang
                    </a>
                @elseif(Auth::user() && Auth::user()->role == 'admin')
                    <a href="{{ route('dashboard.index') }}" class="btn-sip-wide">
                        <i class="bi bi-speedometer me-2"></i> Dashboard
                    </a>
                @else
                    <a href="/login" class="btn-sip-wide">
                        <i class="bi bi-skip-start-circle-fill me-2"></i> Mulai Sekarang
                    </a>
                @endif
            </div>
            <img src="{{ asset('src/assets/hero-landing.png') }}" alt="hero-landing" />
        </div>
    </section>

    <!-- Features Section -->
    <section id="features">
        <div class="landing-default mt-5">
            <div class="title-features">
                <h1 class="fw-semibold"><span>Fitur</span> Website</h1>
            </div>
            <div class="box-grid">
                <div class="field-features">
                    <img src="./src/assets/features/decision.svg" alt="features image" />
                    <div class="title">Perhitungan SPK</div>
                    <p>
                        Website ini terdapat perhitungan SPK dengan metode TOPSIS
                        (<i>Technique For Others Reference by Similarity to Ideal Solution</i>).
                    </p>
                </div>
                <div class="field-features">
                    <img src="./src/assets/features/edit.svg" alt="features image" />
                    <div class="title">Edit Profile</div>
                    <p>
                        Anda dapat melakukan edit profile pada navigasi bar, seperti mengganti nama dan juga NISN (Nomor
                        Induk Siswa Nasional).
                    </p>
                </div>
                <div class="field-features">
                    <img src="./src/assets/features/qr.svg" alt="features image" />
                    <div class="title">Login QR Code</div>
                    <p>
                        Anda dapat masuk ke website dengan menggunakan QR Code yang didownload pada
                        navigasi bar diatas saat sudah berhasil masuk.
                    </p>
                </div>
            </div>
            </d>
    </section>

    <!-- Daftar Tempat PKL -->
    <section id="list_pkl">
        <h1><span style="color: var(--primaryColor)">DAFTAR</span> TEMPAT PKL</h1>
        <div class="grid-custom">
            @foreach ($pkl_places as $key => $pkl)
                <div class="card" style="width: 18rem">
                    <img src="{{ $pkl->image_url }}" class="card-img-top" style="width: 100%; height: 200px;"
                        alt="card-1" />
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
                        <p><i class="bi bi-heart-fill me-2"></i> {{ $pkl->peminatans()->first()->peminat }} Peminat</p>
                        <p><i class="bi bi-people-fill me-2"></i> {{ $pkl->daya_tampung }} Daya Tampung</p>
                        <p><i class="bi bi-star-fill me-2"></i> {{ $pkl->rating }}</p>
                        <a href="{{ $pkl->link_gmaps }}" target="_blank" class="btn-sip mt-2"><i
                                class="bi bi-map-fill me-1 me-md-2"></i>
                            Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Footer Start -->
    <section id="footer">
        <div class="content">
            <div class="top">
                <a href="#" class="logo-details">
                    <h1 class="logo-name"><span>SIP</span> SMEA</h1>
                </a>
                <div class="media-icons">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-github"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <div class="link-boxes">
                <ul class="box">
                    <li class="link-name">Navigasi</li>
                    <li><a href="#features">Fitur</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#list_pkl">Tempat PKL</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
                <ul class="box">
                    <li class="link-name">Daftar Fitur</li>
                    <li><a href="#">Perhitungan SPK</a></li>
                    <li><a href="#">Edit Profile</a></li>
                    <li><a href="#">Login QR Code</a></li>
                </ul>
                <ul class="box">
                    <li class="link-name">Kelebihan</li>
                    <li><a href="#">Modern UI</a></li>
                    <li><a href="#">Responsive UI</a></li>
                    <li><a href="#">Interactive UI</a></li>
                    <li><a href="#">HD Image</a></li>
                </ul>
                <ul class="box">
                    <li class="link-name">Developer</li>
                    <li>
                        <a href="https://www.instagram.com/foxy_foxh/" target="_blank">Instagram</a>
                    </li>
                    <li>
                        <a href="https://id.linkedin.com/in/karel-trisnanto-utomo-8564ba259"
                            target="_blank">LinkedIn</a>
                    </li>
                    <li>
                        <a href="https://github.com/KarMint26" target="_blank">Github</a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/profile.php?id=100013436564340" target="_blank">Facebook</a>
                    </li>
                </ul>
                <ul class="box input-box">
                    <li class="link-name">Kontak Kami</li>
                    <li><input type="text" placeholder="Masukkan Email Anda" /></li>
                    <li><a href="mailto:admin@sipsmea.my.id">Kirim Email</a></li>
                </ul>
            </div>
        </div>
        <div class="bottom-details">
            <div class="bottom-text">
                <span class="copyright-text">Copyright © 2024 <a href="#">SIP SMEA.</a>All rights
                    reserved</span>
            </div>
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
    <script src="{{ asset('src/js/btntop.js') }}"></script>

    {{-- PWA --}}
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>

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

    <script>
        $('.dtp').click(() => {
            $('#offcanvasNavbar').offcanvas('hide');
        })
    </script>

    {{-- Loading Screen --}}
    <script>
        $(window).on('load', function() {
            var images = $('img'),
                totalImages = images.length,
                imagesLoaded = 0;

            function imageLoaded() {
                imagesLoaded++;
                if (imagesLoaded === totalImages) {
                    $('#loading').fadeOut('slow');
                }
            }

            images.each(function() {
                if (this.complete) {
                    imageLoaded();
                } else {
                    $(this).on('load', imageLoaded);
                    $(this).on('error', imageLoaded);
                }
            });
        });
    </script>

    <script src="{{ asset('./src/js/gsap.js') }}"></script>
</body>

</html>
