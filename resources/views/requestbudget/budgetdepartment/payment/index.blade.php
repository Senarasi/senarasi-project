@extends('layout.index')

@section('title')
    Request Payment - Budgeting System
@endsection

@section('content')


    <div class="judulhalaman" style="display: flex; align-items: center; ">Department Payment Request</div>
            <a href="{{ route('request-budget-department.payment.create') }}" type="button" style="width: fit-content; text-decoration: none" class="button-departemen">
                Payment Request<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white" />
                </svg>
            </a>

        <div class="tablenih">
            <div class="table-responsive p-2">
                <table id="datatable" class="table table-hover "
                style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; ">
                <thead class="table-light">
                        <tr class="dicobain ">
                            {{-- <th scope="col " class="py-3" style="width:64px">No</th> --}}
                            <th scope="col " class="py-3">Request Number</th>
                            <th scope="col " class="py-3">Date</th>
                            <th scope="col " class="py-3">Paid To</th>
                            <th scope="col " class="py-3">Total</th>

                            <th scope="col " class="py-3" >Requester</th>
                            {{-- <th scope="col " class="py-3">Note</th> --}}
                            <th scope="col " class="py-3" style="width:200px">Status</th>

                            <th scope="col " class="py-3" style="width:124px"></th>
                        </tr>
                    </thead>
                    <tbody style="">
                        @foreach ($departmentRequestPayments as $departmentRequestPayment)
                            <tr>
                                {{-- <th scope="row ">1</th> --}}
                                <td>{{ $departmentRequestPayment->department_request_payment_number }}</td>
                                <td>{{ \Carbon\Carbon::parse( $departmentRequestPayment->date)->translatedFormat('d F Y') }}</td>
                                <td>{{ $departmentRequestPayment->paid_to }}</td>
                                <td style="text-transform:none">
                                    Rp {{ number_format($departmentRequestPayment->total_cost, 0, ',', '.') }}
                                </td>
                                <td>{{ $departmentRequestPayment->user->full_name }}</td>
                                {{-- <td>{{ $departmentRequestPayment->note ?? '-' }}</td> --}}
                                {{-- <td>
                                    @if ($departmentRequestPayment->DepartmentPaymentApproval)
                                        @if ($departmentRequestPayment->DepartmentPaymentApproval->status == 'pending')
                                            <span class="badge rounded-pill text-bg-warning">Waiting for Approval</span>
                                        @endif
                                        @if ($departmentRequestPayment->DepartmentPaymentApproval->status == 'approved')
                                            <span class="badge rounded-pill text-bg-success">Approved</span>
                                        @endif
                                        @if ($departmentRequestPayment->DepartmentPaymentApproval->status == 'rejected')
                                            <span class="badge rounded-pill text-bg-danger">Rejected</span>
                                        @endif
                                    @else
                                        <span class="badge rounded-pill text-bg-secondary">Not Submitted Yet</span>
                                    @endif

                                </td> --}}
                                <td>
                                    @if ($departmentRequestPayment->DepartmentPaymentApprovals->isNotEmpty())
                                        @php
                                            // Variabel untuk menyimpan status dari setiap approval
                                            $anyPending = $departmentRequestPayment->DepartmentPaymentApprovals->contains(fn($approval) => $approval->status == 'pending');
                                            $anyRejected = $departmentRequestPayment->DepartmentPaymentApprovals->contains(fn($approval) => $approval->status == 'rejected');
                                            $allApproved = $departmentRequestPayment->DepartmentPaymentApprovals->every(fn($approval) => $approval->status == 'approved');
                                        @endphp

                                        @if ($anyPending)
                                            <span class="badge rounded-pill text-bg-warning">Waiting for Approval</span>
                                        @elseif ($anyRejected)
                                            <span class="badge rounded-pill text-bg-danger">Rejected</span>
                                        @elseif ($allApproved)
                                            <span class="badge rounded-pill text-bg-success">Approved</span>
                                        @else
                                            <span class="badge rounded-pill text-bg-info">In Progress</span>
                                        @endif
                                    @else
                                        <span class="badge rounded-pill text-bg-secondary">Not Submitted Yet</span>
                                    @endif
                                </td>

                                {{-- <td>{{ $departmentRequestPayment->note ?? '-' }}</td> --}}

                                <td style=" display: flex; justify-content: center; ">
                                    @if ($departmentRequestPayment->DepartmentPaymentApprovals->isNotEmpty())
                                    <a href="{{ route('request-budget-department.payment.detail', $departmentRequestPayment->department_request_payment_id ) }}"  style="text-decoration: none"> <button type="button "
                                        class="button-general" style="width: fit-content; padding-right:29px; padding-left:29px; ">DETAIL</button>
                                    </a></td>
                                    @else
                                    <a href="{{ route('request-budget-department.payment.edit', $departmentRequestPayment->department_request_payment_id ) }}"  style="text-decoration: none"> <button type="button "
                                        class="button-general" style="width: fit-content; ">CONTINUE</button>
                                    </a></td>
                                    @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection

@section('modal')
    @include('layout.alert')
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
