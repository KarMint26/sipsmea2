<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Website Sistem Informasi PKL Untuk Pendukung Keputusan Pemilihan Tempat PKL." />
    <title>SIP SMEA</title>
    <link rel="shortcut icon" href="{{ asset('src/assets/favicon.svg') }}" type="image/svg+xml" />
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
    <meta property="og:image" itemprop="image" content="https://sipsmea.my.id/src/assets/preview.png" />
    <meta property="og:url" content="https://sipsmea.my.id" />
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
                <h1 id="welcome">SELAMAT DATANG</h1>
                <p id="desc_landing">
                    Mulai Mempertimbangkan dan Memutuskan Tempat Praktek Kerja
                    Lapanganmu Lewat Website SIP SMEA Dengan Daftar Tempat Praktek Kerja
                    Lapangan Yang Disediakan.
                </p>
                <div id="landing_btn">
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
            </div>
            <img id="img_landing" src="{{ asset('src/assets/hero-landing.png') }}" alt="hero-landing" />
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
                    <img src="{{ asset('src/assets/features/decision.svg') }}" alt="features image" />
                    <div class="title">Perhitungan SPK</div>
                    <p>
                        Website ini terdapat perhitungan SPK metode TOPSIS
                        (<i>Technique For Others Reference by Similarity to Ideal Solution</i>).
                    </p>
                </div>
                <div class="field-features">
                    <img src="{{ asset('src/assets/features/edit.svg') }}" alt="features image" />
                    <div class="title">Edit Profile</div>
                    <p>
                        Anda dapat melakukan edit profile pada navigasi bar, seperti mengganti nama dan juga NISN (Nomor
                        Induk Siswa Nasional).
                    </p>
                </div>
                <div class="field-features">
                    <img src="{{ asset('src/assets/features/qr.svg') }}" alt="features image" />
                    <div class="title">Login QR Code</div>
                    <p>
                        Anda dapat masuk ke website dengan menggunakan QR Code yang didownload pada
                        navigasi bar diatas saat sudah berhasil masuk.
                    </p>
                </div>
            </div>
            </d>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="landing-default mt-5">
            <div class="content-about">
                <img id="hero_about" src="{{ asset('src/assets/about.png') }}" alt="image-about" />
                <div class="desc-about">
                    <div class="title-content">
                        <h3>SIP SMEA untuk Siswa SMK</h3>
                        <h1>Tentang <span>SIP SMEA</span></h1>
                    </div>
                    <p class="about_desc">
                        SIP SMEA merupakan website Sistem Informasi PKL untuk mendukung keputusan siswa dalam memilih
                        tempat PKL(Praktek Kerja Lapangan) sesuai yang diinginkannya dengan melakukan perhitungan SPK
                        (Sistem Pendukung Keputusan).
                    </p>
                    <a href="#guide" id="see_list_pkl" class="btn-sip" style="margin-top: 0.5rem !important;"> <i
                            class="bi bi-eye-fill me-1"></i> Lihat Panduan</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Guide Section -->
    <section id="guide" style="margin-bottom: 5rem !important;">
        <div class="landing-default mt-5">
            <div class="title-guide">
                <h1 id="guide_title" class="fw-semibold"><span>Panduan</span> SIP SMEA</h1>
            </div>
            <!-- Timeline -->
            <div class="containers">
                <div class="rows">
                    <div id="desc_time1" class="desc_time"><span>Langkah Pertama</span></div>
                    <div id="line1" class="line">
                        <span></span>
                    </div>
                    <div class="guide_content" id="guide_content1">
                        <div class="content">
                            <h2>Pilih Tempat PKL</h2>
                            <p>Setelah berhasil masuk atau login sebagai siswa, maka selanjutnya adalah klik tombol
                                mulai
                                sekarang pada landing page atau klik dropdown navigasi bar diatas lalu pilih 'Sistem
                                SPK'.
                                Sesudah itu pilihlah 5 tempat PKL yang diinginkan dengan melihat referensi pada halaman
                                beranda, setelah selesai memilih maka klik tombol 'Kirim'.</p>
                        </div>
                    </div>
                </div>

                <div class="rows">
                    <div id="desc_time2" class="desc_time"><span>Langkah Kedua</span></div>
                    <div id="line2" class="line">
                        <span></span>
                    </div>
                    <div class="guide_content" id="guide_content2">
                        <div class="content">
                            <h2>Memasukkan Jarak</h2>
                            <p>Sesudah memilih 5 tempat PKL yang diinginkan, maka selanjutnya adalah memasukkan jarak
                                dari
                                rumah ke tempat PKL tersebut dalam kilometer (km) yang dibulatkan, jika diatas koma 5
                                maka
                                bulatkan keatas, jika dibawah maka bulatkan kebawah, setelah mengisi semuanya maka klik
                                tombol 'Kirim'.</p>
                        </div>
                    </div>
                </div>

                <div class="rows">
                    <div id="desc_time3" class="desc_time"><span>Langkah Ketiga</span></div>
                    <div id="line3" class="line">
                        <span></span>
                    </div>
                    <div class="guide_content" id="guide_content3">
                        <div class="content">
                            <h2>Memasukkan Nilai Bobot</h2>
                            <p>Setelah mengisikan jarak, langkah selanjutnya yaitu memasukkan nilai bobot tiap kriteria
                                seperti jarak, akses jalan, daya tampung, rating, peminat. Tiap kriteria memiliki skala
                                bobot 1-5, diantaranya adalah 1 untuk 'sangat tidak penting', 2 yaitu 'tidak penting', 3
                                yaitu 'cukup penting', 4 yaitu 'penting', dan 5 adalah 'sangat penting'. Setalah
                                semuanya
                                selesai maka klik tombol 'Kirim'</p>
                        </div>
                    </div>
                </div>

                <div class="rows">
                    <div id="desc_time4" class="desc_time last"><span>Langkah Keempat</span></div>
                    <div id="line4" class="line">
                        <span></span>
                        <span class="last-point"></span>
                    </div>
                    <div class="guide_content" id="guide_content4">
                        <div class="content last">
                            <h2>Memunculkan Hasil</h2>
                            <p>Setelah langkah sebelumnya selesai maka sistem otomatis akan melakukan perhitungan SPK
                                (Sistem Pendukung Keputusan) dengan metode TOPSIS. Hasil perhitungan akan diberikan
                                dalam
                                bentuk data tabel yang dapat dilihat secara langsung. Selain itu, bisa juga melakukan
                                reset
                                / ulangi
                                perhitungan dengan klik tombol 'Ulangi Perhitungan' dan juga download hasil pdf dengan
                                klik
                                tombol 'Download PDF'.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Daftar Tempat PKL -->
    <section id="list_pkl">
        <h1 id="list_pkl_title"><span style="color: var(--primaryColor)">DAFTAR</span> TEMPAT PKL</h1>
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
                        <p><i class="bi bi-heart-fill me-2"></i> {{ $pkl->peminatans()->first()->peminat }} Peminat
                        </p>
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

    <!-- FAQ -->
    <section id="faq">
        <div class="faq-content">
            <h1 class="faq-title">
                <span>Pertanyaan Tentang</span> <br />
                Website SIP SMEA
            </h1>
            <p class="faq-desc">Pertanyaan yang sering ditanyakan.</p>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Apa itu SIP SMEA?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            SIP SMEA merupakan website yang dibuat untuk membantu siswa SMK (Sekolah Menengah
                            Kejuruan) dalam mengambil keputusan menentukan pilihannya pada tempat PKL (Praktek Kerja
                            Lapangan), terkhusus pada SMK Negeri 1 Slawi.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Apa itu metode TOPSIS?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Metode TOPSIS (<i>Technique for Order Preference by Similarity to Ideal Solution</i>) adalah
                            sebuah
                            teknik pengambilan keputusan multikriteria yang digunakan untuk menentukan solusi terbaik di
                            antara sejumlah alternatif berdasarkan kedekatannya dengan solusi ideal.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Apa saja fitur unggulan SIP SMEA?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            SIP SMEA mempunyai beberapa fitur unggulan seperti edit profile, login dengan QR Code, lalu
                            juga melakukan perhitungan SPK (Sistem Pendukung Keputusan) dengan metode TOPSIS dalam
                            membantu menentukan tempat PKL (Praktek Kerja Lapangan).
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Apakah bisa mengulangi kembali perhitungan SPK?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Ya, tentu saja bisa. SIP SMEA menyediakan fitur untuk reset atau ulangi perhitungan SPK
                            ketika kamu sudah mendapatkan hasil SPK-nya, jika dirasa tidak yakin maka tinggal klik saja
                            tombol ulangi pada halaman hasil.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Apakah hasil dari perhitungan SPK dapat didownload?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Tentu saja, SIP SMEA menyediakan fitur download file pdf yang isinya adalah hasil
                            perhitungan SPK yang telah muncul pada halaman hasil.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('src/assets/faq.png') }}" class="faq-hero" alt="faq-image" />
    </section>

    <!-- Footer -->
    @include('layouts.footer')

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
