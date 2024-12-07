<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        {{-- ngok meta tag --}}
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>Login Narasi</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="shortcut icon" href="{{ asset('asset/image/narasi_logomark.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>
    <style>
        .login-left {
            flex: 1;
            width: 50%;
        }

        .login-right {
            flex: 1;

            display: flex;
            justify-content: center;
            /* Centers the image horizontally */
            align-items: center;
            /* Centers the image vertically */

        }

        .login-right img {
            width: 50%;
            /* Adjust image width */
            margin-top: 20px;
            /* Adjusts vertical positioning */
        }

        .header {
            text-align: start;
            /* This centers the content of the header */
        }

        @media (max-width: 991px) {
            .login-left {
                width: 100%;
            }

            .login-right {
                display: none;
            }

            .header {
                text-align: center;
                /* This centers the content of the header */
            }
        }
    </style>

    <body>
        <section class="login d-flex">
            <div class="login-left w-50 w-md-50 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-11 col-md-9">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="header">
                                <img style="margin-bottom: 8px" src="asset/image/senarasi_login.png" alt="" />
                                <div class="underfontjudul">Sistem Elektronik Narasi</div>
                            </div>
                            <div class="login-form">
                                <label for="email" class="form-label">Email <span
                                        style="color: #e73638">*</span></label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="name@example.com" required
                                    autocomplete="email" autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="password" class="form-label">Password <span
                                        style="color: #e73638">*</span></label>
                                <div class="input-group mb-3">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Your Password" required autocomplete="current-password" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-check d-flex justify-content-between align-items-end">
                                <div>
                                    <input type="checkbox" class="form-check-input" id="rememberme" />
                                    <label class="form-check-label" for="rememberme">Remember Me?</label>
                                </div>
                                <a href="#" class="text-decoration-none text-end" data-bs-toggle="modal"
                                    data-bs-target="#forgotPasswordModal">Forgot Password?</a>
                            </div>
                            <button type="submit" class="login text-decoration-none text-end mt-3" id="submit-btn"
                                style="border-radius: 8px">L O G I N</button>
                        </form>
                        <!-- Modal -->
                        <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog"
                            aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content" style=" background: white;
      margin: 8px;">
                                    <div class="modal-header forgot-password-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-white"
                                        style="margin-top: 0px;
            border-radius:16px;">
                                        <form id="profilenavbar" class="modal-form-check"
                                            style="font: 500 14px Narasi Sans, sans-serif">

                                            <div class="mb-3">
                                                <label for="namakaryawan" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="forgotpassword"
                                                    placeholder="Enter your email">
                                            </div>
                                            <a href="#" class="tombol"
                                                style="width: 100%; border: 0.5px solid #f1f1f1;"
                                                id="submit-btn">Submit</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Section (Hidden on Mobile) -->
            <div class="login-right ">
                <div class="row">
                    <img style="width: 100%" src="{{ asset('asset/image/illustrasi_login.png') }}" alt="" />
                </div>
            </div>
        </section>
        <footer class="footer text-center">
            <img loading="lazy "
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/c53e84037f289d47e60f023b39f3ead1c9294defe48453d7067377be962ad154? "
                class="img-2" /> 2024 Narasi TV | All rights reserved.
        </footer>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }} "></script>
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
