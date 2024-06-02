<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIP SMEA - @yield('title')</title>
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}" />

    {{-- Open Graph --}}
    <meta property="og:title" content="SIP SMEA" />
    <meta
      property="og:description"
      content="Website Sistem Informasi PKL Untuk Pendukung Keputusan Pemilihan Tempat PKL."
    />
    <meta
      property="og:image"
      itemprop="image"
      content="https://sipsmea.my.id/src/assets/preview.png"
    />
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

    <div class="wrapper-landing">
        @yield('content')
    </div>

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
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js">
    </script>
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

    @yield('script_add')
</body>

</html>
