@extends('layout.index')
@section('title')
    Budget Dashboard
@endsection
@section('content')
    <div class="judulhalaman">Budgeting System Narasi</div>
    <div class="button-dashboard">
        <button class="button-ini" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            INPUT
            <span style="color: #ffe900">BUDGET</span>
        </button>
        <a href="/create-budget" class="text-decoration-none text-end">
            <button class="button-ini">REQUEST <span style="color: #ffe900">BUDGET</span></button>
        </a>
    </div>
    <div class="tablenih" style="margin-top: 110px; margin-left: 42px">
        <table class="table table-hover"
            style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
            <thead style="font-weight: 500">
                <tr class="dicobain">
                    <th scope="col ">NO</th>
                    <th scope="col ">Request Number</th>
                    <th scope="col ">Nama Program</th>
                    <th scope="col ">Approval 1</th>
                    <th scope="col ">Approval 2</th>
                    <th scope="col ">Approval 3</th>
                    <th scope="col ">User Submit</th>
                    <th scope="col ">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row ">1</th>
                    <td>1</td>
                    <td>Mata Najwa</td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <circle cx="12" cy="12" r="12" fill="#E73638" />
                        </svg>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="gap: 8px; display: flex; justify-content: center">
                        <a href="#" class="text-decoration-none text-end"><button type="button "
                                class="button-general" style="width: fit-content">DETAIL</button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope=" row ">2</th>
                    <td></td>
                    <td></td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <circle cx="12" cy="12" r="12" fill="#E73638" />
                        </svg>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="gap: 8px; display: flex; justify-content: center"><button type="button "
                            class="button-general" style="width: fit-content">DETAIL</button></td>
                </tr>
                <tr>
                    <th scope="row ">3</th>
                    <td></td>
                    <td></td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <circle cx="12" cy="12" r="12" fill="#E73638" />
                        </svg>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="gap: 8px; display: flex; justify-content: center"><button type="button "
                            class="button-general" style="width: fit-content">DETAIL</button></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('modal')
    <div class="modal justify-content-center fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form class="modal-form-check">
                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">User</label>
                                <input type="text" id="disabledTextInput " class="form-control" placeholder="Admin" />
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="namaprogram" class="form-label">Nama Program</label>
                            <input type="text" class="form-control" id="namaprogram" />
                        </div>
                        <div class="mb-3">
                            <label for="budgettahunan" class="form-label">Budget Tahunan</label>
                            <input type="text" class="form-control" id="budgettahunan" />
                        </div>
                        <button type="submit" class="button-submit">Submit</button>
                        <button type="close" class="button-close btn-secondary">Close</button>
                    </form>
                </div>
                <img class="img-8" src="image/Narasi_Brandmark - Alternate Lockup alternate color version 1.svg "
                    alt=" " />
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
    <script>
        /* Dengan Rupiah */
        var budgettahunan = document.getElementById('budgettahunan');
        budgettahunan.addEventListener('keyup', function(e) {
            budgettahunan.value = formatRupiah(this.value, 'Rp');
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
