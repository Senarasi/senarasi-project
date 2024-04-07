<style>
    /* Add this CSS to make the border invisible */
    .dropdown-menu {
        border: none; /* Remove the border */
    }
</style>

<!--Navbar-->
<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container-fluid">
        <div class="header ms-3" style="margin: 6px">
            <img style="width: 208px; height: 38" src="{{ asset('image/senarasi_logo.png') }}" alt="" />
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <form class="d-flex has-search" role="search">
                <input class="form-control me-2" type="search" placeholder="Search " aria-label="Search" />
            </form>
            <!-- Dropdown Profile-->
            <div class="navbar-nav flex-row order-md-last">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        <div>{{ Auth::user()->full_name }} <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/2bfbf0aef31a2cc5791ba7283fd9129406fbb60e65f2a4985de422bb96951f3b? "
                                class="img-3 me-4" onclick="toggleMenu()" /></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="" id="#" class="button-profile sidebar-link collapsed has-dropdown"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop-profile" role="button" aria-expanded="false"
                            aria-controls="profile" style="margin-bottom: 1px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.66667 5.33333C6.66667 3.91885 7.22857 2.56229 8.22876 1.5621C9.22896 0.561903 10.5855 0 12 0C13.4145 0 14.771 0.561903 15.7712 1.5621C16.7714 2.56229 17.3333 3.91885 17.3333 5.33333C17.3333 6.74782 16.7714 8.10438 15.7712 9.10457C14.771 10.1048 13.4145 10.6667 12 10.6667C10.5855 10.6667 9.22896 10.1048 8.22876 9.10457C7.22857 8.10438 6.66667 6.74782 6.66667 5.33333ZM6.66667 13.3333C4.89856 13.3333 3.20286 14.0357 1.95262 15.286C0.702379 16.5362 0 18.2319 0 20C0 21.0609 0.421428 22.0783 1.17157 22.8284C1.92172 23.5786 2.93913 24 4 24H20C21.0609 24 22.0783 23.5786 22.8284 22.8284C23.5786 22.0783 24 21.0609 24 20C24 18.2319 23.2976 16.5362 22.0474 15.286C20.7971 14.0357 19.1014 13.3333 17.3333 13.3333H6.66667Z"
                                    fill="#FFE900" />
                            </svg>
                            <span>PROFILE</span>
                        </a>
                        <a href="{{ route('logout') }}" class="button-profile sidebar-link collapsed has-dropdown"
                            role="button" aria-expanded="false"
                            aria-controls="profile" style="margin-bottom: 1px"
                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg " width="25 " height="24 " viewBox="0 0 25 24 "
                                fill="none ">
                                <path
                                    d="M16.5 5V4C16.5 3.44772 16.0523 3 15.5 3H6.5C5.94771 3 5.5 3.44772 5.5 4V20C5.5 20.5523 5.94772 21 6.5 21H15.5C16.0523 21 16.5 20.5523 16.5 20V19 "
                                    stroke="#FFE900 " stroke-width="2 " stroke-linecap="round " />
                                <path d="M10.5 12H21.5 " stroke="#FFE900 " stroke-width="2 " stroke-linecap="round " />
                                <path d="M18 8.5L21.5 12L18 15.5 " stroke="#FFE900 " stroke-width="2 "
                                    stroke-linecap="round " />
                            </svg>
                            <span>{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Modal Button Profile -->
<div class="modal justify-content-center fade" id="staticBackdrop-profile" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body bg-white">
                <form id="profilenavbar" class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif">
                    <div class="mb-3">
                        <label for="idkaryawan" class="form-label">ID Karyawan</label>
                        <input type="text" class="form-control" id="idkaryawan" />
                    </div>
                    <div class="mb-3">
                        <label for="namakaryawan" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" id="namakaryawan" />
                    </div>
                    <div class="mb-3">
                        <label for="emailkaryawan" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailkaryawan" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input style="font-size: 14px" name="password" type="password" value=""
                                    class="input form-control" id="password" placeholder="password" required="true"
                                    aria-label="password" aria-describedby="basic-addon1" />
                                <span class="input-group-text" onclick="password_show_hide();">
                                    <i class="fas fa-eye" id="show_eye"></i>
                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="departposisi">
                        <div style="font: 300 12; justify-content: space-between; align-items: center; flex: 1 0 0">
                            <label for="departemen" class="form-label">Departemen</label>
                            <input type="text" class="form-control" id="departemen" />
                        </div>
                        <div style="font: 300 12; justify-content: space-between; align-items: center; flex: 1 0 0">
                            <label for="statuskaryawan" class="form-label">Status</label>
                            <input type="text" class="form-control" id="statuskaryawan" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="statuskaryawan" class="form-label">Status Karyawan</label>
                        <input type="text" class="form-control" id="statuskaryawan" />
                    </div>
                    <button type="add" class="button-submit">Submit</button>
                    <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
            <img class="img-8" src="{{asset("image/Narasi_Logo.svg")}}" alt=" " />
        </div>
    </div>
</div>
