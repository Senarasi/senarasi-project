@extends('layout.index')

@section('title')
    Report - Budgeting System
@endsection

@section('content')
    <!--Badan Isi-->
    <div class="judulhalaman" style=" display: flex; align-items: center; ">Department Payment Report

    </div>
    <form>


        <div class="tablenih" style="padding-top: -24px;">
            <div class="table-responsive p-2">
                <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px;  color: #4A25AA;">
                <thead class="table-light">
                        <tr >
                            {{-- <th scope="col">No</th> --}}
                            <th scope="col">Request Number</th>
                            <th scope="col">Date</th>
                            <th scope="col" >Budget Name</th>
                            <th scope="col" >Paid To</th>
                            <th scope="col">Total Cost</th>
                            <th scope="col" ></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departmentRequestPayments as $departmentRequestPayment)
                        <tr >
                            {{-- <th scope="row" style="text-align: center;">1</th> --}}
                            <td>{{ $departmentRequestPayment->department_request_payment_number }}</td>
                            <td>{{ \Carbon\Carbon::parse( $departmentRequestPayment->date)->translatedFormat('d F Y') }}</td>
                            <td>{{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->budget_name}}</td>
                            <td>{{ $departmentRequestPayment->paid_to}}</td>
                            <td>{{ number_format($departmentRequestPayment->total_cost, 0, ',', '.') }}</td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">

                                <a href="{{ route('report-budget-department.payment.viewPdf', $departmentRequestPayment->department_request_payment_id ) }}" target="_blank" style="text-decoration: none"> <button type="button"
                                    class="button-general">DETAIL</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </form>
@endsection

@section('custom-js')

@endsection
