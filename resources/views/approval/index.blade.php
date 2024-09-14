@extends('layout.index')

@section('title')
    Approval - Budgeting System
@endsection

@section('content')
    <div class="judulhalaman" style="display: flex; align-items: center; ">Approval
    </div>
    <div class="tablenih">
        <div class="table-responsive p-3">
            <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                <thead style="font-weight: 500; ">
                    <tr class="dicobain">
                        <th scope="col ">No</th>
                        <th scope="col ">Request Number</th>
                        <th scope="col ">Program Name</th>
                        <th scope="col ">Total Cost</th>
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
                            <th scope="row">{{ $counter++ }}</th>
                            <td>{{ $data->request_budget_number }}</td>
                            <td>{{ $data->program->program_name }}</td>
                            <td>Rp. {{ number_format($data->totalCost->total_cost) }}</td>
                            <td>{{ $data->employee->full_name }}</td>
                            <td style="gap: 8px; display: flex; justify-content: center;">
                                <a href="{{ route('approval.show', $data->request_budget_id) }}"
                                    style="text-decoration: none">
                                    <button type="button" class="button-general"
                                        style="width: fit-content;">DETAIL</button>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">
                            No Data.
                        </div>
                    @endforelse
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
