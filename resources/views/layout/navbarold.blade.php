<style>
    .nav-item.dropdown .dropdown-menu {
     border: 1px solid #ccc; /* Menambahkan border abu-abu */
     border-radius: 5px; /* Menambahkan sedikit radius untuk sudut yang halus */
     box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan untuk efek kedalaman */
     background-color: #ffffff; /* Warna background untuk dropdown */
     padding:0px;
     margin-top: 2px;
 }
     /* Style untuk item dropdown dengan class unique-sidebar-link */
 .dropdown-menu .unique-sidebar-link {
     display: flex;
     align-items: center;
     padding: 10px 15px;
     font-size: 14px;
     color: #333;
     text-decoration: none;
     align-items: center; /* Menyelaraskan item secara vertikal di tengah */
     justify-content: center; /* Menyelaraskan item secara horizontal di tengah */
     transition: background-color 0.2s ease-in-out;
     text-align: center;

 }

 /* Hover effect untuk item dropdown */
 .dropdown-menu .unique-sidebar-link:hover {
     background-color: #f0f0f0;
     color: #4a25aa; /* Warna teks biru saat hover */
     font-weight: 600;

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
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">            </ul>

             <div class="navbar-nav order-md-last">
                 <a class="maindashboardlink" href="{{ route('dashboard.main') }}" >Main Dashboard</a>

                 @guest
                 <div class="nav-item dropdown">
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                         aria-label="Open user menu">
                         <div class="row me-2">
                             <div class="col-sm-3">
                                 <img loading="lazy"
                                     src="https://cdn.builder.io/api/v1/image/assets/TEMP/2bfbf0aef31a2cc5791ba7283fd9129406fbb60e65f2a4985de422bb96951f3b? "
                                     class="img-3 me-1" />
                             </div>
                             <div class="col" style="font:300 14px Narasi Sans, sans-serif">
                                 <div class="mt-1">Nama User</div>
                                 <div class="text-secondary">position</div>
                             </div>
                         </div>
                     </a>

                     <!-- Dropdown menu -->
                     <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                         <a href="#" class="dropdown-item unique-sidebar-link" data-bs-toggle="modal" data-bs-target="#customModalUnique">
                             {{-- Ikon bisa ditambahkan jika diperlukan --}}
                             {{-- <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 18 18" fill="#ff0000;">
                                 <!-- SVG path for settings icon -->
                                 <path d="M16.2369 9.59392C16.0926 9.4297..." fill="white"/>
                             </svg> --}}
                             <span class="align-middle text-center">Setting</span>

                         </a>

                         <!-- Include modal -->


                         <a href="{{ route('logout') }}" class="dropdown-item unique-sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                             {{-- <svg xmlns="http://www.w3.org/2000/svg" width="21" height="22" viewBox="0 0 19 20" fill="#ff0000;">
                                 <!-- SVG path for logout icon -->
                                 <path d="M6.5 3V2C6.5 1.44772 6.9477 1 7.5 1H16.5..." stroke="white" stroke-width="2" stroke-linecap="round"/>
                                 <path d="M12.5 10H1.5" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                 <path d="M5 6.5L1.5 10L5 13.5" stroke="white" stroke-width="2" stroke-linecap="round"/>
                             </svg> --}}
                             <span class="align-middle ">Logout</span>
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
                             <div class="col  ms-2" style="font:300 14px Narasi Sans, sans-serif">
                                 <div class="mt-1">{{ Auth::user()->name }}</div>
                                 <div class="text-secondary">{{ Auth::user()->role }}</div>
                             </div>

                         </div>
                     </a>

                     <!-- Dropdown menu -->
                     <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                         <a href="#" class="dropdown-item unique-sidebar-link" data-bs-toggle="modal" data-bs-target="#customModalUnique">
                             {{-- Ikon bisa ditambahkan jika diperlukan --}}
                             {{-- <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 18 18" fill="#ff0000;">
                                 <!-- SVG path for settings icon -->
                                 <path d="M16.2369 9.59392C16.0926 9.4297..." fill="white"/>
                             </svg> --}}
                             <span class="align-middle text-center">Setting</span>
                         </a>


                         <!-- Include modal -->

                         <a href="{{ route('logout') }}" class="dropdown-item unique-sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                             {{-- <svg xmlns="http://www.w3.org/2000/svg" width="21" height="22" viewBox="0 0 19 20" fill="#ff0000;">
                                 <!-- SVG path for logout icon -->
                                 <path d="M6.5 3V2C6.5 1.44772 6.9477 1 7.5 1H16.5..." stroke="white" stroke-width="2" stroke-linecap="round"/>
                                 <path d="M12.5 10H1.5" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                 <path d="M5 6.5L1.5 10L5 13.5" stroke="white" stroke-width="2" stroke-linecap="round"/>
                             </svg> --}}
                             <span class="align-middle ">Logout</span>
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
