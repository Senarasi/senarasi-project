@extends('layout.index')
@section('title')
    Budget Dashboard
@endsection
@section('content')
    <div class="body" style="margin-top: 65px; margin-left: 132px">
        <div class="badanisi">
            <div class="container">
                <div class="div-15">
                    <div class="column">
                        <div class="div-16">
                            <img loading="lazy " src="{{ asset('storage/image/Asset_Photo.svg') }}" class="img-6" />
                            <div class="div-17">Asset Management</div>
                            <div class="div-18">Informasi mengenai list asset dan peminjaman asset</div>
                            <a href="#" class="text-decoration-none text-end">
                                <button class="button-check">Check</button>
                            </a>
                        </div>
                    </div>
                    <div class="column-2">
                        <div class="div-20">
                            <img loading="lazy " src="{{ asset('storage/image/Budgetlogo.svg') }}" class="img-7" />
                            <div class="div-21">Budgeting System</div>
                            <div class="div-22">Informasi mengenai budget dan request budget</div>
                            <a href="/dashboard-budget" class="text-decoration-none text-end">
                                <button class="button-check">Check</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
