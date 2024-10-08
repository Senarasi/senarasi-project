<style>
    .nav-item.dropdown .dropdown-menu {
        border: 1px solid #ccc;
        /* Menambahkan border abu-abu */
        border-radius: 5px;
        /* Menambahkan sedikit radius untuk sudut yang halus */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        /* Menambahkan bayangan untuk efek kedalaman */
        background-color: #ffffff;
        /* Warna background untuk dropdown */
        padding: 0px;
        margin-top: 2px;
        width: max-content; /* Mengatur lebar dropdown mengikuti panjang konten */
        min-width: 150px;
    }

    /* Style untuk item dropdown dengan class unique-sidebar-link */
    .dropdown-menu .unique-sidebar-link {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        font-size: 14px;
        color: #333;
        text-decoration: none;
        text-align: center;
    }
</style>
<!--Navbar-->
<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container-fluid">
        <a href="{{ route('dashboard.main') }}" class="header ms-3" style="margin: 6px">
            <img style="width: 208px; height: 38" src="{{ asset('asset/image/senarasi_logo1.png') }}" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarnih"
            aria-controls="navbarnih" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarnih">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"> </ul>

            <div class="navbar-nav order-md-last">
                <a class="maindashboardlink" href="{{ route('dashboard.main') }}">Main Dashboard</a>

                @guest
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" id="navbarDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="row me-2">
                                <div class="col-sm-3">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/2bfbf0aef31a2cc5791ba7283fd9129406fbb60e65f2a4985de422bb96951f3b? "
                                        class="img-3 me-1" />
                                </div>
                            </div>
                        </a>

                        <!-- Dropdown menu -->
                        <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                            <div class="col" style="font:300 14px Narasi Sans, sans-serif">
                                <div class="mt-1">Nama User</div>
                                <div class="text-secondary">position</div>
                            </div>
                            <hr>
                            <a href="#" class="dropdown-item unique-sidebar-link" data-bs-toggle="modal"
                                data-bs-target="#customModalUnique">
                                {{-- Ikon bisa ditambahkan jika diperlukan --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24">
                                    <path fill="#bab5b5"
                                        d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98m-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4m0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2" />
                                </svg>
                                <span class="align-middle ms-2">Setting</span>
                            </a>

                            <!-- Include modal -->


                            <a href="{{ route('logout') }}" class="dropdown-item unique-sidebar-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24">
                                    <path fill="#bab5b5"
                                        d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h7v2H5v14h7v2zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5z" />
                                </svg>
                                <span class="align-middle ms-2">Logout</span>
                            </a>
                        </div>

                        <!-- Logout form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0 " data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <div class="row me-2">
                                <div class="col-sm-3">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/2bfbf0aef31a2cc5791ba7283fd9129406fbb60e65f2a4985de422bb96951f3b? "
                                        class="img-3 me-1" />
                                </div>
                            </div>
                        </a>

                        <!-- Dropdown menu -->
                        <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                            <div class="col mt-3 ms-3 me-3" style="font:300 14px Narasi Sans, sans-serif">
                                <div>{{ Auth::user()->full_name }}</div>
                                <div class="text-secondary">{{ Auth::user()->role }}</div>
                            </div>
                            <hr style="margin-bottom: 0">
                            <a href="#" class="dropdown-item unique-sidebar-link" data-bs-toggle="modal"
                                data-bs-target="#customModalUnique">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24">
                                    <path fill="#bab5b5"
                                        d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98m-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4m0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2" />
                                </svg>
                                <span class="align-middle ms-2">Setting</span>
                            </a>


                            <!-- Include modal -->

                            <a href="{{ route('logout') }}" class="dropdown-item unique-sidebar-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24">
                                    <path fill="#bab5b5"
                                        d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h7v2H5v14h7v2zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5z" />
                                </svg>
                                <span class="align-middle ms-2 ">Logout</span>
                            </a>
                        </div>

                        <!-- Logout form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                @endguest

            </div>
        </div>
    </div>
</nav>
<script>
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.dropdown').length) {
            $('.dropdown-menu').hide();
        }
    });
</script>
