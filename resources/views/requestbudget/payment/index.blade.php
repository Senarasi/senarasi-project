@extends('layout.index')

@section('title')
    Request Payment - Budgeting System
@endsection

@section('content')


<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 24px; font: 600 18px Narasi Sans, sans-serif; ">
    <li class="nav-item" role="presentation"  style="flex: 1; text-align: center;">
        <button class="nav-link  tablinks" id="data5-tab" data-url="/detail-budget"
            data-bs-toggle="tab" data-bs-target="#data5-tab-pane" type="button" role="tab"
            aria-controls="data1-tab-pane" aria-selected="false" style="width: 100%; color: #4a25aa; letter-spacing: 0.5px; font-weight: 300">PROGRAM</button>
    </li>
    <li class="nav-item" role="presentation"  style="flex: 1; text-align: center;">
        <button class="nav-link active tablinks" id="preview-tab" data-url="/requestpayment"
            data-bs-toggle="tab" data-bs-target="#preview-tab-pane" type="button" role="tab"
            aria-controls="preview-tab-pane" aria-selected="true" style="width: 100%; letter-spacing: 0.5px;" >PAYMENT</button>
    </li>
    <li class="nav-item" role="presentation"  style="flex: 1; text-align: center;">
        <button class="nav-link tablinks" id="preview-tab" data-url="/requestpurchase"
            data-bs-toggle="tab" data-bs-target="#preview-tab-pane" type="button" role="tab"
            aria-controls="preview-tab-pane" aria-selected="false" style="width: 100%; color: #4a25aa; letter-spacing: 0.5px; font-weight: 300" >PURCHASE</button>
    </li>
    <li class="nav-item" role="presentation"  style="flex: 1; text-align: center;">
        <button class="nav-link tablinks" id="preview-tab" data-url="/requestadvance"
            data-bs-toggle="tab" data-bs-target="#preview-tab-pane" type="button" role="tab"
            aria-controls="preview-tab-pane" aria-selected="false" style="width: 100%; color: #4a25aa; letter-spacing: 0.5px; font-weight: 300" >ADVANCE</button>
    </li>
    <li class="nav-item" role="presentation">
    </li>
</ul>

    <div class="judulhalaman" style="display: flex; align-items: center; ">Payment Request</div>
            <a href="/requestpayment-create" type="button" style="width: fit-content; text-decoration: none" class="button-departemen">
                Payment Request<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white" />
                </svg>
            </a>

        <div class="tablenih">
            <div class="table-responsive p-3">
                <table id="datatable" class="table table-hover "
                style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                    <thead style="font-weight: 500; ">
                        <tr class="dicobain ">
                            <th scope="col " style="width:64px">No</th>
                            <th scope="col "  style="width: 72px">Date</th>
                            <th scope="col " style="width: 102px">Voucher No</th>
                            <th scope="col "  style="max-width:124px">Paid To</th>
                            <th scope="col "  style="max-width:124px">Total</th>

                            <th scope="col "  style="max-width:124px">Requester</th>
                            <th scope="col ">Note</th>
                            <th scope="col " style="width:64px">Action</th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                        <tr>
                            <th scope="row ">1</th>
                            <td>12 December 2024</td>
                            <td> Mata Najwa</td>
                            <td>PT. Narasi Citra Sahwahita</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="/detail-request"  style="text-decoration: none"> <button type="button "
                                    class="button-general" style="width: fit-content; ">DETAIL</button>
                                </a></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

@endsection


{{-- @section('modal')
    <div class="modal justify-content-center fade" id="modal-addpayment"  data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" />
                            </div>
                            <div class="col mb-3">
                                <label for="vouchernumber" class="form-label">Voucher Number</label>
                                <input type="text" class="form-control" id="vouchernumber" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="companypayment" class="form-label">Paid To</label>
                                <input type="text" class="form-control" id="companypayment" />
                            </div>
                            <div class="col mb-3">
                                <label for="paidvia" class="form-label">Paid Via</label>
                                <select id="producer_id" name="paidvia" class="selectize">
                                    <option disabled selected>Choose One</option>
                                    <option value="transfer">Transfer</option>
                                    <option value="Virtual Account">Virtual Account</option>
                                </select>
                            </div>
                        </div>
                       <div class="row">
                        <div class="col mb-3">
                            <label for="vendor" class="form-label">Department</label>
                            <select id="department_id" name="department_id" class="selectize">
                                <option disabled selected>Choose One</option>
                                <option>IT</option>
                                <option>HC</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="vendor" class="form-label">Requirement</label>
                            <select id="requirement" name="requirement" class="selectize">
                                <option disabled selected>Choose One</option>
                                <option>Internet & Telecomunication</option>
                            </select>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col mb-3">
                            <label for="bank" class="form-label">Bank</label>
                            <select id="bank" name="bank" class="selectize">
                                <option disabled selected>Choose One</option>
                                <option>Bank Central Asia (BCA)</option>
                                <option>Bank Rakyat Indonesia (BRI)</option>
                                <option>Bank Mandiri</option>
                                <option>Bank Negara Indonesia (BNI)</option>
                                <option>Bank Syariah Indonesia (BSI)</option>
                                <option>Bank Danamon</option>
                                <option>Bank CIMB Niaga</option>
                                <option>Bank Tabungan Negara (BTN)</option>
                                <option>Bank Permata</option>
                                <option>Bank OCBC NISP</option>
                                <option>Bank Mega</option>
                                <option>Bank Sinarmas</option>
                                <option>Bank Panin</option>
                                <option>Bank UOB Indonesia</option>
                                <option>Bank Maybank Indonesia</option>
                                <option>Bank Commonwealth</option>
                                <!-- Tambahkan bank lain yang diperlukan -->
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="rekening" class="form-label">Account Number / VA</label>
                            <input type="text" class="form-control" id="rekening" />
                        </div>
                       </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>

                            <textarea class="form-control"  id="alamatvendor" style="height: 100px"></textarea>

                        </div>


                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
            </div>
        </div>
    </div>

    <div class="modal justify-content-center fade" id="modal-editvendor"  data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif">
                        <div class="mb-3">
                            <label for="vendor" class="form-label">Vendor Name</label>
                            <input type="text" class="form-control" id="vendor" />
                        </div>
                        <div class="mb-3">
                            <label for="PIC" class="form-label">PIC</label>
                            <input type="text" class="form-control" id="pic" />
                        </div>
                        <div class="mb-3">
                            <label for="vendor" class="form-label">Contact Vendor</label>
                            <input type="text" class="form-control" id="vendor" />
                        </div>
                        <div class="mb-3">
                            <label for="vendor" class="form-label">Email Vendor</label>
                            <input type="text" class="form-control" id="vendor" />
                        </div>
                        <div class="mb-3">
                            <label for="vendor" class="form-label">NPWP</label>
                            <input type="text" class="form-control" id="vendor" />
                        </div>
                        <div class="mb-3">
                            <label for="vendor" class="form-label">Vendor Address</label>

                            <textarea class="form-control"  id="alamatvendor" style="height: 100px"></textarea>

                        </div>


                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
            </div>
        </div>
    </div>

@endsection --}}


@section('custom-js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tabButtons = document.querySelectorAll('.nav-link.tablinks');

        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetUrl = button.getAttribute('data-url');

                // Redirect to the URL specified in the data-url attribute
                window.location.href = targetUrl;
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
  $('.selectize').selectize({
    placeholder: "Type to search...",
            allowClear: true,
            create: false
  });
});
</script>
@endsection
