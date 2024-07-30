@extends('layout.index')

@section('title')
    Create Request Budget - Budgeting System
@endsection

@section('content')
    <a href="/requestadvance" class="navback" style="text-decoration: none;">
            <svg xmlns="http://www.w3.org/2000/svg " width="10 " height="17 " viewBox="0 0 10 17 " fill="none ">
                <path
                    d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                                                                                                                                                                                                                                                          7.2501 0 7.6501 0 8.0501Z "
                    fill="#4A25AA " />
            </svg>
            Back
    </a>
    <!--blablabla -->
    <div class="judulhalaman" style="text-align: start">Advance Request</div>

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 24px; font: 600 18px Narasi Sans, sans-serif; ">
        <li class="nav-item" role="presentation"  style="flex: 1; text-align: center;">
            <button class="nav-link  tablinks" id="data5-tab" data-url="/requestadvance-create"
                data-bs-toggle="tab" data-bs-target="#data5-tab-pane" type="button" role="tab"
                aria-controls="data1-tab-pane" aria-selected="false" style="width: 100%; color: #4a25aa; letter-spacing: 0.5px; font-weight: 300" >HEADER</button>
        </li>
        <li class="nav-item" role="presentation"  style="flex: 1; text-align: center;">
            <button class="nav-link active tablinks" id="preview-tab" data-url="/requestadvance-description"
                data-bs-toggle="tab" data-bs-target="#preview-tab-pane" type="button" role="tab"
                aria-controls="preview-tab-pane" aria-selected="true" style="width: 100%; letter-spacing: 0.5px;">DESCRIPTION</button>
        </li>
        <li class="nav-item" role="presentation">
        </li>
    </ul>

    <div class="tab-content" id="myTabContent" style="margin-top: 24px">
        <!-- PERFORMER -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="mainForm" action=""></form>

        <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px; border-bottom:none; border-top: none">
            <table class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center; vertical-align: center;">
                <thead style="font-weight: 500; border-top: 1px solid #c4c4c4">
                    <tr class="dicobain">
                        <th scope="col ">No</th>
                        <th scope="col ">Description</th>
                        
                        <th scope="col ">Bank</th>
                        <th scope="col ">Account Number / VA</th>
                       
                        <th scope="col ">Account Name</th>
                        <th scope="col ">Amount</th>
                        <td scope="col " style="border-left:1px solid #c4c4c4">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row ">1</th>
                        <td style="text-align: start">Pembayaran Internet CBN - Desember 2023</td>
                        <td>CIMB Niaga</td>
                        <td>900901597426</td>
                        <td>PT. Cyberindo Aditama</td>
                        <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp 16,450,000,00
                        </td>
                        <td  style="border-left:1px solid #c4c4c4">
                            <span style="display: flex; gap: 8px; justify-content: center" >
                                <a href="javascript:;" style="font-size: 14px" data-bs-toggle="modal" data-bs-target="#edititem"
                                    data-id=""
                                    data-url="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <rect width="32" height="32" rx="4" fill="#4A25AA"/>
                                        <path d="M11.4903 11.0977H10.5491C10.0498 11.0977 9.57105 11.296 9.21803 11.649C8.86501 12.002 8.66669 12.4808 8.66669 12.9801V21.4508C8.66669 21.9501 8.86501 22.4289 9.21803 22.7819C9.57105 23.1349 10.0498 23.3332 10.5491 23.3332H19.0199C19.5191 23.3332 19.9979 23.1349 20.3509 22.7819C20.7039 22.4289 20.9023 21.9501 20.9023 21.4508V20.5096" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M19.9611 9.2155L22.7847 12.0391M24.0883 10.7073C24.459 10.3366 24.6672 9.83385 24.6672 9.30962C24.6672 8.78539 24.459 8.28263 24.0883 7.91195C23.7176 7.54126 23.2148 7.33301 22.6906 7.33301C22.1664 7.33301 21.6636 7.54126 21.2929 7.91195L13.3727 15.8039V18.6275H16.1963L24.0883 10.7073Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg>
                                    </a>
                                <form class="form-delete" onsubmit="return confirm('Konfirmasi hapus data ini?')"
                                    action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="url_back"
                                        value="">
                                    <a href="#" onclick="$(this).closest('form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <rect width="32" height="32" rx="4" fill="#E43539"/>
                                        <path d="M10.9996 13.3856H20.7891L20.2038 22.7541C20.177 23.1817 19.9883 23.583 19.676 23.8763C19.3637 24.1697 18.9514 24.333 18.5229 24.333H13.2665C12.8381 24.333 12.4257 24.1697 12.1135 23.8763C11.8012 23.583 11.6125 23.1817 11.5857 22.7541L10.9996 13.3856ZM21.7895 10.8593V12.5435H10V10.8593H12.5263V10.0172C12.5263 9.57054 12.7038 9.14215 13.0196 8.8263C13.3355 8.51045 13.7638 8.33301 14.2105 8.33301H17.5789C18.0256 8.33301 18.454 8.51045 18.7699 8.8263C19.0857 9.14215 19.2632 9.57054 19.2632 10.0172V10.8593H21.7895ZM14.2105 10.8593H17.5789V10.0172H14.2105V10.8593Z" fill="white"/>
                                      </svg></a>
                                </form>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row ">2</th>
                        <td style="text-align: start">PPN - VAT 11%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp 1,809,500,00
                        </td>
                        
                          <td  style="border-left:1px solid #c4c4c4">
                            <span style="display: flex; gap: 8px; justify-content: center" >
                                <a href="javascript:;" style="font-size: 14px" data-bs-toggle="modal" data-bs-target="#edititem"
                                    data-id=""
                                    data-url="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <rect width="32" height="32" rx="4" fill="#4A25AA"/>
                                        <path d="M11.4903 11.0977H10.5491C10.0498 11.0977 9.57105 11.296 9.21803 11.649C8.86501 12.002 8.66669 12.4808 8.66669 12.9801V21.4508C8.66669 21.9501 8.86501 22.4289 9.21803 22.7819C9.57105 23.1349 10.0498 23.3332 10.5491 23.3332H19.0199C19.5191 23.3332 19.9979 23.1349 20.3509 22.7819C20.7039 22.4289 20.9023 21.9501 20.9023 21.4508V20.5096" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M19.9611 9.2155L22.7847 12.0391M24.0883 10.7073C24.459 10.3366 24.6672 9.83385 24.6672 9.30962C24.6672 8.78539 24.459 8.28263 24.0883 7.91195C23.7176 7.54126 23.2148 7.33301 22.6906 7.33301C22.1664 7.33301 21.6636 7.54126 21.2929 7.91195L13.3727 15.8039V18.6275H16.1963L24.0883 10.7073Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg>
                                    </a>
                                <form class="form-delete" onsubmit="return confirm('Konfirmasi hapus data ini?')"
                                    action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="url_back"
                                        value="">
                                    <a href="#" onclick="$(this).closest('form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <rect width="32" height="32" rx="4" fill="#E43539"/>
                                        <path d="M10.9996 13.3856H20.7891L20.2038 22.7541C20.177 23.1817 19.9883 23.583 19.676 23.8763C19.3637 24.1697 18.9514 24.333 18.5229 24.333H13.2665C12.8381 24.333 12.4257 24.1697 12.1135 23.8763C11.8012 23.583 11.6125 23.1817 11.5857 22.7541L10.9996 13.3856ZM21.7895 10.8593V12.5435H10V10.8593H12.5263V10.0172C12.5263 9.57054 12.7038 9.14215 13.0196 8.8263C13.3355 8.51045 13.7638 8.33301 14.2105 8.33301H17.5789C18.0256 8.33301 18.454 8.51045 18.7699 8.8263C19.0857 9.14215 19.2632 9.57054 19.2632 10.0172V10.8593H21.7895ZM14.2105 10.8593H17.5789V10.0172H14.2105V10.8593Z" fill="white"/>
                                      </svg></a>
                                </form>
                            </span>
                        </td>
                    </tr>
                  
                    <tr style="border-bottom: 1px solid #c4c4c4; ">
                        <td colspan="5" class="text-center" style="font-weight: 500; background-color: #dbdee8">
                            Total</td>
                        <td class="total-price">Rp.
                            0
                        </td>
                        <td  class="text-center" style="border-left:1px solid #c4c4c4"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex">
            <button type="button" class="button-departemen me-3" onclick="addItem()" data-bs-toggle="modal"
                data-bs-target="#additem">Add Item<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white" />
                </svg>
            </button>
        </div>

        {{-- <div id="tableContainer"> --}}

        {{-- </div> --}}
    </div>
@endsection


@section('modal')
    <div class="modal justify-content-center fade" id="additem" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="" method="POST" class="modal-form-check"
                        style="font: 500 14px Narasi Sans, sans-serif">
                        @csrf
                        <div class="row">
                            <div class="col mb-3">
                                    <label for="desc" class="form-label">Item Name</label>
                                    <input type="text" class="form-control" id="desc" name="desc"  style="padding: 8px" required/>
                            </div>
                            <div class="col mb-3">
                                <label for="qty" class="form-label">QTY</label>
                                <input type="number" class="form-control" id="qty" name="qty"  style="padding: 8px" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <select id="unit" name="unit" class="selectize">
                                        <option disabled selected>Choose One</option>
                                        <option>PCS</option>
                                        <option>LOT</option>
                                        <!-- Tambahkan bank lain yang diperlukan -->
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Budget Approved</label>
                                <input type="text" class="form-control" id="amount" name="amount" style="padding: 8px"/>
                            </div>
                            
                        </div>

                    
                            <div class="mb-3">
                                <label for="note" class="form-label">Specification</label>
                                <textarea type="text"  class="form-control" id="note" name="note" cols="30" rows="2"></textarea>
                            </div>
           
                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal" >Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg') }}" alt=" " />
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    <div class="modal justify-content-center fade" id="edititem" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body bg-white">
                <form action="" method="POST" class="modal-form-check"
                    style="font: 500 14px Narasi Sans, sans-serif">
                    @csrf
                    <div class="row">
                        <div class="col mb-3">
                                <label for="desc" class="form-label">Item Name</label>
                                <input type="text" class="form-control" id="desc" name="desc"  style="padding: 8px" required/>
                        </div>
                        <div class="col mb-3">
                            <label for="qty" class="form-label">QTY</label>
                            <input type="number" class="form-control" id="qty" name="qty"  style="padding: 8px" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                                <label for="unit" class="form-label">Unit</label>
                                <select id="unit" name="unit" class="selectize">
                                    <option disabled selected>Choose One</option>
                                    <option>PCS</option>
                                    <option>LOT</option>
                                    <!-- Tambahkan bank lain yang diperlukan -->
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Budget Approved</label>
                            <input type="text" class="form-control" id="amount" name="amount" style="padding: 8px"/>
                        </div>
                        
                    </div>

                
                        <div class="mb-3">
                            <label for="note" class="form-label">Specification</label>
                            <textarea type="text"  class="form-control" id="note" name="note" cols="30" rows="2"></textarea>
                        </div>
                    <button type="submit" class="button-submit">Submit</button>
                    <button type="button" class="button-tutup" data-bs-dismiss="modal" >Close</button>
                </form>
            </div>
            <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg') }}" alt=" " />
        </div>
    </div>
</div>
@endsection
@section('custom-js')
<script>
    // Fungsi untuk memformat angka menjadi format Rupiah
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    // Event listener untuk input amount
    document.getElementById('amount').addEventListener('keyup', function(e) {
        this.value = formatRupiah(this.value, 'Rp. ');
    });
</script>

<script>
    $(document).ready(function () {
        $('.selectize').selectize({
            placeholder: "Type to search...",
            allowClear: true,
            create: false // Enable creation of new items
        });
    });
</script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#additem').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });
        });
    </script>
    <script>
        var budgetInput = document.getElementById('cost');
        var rawBudgetInput = document.getElementById('raw_budget');

        budgetInput.addEventListener('keyup', function(e) {
            var formattedBudget = formatRupiah(this.value, 'Rp');
            budgetInput.value = formattedBudget; // Update the budget input field with the formatted value
            var rawValue = parseRawBudget(formattedBudget); // Parse the raw numeric value
            rawBudgetInput.value = rawValue; // Store the raw numeric value in the hidden input field
        });

        /* Dengan Rupiah */
        var budgettahunan = document.getElementById('cost');
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

        function parseRawBudget(formattedBudget) {
            // Remove any non-numeric characters from the formatted budget value
            var rawValue = formattedBudget.replace(/[^\d]/g, '');
            return rawValue;
        }
    </script>

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
@endsection
