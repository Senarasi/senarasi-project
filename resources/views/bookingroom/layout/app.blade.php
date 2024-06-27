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
        <link rel="shortcut_icon" href="{{ asset('asset/image/narasi_logomark.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet"  href="{{ asset('asset/datetimepicker/jquery.datetimepicker.css') }}">
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
        <!-- Tagify CSS -->
        <link href="{{ asset('css/tagify.css') }}" rel="stylesheet">
        <!-- Tagify JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.0.0/tagify.min.js"></script>
        <link href="{{ asset('js/tagify.min.js') }}" rel="stylesheet">
        <script src="{{ asset('asset/fullcalendar/dist/index.global.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <!-- Data Tables -->
        <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
        @yield('costum-css')
        <style>
            .topbar {
                background-color: #4a25aa;
                display: flex;
                width: 100%;
                justify-content: space-between;
                align-items: center;
                position: fixed;
                z-index: 4;
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

            .topbar a:hover {
                background-color: #34128c;
                color: white;
            }

            #calendar {
                /* max-width: 1100px; */
                margin: 0 auto;
                text-decoration: none;
            }
            #calendar a {
                text-decoration: none;
                color: #666;
            }

            #calendar button{
                background-color: #4a25aa;
                border: none;
            }
            #calendar button:hover{
                background-color: #34128c;
            }
        </style>

    </head>
    <body class="antialiased">
        <div class="wrapper">
            @include('layout.navbar')
            <div style="margin-top: 68px"></div>
            <div class="topbar">
                <a class="markuy" href="{{ route('bookingroom.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M0 24V21.3333H2.66667V0H16V1.33333H21.3333V21.3333H24V24H18.6667V4H16V24H0ZM10.6667 13.3333C11.0444 13.3333 11.3613 13.2053 11.6173 12.9493C11.8733 12.6933 12.0009 12.3769 12 12C11.9991 11.6231 11.8711 11.3067 11.616 11.0507C11.3609 10.7947 11.0444 10.6667 10.6667 10.6667C10.2889 10.6667 9.97244 10.7947 9.71733 11.0507C9.46222 11.3067 9.33422 11.6231 9.33333 12C9.33245 12.3769 9.46044 12.6938 9.71733 12.9507C9.97422 13.2076 10.2907 13.3351 10.6667 13.3333ZM5.33333 21.3333H13.3333V2.66667H5.33333V21.3333Z" fill="#FFE900"/>
                  </svg>Booking Room</a>
                <a class="markuy" href="{{ route('bookingroom.list') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 24 22" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.7273 2.18182H3.27273C2.9834 2.18182 2.70592 2.29675 2.50134 2.50134C2.29675 2.70592 2.18182 2.9834 2.18182 3.27273V18.5455C2.18182 18.8348 2.29675 19.1123 2.50134 19.3168C2.70592 19.5214 2.9834 19.6364 3.27273 19.6364H20.7273C21.0166 19.6364 21.2941 19.5214 21.4987 19.3168C21.7032 19.1123 21.8182 18.8348 21.8182 18.5455V3.27273C21.8182 2.9834 21.7032 2.70592 21.4987 2.50134C21.2941 2.29675 21.0166 2.18182 20.7273 2.18182ZM3.27273 0C2.40475 0 1.57232 0.344804 0.95856 0.95856C0.344804 1.57232 0 2.40475 0 3.27273V18.5455C0 19.4134 0.344804 20.2459 0.95856 20.8596C1.57232 21.4734 2.40475 21.8182 3.27273 21.8182H20.7273C21.5953 21.8182 22.4277 21.4734 23.0414 20.8596C23.6552 20.2459 24 19.4134 24 18.5455V3.27273C24 2.40475 23.6552 1.57232 23.0414 0.95856C22.4277 0.344804 21.5953 0 20.7273 0H3.27273ZM5.45455 5.45455H7.63636V7.63636H5.45455V5.45455ZM10.9091 5.45455C10.6198 5.45455 10.3423 5.56948 10.1377 5.77407C9.93312 5.97865 9.81818 6.25613 9.81818 6.54545C9.81818 6.83478 9.93312 7.11226 10.1377 7.31684C10.3423 7.52143 10.6198 7.63636 10.9091 7.63636H17.4545C17.7439 7.63636 18.0214 7.52143 18.2259 7.31684C18.4305 7.11226 18.5455 6.83478 18.5455 6.54545C18.5455 6.25613 18.4305 5.97865 18.2259 5.77407C18.0214 5.56948 17.7439 5.45455 17.4545 5.45455H10.9091ZM7.63636 9.81818H5.45455V12H7.63636V9.81818ZM9.81818 10.9091C9.81818 10.6198 9.93312 10.3423 10.1377 10.1377C10.3423 9.93312 10.6198 9.81818 10.9091 9.81818H17.4545C17.7439 9.81818 18.0214 9.93312 18.2259 10.1377C18.4305 10.3423 18.5455 10.6198 18.5455 10.9091C18.5455 11.1984 18.4305 11.4759 18.2259 11.6805C18.0214 11.8851 17.7439 12 17.4545 12H10.9091C10.6198 12 10.3423 11.8851 10.1377 11.6805C9.93312 11.4759 9.81818 11.1984 9.81818 10.9091ZM7.63636 14.1818H5.45455V16.3636H7.63636V14.1818ZM9.81818 15.2727C9.81818 14.9834 9.93312 14.7059 10.1377 14.5013C10.3423 14.2968 10.6198 14.1818 10.9091 14.1818H17.4545C17.7439 14.1818 18.0214 14.2968 18.2259 14.5013C18.4305 14.7059 18.5455 14.9834 18.5455 15.2727C18.5455 15.5621 18.4305 15.8395 18.2259 16.0441C18.0214 16.2487 17.7439 16.3636 17.4545 16.3636H10.9091C10.6198 16.3636 10.3423 16.2487 10.1377 16.0441C9.93312 15.8395 9.81818 15.5621 9.81818 15.2727Z" fill="#FFE900"/>
                  </svg>Booking List</a>
                <a class="markuy" href="{{ route('manage-rooms.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                    <path d="M12.5387 9.21264L7.62085 11.2385V16.2329C7.62085 18.9088 13.1095 21.465 13.1095 21.465C13.1095 21.465 18.5981 18.9088 18.5981 16.2329V11.2385L13.6802 9.21264C13.4994 9.13738 13.3054 9.09863 13.1095 9.09863C12.9135 9.09863 12.7195 9.13738 12.5387 9.21264Z" stroke="#FFE900" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.9724 14.9928L12.8687 16.876L15.919 12.957" stroke="#FFE900" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M24.8741 10.8429L14.3826 1.48574C14.0323 1.17291 13.5791 1 13.1095 1C12.6398 1 12.1866 1.17291 11.8363 1.48574L1.34483 10.8429C0.641818 11.47 1.08562 12.6344 2.02821 12.6344H3.37008V23.5115C3.37026 23.9063 3.52723 24.2849 3.80648 24.5641C4.08573 24.8432 4.4644 25 4.85924 25H21.3597C21.7546 25 22.1332 24.8432 22.4125 24.5641C22.6918 24.2849 22.8487 23.9063 22.8489 23.5115V12.6338H24.1908C25.1334 12.6338 25.5772 11.4693 24.8741 10.8422V10.8429Z" stroke="#FFE900" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>Manage Room</a>
            </div>
            <div class="body" style="padding-top: 65px; margin-top: 65px; margin-left: 132px; min-height: 100vh;">
                <div class="badanisi" style="margin-left: -160px">
                    @yield('content')
                </div>

            </div>
        </div>
        @include('layout.footer')
        </div>
        @yield('modal')
        <!-- Libs JS -->
        <!-- Tabler Core -->
        {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }} "></script>
        <script src="{{ asset('asset/datetimepicker/jquery.js') }}"></script>
        <script src="{{ asset('asset/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>
        <script src="{{ asset('js/datatables.min.js')}}"></script>
        <script src="{{ asset('js/datatables.init.js')}}"></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>
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
</html>
