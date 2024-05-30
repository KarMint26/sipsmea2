<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIP SMEA - Masuk</title>
    <link rel="shortcut icon" href="{{ asset('src/assets/favicon.ico') }}" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}" />
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 px-4 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6 d-none d-lg-block">
                    <img src="{{ asset('./src/assets/hero-login.png') }}" class="hero-login" alt="login hero image" />
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <div class="head-login">
                        <h1><span style="color: var(--primaryColor)">SIP</span> SMEA</h1>
                        <h5>
                            Sistem Pendukung Keputusan Pemilihan Tempat Praktek Kerja
                            Lapangan SMK Negeri 1 Slawi
                        </h5>
                    </div>
                    <form method="POST" action="{{ route('login_auth') }}">
                        @csrf
                        @method('POST')
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email"
                                placeholder="mail@gmail.com" value="{{ old('email') }}" />
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating" style="position: relative !important;">
                            <input type="password" class="form-control" id="floatingPassword" name="password"
                                placeholder="Password" />
                            <label for="floatingPassword">Password</label>
                            <div class="show-pwd">
                                <i class="bi bi-eye-slash-fill" id="eye"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-login">Belum punya akun? <a href="{{ route('register') }}">daftar</a></div>
                            <div class="text-login">Lupa password? <a href="{{ route('forgot_password') }}">klik
                                    disini</a></div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                            class="btn-sip-large ms-auto d-block mt-4">
                            Masuk
                        </button>
                        <div class="lg-g d-flex justify-content-center align-items-center">
                            <div class="line-g"></div>
                            <div class="login-g">Atau Masuk Dengan</div>
                        </div>

                        {{-- Login Google --}}
                        <a href="{{ route('google_redirect') }}"
                            class="social-login-field d-flex justify-content-center align-items-center">
                            <img src="{{ asset('src/assets/google.png') }}" alt="google-icon" width="50px">
                            <div class="login-with-google">Masuk Dengan Google</div>
                        </a>

                        {{-- Login Facebook --}}
                        <a href="{{ route('facebook_redirect') }}"
                            class="social-login-field d-flex justify-content-center align-items-center mt-3">
                            <img src="{{ asset('src/assets/facebook.png') }}" alt="facebook-icon" width="50px">
                            <div class="login-with-facebook">Masuk Dengan Facebook</div>
                        </a>
                    </form>
                </div>
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

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.error("{{ $error }}")
            </script>
        @endforeach
    @endif

    @if (session('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ session('message') }}")
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.error("{{ session('error') }}")
        </script>
    @endif

    @if (session('warn'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.warning("{{ session('warn') }}")
        </script>
    @endif
</body>

</html>
