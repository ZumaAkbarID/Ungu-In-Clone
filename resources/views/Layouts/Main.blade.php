<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
    <link rel="icon" type="image/png" href="https://ungu.in/assets/img/logo/fav.png">
    <meta name="keywords" content="{{ $data['keywords'] }}">
    <meta name="author" content="{{ $data['author'] }}">
    <link rel="canonical" href="https://ungu.in/">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
    <meta property="og:title" content="{{ $data['title'] }}">
    <meta property="og:image" content="https://ungu.in/assets/img/og-image.png" />
    <meta property="og:description" content="{{ $data['description'] }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://ungu.in/">
    <meta property="og:site_name" content="Unguin Clone">
    <meta name="twitter:title" content="{{ $data['title'] }}">
    <meta name="twitter:description" content="{{ $data['description'] }}">
    <meta property="twitter:image" content="https://ungu.in/assets/img/og-image.png" />

    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/style.css">
    @yield('css')

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="https://ungu.in/assets/img/logo-pwa.png">
    <link rel="manifest" href="{{ asset('/') }}pwa/manifest.json">
</head>

<body>
    @if (Request::segment(1) !== 'register' && Request::segment(1) !== 'login')
        @include('Layouts.Header')
        <div id="body-overlay"></div>
    @endif

    @yield('content')

    @if (Request::segment(1) !== 'register' && Request::segment(1) !== 'login')
        @include('Layouts.Footer')
    @endif

    <script src="{{ asset('/') }}assets/vendor/jquery/jquery-3.7.0.min.js"></script>
    <script src="https://ungu.in/assets/js/bootstrap.min.js"></script>
    <script src="https://ungu.in/assets/js/clipboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ungu.in/assets/js/main.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FW0EHNTMK2"></script>
    @include('Partials.Sweetalert2')

    @yield('js')

    <script src="{{ asset('/') }}pwa/sw.js"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
</body>

</html>
