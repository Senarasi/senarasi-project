
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Senarasi</title>
        {{-- ngok meta tag --}}
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('asset/image/narasi_logomark.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.css') }}" />
        <!-- Summernote CSS -->
        <link href="{{ asset('asset/summernote/summernote-lite.min.css') }}" rel="stylesheet">

        <!-- Data Tables -->
        <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.31/dist/fancybox.css">

        <style>

        </style>
    </head>
    <body class="antialiased">
        <div class="wrapper">
            @include('layout.navbarold')
            <div style="margin-top: 70px;">

            </div>
            <div class="body" style="margin-left: 132px; min-height: 100vh;">
                <div class="badanisi" style="margin-left: -140px; margin-top: 20px">
                    @include('layout.modalin')
                    @yield('content')
                </div>
                @include('layout.footer')
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
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.31/dist/fancybox.umd.js"></script>
        <script src="{{ asset('asset/summernote/summernote-lite.min.js') }}"></script>

    


    </body>
</html>




