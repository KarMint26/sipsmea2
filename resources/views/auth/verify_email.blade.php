<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIP SMEA - Verification Email</title>
    <link rel="shortcut icon" href="{{ asset('src/assets/favicon.ico') }}" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}" />

    <style>
        .resend_email_btn.disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
</head>

<body>
    {{-- Loading Screen --}}
    <div id="loading">
        <div class="custom-loader"></div>
        <div style="font-size: 0.8rem">Sedang mengunduh konten...</div>
    </div>

    <section class="email_verify d-flex justify-content-center align-items-center flex-columns"
        style="min-height: 100vh;">
        <div class="card" style="width: 320px;">
            <div class="card-body text-center">
                <div class="checklist m-auto mb-3"
                    style="border-radius: 100%; width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; background-color: rgb(88, 224, 88); color: rgb(0, 146, 0)">
                    <i class="bi bi-check2 fs-2"></i>
                </div>
                <div class="card-title fw-semibold fs-3">Verifikasi Email</div>
                <div class="card-text">
                    Email verifikasi telah dikirimkan, silahkan cek email anda.
                </div>

                <a href="{{ route('verification.send') }}" class="resend_email_btn" style="background-color: grey;">
                    <i class="bi bi-arrow-repeat"></i>
                    <div id="text_resend_email" class="d-flex justify-content-center align-items-center"
                        style="gap: 0.5rem;">Verifikasi Ulang</div>
                </a>
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
</body>

</html>
