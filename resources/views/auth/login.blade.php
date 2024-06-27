<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        {{-- ngok meta tag --}}
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>Login Narasi</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>

    <body>
        <section class="login d-flex">
            <div class="login-left w-50 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-9">
                        <div class="header">
                            <img style="margin-bottom: 8px" src="/image/senarasi_login.png" alt="" />
                            <div class="underfontjudul">Sistem Elektronik Narasi</div>
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="login-form">
                                <label for="email" class="form-label">Email <span
                                        style="color: #e73638">*</span></label>
                                <input id="email" type="email" class="form-control" name="email"
                                    placeholder="name@example.com" />

                                <label for="password" class="form-label">Password<span
                                        style="color: #e73638">*</span></label>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <input name="password" type="password" value="" class="input form-control"
                                            id="password" placeholder="password" required="true" aria-label="password"
                                            aria-describedby="basic-addon1" />
                                        <span class="input-group-text" onclick="password_show_hide();">
                                            <i class="fas fa-eye" id="show_eye"></i>
                                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check"
                                style="display: flex; justify-content: space-between; align-items: end">
                                <div>
                                    <input type="checkbox" class="form-check-input" id="rememberme" />
                                    <label class="form-check-label" for="rememberme ">Ingat Saya</label>
                                </div>
                                <a href="#" class="text-decoration-none text-end" data-bs-toggle="modal"
                                    data-bs-target="#forgotPasswordModal">Forgot Password?</a>
                            </div>
                            <button type="submit" class="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="login-right">
                <div class="row justify-content-center align-items-center h-100">
                    <img src="{{ asset('image/illustrasi_login.png') }}" alt="" />
                </div>
            </div>
        </section>
        <footer class="footer text-center">
            <img loading="lazy "
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/c53e84037f289d47e60f023b39f3ead1c9294defe48453d7067377be962ad154? "
                class="img-2" /> 2024 Narasi TV | All rights reserved.
        </footer>
        <script>
            function password_show_hide() {
                var x = document.getElementById("password");
                var show_eye = document.getElementById("show_eye");
                var hide_eye = document.getElementById("hide_eye");
                hide_eye.classList.remove("d-none");
                if (x.type === "password") {
                    x.type = "text";
                    show_eye.style.display = "none";
                    hide_eye.style.display = "block";
                } else {
                    x.type = "password";
                    show_eye.style.display = "block";
                    hide_eye.style.display = "none";
                }
            }
        </script>
    </body>

</html>
