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

            .circle-red {
                width: 24px;
                height: 24px;
                background-color: #E73638;
                border-radius: 50%;
                /* Membuat lingkaran dengan radius setengah dari lebar/tinggi */
                display: inline-block;
                /* Agar elemen bisa diatur posisinya */
            }

            .circle-yellow {
                width: 24px;
                height: 24px;
                background-color: #FFE900;
                border-radius: 50%;
                /* Membuat lingkaran dengan radius setengah dari lebar/tinggi */
                display: inline-block;
                /* Agar elemen bisa diatur posisinya */
            }

            .circle-green {
                width: 24px;
                height: 24px;
                background-color: #009579;
                border-radius: 50%;
                /* Membuat lingkaran dengan radius setengah dari lebar/tinggi */
                display: inline-block;
                /* Agar elemen bisa diatur posisinya */
            }
        </style>

    </head>

    <body>
        <div class="wrapper">
            <div class="body">


                <div class="badanisi p-5">

                    <div
                        style="justify-content: space-between; display: flex; margin-left: 12px; margin-right: 12px; margin-top: 12px;">
                        <div>
                            <div class="text-end" style="margin-bottom: 12px">
                                <img style="width: 142px;" src="asset/image/narasi.png" alt="">

                            </div>

                            <div class="arips">
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
                                                <td>Location</td>
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


                    <div style=" margin-bottom: 24px; margin-top: -24px; padding:9px;">
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
                                            <td  class="text-end">Rp. {{ number_format($data->cost) }}</td>
                                            <td  class="text-end">Rp. {{ number_format($data->total_cost) }}</td>
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
                                    <td class="text-end">Rp. {{ number_format($data->sum('total_cost')) }}</td>
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
                                            <td  class="text-end">Rp. {{ number_format($data->cost) }}</td>
                                            <td  class="text-end">Rp. {{ number_format($data->total_cost) }}</td>
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
                                    <td class="text-end">Rp. {{ number_format($data->sum('total_cost')) }}
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
                                            <td  class="text-end">Rp. {{ number_format($data->cost) }}</td>
                                            <td  class="text-end">Rp. {{ number_format($data->total_cost) }}</td>
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
                                    <td class="text-end">Rp. {{ number_format($data->sum('total_cost')) }}</td>
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
                                            <td  class="text-end">Rp. {{ number_format($data->cost) }}</td>
                                            <td  class="text-end">Rp. {{ number_format($data->total_cost) }}</td>
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
                                    <td class="text-end">Rp. {{ number_format($data->sum('total_cost')) }}</td>
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
                                    <th class="text-start" style="background-color: #dbdee8 ">LOCATION RENTAL</th>
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
                                            <td class="text-end">Rp. {{ number_format($data->cost) }}</td>
                                            <td class="text-end">Rp. {{ number_format($data->total_cost) }}</td>
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
                                        style="font-weight: 500; background-color: #ffe900;">SUB TOTAL LOCATION RENTAL
                                    </td>
                                    <td class="text-end">Rp. {{ number_format($data->sum('total_cost')) }}</td>
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
                                    <td class="text-end">Rp. {{ number_format($totalcost) }}</td>
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
                                        style="background: #bbc8f396; text-align: center; vertical-align: middle;">
                                        TOTAL CREWS</th>
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
                    </div>



                    {{-- <div class="keteranganbudget" style="margin-left: 12px;">
                        <table>
                            <tr>
                                <td> <div class="circle-yellow"></div></td>
                                <td style="padding-left: 12px;"> Menunggu Approval</td>
                                <td style="padding-left: 12px;"> <div class="circle-red"></div></td>
                                <td style="padding-left: 12px;"> Approval Ditolak</td>
                                <td  style="padding-left: 12px;"> <div class="circle-green"></div></td>
                                <td style="padding-left: 12px;"> Approval Disetujui</td>

                            </tr>
                        </table>
                    </div> --}}

                    <div style="margin: 12px; border-radius: 4px; border-bottom: none;">
                        <table class="table table-bordered"
                            style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                            <thead style="font-weight: 500; ">
                                <tr class="dicobain ">
                                    <th scope="col ">User Submit</th>
                                    <th scope="col ">Approval 1</th>
                                    <th scope="col ">Review</th>
                                    <th scope="col ">Approval 2</th>
                                    @if ($budget >= 200000000)
                                        <th scope="col ">Approval 3</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $requestbudget->employee->full_name }}</td>padding-top: 12px;
                                    <td>
                                        <div class="position-absolute bottom-0 start-0">
                                            {{ $requestbudget->manager->full_name }}
                                        </div>
                                    </td>
                                    {{-- <td style="justify-content: center; align-items: center;"><img
                                            style="padding-top: 8px; " src="asset/image/ttd.png" alt="">
                                        <div style="padding-top: 8px; text-align: center; vertical-align: middle;">
                                            Procurement</div>
                                    </td> --}}
                                    <td>
                                        <div></div>
                                        <div class="position-absolute bottom-0 start-0">{{$reviewer->full_name}}</div>
                                    </td>

                                    <td>
                                        <div></div>
                                        <div class="position-absolute bottom-0 start-0">{{$approval1->full_name}}</div>
                                    </td>
                                    @if ($budget >= 200000000)
                                        <td>
                                            <div></div>
                                            <div class="position-absolute bottom-0 start-0">{{$approval2->full_name}}</div>
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
