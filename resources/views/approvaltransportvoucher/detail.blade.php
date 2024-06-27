@extends('layout.index3')

@section('title')
    Detail Approval Voucher - Budgeting System
@endsection

@section('content')
<div style="margin-top: 12px;margin-left: 24px">
    <a href="/approval-transportvoucher"  style="text-decoration: none">
        <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
            <path
                d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
        7.2501 0 7.6501 0 8.0501Z "
                fill="#4A25AA "
            />
            </svg>
            Back to Approval
        </button>
    </a>

    <div class="tablenih">
        <div style="justify-content: space-between; display: flex; margin-left: 12px; margin-right: 12px; margin-top: 12px; ">
            <div>
                <div>
                    <p style="font: 400 16px Narasi Sans, sans-serif; color: #4A25AA; margin-left: 2px;">Request Voucher</p>
                    <div class="judulhalaman" style="text-align: start; margin-top: -16px;; margin-left:-1px">NRS001/2024</div>
                </div>
            </div>

            <div>
                <div class="button-approv" style="margin-top: -px;">
                    <button type="submit" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#modalapprov" style="color: white; padding: 12px 24px; margin-right: 8px ">Approv</button>
                    <button type="button" class="btn btn-danger " style="color: white; padding: 12px 24px;">Reject</button>
                </div>



            </div>
        </div>

        <div style="border: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; margin-bottom: 24px; border-bottom: none;">
            <table class="table table-hover " style="font: 300 16px Narasi Sans, sans-serif; width: 100%;  margin-bottom: 12px; text-align: center ">
                <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                    <thead style="font-weight: 500">
                        <tr class="dicobain">
                            <th scope="" style="width:150px">No</th>
                            <th scope="col" style="text-align: start; width: 600px">Description</th>
                            <th scope="col " style="text-align: start"></th>
                        </tr>
                    </thead>
                    <tbody style="text-transform: uppercase">
                        <tr>
                            <th scope="row">1</th>
                            <td style="text-align: start;">Date</td>
                            <td class="total-price" style="font-weight: 300;text-align: start">31 May 2024</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td style="text-align: start; ">User</td>
                            <td class="total-price" style="font-weight: 300;text-align: start">Julius Ardhiansyah</td>
                        </tr>
                        <tr>
                            <th scope="row ">3</th>
                            <td style="text-align: start; ">User Phone</td>
                            <td class="total-price" style="font-weight: 300; text-align: start ">08128319213</td>
                        </tr>
                        <tr>
                            <th scope="row ">4</th>
                            <td style="text-align: start; ">Start Location</td>
                            <td class="total-price" style="font-weight: 300; text-align: start ">Intiland Tower</td>
                        </tr>
                        <tr>
                            <th scope="row ">5</th>
                            <td style="text-align: start; ">Final Location</td>
                            <td class="total-price" style="font-weight: 300; text-align: start ">Blok M</td>
                        </tr>
                        <tr>
                            <th scope="row ">6</th>
                            <td style="text-align: start; ">Description</td>
                            <td class="total-price" style="font-weight: 300;text-align: start ">Keperluan Meeting Bersama Klien dari Australia</td>
                        </tr>

                    </tbody>
                </table>
            </table>
        </div>


    </div>
</div>


@endsection

@section('modal')
<div class="modal justify-content-center fade" id="modalapprov" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body bg-white">
                <form class="modal-form-check" id="transportForm" style="font: 500 14px Narasi Sans, sans-serif">
                    <div class="row">
                        <div class="col mb-3">
                            <fieldset disabled="disabled">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control" id="date" />
                            </fieldset>
                        </div>
                        <div class="col mb-3">
                            <label for="transport" class="form-label">Select Transportation</label>
                            <select id="transport" class="form-select">
                                <option style="color: rgb(189, 189, 189)">Choose Transportation</option>
                                <option value="MRT">MRT</option>
                                <option value="Grab/Gojek">Grab/Gojek</option>
                                <option value="Driver">Driver</option>
                            </select>
                        </div>
                    </div>
                    <fieldset disabled="disabled">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="user" class="form-label">User</label>
                                <input type="text" class="form-control" id="user" />
                            </div>
                            <div class="col mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="startLocation" class="form-label">Start Location</label>
                                <input type="text" class="form-control" id="startLocation" />
                            </div>
                            <div class="col mb-3">
                                <label for="finalLocation" class="form-label">Final Location</label>
                                <input type="text" class="form-control" id="finalLocation" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" />
                        </div>
                    </fieldset>

                    <div class="mb-3" id="voucherDiv" style="display: none;">
                        <label for="voucher" class="form-label">Voucher</label>
                        <textarea class="form-control" id="voucher" style="height: 100px"></textarea>
                    </div>
                    <button type="submit" class="button-submit" style="background:green">Approve</button>
                    <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
            <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('transportForm');
        const transportSelect = document.getElementById('transport');
        const voucherDiv = document.getElementById('voucherDiv');

        transportSelect.addEventListener('change', () => {
            if (transportSelect.value === 'Grab/Gojek') {
                voucherDiv.style.display = 'block';
            } else {
                voucherDiv.style.display = 'none';
            }
        });
    });
</script>
@endsection
