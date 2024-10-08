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
                color: #4a25aa;
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
                margin-bottom: 12px;
                padding-top: 12px;
            }

            .tablecoba,
            td {
                padding-bottom: 12px;
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
                padding: 0.50rem;
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

            .text-start {
                text-align: left !important
            }

            .text-end {
                text-align: right !important
            }

            .text-center {
                text-align: center !important
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
            <div class="body">
                <div class="badanisi p-5">
                    <div style="display: flex; margin-left: 12px; margin-right: 12px; margin-top: 12px;">
                        <div>
                            <div style="margin-top: -12px">
                                <div class="text-start"
                                    style="display: inline-block; vertical-align: middle; margin-right: 774px">
                                    <p style="margin-bottom: -8px; padding-bottom: -8px">Request Number</p>
                                    <p style="font: 700 15px Narasi Sans, sans-serif; letter-spacing: 0.5px;">
                                        {{ $requestbudget->request_budget_number }}</p>
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
                                                <td>Program Name</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $requestbudget->Program->program_name }}</td>

                                                <td style="padding-left: 64px; !important">Type</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $requestbudget->type }}</td>

                                                <td style="padding-left: 64px; !important">Budget Code</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $requestbudget->budget_code }}</td>

                                            </tr>
                                            <tr>
                                                <td>Episode</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $requestbudget->episode }}</td>

                                                <td style="padding-left: 64px; !important">Producer Name</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $requestbudget->producer->full_name }}</td>

                                                <td style="padding-left: 64px; !important">Date of Shooting</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $requestbudget->date_start }}</td>


                                            </tr>
                                            <tr>
                                                <td>Venue</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $requestbudget->location }}</td>

                                                <td style="padding-left: 64px; !important">Manager Name</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $requestbudget->manager->full_name }}</td>

                                                <td style="padding-left: 64px; !important">Date of Upload</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{ $requestbudget->date_upload }}</td>


                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div style=" margin-bottom: 24px; margin-top: -32px; padding:9px;">
                        <table class="table table-bordered "
                            style="font: 12px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center ">
                            <thead style="font-weight: 500; background-color: rgba(28, 187, 140, 0.25)">
                                <tr class="dicobain ">
                                    <th scope="col " class="text-start">DESCRIPTION</th>
                                    <th scope="col ">REP</th>
                                    <th scope="col ">DAY</th>
                                    <th scope="col ">QTY</th>
                                    <th scope="col ">COST</th>
                                    <th scope="col ">TOTAL COST</th>
                                    <th scope="col ">ASSIGN TO</th>
                                    <th scope="col ">NOTES</th>
                                </tr>
                            </thead>

                            {{-- PERFORMER/HOST/GUEST --}}
                            <tbody class="text-center">
                                <tr>
                                    <th class="text-start" style="background-color: #dbdee8 ">PERFORMER/HOST/GUEST</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @forelse ($performer as $key => $datas)
                                    <tr>
                                        <td class="text-start">
                                            {{ $datas->first()->subDescription->sub_description_name }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @forelse ($datas as $data)
                                        <tr>
                                            <td class="text-start">{{ $data->name }}</td>
                                            <td>{{ $data->rep }}</td>
                                            <td>{{ $data->day }}</td>
                                            <td>{{ $data->qty }}</td>
                                            <td class="text-end">{{ number_format($data->cost) }}</td>
                                            <td class="text-end">{{ number_format($data->total_cost) }}</td>
                                            <td>{{ $data->assign }}</td>
                                            <td>{{ $data->notes }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-start"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end"></td>
                                            <td class="text-end"></td>
                                            <td></td>
                                            <td class="text-start">
                                            </td>
                                        </tr>
                                    @endforelse
                                @empty
                                    <tr>
                                        <td class="text-start"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="5" class="text-start "
                                        style="font-weight: 500; background-color: #ffe900;">SUB TOTAL
                                        PERFORMER/HOST/GUEST</td>
                                    <td class="text-end">Rp. {{ number_format($totalperformer) }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="8"></td>
                                </tr>
                            </tbody>

                            {{-- PRODUCTION CREWS --}}
                            <tbody class="text-center">
                                <tr>
                                    <th class="text-start" style="background-color: #dbdee8 ">PRODUCTION CREWS</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @forelse ($productioncrew as $key => $datas)
                                    <tr>
                                        <td class="text-start">
                                            {{ $datas->first()->subDescription->sub_description_name }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @forelse ($datas as $data)
                                        <tr>
                                            <td class="text-start">{{ $data->name }}</td>
                                            <td>{{ $data->rep }}</td>
                                            <td>{{ $data->day }}</td>
                                            <td>{{ $data->qty }}</td>
                                            <td class="text-end">{{ number_format($data->cost) }}</td>
                                            <td class="text-end">{{ number_format($data->total_cost) }}</td>
                                            <td>{{ $data->assign }}</td>
                                            <td>{{ $data->notes }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-start"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end"></td>
                                            <td class="text-end"></td>
                                            <td></td>
                                            <td class="text-start">
                                            </td>
                                        </tr>
                                    @endforelse
                                @empty
                                    <tr>
                                        <td class="text-start"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="5" class="text-start "
                                        style="font-weight: 500; background-color: #ffe900;">SUB TOTAL PRODUCTION CREWS
                                    </td>
                                    <td class="text-end">Rp. {{ number_format($totalproductioncrew) }}
                                    </td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td colspan="8"></td>
                                </tr>
                            </tbody>

                            {{-- PRODUCTION TOOLS --}}
                            <tbody class="text-center">
                                <tr>
                                    <th class="text-start" style="background-color: #dbdee8 ">PRODUCTION TOOLS</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @forelse ($productiontool as $key => $datas)
                                    <tr>
                                        <td class="text-start">
                                            {{ $datas->first()->subDescription->sub_description_name }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @forelse ($datas as $data)
                                        <tr>
                                            <td class="text-start">{{ $data->tool_name }}</td>
                                            <td>{{ $data->rep }}</td>
                                            <td>{{ $data->day }}</td>
                                            <td>{{ $data->qty }}</td>
                                            <td class="text-end">{{ number_format($data->cost) }}</td>
                                            <td class="text-end">{{ number_format($data->total_cost) }}</td>
                                            <td>{{ $data->assign }}</td>
                                            <td>{{ $data->notes }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-start"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end"></td>
                                            <td class="text-end"></td>
                                            <td></td>
                                            <td class="text-start">
                                            </td>
                                        </tr>
                                    @endforelse
                                @empty
                                    <tr>
                                        <td class="text-start"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="5" class="text-start "
                                        style="font-weight: 500; background-color: #ffe900;">SUB TOTAL PRODUCTION TOOLS
                                    </td>
                                    <td class="text-end">Rp. {{ number_format($totalproductiontool) }}</td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td colspan="8"></td>
                                </tr>
                            </tbody>

                            {{-- OPERATIONAL --}}
                            <tbody class="text-center">
                                <tr>
                                    <th class="text-start" style="background-color: #dbdee8 ">OPERATIONAL</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @forelse ($operational as $key => $datas)
                                    <tr>
                                        <td class="text-start">
                                            {{ $datas->first()->subDescription->sub_description_name }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @forelse ($datas as $data)
                                        <tr>
                                            <td class="text-start">{{ $data->name }}</td>
                                            <td>{{ $data->rep }}</td>
                                            <td>{{ $data->day }}</td>
                                            <td>{{ $data->qty }}</td>
                                            <td class="text-end">{{ number_format($data->cost) }}</td>
                                            <td class="text-end">{{ number_format($data->total_cost) }}</td>
                                            <td>{{ $data->assign }}</td>
                                            <td>{{ $data->notes }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-start"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end"></td>
                                            <td class="text-end"></td>
                                            <td></td>
                                            <td class="text-start">
                                            </td>
                                        </tr>
                                    @endforelse
                                @empty
                                    <tr>
                                        <td class="text-start"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="5" class="text-start "
                                        style="font-weight: 500; background-color: #ffe900;">SUB TOTAL OPERATIONAL</td>
                                    <td class="text-end">Rp. {{ number_format($totaloperational) }}</td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td colspan="8"></td>
                                </tr>
                            </tbody>

                            {{-- LOCATION RENTAL --}}
                            <tbody class="text-center">
                                <tr>
                                    <th class="text-start" style="background-color: #dbdee8 ">VENUE RENTAL</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @forelse ($location as $key => $datas)
                                    <tr>
                                        <td class="text-start">
                                            {{ $datas->first()->subDescription->sub_description_name }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @forelse ($datas as $data)
                                        <tr>
                                            <td class="text-start">{{ $data->name }}</td>
                                            <td>{{ $data->rep }}</td>
                                            <td>{{ $data->day }}</td>
                                            <td>{{ $data->qty }}</td>
                                            <td class="text-end">{{ number_format($data->cost) }}</td>
                                            <td class="text-end">{{ number_format($data->total_cost) }}</td>
                                            <td>{{ $data->assign }}</td>
                                            <td>{{ $data->notes }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-start"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end"></td>
                                            <td class="text-end"></td>
                                            <td></td>
                                            <td class="text-start">
                                            </td>
                                        </tr>
                                    @endforelse
                                @empty
                                    <tr>
                                        <td class="text-start"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="5" class="text-start "
                                        style="font-weight: 500; background-color: #ffe900;">SUB TOTAL VENUE RENTAL
                                    </td>
                                    <td class="text-end">Rp. {{ number_format($totallocation) }}</td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td colspan="8"></td>
                                </tr>
                            </tbody>

                            {{-- TOTAL --}}
                            <tbody class="text-center">
                                <tr>
                                    <td colspan="5" class="text-start "
                                        style="font-weight: 500; background-color: #bbc8f396;">TOTAL</td>
                                    <td class="text-end">Rp. {{ number_format($totalAll) }}</td>
                                    <td></td>
                                    <td></td>

                                </tr>
                            </tbody>

                        </table>

                        <table class="table table-bordered "
                            style="font: 12px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center ">
                            <thead style="font-weight: 500; background-color: rgba(28, 187, 140, 0.25)">
                                <tr class="dicobain">
                                    <th rowspan="2" scope="col" class="text-center"
                                        style="background: #bbc8f396; text-align: center; vertical-align: middle; width: 43%;">
                                        TOTAL CREWS & PERFORMERS</th>
                                    <th scope="col ">NCS</th>
                                    <th scope="col ">OUT</th>
                                    <th scope="col ">TOTAL</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                <tr>
                                    <td class="text-center" style="font-weight: 500;">
                                        {{ $totalRepCrewCounts['NCS'] + $totalRepPerformerCounts['NCS'] }}</td>
                                    <td class="text-center" style="font-weight: 500;">
                                        {{ $totalRepCrewCounts['OUT'] + $totalRepPerformerCounts['OUT'] }}</td>
                                    <td class="text-center" style="font-weight: 500;">
                                        {{ $totalRepCrewCounts['NCS'] + $totalRepPerformerCounts['NCS'] + $totalRepCrewCounts['OUT'] + $totalRepPerformerCounts['OUT'] }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered "
                            style="font: 12px Narasi Sans, sans-serif; width:43%;  margin-top: 24px; margin-bottom: 12px; text-align: center ">
                            <thead style="font-weight: 500; background-color: rgba(28, 187, 140, 0.25)">
                                <tr class="dicobain">
                                    <th scope="col" class="text-center"
                                        style="text-align: center; vertical-align: middle; width: 43%;">Summary</th>
                                    <th scope="col" class="text-center"
                                        style="text-align: center; vertical-align: middle; width: 43%;">Total Cost</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                <tr>
                                    <td class="text-center" style="font-weight: 500; ">Budget Approve</td>
                                    <td class="text-end" style="">Rp. {{ number_format($budget) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center" style="font-weight: 500;">Request Budget</td>
                                    <td class="text-end" style="">Rp. {{ number_format($totalAll) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center" style="font-weight: 500;">Remaining Budget</td>
                                    <td class="text-end" style="">Rp. {{ number_format($budget - $totalAll) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div style="margin: 12px; border-radius: 4px; border-bottom: none;">
                        <table class="table table-bordered"
                            style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                            <thead style="font-weight: 500; ">
                                <tr class="dicobain ">
                                    <th scope="col ">Requester</th>
                                    <th scope="col ">Approval Manager</th>
                                    <th scope="col ">Studio Production Review</th>
                                    <th scope="col ">Controller Manager</th>
                                    @if ($budget >= 200000000)
                                        <th scope="col ">VP Operation</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <td style="justify-content: center; align-items: center; width: 20%;">{{ $requestbudget->employee->full_name }}</td>
                                    <td style="justify-content: center; align-items: center; width: 20%;"><img style="width:84px; padding-bottom: -12px" src="asset/image/pending_stamp.png" alt=""><div style="text-align: center; vertical-align: middle;">{{ $requestbudget->manager->full_name }}</div></td>
                                    <td style="justify-content: center; align-items: center; width: 20%;"><img style="width:84px; padding-bottom: -12px" src="asset/image/approve_stamp.png" alt=""><div style="text-align: center; vertical-align: middle;">{{$requestbudget->reviewer->full_name}}</div></td>
                                    <td style="justify-content: center; align-items: center; width: 20%;"><img style="width:84px; padding-bottom: -12px" src="asset/image/reject_stamp.png" alt=""><div style="text-align: center; vertical-align: middle;">{{$requestbudget->finance1->full_name}}</div></td>
                                    @if ($budget >= 200000000)
                                    <td style="justify-content: center; align-items: center; width: 20%;"><img style="width:84px; padding-bottom: -12px" src="asset/image/pending_stamp.png" alt=""><div style="text-align: center; vertical-align: middle;">{{$requestbudget->finance2->full_name}}</div></td>
                                    @endif --}}

                                    <td style="justify-content: center; align-items: center; width: 20%;">
                                        {{ $requestbudget->employee->full_name }}
                                    </td>

                                    <!-- Manager -->
                                    <td style="justify-content: center; align-items: center; width: 20%;">
                                        @if (isset($approvals['manager']) && $approvals['manager']->status === 'approved')
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/approve_stamp.png" alt="">
                                        @elseif(isset($approvals['manager']) && $approvals['manager']->status === 'rejected')
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/reject_stamp.png" alt="">
                                        @else
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/pending_stamp.png" alt="">
                                        @endif
                                        <div style="text-align: center; vertical-align: middle;">
                                            {{ $requestbudget->manager->full_name }}
                                        </div>
                                    </td>

                                    <!-- Reviewer -->
                                    <td style="justify-content: center; align-items: center; width: 20%;">
                                        @if (isset($approvals['reviewer']) && $approvals['reviewer']->status === 'approved')
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/approve_stamp.png" alt="">
                                        @elseif(isset($approvals['reviewer']) && $approvals['reviewer']->status === 'rejected')
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/reject_stamp.png" alt="">
                                        @else
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/pending_stamp.png" alt="">
                                        @endif
                                        <div style="text-align: center; vertical-align: middle;">
                                            {{ $requestbudget->reviewer->full_name }}
                                        </div>
                                    </td>

                                    <!-- Finance 1 -->
                                    <td style="justify-content: center; align-items: center; width: 20%;">
                                        @if (isset($approvals['finance 1']) && $approvals['finance 1']->status === 'approved')
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/approve_stamp.png" alt="">
                                        @elseif(isset($approvals['finance 1']) && $approvals['finance 1']->status === 'rejected')
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/reject_stamp.png" alt="">
                                        @else
                                            <img style="width:84px; padding-bottom: -12px"
                                                src="asset/image/pending_stamp.png" alt="">
                                        @endif
                                        <div style="text-align: center; vertical-align: middle;">
                                            {{ $requestbudget->finance1->full_name }}
                                        </div>
                                    </td>

                                    <!-- Finance 2 (optional based on budget) -->
                                    @if ($budget >= 200000000)
                                        <td style="justify-content: center; align-items: center; width: 20%;">
                                            @if (isset($approvals['finance 2']) && $approvals['finance 2']->status === 'approved')
                                                <img style="width:84px; padding-bottom: -12px"
                                                    src="asset/image/approve_stamp.png" alt="">
                                            @elseif(isset($approvals['finance 2']) && $approvals['finance 2']->status === 'rejected')
                                                <img style="width:84px; padding-bottom: -12px"
                                                    src="asset/image/reject_stamp.png" alt="">
                                            @else
                                                <img style="width:84px; padding-bottom: -12px"
                                                    src="asset/image/pending_stamp.png" alt="">
                                            @endif
                                            <div style="text-align: center; vertical-align: middle;">
                                                {{ $requestbudget->finance2->full_name }}
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </body>

</html>
