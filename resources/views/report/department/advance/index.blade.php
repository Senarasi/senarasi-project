@extends('layout.index')

@section('title')
    Report - Budgeting System
@endsection

@section('content')
    <!--Badan Isi-->
    <div class="judulhalaman" style=" display: flex; align-items: center; ">Department Advance Report

    </div>
        <div class="tablenih" style="padding-top: -24px;">
            <div class="table-responsive p-2">
                <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px;  color: #4A25AA;">
                <thead class="table-light">
                        <tr >
                            {{-- <th scope="col">No</th> --}}
                            <th scope="col">Date</th>
                            <th scope="col" >Program</th>
                            <th scope="col" >Episode Name</th>
                            <th scope="col">Total Cost</th>
                            <th scope="col" ></th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr >
                            {{-- <th scope="row" style="text-align: center;">1</th> --}}
                            <td >01/01/2024</td>
                            <td >Mata Najwa</td>
                            <td></td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">

                                <a href="/viewpdf" target="_blank" style="text-decoration: none"> <button type="button"
                                    class="button-general">DETAIL</button>
                                </a>
                            </td>
                        </tr>
                        <tr >
                            {{-- <th scope="row" style="text-align: center;">2</th> --}}
                            <td >02/01/0024</td>
                            <td >Musyawarah</td>
                            <td></td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="/viewpdf" target="_blank" style="text-decoration: none"> <button type="button"
                                    class="button-general">DETAIL</button>
                                </a>
                            </td>
                        </tr>
                        <tr >
                            {{-- <th scope="row" style="text-align: center;">3</th> --}}
                            <td >00/00/0000</td>
                            <td >Mata Najwa</td>
                            <td></td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="/viewpdf" target="_blank" style="text-decoration: none"> <button type="button"
                                    class="button-general">DETAIL</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection

@section('custom-js')

@endsection
