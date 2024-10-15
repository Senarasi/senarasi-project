@extends('layout.index')

@section('title')
    Approval - Budgeting System
@endsection

@section('content')
    <div class="judulhalaman" style="display: flex; align-items: center; ">Department Payment Approval
    </div>
    <div class="tablenih">
        <div class="table-responsive p-2">
            <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px;">
                <thead class="table-light">
                    <tr class="dicobain">
                        {{-- <th scope="col ">No</th> --}}
                        <th scope="col ">Request Number</th>
                        <th scope="col ">Pay To</th>
                        <th scope="col ">Total Cost</th>
                        <th scope="col ">Requester</th>
                        <th scope="col "></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departmentRequestPayments as $requestPayment)
                        <tr>
                            {{-- <th scope="row ">1</th> --}}
                            <td>{{ $requestPayment->department_request_payment_number }}</td>
                            <td>{{ $requestPayment->paid_to }}</td>
                            <td style="text-transform:none">Rp {{ number_format($requestPayment->total_cost, 0, ',', '.') }}
                            </td>
                            <td>{{ $requestPayment->user->full_name }}</td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="{{ route('approval-budget-department.payment.detail', $requestPayment->department_request_payment_id) }}"
                                    style="text-decoration: none"> <button type="button " class="button-general"
                                        style="width: fit-content; ">DETAIL</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
