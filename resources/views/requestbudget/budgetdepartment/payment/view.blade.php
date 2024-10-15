<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        {{-- ngok meta tag --}}
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <style>
            .badanisi {
                padding-top: 32px;
                padding-bottom: 24px;
                padding-left: 56px;
                padding-right: 48px;
                min-height: 100vh;
            }

            .judulhalaman {
                color:  #4a25aa;
                font-family: "Narasi Sans";
                font-size: 32px;
                font-style: normal;
                font-weight: 700;
                line-height: 120%;
                /* 38.4px */
                /* padding-bottom: 32px; */

                margin-top: 12px;
                margin-left: 8px;
            }
            .arips {
                justify-content: space-between;
                display: flex;
                gap: 64px;
                margin-bottom: 24px;
                padding-top: 12px;
            }
            .tablecoba,
            td {
                padding-bottom: 12px;
                padding-right: 42px
            }


            .cobalagi {
                margin-right: 250px;
            }

            table {
            border-collapse: collapse;
            }

            .table {
                width: 100%;
                /* margin-bottom: 1rem; */
                color: #000000;
            }

            .table th,
            .table td {
            padding: 1rem;
            vertical-align: top;
            /* border-top: 1px solid #eff2f7; */
            }

            .table thead th {
            vertical-align: bottom;
            /* border-bottom: 2px solid #eff2f7; */
            }

            .table tbody+tbody {
            border-top: 1px solid #676767;
            }

            .table-bordered {
            border: 1px solid #676767;
            }

            .table-bordered th,
            .table-bordered td {
            border: 1px solid #676767;
            }

            .table-bordered thead th,
            .table-bordered thead td {
            border-bottom-width: 1px;
            }

            .text-start{
                text-align:left!important
            }

            .text-end{
            text-align:right!important
            }

            .text-center{
                text-align:center!important
            }

            .keteranganbudget {
                display: inline-flex;
                gap: 24px;
                background: #e9ebf7;
                padding: 12px;
                padding-bottom: 0px !important;
                border-radius: 8px;
                border: 2px solid #bcc4e5;
                align-items: center;
                font: 400 14px sans-serif;
                letter-spacing: 0.3px;
            }

            .keteranganbudget .tunggu {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .keteranganbudget .tolak {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .keteranganbudget .diterima {
                display: flex;
                align-items: center;
                gap: 12px;
            }
        </style>

    </head>
    <body>
        <div class="wrapper">
            <div class="body" >


                <div class="badanisi p-5">

                    <div style="display: flex; margin-left: 12px; margin-right: 12px; margin-top: 12px;">
                        <div>
                            <div style="margin-top: -12px">
                                <div class="text-start" style="display: inline-block; vertical-align: middle; margin-right: 700px">
                                    <p style="margin-bottom: -8px; padding-bottom: -8px">Request Number</p>
                                    <p style="font: 700 24px Narasi Sans, sans-serif; letter-spacing: 0.5px;">{{ $departmentRequestPayment->department_request_payment_number }}</p>
                                </div>
                                <div class="text-end" style="display: inline-block; vertical-align: middle;">
                                    <img style="width: 164px;" src="asset/image/narasi.png" alt="">
                                </div>
                            </div>

                            <div class="arips" style="margin-top: -16px">
                                <div style="font: 400 16px Narasi Sans, sans-serif; color: black ">
                                    <table class="tablecoba ">
                                        <tbody>
                                            <tr>
                                                <td>Department</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->department->department_name}}</td>

                                                <td>Date</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ \Carbon\Carbon::parse( $departmentRequestPayment->date)->translatedFormat('d F Y') }}</td>

                                            </tr>

                                            <tr>
                                                <td>Budget Code</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->budget_code}}</td>

                                                <td>Bank</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $departmentRequestPayment->bank_name}}</td>

                                            </tr>
                                            <tr>
                                                <td>Budget Name</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->budget_name}}</td>

                                                <td>Bank Account Name</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $departmentRequestPayment->account_name}}</td>
                                            </tr>

                                            <tr>
                                                <td>Paid To</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $departmentRequestPayment->paid_to}}</td>

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
                                                <td>Paid Via</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $departmentRequestPayment->paid_via}}</td>

                                                <td>No. Doc / No. Invoice </td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>
                                                    <a href="{{ $departmentRequestPayment->fileDocument()}}" target="_blank">{{ $departmentRequestPayment->document_number}}</a>
                                                </td>
                                            </tr>
                                            {{-- <tr>
                                                <td>Location</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>Kantor Narasi</td>

                                                <td style="padding-left: 64px; !important">Manager Name</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td></td>

                                                <td style="padding-left: 64px; !important">Date of Upload</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>28-10-2023</td>


                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div style=" margin-bottom: 12px; margin-top: -32px; padding:9px;">
                        <table class="table table-bordered " style="font: 12px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center ">
                            <thead style="font-weight: 500; background-color: rgba(28, 187, 140, 0.25)">
                                <tr class="dicobain ">
                                    <th scope="col " class="text-start">DESCRIPTION</th>
                                    <th scope="col ">AMOUNT</th>
                                    <th scope="col ">NOTES</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @foreach ($items as $item )
                                <tr>
                                    <th class="text-start">{{ $item->description }}</th>
                                    <td class="text-end">{{ number_format($item->amount, 0, ',', '.') }}</td>
                                    <td class="text-start"> {{ $item->note }}</td>

                                </tr>
                                @endforeach
                                <tr>
                                    <td class="text-start " style="font-weight: 500; background-color: #ffe900;">TOTAL</td>
                                    <td class="text-end">{{ number_format($departmentRequestPayment->total_cost, 0, ',', '.') }}</td>
                                    <td></td>
                                </tr>

                            </tbody>

                        </table>

                        <table class="table table-bordered " style="font: 12px Narasi Sans, sans-serif; width:38%;  margin-top: 24px; margin-bottom: 12px; text-align: center ">
                            <thead style="font-weight: 500; background-color: rgba(28, 187, 140, 0.25)">
                                <tr class="dicobain">
                                    <th scope="col" class="text-center" style="text-align: center; vertical-align: middle; width: 38%;">Summary</th>
                                    <th scope="col" class="text-center" style="text-align: center; vertical-align: middle; width: 38%;">Total Cost</th>

                                </tr>
                            </thead>

                            <tbody class="text-center" >
                                <tr>
                                    <td  class="text-center" style="font-weight: 500;">Budget Approve</td>
                                    <td  class="text-center" style="">{{ number_format($departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->budget_yearly, 0, ',', '.') }}</td>
                                </tr>
                                 <tr>
                                    <td  class="text-center" style="font-weight: 500; ">Request Budget</td>
                                    <td  class="text-center" style="">{{ number_format($departmentRequestPayment->total_cost, 0, ',', '.') }}</td>
                                </tr>
                                {{-- <tr>
                                    <td  class="text-center" style="font-weight: 500;">Remaining Budget</td>
                                    <td  class="text-center" style="">{{ number_format($departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->budget_yearly - $departmentRequestPayment->total_cost, 0, ',', '.') }}</td>
                                </tr> --}}
                            </tbody>

                        </table>
                    </div>

                    <div style="margin: 12px; border-radius: 4px; border-bottom: none;">
                        <table class="table table-bordered" style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                            <thead style="font-weight: 500; ">
                                <tr class="dicobain ">
                                    <th scope="col ">Requester</th>
                                    <th scope="col ">Manajer Approval</th>
                                    <th scope="col ">Finance Approval</th>
                                </tr>
                            </thead>
                            <tbody >
                                <tr>
                                    <td style="justify-content: center; align-items: center; width: 20%;">{{ $departmentRequestPayment->user->full_name }}</td>
                                    <td style="justify-content: center; align-items: center; width: 20%;">
                                        @if (($managerApproval->status ?? '-') == 'approved')
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/APPROVED.png" alt="">
                                        @elseif(($managerApproval->status ?? '-') == 'reject')
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/REJECT.png" alt="">
                                        @else
                                            <img style="width:84px; padding-bottom: -12px" src="asset/image/PENDING.png" alt="">
                                        @endif
                                        <div style="text-align: center; vertical-align: middle;">{{ $departmentRequestPayment->manager->full_name }}</div>
                                    </td>
                                    <td style="justify-content: center; align-items: center; width: 20%;">
                                        @if (($financeApproval->status ?? '-') == 'approved')
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/APPROVED.png" alt="">
                                        @elseif(($financeApproval->status ?? '-') == 'reject')
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/REJECT.png" alt="">
                                        @else
                                            <img style="width:84px; padding-bottom: -12px" src="asset/image/PENDING.png" alt="">
                                        @endif
                                        <div style="text-align: center; vertical-align: middle;">{{ $departmentRequestPayment->finance->full_name }}</div>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
