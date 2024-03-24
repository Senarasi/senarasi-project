@extends('layout.index')
@section('title')
    Budget Dashboard
@endsection
@section('content')
    <a href="/vendor" class="text-decoration-none text-end">
        <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                          7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back to Main Vendor
        </button>
    </a>
    <div style="margin-top: 24px"></div>
    <form action="" class="formrequest">
        <fieldset disabled>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Nama Vendor</label>
                <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
            </div>
        </fieldset>
        <div class="barangpricelist" style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr;">
            <div class="mb-3">
                <label for="namabarang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="namabarang" />
            </div>
            <div class=" mb-3 ">
                <label for="hargabarang" class="form-label">Harga Barang</label>
                <input type="text" class="form-control" id="hargabarang" />
            </div>
        </div>
        <button type="add " class="button-general ">Submit</button>
    </form>
@endsection
@section('custom-js')
    <script>
        /* Dengan Rupiah */
        var hargabarang = document.getElementById('hargabarang');
        hargabarang.addEventListener('keyup', function(e) {
            hargabarang.value = formatRupiah(this.value, 'Rp');
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? 'Rp ' + rupiah : '';
        }
    </script>
@endsection
