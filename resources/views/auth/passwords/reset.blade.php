@extends('layout.app')
@section('costum-css')
    <style>
        .custom-card {
            width: 50%;
            /* Set a fixed width */
            max-width: 100%;
            /* Ensure it is responsive */
        }

        .custom-logo::before {
            background-color: #ffff;
        }

        .custom-logo {
            margin: 0 auto 10px auto;
            max-width: 400px;
            /* Gambar tidak lebih besar dari 400px */
        }

        .image {
            display: flex;
            justify-content: center;
            /* Pusatkan gambar secara horizontal */
            align-items: center;
            /* Pusatkan gambar secara vertikal */
            height: 100%;
            /* Menjaga tinggi kontainer sesuai tinggi layar */
        }

        @media (max-width: 768px) {

            /* Tablet */
            .custom-logo {
                width: 200px;
            }
        }

        @media (max-width: 576px) {

            /* Handphone */
            .custom-logo {
                width: 100px;
            }
        }
    </style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="image">
                    <img src="{{ asset('asset/image/senarasi_logo1.png') }}" class="custom-logo img-fluid" alt="Logo">
                </div>

                <div class="card position-absolute top-50 start-50 translate-middle custom-card">
                    <div class="card-header">{{ __('Reset Password') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
