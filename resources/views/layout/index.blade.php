<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        {{-- ngok meta tag --}}
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('asset/image/narasi_logomark.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
        <!-- Data Tables -->
        <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
        {{-- Selectize --}}
        <link href="{{ asset('css/selectize.default.min.css') }}" rel="stylesheet">
        <script src="https://cdn.ckeditor.com/4.16.2/full-all/ckeditor.js"></script>
        @yield('costum-css')

    </head>
 
    <body class="antialiased">
        
        <div class="wrapper" style="display: flex">
           
            @include('layout.newsidebar')
            
            <div class="body" style="min-height: 100vh;
    width: 100%;
    overflow: hidden;
    transition: all 0.35s ease-in-out">
                <div class="badanisi" style="margin-left:68px; margin-top: 52px;">
                    @yield('content')
                </div>
                @include('layout.footer')
            </div>
         
            
        </div>

        @yield('modal')
        <!-- Libs JS -->
        <!-- Tabler Core -->
        {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }} "></script>
        <script src="{{ asset('js/datatables.min.js')}}"></script>
        <script src="{{ asset('js/datatables.init.js')}}"></script>
        {{-- selectize --}}
        <script src="{{ asset('js/selectize.min.js')}}"></script>
        @yield('custom-js')
    </body>
</html>
