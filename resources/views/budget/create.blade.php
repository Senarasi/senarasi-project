@extends('layout.index')
@section('title')
    Budget Dashboard
@endsection
@section('content')
    <button class="navback">
        <svg xmlns="http://www.w3.org/2000/svg " width="10 " height="17 " viewBox="0 0 10 17 " fill="none ">
            <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                        7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
        </svg>
        Back to Main Dashboard
    </button>
    <div class="judulhalaman" style="text-align: start">Request Budget</div>
    <form class="formrequest">
        <div class="mb-3">
            <label for="Select " class="form-label">Pilih Request Budget</label>
            <select id="Select " class="form-select">
                <option>Choose One</option>
            </select>
        </div>
        <fieldset disabled>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Budget Tahunan</label>
                <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
            </div>
            <div class="mb-3">
                <label for="disabledTextInput " class="form-label">Budget Kuarter</label>
                <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Budget Perbulan</label>
                <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
            </div>
        </fieldset>
        <div class="mb-3">
            <label for="SelectProduser" class="form-label">Nama Produser</label>
            <select id="SelectProduser" class="form-select">
                <option>Choose One</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="SelectManager" class="form-label">Nama Manager</label>
            <select id="SelectManager" class="form-select">
                <option>Choose One</option>
            </select>
        </div>
        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
            <div class="mb-3">
                <label for="managerform" class="form-label">Tanggal Mulai</label>
                <input type="date" id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
            </div>
            <div class="mb-3">
                <label for="managerform" class="form-label">Tanggal Selesai</label>
                <input type="date" id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
            </div>
        </div>
        <a href="/create-budget-detail" class="text-decoration-none text-end">
            <button type="button" class="button-permintaan">Pilih Vendor dan Barang</button>
        </a>
    </form>

    <div class="button-request">
        <button type="submit" class="button" style="color: white">Request</button>
    </div>
@endsection
