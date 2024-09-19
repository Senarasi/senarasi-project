@extends('layout.index')

@section('title')
    Request Budget - Budgeting System
@endsection

@section('content')

    <div class="judulhalaman" style="display: flex; align-items: center; ">Request Budget Narasi</div>

    <div style="display: flex; justify-content: space-between;">
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
        <div class="text-end ms-3">
            <a href="{{ route('request-budget.create') }}" type="button" class="button-departemen"
                style="text-decoration: none">
                Request Budget
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white" />
                </svg>
            </a>
        </div>
    </div>

    <div class="tablenih">
        <div class="table-responsive p-3">
            <table id="datatable" class="table table-hover "
                style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px;  ">
                <thead class="table-light">
                    <tr class="dicobain ">
                        <th scope="col ">Request Number</th>
                        <th scope="col ">Program Name</th>
                        <th scope="col ">Approval Manager</th>
                        <th scope="col ">Reviewer</th>
                        <th scope="col ">Human Capital</th>
                        <th scope="col ">Controller Manager</th>
                        <th scope="col ">User Submit</th>
                        <th scope="col ">Action</th>
                    </tr>
                </thead>
                <tbody style="vertical-align: middle;">
                    @php
                        $counter = 1;
                    @endphp
                    @forelse ($requestBudgets as $data)
                        <tr>
                            {{-- <th scope="row ">{{ $counter++ }}</th> --}}
                            <td>{{ $data->request_budget_number }}</td>
                            <td> {{ $data->program->program_name }}</td>
                            @if (($data->approval->where('stage', 'manager')->first()->status ?? '-') == 'pending')
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="12" fill="#FFE900" />
                                    </svg></td>
                            @elseif (($data->approval->where('stage', 'manager')->first()->status ?? '-') == 'approved')
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
                            @if (($data->approval->where('stage', 'reviewer')->first()->status ?? '-') == 'pending')
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="12" fill="#FFE900" />
                                    </svg></td>
                            @elseif (($data->approval->where('stage', 'reviewer')->first()->status ?? '-') == 'approved')
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
                            @if (($data->approval->where('stage', 'hc')->first()->status ?? '-') == 'pending')
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="12" fill="#FFE900" />
                                    </svg></td>
                            @elseif (($data->approval->where('stage', 'hc')->first()->status ?? '-') == 'approved')
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
                            @if (($data->approval->where('stage', 'finance 1')->first()->status ?? '-') == 'pending')
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="12" fill="#FFE900" />
                                    </svg></td>
                            @elseif (($data->approval->where('stage', 'finance 1')->first()->status ?? '-') == 'approved')
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
                            @if ($hasApprovalFinance2)
                                @if (($data->approval->where('stage', 'finance 2')->first()->status ?? '-') == 'pending')
                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="12" fill="#FFE900" />
                                        </svg></td>
                                @elseif (($data->approval->where('stage', 'finance 2')->first()->status ?? '-') == 'approved')
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
                            @else
                                <td>-</td>
                            @endif
                            <td>{{ $data->employee->full_name }}</td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="{{ route('request-budget.show', $data->request_budget_id) }}"
                                    style="text-decoration: none"> <button type="button " class="button-general"
                                        style="width: fit-content; ">DETAIL</button>
                                </a>
                            </td>
                        @empty
                    @endforelse
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
