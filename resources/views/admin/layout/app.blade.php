<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin - Senarasi</title>
        <meta name="robots" content="noindex, nofollow">
        {{-- ngok meta tag --}}
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('asset/image/narasi_logomark.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.css') }}" />
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">


        <link href="{{ asset('css/selectize.default.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('asset/datetimepicker/jquery.datetimepicker.css') }}">
        <script src="{{ asset('asset/fullcalendar/dist/index.global.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <link href="{{ asset('asset/summernote/summernote-lite.min.css') }}" rel="stylesheet">

        <!-- Data Tables -->
        <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">

        @yield('costum-css')
        <style>
            /* .topbar {
                background-color: #4a25aa;
                overflow:auto;
                display: flex;
                width: auto;
                justify-content: space-between;
                align-items: center;
            }

            .topbar a {
                justify-content: center;
                align-items: center;
                display: flex;
                color: white;
                text-align: center;
                padding: 12px 24px;
                text-decoration: none;
                flex: 1;
                gap: 8px;
            }

            .topbar a:hover, .topbar a.active  {
        background: var( --Semantic-Main, linear-gradient(270deg, #4a25aa 0%, #b60f7f 50%, #4a25aa 100%));
        color: white;
    } */

            #calendar {
                /* max-width: 1100px; */
                margin: 0 auto;
                text-decoration: none;
            }

            #calendar a {
                text-decoration: none;
                color: #666;
            }
        </style>

    </head>

    <body class="antialiased">
        <div class="wrapper" style="display: flex">
            @include('layout.newnavbar')
            @include('admin.layout.sidebar_admin')
            {{-- <div class="topbar">
                <a class="markuy {{ Request::is('company-document*', ) ? 'active' : ''}}" href="{{ route('company-document.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="24" viewBox="0 0 19 24" fill="none">
                    <path d="M2.14286 0C0.958857 0 0 0.96 0 2.14286V21.8571C0 23.04 0.96 24 2.14286 24H16.7143C17.8971 24 18.8571 23.04 18.8571 21.8571V12.8571C18.8571 11.7205 18.4056 10.6304 17.6019 9.82669C16.7982 9.02296 15.7081 8.57143 14.5714 8.57143H12.4286C11.8603 8.57143 11.3152 8.34566 10.9133 7.9438C10.5115 7.54194 10.2857 6.99689 10.2857 6.42857V4.28571C10.2857 3.14907 9.83419 2.05898 9.03046 1.25526C8.22673 0.451529 7.13664 0 6 0H2.14286Z" fill="#FFE900"/>
                    <path d="M10.5383 0.36084C11.4829 1.44994 12.002 2.84375 12 4.28541V6.42827C12 6.66484 12.192 6.85684 12.4286 6.85684H14.5715C16.0131 6.85484 17.4069 7.37396 18.496 8.31855C17.993 6.40633 16.9912 4.66197 15.5931 3.26382C14.1949 1.86567 12.4506 0.863872 10.5383 0.36084Z" fill="#FFE900"/>
                  </svg>Company File Document</a>
            </div> --}}
            <div class="body"
                style="min-height: 100vh;
    width: 100%;
    overflow: hidden;
    transition: all 0.35s ease-in-out">
                <div class="badanisi">
                    @include('layout.modalin')
                    @yield('content')
                </div>
                @include('layout.footer')
            </div>

        </div>

        </div>
        @yield('modal')
        <!-- Libs JS -->
        <!-- Tabler Core -->
        {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="http://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js "
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r " crossorigin="anonymous ">
        </script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }} "></script>
        <script src="{{ asset('asset/datetimepicker/jquery.js') }}"></script>
        <script src="{{ asset('asset/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>
        <script src="{{ asset('js/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.init.js') }}"></script>
        <script src="{{ asset('js/selectize.min.js') }}"></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>

        <script src="{{ asset('asset/summernote/summernote-lite.min.js') }}"></script>
        <script>
            // Mendapatkan URL saat ini
            const currentUrl = window.location.pathname;

            // Mendapatkan semua elemen a dalam topbar
            const menuItems = document.querySelectorAll('.topbar a');

            // Menambahkan kelas aktif pada item menu yang sesuai dengan URL saat ini
            menuItems.forEach(item => {
                if (item.getAttribute('href') === currentUrl) {
                    item.style.backgroundColor = "#34128c";
                }
            });
        </script>
        @yield('custom-js')
        @yield('alert')

</html>
