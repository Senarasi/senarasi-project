@extends('layout.index')

@section('title')
    Detail Department Request Payment  - Budgeting System
@endsection

@section('content')
    <!--Badan Isi-->
    <a href="{{ url()->previous() }}" style="text-decoration: none">
    <button class="navback">
        <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
          <path
            d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
      7.2501 0 7.6501 0 8.0501Z "
            fill="#4A25AA "
          />
        </svg>
        Back to Detail Budget
      </button>
    </a>


        <div class="tablenih">
            <div style="justify-content: space-between; display: flex; margin-left: 16px; margin-right: 16px; margin-top: 12px; margin-bottom: 24px;">
                <div>
                    <div>
                        <p style="font: 400 16px Narasi Sans, sans-serif; color: #4A25AA; margin-left: 2px;">Request Number</p>
                        <div class="judulhalaman " style="text-align: start; margin-top: -16px; margin-left:-1px">{{ $departmentRequestPayment->department_request_payment_number }}</div>
                    </div>
                    <div class="arips">
                        <div style="font: 400 16px Narasi Sans, sans-serif; color: black ">
                            <table class="tablecoba ">
                                <tbody>
                                    <tr>
                                        <td>Department</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>{{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->department->department_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Budget Code</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>{{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->budget_code}}</td>
                                    </tr>
                                    <tr>
                                        <td>Budget Name</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>{{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->budget_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Paid To</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>{{ $departmentRequestPayment->paid_to}}</td>

                                    </tr>
                                    <tr>
                                        <td>Paid Via</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>{{ $departmentRequestPayment->paid_via}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="font: 400 16px Narasi Sans, sans-serif; color: black;">
                            <table class="tablecoba ">
                                <tbody>
                                    <tr>
                                        <td>Date</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>{{ \Carbon\Carbon::parse( $departmentRequestPayment->date)->translatedFormat('d F Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bank</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>{{ $departmentRequestPayment->bank_name}}</td>

                                    </tr>
                                    <tr>
                                        <td>Bank Account Name</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>{{ $departmentRequestPayment->account_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if ($departmentRequestPayment->paid_via == "Virtual Account")
                                                Virtual Number
                                            @elseif ($departmentRequestPayment->paid_via == "transfer")
                                                Account Number
                                            @endif </td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>{{ $departmentRequestPayment->account_number}}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Doc / No. Invoice </td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>
                                            <a href="{{ $departmentRequestPayment->fileDocument()}}" target="_blank">{{ $departmentRequestPayment->document_number}}</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        {{-- <div  style="font: 400 16px Narasi Sans, sans-serif; color: black;">
                            <table class="tablecoba ">
                                <tbody>


                                </tbody>
                            </table>
                        </div> --}}
                    </div>
                </div>

                <div>

                    @php
                    // Mencari status approval untuk manajer dan finance
                    $managerApproval = $departmentRequestPayment->DepartmentPaymentApprovals->firstWhere('stage', 'manager');
                    $financeApproval = $departmentRequestPayment->DepartmentPaymentApprovals->firstWhere('stage', 'finance');

                    // Logika untuk mengaktifkan atau menonaktifkan tombol
                    $isButtonEnabled = false;

                    // Jika manajer `rejected` maka tombol aktif
                    if ($managerApproval && $managerApproval->status == 'rejected') {
                        $isButtonEnabled = true;
                    }
                    // Jika manajer `approved` dan finance `rejected` maka tombol aktif
                    elseif ($managerApproval && $managerApproval->status == 'approved' && $financeApproval && $financeApproval->status == 'rejected') {
                        $isButtonEnabled = true;
                    }
                    // Jika manajer `approved` dan finance `pending` maka tombol tidak aktif
                    elseif ($managerApproval && $managerApproval->status == 'approved' && $financeApproval && $financeApproval->status == 'pending') {
                        $isButtonEnabled = false;
                    }
                    // Jika salah satunya `pending` maka tombol tidak aktif
                    elseif (($managerApproval && $managerApproval->status == 'pending') || ($financeApproval && $financeApproval->status == 'pending')) {
                        $isButtonEnabled = true;
                    }
                @endphp

                <form method="POST" action="{{ route('request-budget-department.payment.destroy', $departmentRequestPayment->department_request_payment_id) }}" onsubmit="return confirmDelete()">
                    @csrf
                    @method('delete')

                    <div class="button-approv" style="margin-top: -px;">
                        {{-- Tombol Edit aktif jika sesuai dengan logika di atas --}}
                        <a href="{{ route('request-budget-department.payment.edit', $departmentRequestPayment->department_request_payment_id) }}"
                           class="btn btn-success {{ !$isButtonEnabled ? 'disabled' : '' }}"
                           style="color: white; padding: 12px 32px; margin-right: 8px">
                           Edit
                        </a>

                        <button type="submit"
                                class="btn btn-danger"
                                style="color: white; padding: 12px 32px"
                                {{ !$isButtonEnabled ? 'disabled' : '' }}>
                            Delete
                        </button>
                    </div>
                </form>

                    <div class="row" style="margin-top: -24px">
                        <div class="col-3">
                            <a href="{{ route('request-budget-department.payment.viewPdf', $departmentRequestPayment->department_request_payment_id ) }}" target="_blank">
                                <button type="preview" class="btn btn-secondary" style="border-radius: 8px; padding-bottom: 9px; padding-top: 9px; background-color:#ffff; margin-right:8px; border: 1px solid#4A25AA" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Preview" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                        <path d="M16.5 2C13.7311 2 11.0243 2.82109 8.72202 4.35943C6.41973 5.89777 4.62532 8.08427 3.56569 10.6424C2.50607 13.2006 2.22882 16.0155 2.76901 18.7313C3.30921 21.447 4.64258 23.9416 6.60051 25.8995C8.55845 27.8574 11.053 29.1908 13.7687 29.731C16.4845 30.2712 19.2994 29.9939 21.8576 28.9343C24.4157 27.8747 26.6022 26.0803 28.1406 23.778C29.6789 21.4757 30.5 18.7689 30.5 16C30.5 12.287 29.025 8.72601 26.3995 6.1005C23.774 3.475 20.213 2 16.5 2ZM23.947 16.895L11.947 22.895C11.7945 22.9712 11.6251 23.0072 11.4548 22.9994C11.2845 22.9917 11.119 22.9406 10.974 22.8509C10.829 22.7613 10.7093 22.636 10.6264 22.4871C10.5434 22.3381 10.4999 22.1705 10.5 22V10C10.5001 9.82961 10.5437 9.66207 10.6268 9.51327C10.7098 9.36448 10.8294 9.23936 10.9744 9.14981C11.1194 9.06025 11.2848 9.00921 11.455 9.00155C11.6252 8.99388 11.7946 9.02984 11.947 9.106L23.947 15.106C24.1129 15.1891 24.2524 15.3168 24.3498 15.4747C24.4473 15.6326 24.4989 15.8145 24.4989 16C24.4989 16.1856 24.4473 16.3674 24.3498 16.5253C24.2524 16.6832 24.1129 16.8109 23.947 16.894" fill="#4A25AA"/>
                                    </svg>
                                </button>
                            </a>
                        </div>
                        <div class="col-auto">
                                <a href="{{ route('request-budget-department.payment.exportPdf', $departmentRequestPayment->department_request_payment_id ) }}"><button type="download" class="button-export" style="color: white">Export to PDF</button></a>
                        </div>
                    </div>

                    <div class="row mt-2">

                        <div class="col-auto">
                            <form method="POST" action="{{ route('request-budget-department.payment.duplicate', $departmentRequestPayment->department_request_payment_id) }}" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-outline-success" style=" padding: 12px 46px; margin-right: 8px">Duplicate Request</button>
                            </form>
                        </div>
                    </div>

                </div>


            </div>
            <div class="row">

            </div>
            <div style="border: 1px solid #c4c4c4; border-radius: 4px; margin-right:16px; margin-left:16px; margin-bottom: 24px; border-bottom: none;  border-top: none; ">
                <table class="table table-hover table-responsive" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-bottom: 12px; text-align: center;">
                    <thead class="table-light">
                        <tr class="dicobain">
                            {{-- <th scope="col" style="width: 5%">No</th> --}}
                            <th scope="col" style="width: 70%">Description</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            {{-- <th scope="row">1</th> --}}
                            <td style="text-align: start; font-weight: 400">
                                {{ $item->description }}
                                @if ($item->note != null)
                                <span style="font-weight: 300; color:rgb(173, 173, 173); padding-left: 12px">( {{ $item->note }} )</span>
                                @endif
                            </td>
                            <td style="position: relative; text-align: end; padding-left: 24px; font-weight: 300; padding-right: 24px; ">
                                <span style="float: left;">Rp</span>
                                <span style="float: right;">{{ number_format($item->amount, 0, ',', '.') }}</span>
                            </td>
                        </tr>
                        @endforeach

                        <tr style="border-bottom: 1px solid #c4c4c4;" >
                            <td colspan="1" class="text-center" style="font-weight: 500; background-color: #dbdee8">
                                Total</td>
                            <td style="position: relative; text-align: end; padding-left: 24px; font-weight: 400; padding-right: 24px; ">
                                    <span style="float: left;">Rp</span>
                                    <span style="float: right;">{{ number_format($departmentRequestPayment->total_cost, 0, ',', '.') }}</span>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="keteranganbudget" style="margin-left: 12px;">
                <div class="tunggu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="12" fill="#FFE900" />
                    </svg><span class="text-center">menunggu approval</span>
                </div>
                <div class="tolak">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <circle cx="12" cy="12" r="12" fill="#E73638" />
                    </svg><span class="text-center">approval ditolak</span>
                </div>
                <div class="diterima">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <circle cx="12" cy="12" r="12" fill="#009579" />
                    </svg><span class="text-center">approval disetujui</span>
                </div>
            </div>

            @php
                // Mendapatkan approval berdasarkan stage 'manager' dan 'finance'
                $managerApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'manager')->first();
                $financeApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'finance')->first();
            @endphp
            <div style="border: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; width:50%">
                <table class="table table-hover "
                    style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                    <thead style="font-weight: 500; ">
                        <tr class="dicobain ">
                            <th scope="col ">Approval Manager</th>
                            <th scope="col ">Approval Finance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @if (($managerApproval->status ?? '-') == 'pending')
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="12" fill="#FFE900" />
                                    </svg></td>
                            @elseif (($managerApproval->status ?? '-') == 'approved')
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="12" fill="#009579" />
                                    </svg></td>
                            @else
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="12" fill="#E73638" />
                                    </svg></td>
                            @endif
                            @if (($financeApproval->status ?? '-') == 'pending')
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="12" fill="#FFE900" />
                                    </svg></td>
                            @elseif (($financeApproval->status ?? '-') == 'approved')
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="12" fill="#009579" />
                                    </svg></td>
                            @else
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="12" fill="#E73638" />
                                    </svg></td>
                            @endif
                        </tr>
                        <tr>
                            <td>{{ $departmentRequestPayment->manager->name }}</td>
                            <td>{{ $departmentRequestPayment->finance->name }}</td>
                        </tr>
                    </tbody>
                </table>
                {{-- @php
                    $approvalStages = ['manager', 'reviewer', 'finance 1'];
                    if ($hasApprovalFinance2) {
                        $approvalStages[] = 'finance 2';
                    }

                    $rejectionNotes = [];

                    foreach ($approvalStages as $stage) {
                        $approval = $requestBudgets->approval->where('stage', $stage)->first();
                        if ($approval && $approval->status == 'rejected' && !empty($approval->reason)) {
                            $notes = json_decode($approval->reason, true);
                            $rejectionNotes = array_merge($rejectionNotes, $notes);
                        }
                    }
                @endphp

                @if (!empty($rejectionNotes))
                    <div class="notereject">
                        <div
                            style="color: #E73638; font-weight: 700; font-size: 24px; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 12px">
                            Notes Reject
                        </div>
                        @foreach ($rejectionNotes as $index => $note)
                            <div class="judulreject">{{ $index + 1 }}. {{ $note['title'] }}</div>
                            <div class="isireject">{{ $note['content'] }}</div>
                        @endforeach
                    </div>
                @endif --}}

                 <!-- Tampilkan Note jika Manager atau Finance reject -->

            </div>

            {{-- <div class="notereject">
                <div style="color: #E73638; font-weight: 700; font-size: 24px; letter-spacing: 0.5px;   text-transform: uppercase; margin-bottom: 12px">Notes Reject</div>
                <div class="judulreject">1. Performer</div>
                <div class="isireject">Harga Kemahalan untuk narsum 1</div>


            </div> --}}

            @if (($managerApproval && $managerApproval->status == 'rejected') || ($financeApproval && $financeApproval->status == 'rejected'))
            <div class="notereject mt-4">
                <div style="color: #E73638; font-weight: 700; font-size: 24px; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 12px">
                    Notes Reject
                </div>
                <!-- Tampilkan note dari Manager jika ada -->
                @if ($managerApproval && $managerApproval->status == 'rejected' && $managerApproval->note)
                    <p><strong>Manager Notes:</strong> {!! $managerApproval->note !!}</p>
                @endif

                <!-- Tampilkan note dari Finance jika ada -->
                @if ($financeApproval && $financeApproval->status == 'rejected' && $financeApproval->note)
                    <p><strong>Finance:</strong> {!! $financeApproval->note !!}</p>
                @endif
            </div>
        @endif
        </div>

@endsection

@section('custom-js')

@endsection
