<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Senarasi</title>
    <meta name="robots" content="noindex, nofollow">
    {{-- ngok meta tag --}}
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('asset/image/narasi_logomark.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.css') }}" />
    <!-- Summernote CSS -->
    <link href="{{ asset('asset/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    {{-- Selectize --}}
    <link href="{{ asset('css/selectize.default.min.css') }}" rel="stylesheet">
    <!-- Data Tables -->
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.31/dist/fancybox.css">

    @yield('costum-css')
    <style>

.body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url({{ asset('asset/image/doodles.jpg') }});
    background-size: 680px 680px;
    background-repeat: repeat;
    filter: blur(3px); /* Menambahkan blur hanya pada background */
    -webkit-filter: blur(3px); /* Dukungan untuk browser WebKit */
    z-index: -1; /* Membawa pseudo-elemen di belakang konten */
}



    </style>
</head>

<body class="antialiased">
    <div class="wrapper">

        <div class="body" style="min-height: 100vh;
                width: 100%;
                overflow: hidden;
                transition: all 0.35s ease-in-out">
            <div class="badanisi" style="margin:0px">
                @include('layout.modalin')
                @yield('content')
            </div>
            <footer class="footer text-center">
                <span id="bottom">&copy;2024 Narasi TV | All rights reserved.</span>
            </footer>

        </div>


    </div>

    </div>
    {{-- @yield('modal') --}}
    <!-- Libs JS -->
    <!-- Tabler Core -->
    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('js/datatables.min.js')}}"></script>
    <script src="{{ asset('js/datatables.init.js')}}"></script>
    <script src="{{ asset('js/selectize.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.31/dist/fancybox.umd.js"></script>
    <script src="{{ asset('asset/summernote/summernote-lite.min.js') }}"></script>
    @yield('custom-js')

</body>

</html>
