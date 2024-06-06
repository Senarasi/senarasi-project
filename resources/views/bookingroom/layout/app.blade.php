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
        <link rel="stylesheet"  href="{{ asset('asset/datetimepicker/jquery.datetimepicker.css') }}">
        <script src="{{ asset('asset/fullcalendar/dist/index.global.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <!-- Data Tables -->
        <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
        @yield('costum-css')
        <style>
            .topbar {
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

        </style>

    </head>
    <body class="antialiased">
        <div class="wrapper">
            @include('layout.navbar')
            <div style="margin-top: 70px"></div>
            <div class="topbar">
                <a class="markuy" href="/booking-room"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 0C9.62663 0 7.30655 0.703788 5.33316 2.02236C3.35977 3.34094 1.8217 5.21508 0.913451 7.4078C0.00519941 9.60051 -0.232441 12.0133 0.230582 14.3411C0.693605 16.6689 1.83649 18.807 3.51472 20.4853C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694C11.9867 24.2324 14.3995 23.9948 16.5922 23.0865C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668C23.2962 16.6934 24 14.3734 24 12C23.9966 8.81843 22.7313 5.76814 20.4816 3.51843C18.2319 1.26872 15.1816 0.00335979 12 0ZM11.5385 5.53846C11.8123 5.53846 12.08 5.61967 12.3077 5.77181C12.5354 5.92395 12.7129 6.1402 12.8177 6.39321C12.9225 6.64621 12.9499 6.92461 12.8965 7.1932C12.843 7.46179 12.7112 7.7085 12.5175 7.90215C12.3239 8.09579 12.0772 8.22766 11.8086 8.28109C11.54 8.33451 11.2616 8.30709 11.0086 8.20229C10.7556 8.0975 10.5393 7.92002 10.3872 7.69233C10.2351 7.46463 10.1538 7.19693 10.1538 6.92308C10.1538 6.55585 10.2997 6.20367 10.5594 5.944C10.8191 5.68434 11.1712 5.53846 11.5385 5.53846ZM12.9231 18.4615C12.4334 18.4615 11.9639 18.267 11.6177 17.9208C11.2714 17.5746 11.0769 17.105 11.0769 16.6154V12C10.8321 12 10.5973 11.9027 10.4242 11.7296C10.2511 11.5565 10.1538 11.3217 10.1538 11.0769C10.1538 10.8321 10.2511 10.5973 10.4242 10.4242C10.5973 10.2511 10.8321 10.1538 11.0769 10.1538C11.5666 10.1538 12.0361 10.3483 12.3824 10.6946C12.7286 11.0408 12.9231 11.5104 12.9231 12V16.6154C13.1679 16.6154 13.4027 16.7126 13.5758 16.8857C13.7489 17.0589 13.8462 17.2936 13.8462 17.5385C13.8462 17.7833 13.7489 18.0181 13.5758 18.1912C13.4027 18.3643 13.1679 18.4615 12.9231 18.4615Z" fill="#FFE900"/>
                  </svg>Booking Room</a>
                <a class="markuy" href="/booking-room/list"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
                    <path d="M2.4 0C1.76348 0 1.15303 0.252856 0.702944 0.702944C0.252856 1.15303 0 1.76348 0 2.4V7.2C0.63652 7.2 1.24697 7.45286 1.69706 7.90294C2.14714 8.35303 2.4 8.96348 2.4 9.6C2.4 10.2365 2.14714 10.847 1.69706 11.2971C1.24697 11.7471 0.63652 12 0 12V16.8C0 17.4365 0.252856 18.047 0.702944 18.4971C1.15303 18.9471 1.76348 19.2 2.4 19.2H21.6C22.2365 19.2 22.847 18.9471 23.2971 18.4971C23.7471 18.047 24 17.4365 24 16.8V12C23.3635 12 22.753 11.7471 22.3029 11.2971C21.8529 10.847 21.6 10.2365 21.6 9.6C21.6 8.96348 21.8529 8.35303 22.3029 7.90294C22.753 7.45286 23.3635 7.2 24 7.2V2.4C24 1.76348 23.7471 1.15303 23.2971 0.702944C22.847 0.252856 22.2365 0 21.6 0H2.4ZM16.2 3.6L18 5.4L7.8 15.6L6 13.8L16.2 3.6ZM8.172 3.648C9.348 3.648 10.296 4.596 10.296 5.772C10.296 6.33532 10.0722 6.87557 9.67389 7.27389C9.27557 7.67222 8.73532 7.896 8.172 7.896C6.996 7.896 6.048 6.948 6.048 5.772C6.048 5.20868 6.27178 4.66843 6.67011 4.27011C7.06843 3.87178 7.60868 3.648 8.172 3.648ZM15.828 11.304C17.004 11.304 17.952 12.252 17.952 13.428C17.952 13.9913 17.7282 14.5316 17.3299 14.9299C16.9316 15.3282 16.3913 15.552 15.828 15.552C14.652 15.552 13.704 14.604 13.704 13.428C13.704 12.8647 13.9278 12.3244 14.3261 11.9261C14.7244 11.5278 15.2647 11.304 15.828 11.304Z" fill="#FFE900"/>
                  </svg>Booking List</a>
                <a class="markuy" href="/manage-room"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M23.883 12.7148L22.4684 10.4835L23.3075 7.97932C23.3628 7.8137 23.3592 7.63403 23.2973 7.47077C23.2353 7.3075 23.1188 7.17066 22.9676 7.08344L20.6785 5.76383L20.2576 3.15627C20.2292 2.98387 20.1424 2.82649 20.0116 2.71064C19.8808 2.59479 19.7141 2.52754 19.5396 2.52022L16.8994 2.41685L15.3153 0.302864C15.2107 0.16297 15.0608 0.06368 14.8911 0.0219077C14.7215 -0.0198645 14.5426 -0.00153587 14.385 0.0737718L12 1.20806L9.61409 0.0728405C9.45621 -0.00165539 9.27749 -0.0194531 9.10802 0.0224464C8.93856 0.064346 8.78872 0.163381 8.68375 0.302864L7.09966 2.41685L4.45951 2.52022C4.28509 2.52719 4.11844 2.59422 3.98776 2.70996C3.85709 2.8257 3.77042 2.98304 3.74243 3.15534L3.3215 5.7629L1.03244 7.08251C0.880989 7.16959 0.764313 7.30636 0.702192 7.46964C0.640071 7.63292 0.636326 7.81266 0.691593 7.97839L1.53067 10.4826L0.117 12.7148C0.023746 12.8626 -0.0156036 13.038 0.00560858 13.2114C0.0268208 13.3849 0.107292 13.5457 0.233409 13.6666L2.13972 15.4947L1.92553 18.1264C1.91128 18.3006 1.95763 18.4743 2.05673 18.6182C2.15583 18.7621 2.30161 18.8674 2.46939 18.9162L5.0071 19.6472L6.03987 22.0787C6.10768 22.2399 6.22936 22.3725 6.38411 22.4539C6.53886 22.5352 6.71706 22.5603 6.88826 22.5248L9.47719 21.994L11.5204 23.6675C11.6592 23.7802 11.8296 23.8388 12 23.8388C12.1704 23.8388 12.3399 23.7802 12.4796 23.6675L14.5228 21.994L17.1117 22.5248C17.4628 22.5993 17.8195 22.4103 17.9601 22.0787L18.9929 19.6472L21.5306 18.9162C21.6985 18.8675 21.8444 18.7623 21.9435 18.6184C22.0426 18.4744 22.0889 18.3006 22.0745 18.1264L21.8603 15.4947L23.7666 13.6666C23.8927 13.5457 23.9732 13.3849 23.9944 13.2114C24.0156 13.038 23.9763 12.8626 23.883 12.7148ZM17.4731 9.07263L12.1732 17.0126C11.973 17.3088 11.6629 17.5071 11.3546 17.5071C11.0473 17.5071 10.7037 17.3349 10.4848 17.1151L6.59398 13.1618C6.46645 13.031 6.39507 12.8556 6.39507 12.6729C6.39507 12.4902 6.46645 12.3148 6.59398 12.184L7.55412 11.2062C7.61704 11.1429 7.69184 11.0927 7.77423 11.0584C7.85661 11.0242 7.94496 11.0065 8.03419 11.0065C8.12342 11.0065 8.21176 11.0242 8.29415 11.0584C8.37654 11.0927 8.45134 11.1429 8.51426 11.2062L11.0464 13.7783L15.2222 7.52207C15.2717 7.44746 15.3355 7.38346 15.41 7.3338C15.4845 7.28413 15.5682 7.24981 15.6561 7.23282C15.744 7.21582 15.8344 7.21651 15.922 7.23483C16.0097 7.25316 16.0928 7.28875 16.1665 7.33954L17.2924 8.11342C17.6025 8.32761 17.6826 8.75879 17.4731 9.07263Z" fill="#FFE900"/>
                  </svg>Manage Room</a>
            </div>
            <div class="body" style=" margin-left: 132px; min-height: 100vh;">
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
        <script src="http://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js "
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r " crossorigin="anonymous ">
        </script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }} "></script>
        <script src="{{ asset('asset/datetimepicker/jquery.js') }}"></script>
        <script src="{{ asset('asset/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>
        <script src="{{ asset('js/datatables.min.js')}}"></script>
        <script src="{{ asset('js/datatables.init.js')}}"></script>
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
