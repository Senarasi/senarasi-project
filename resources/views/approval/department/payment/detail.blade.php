@extends('layout.index')

@section('title')
    Detail Approval - Budgeting System
@endsection
@section('costum-css')
<style>
    .step-bar .step::before {

        left: -51%;
        width: 100%;

    }

</style>
@endsection


@section('content')
    <a class="navback" href="{{ route('approval-budget-department.payment.index') }}"   style="text-decoration: none">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
            <path
                d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
        7.2501 0 7.6501 0 8.0501Z "
                fill="#4A25AA "
            />
            </svg>
            Back to Approval
    </a>

    <div class="tablenih">
        <div class="table-responsive p-3">
            <div style="justify-content: space-between; display: block;  margin-top: 12px;  margin-bottom: 24px;">
               <div class="row d-flex" style="justify-content: space-between;width:100%; align-self: stretch;">
                    <div class="col">
                        <p style="font: 400 16px Narasi Sans, sans-serif; color: #4A25AA; margin-left: 2px;">Request Number</p>
                        <div class="judulhalaman" style="text-align: start; margin-top: -16px;; margin-left:-1px">{{ $departmentRequestPayment->department_request_payment_number }}</div>
                    </div>
                    <div class="col text-end mb-3" style="margin-right: -26px">
                        <div class="mb-2">
                            {{-- <form action="#">
                            <button type="submit" class="btn btn-success text-end" style="color: white; padding: 12px 24px; margin-right:2px">Approv</button>
                            <a href="{{ route('approval-budget-department.advance.reject') }}">
                                <button type="button" class="btn btn-danger text-end" style="color: white; padding: 12px 24px;">Reject</button>
                            </a>
                            </form> --}}

                            <form action="{{ route('approval-budget-department.payment.approve', $departmentRequestPayment->department_request_payment_id) }}" method="POST">
                                @csrf
                                @php
                                    $currentStage = null;
                                    $isPending = false;

                                    if (Auth::id() == $departmentRequestPayment->manager_id && ($managerApproval === 'pending')) {
                                        $currentStage = 'manager';
                                        $isPending = true;
                                    } elseif (Auth::id() == $departmentRequestPayment->finance_id && $financeApproval === 'pending' && $canApproveFinance) {
                                        $currentStage = 'finance';
                                        $isPending = true;
                                    }
                                @endphp

                                @if ($isPending)
                                    <button type="submit" class="btn btn-success text-end"
                                        style="color: white; padding: 12px 24px; margin-right:2px">Approve</button>

                                    <!-- Reject Button as a link -->
                                    <button type="button" class="btn btn-danger text-end"
                                        style="color: white; padding: 12px 24px;" data-bs-toggle="modal" data-bs-target="#modal-reject-note">Reject</a>
                                @else
                                    <button type="button" class="btn btn-secondary text-end"
                                        style="color: white; padding: 12px 24px; margin-right:2px" disabled>Approve</button>
                                    <button type="button" class="btn btn-secondary text-end"
                                        style="color: white; padding: 12px 24px;" disabled>Reject</button>
                                @endif
                            </form>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="col">
                            <a href="{{ route('request-budget-department.payment.viewPdf', $departmentRequestPayment->department_request_payment_id ) }}" target="_blank">
                                <button type="preview" class="btn btn-secondary" style="border-radius: 8px; padding-bottom: 9px; padding-top: 9px; background-color:#ffff; border: 1px solid#4A25AA" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Preview" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                        <path d="M16.5 2C13.7311 2 11.0243 2.82109 8.72202 4.35943C6.41973 5.89777 4.62532 8.08427 3.56569 10.6424C2.50607 13.2006 2.22882 16.0155 2.76901 18.7313C3.30921 21.447 4.64258 23.9416 6.60051 25.8995C8.55845 27.8574 11.053 29.1908 13.7687 29.731C16.4845 30.2712 19.2994 29.9939 21.8576 28.9343C24.4157 27.8747 26.6022 26.0803 28.1406 23.778C29.6789 21.4757 30.5 18.7689 30.5 16C30.5 12.287 29.025 8.72601 26.3995 6.1005C23.774 3.475 20.213 2 16.5 2ZM23.947 16.895L11.947 22.895C11.7945 22.9712 11.6251 23.0072 11.4548 22.9994C11.2845 22.9917 11.119 22.9406 10.974 22.8509C10.829 22.7613 10.7093 22.636 10.6264 22.4871C10.5434 22.3381 10.4999 22.1705 10.5 22V10C10.5001 9.82961 10.5437 9.66207 10.6268 9.51327C10.7098 9.36448 10.8294 9.23936 10.9744 9.14981C11.1194 9.06025 11.2848 9.00921 11.455 9.00155C11.6252 8.99388 11.7946 9.02984 11.947 9.106L23.947 15.106C24.1129 15.1891 24.2524 15.3168 24.3498 15.4747C24.4473 15.6326 24.4989 15.8145 24.4989 16C24.4989 16.1856 24.4473 16.3674 24.3498 16.5253C24.2524 16.6832 24.1129 16.8109 23.947 16.894" fill="#4A25AA"/>
                                    </svg>
                                </button>
                            </a>
                        </div>
                        <div class="col-auto">
                                <a href="{{ route('request-budget-department.payment.exportPdf', $departmentRequestPayment->department_request_payment_id ) }}"><button type="download" class="button-export" style="color: white">Export PDF</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div style="display: flex">
                <div class="arips">
                    <div style="font: 400 16px Narasi Sans, sans-serif; color: black ">
                        <table class="tablecoba ">
                            <tbody>
                                <tr>
                                    <td>Budget Code</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->budget_code}}</td>
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->department->department_name}}</td>
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
        </div>

        <div style="border-left: 1px solid #c4c4c4;border-right: 1px solid #c4c4c4; border-radius: 4px; margin-bottom: 24px;">
            <table class="table table-hover " style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center ">
                <thead style="font-weight: 500 ">
                    <tr >
                        <th scope="col" style="background: #ccc7d8; letter-spacing: 0.5px;">BUDGET APPROVE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-size: 18px">
                            Rp {{ number_format($departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->budget_yearly, 0, ',', '.') }}</td>
                    </tr>
                </tbody>

                <thead style="font-weight: 500 ">
                    <tr >
                        <th scope="col" style="background: #ccc7d8; letter-spacing: 0.5px;">TOTAL REQUEST BUDGET</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-size: 18px"> Rp {{ number_format($departmentRequestPayment->total_cost, 0, ',', '.') }}</td>
                    </tr>
                </tbody>

                <thead style="font-weight: 500 ">
                    <tr >
                        <th scope="col" style="background: #ccc7d8; letter-spacing: 0.5px;">REMAINING BUDGET</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- <td style="font-size: 18px">Rp {{ number_format($departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->remaining_budget, 0, ',', '.') }}</td> --}}
                        <td>Rp {{ number_format($departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->budget_yearly - $departmentRequestPayment->total_cost  , 0, ',', '.') }}</td>

                    </tr>
                </tbody>






            </table>
        </div>

        <div style="border: 1px solid #c4c4c4; border-radius: 4px; margin-bottom: 24px; border-bottom: none; width: auto;">
            <table class="table table-hover table-responsive" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-bottom: 12px; text-align: center;">
                <thead style="font-weight: 500">
                    <tr class="dicobain">
                        <th scope="col" class="d-none d-md-table-cell">No</th> <!-- Hide on mobile, show on desktop -->
                        <th scope="col" class="d-none d-md-table-cell" style="text-align: start">Description</th>
                        <th scope="col"class="d-md-none" style="text-align: center">Description</th>
                        <th scope="col" class="d-none d-md-table-cell">Total</th> <!-- Hide on mobile, show on desktop -->
                    </tr>
                </thead>
                <tbody style="text-transform: uppercase">
                    @foreach ($items as $item)
                    <tr style="vertical-align: middle;">
                        <th scope="row" class="d-none d-md-table-cell">{{ $loop->iteration }}</th> <!-- Hide on mobile, show on desktop -->
                        <td style="text-align: start; vertical-align: middle;">
                            {{ $item->description }}
                            @if ($item->note != null)
                            <span style="font-weight: 300; color:rgb(173, 173, 173); padding-left: 12px">( {{ $item->note }} )</span>
                            @endif
                            <div style="display: flex; width: 100%; justify-content: space-between; ">
                                <span class="total-price d-md-none" style="font-weight: 300; padding-top: 12px;">Total:</span>
                                <span class="total-price d-md-none" style="font-weight: 300; padding-top: 12px; font-weight: bold; text-transform: none;">Rp {{ number_format($item->amount, 0, ',', '.') }}</span>
                            </div> <!-- Show on mobile, hide on desktop -->
                        </td>
                        <td class="total-price d-none d-md-table-cell" style="font-weight: 300; vertical-align: middle; text-transform: none; position: relative; text-align: end; padding-left: 24px;padding-right: 24px;">
                                <span style="float: left;">Rp</span>
                                <span style="float: right;">{{ number_format($item->amount, 0, ',', '.') }}</span>
                            </td>
                            {{-- </td>Rp {{ number_format($item->amount, 0, ',', '.') }}</td> <!-- Hide on mobile, show on desktop --> --}}
                    </tr>
                    @endforeach
                    <!-- Total row hidden on mobile -->
                    <tr>
                        <td colspan="2" class="text-right d-none d-md-table-cell" style="font-weight: 500; background-color: #dbdee8;">Total</td> <!-- Hide on mobile, show on desktop -->
                        <td class="total-price text-center d-none d-md-table-cell" style="vertical-align: middle; text-transform: none; position: relative; text-align: end; padding-left: 24px; padding-right: 24px;">
                            <span style="float: left;">Rp</span>
                            <span style="float: right;">{{ number_format($departmentRequestPayment->total_cost, 0, ',', '.') }}</span>
                        <td  class="d-md-none" style="font-weight: 500; text-align: center; padding-left: 15px; background-color: #dbdee8;"> <!-- Show on mobile, hide on desktop -->
                            Total
                        </td>
                        <td  class="d-md-none text-center" style="font-weight: 500; text-align: start; text-transform: none; "> <!-- Show on mobile, hide on desktop -->
                            Rp {{ number_format($departmentRequestPayment->total_cost, 0, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>



            {{-- <div style="border: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; border-bottom: none;">
                <table class="table table-hover " style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                    <thead style="font-weight: 500; ">
                        <tr class="dicobain ">
                            <th scope="col ">User Submit</th>
                            <th scope="col ">Review</th>
                            <th scope="col ">Approval 1</th>
                            <th scope="col ">Approval 2</th>
                            <th scope="col ">Approval 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><svg xmlns="http://www.w3.org/2000/svg " width="24 " height="24 " viewBox="0 0 24 24 " fill="none ">
                            <circle cx="12 " cy="12 " r="12 " fill="#E73638 "/>
                        </svg></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Procurement</td>
                            <td>Manager</td>
                            <td>Mak Lia</td>
                            <td>Mba Mel</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}




            <div class="container my-3">
                <h5 class="text-center mb-2">Progress Approval</h5>
                <p class="text-center mb-">Requested by: {{ $departmentRequestPayment->user->name }}</p>
                <div class="step-bar">
                    <!-- Approval Manager -->
                    @php
                        // Mendapatkan approval berdasarkan stage 'manager' dan 'finance'
                        $managerApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'manager')->first();
                        $financeApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'finance')->first();
                    @endphp

                    <!-- Step untuk Manager -->
                    @if ($managerApproval->status == 'pending')
                        <div class="step waiting" data-bs-toggle="tooltip" data-bs-placement="top" title="Manager">
                            <div class="circle">1</div>
                            <div class="label">Manager</div>
                        </div>
                    @elseif ($managerApproval->status == 'approved')
                        <div class="step approved" data-bs-toggle="tooltip" data-bs-placement="top" title="Manager">
                            <div class="circle">1</div>
                            <div class="label">Manager</div>
                        </div>
                    @else
                        <div class="step rejected" data-bs-toggle="tooltip" data-bs-placement="top" title="Manager">
                            <div class="circle">1</div>
                            <div class="label">Manager</div>
                        </div>
                    @endif

                    <!-- Step untuk Finance -->
                    @if ($financeApproval->status == 'pending')
                        <div class="step waiting" data-bs-toggle="tooltip" data-bs-placement="top" title="Finance">
                            <div class="circle">2</div>
                            <div class="label">Finance</div>
                        </div>
                    @elseif ($financeApproval->status == 'approved')
                        <div class="step approved" data-bs-toggle="tooltip" data-bs-placement="top" title="Finance">
                            <div class="circle">2</div>
                            <div class="label">Finance</div>
                        </div>
                    @else
                        <div class="step rejected" data-bs-toggle="tooltip" data-bs-placement="top" title="Finance">
                            <div class="circle">2</div>
                            <div class="label">Finance</div>
                        </div>
                    @endif
                </div>

                <div class="text-center mt-2 ">
                    <div class="keteranganbudget">
                        <div class="tunggu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="12" fill="#FFE900" />
                            </svg><span class="text-center">waiting for approval</span>
                        </div>
                        <div class="tolak">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="12" fill="#E73638" />
                            </svg><span class="text-center">approval rejected</span>
                        </div>
                        <div class="diterima">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="12" fill="#009579" />
                            </svg><span class="text-center">approval approved</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tampilkan Note jika Manager atau Finance reject -->
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

</div>
@endsection

{{-- @section('modal')
<div class="modal justify-content-center fade" id="modalReject" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body bg-white">
                <div style="border-left: 1px solid #c4c4c4;border-right: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; margin-bottom: 24px;">
                    <table class="table table-hover " style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center ">
                        <thead style="font-weight: 500 ">
                            <tr class="dicobain ">
                                <th scope="col" style="background: #ccc7d8; letter-spacing: 0.5px">BUDGET ALOCATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-size: 18px">
                                    Rp100.000.000</td>
                            </tr>
                        </tbody>

                        <thead style="font-weight: 500 ">
                            <tr class="dicobain ">
                                <th scope="col" style="background: #ccc7d8;letter-spacing: 0.5px">REMAINING BUDGET</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-size: 18px">
                                    Rp100.000.000</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                <form action="#" style="font: 500 14px Narasi Sans, sans-serif">
                    <div style="border: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; margin-bottom: 24px; border-bottom: none;">
                        <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%;  text-align: center; ">
                            <thead style="font-weight: 500">
                                <tr class="dicobain">
                                    <th scope="col ">No</th>
                                    <th scope="col " style="text-align: start ">Description</th>
                                    <th scope="col ">Total</th>
                                    <th scope="col"> Notes </th>
                                </tr>
                            </thead>
                            <tbody style="vertical-align: middle;">
                                <tr>
                                    <th scope="row ">1</th>
                                    <td style="text-align: start; " >PERFORMER/HOST/GUEST</td>
                                    <td class="total-price" style="font-weight: 300">$20</td>
                                    <td class="col-3"><input type="text" class="form-control "  /></td>
                                </tr>
                                <tr>
                                    <th scope=" row ">2</th>
                                    <td style="text-align: start">PRODUCTION CREWS</td>
                                    <td class="total-price" style="font-weight: 300">$20</td>
                                    <td class="col-3"><input type="text" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th scope="row ">3</th>
                                    <td style="text-align: start">PRODUCTION TOOLS</td>
                                    <td class="total-price" style="font-weight: 300">$20</td>
                                    <td class="col-3"><input type="text" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th scope="row ">4</th>
                                    <td style="text-align: start">OPERATIONAL</td>
                                    <td class="total-price" style="font-weight: 300">$20</td>
                                    <td class="col-3"><input type="text" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th scope="row ">5</th>
                                    <td style="text-align: start">LOCATION</td>
                                    <td class="total-price" style="font-weight: 300">$20</td>
                                    <td class="col-3"><input type="text" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-right" style="font-weight: 500; background-color: #dbdee8">Total</td>
                                    <td class="total-price">$80</td>
                                    <td class="col-3"></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="text-end  pe-3">
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="button-submit">Reject</button>
                    </div>
                </form>
            </div>
            <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
        </div>
    </div>
</div>
@endsection --}}



@section('modal')
    @include('layout.alert')

    <div class="modal justify-content-center fade" id="modal-reject-note" data-bs-keyboard="false"
    tabindex="-1 " aria-labelledby="staticBackdropLabel " aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{ route('approval-budget-department.payment.reject', $departmentRequestPayment->department_request_payment_id) }}" method="POST" class=" " id="mainForm" style="font:Narasi Sans, sans-serif">
                        @csrf
                        <div class="mb-3">

                            <label for="note" class="form-label">Reject Note</label>
                            <textarea type="text"  class="form-control" id="note" name="note" cols="30" rows="3" required></textarea>
                        </div>

                        <button type="submit " class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')}} " alt=" " />
            </div>
        </div>
    </div>
@endsection

@section('alert')
@if (session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#successModal').modal('show');
            setTimeout(function() {
                $('#successModal').modal('hide');
            }, 3000);
        });
    </script>
@endif
@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#errorModal').modal('show');
        });
    </script>
@endif
@endsection

@section('custom-js')
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>
<script>
     $(document).ready(function() {
        $('#note').summernote({
            height: 200, // Atur tinggi editor
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', [ 'codeview', 'help']]
            ]
        });
    });
</script>
@endsection
