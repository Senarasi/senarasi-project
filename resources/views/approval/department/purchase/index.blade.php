@extends('layout.index')

@section('title')
    Approval - Budgeting System
@endsection

@section('content')

    <div class="judulhalaman" style="display: flex; align-items: center; ">Department Purchase Approval
    </div>
        <div class="tablenih">
            <div class="table-responsive p-2">
                <table  id="datatable" class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px;">
                    <thead class="table-light">
                        <tr class="dicobain">
                            {{-- <th scope="col ">No</th> --}}
                            <th scope="col ">Request Number</th>
                            <th scope="col ">Program Name</th>
                            <th scope="col ">Total Cost</th>
                            <th scope="col ">Requester</th>
                            <th scope="col "></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            {{-- <th scope="row ">1</th> --}}
                            <td></td>
                            <td> Mata Najwa</td>
                            <td></td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="{{ route('approval-budget-department.purchase.detail') }}"  style="text-decoration: none"> <button type="button "
                                    class="button-general" style="width: fit-content; ">DETAIL</button>
                                </a></td>

                        </tr>
                        <tr>
                            {{-- <th scope=" row ">2</th> --}}
                            <td> </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="{{ route('approval-budget-department.purchase.detail') }}"  style="text-decoration: none"> <button type="button "
                                    class="button-general" style="width: fit-content; ">DETAIL</button>
                                </a></td>

                        </tr>
                        <tr>
                            {{-- <th scope="row ">3</th> --}}
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="{{ route('approval-budget-department.purchase.detail') }}"  style="text-decoration: none"> <button type="button "
                                    class="button-general" style="width: fit-content; ">DETAIL</button>
                                </a></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

@endsection
