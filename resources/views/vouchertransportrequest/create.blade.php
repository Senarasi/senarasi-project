@extends('layout.index2')

@section('title')
    Add Transport Request
@endsection

@section('content')
<div style="margin-left: 24px">
    <a href="/voucher-transportrequest" class="text-decoration-none text-end">
        <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                      7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back to Transportation Voucher Request
        </button>
    </a>
    <div style="margin-top: 24px"></div>
    <form  action="" >

            <div class="col mb-3">
                <label for="tanggal" class="form-label">Date</label>
                <input type="date" class="form-control" id="tanggal" />
            </div>

        <div class="row">
            <div class="col mb-3">
                <label for="user" class="form-label">User</label>
                <input type="text" class="form-control" id="user" />
            </div>
            <div class=" col mb-3">
                <label for="phoneUser" class="form-label">User phone</label>
                <input type="text" class="form-control" id="phoneUser" />
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="user" class="form-label">Start Location</label>
                <input type="text" class="form-control" id="user" />
            </div>
            <div class=" col mb-3">
                <label for="phoneUser" class="form-label">Final Location</label>
                <input type="text" class="form-control" id="phoneUser" />
            </div>
        </div>
        <div class="col mb-3">
            <label for="keterangan" class="form-label">Requirement</label>
            <textarea class="form-control" id="keterangan"></textarea>
        </div>



        <button type="submit" class="button-general">Submit</button>
    </form>
</div>
@endsection
