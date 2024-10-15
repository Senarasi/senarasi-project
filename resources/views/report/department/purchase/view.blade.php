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
                                <div class="text-start" style="display: inline-block; vertical-align: middle; margin-right: 774px">
                                    <p style="margin-bottom: -8px; padding-bottom: -8px">KODE BUDGET</p>
                                    <p style="font: 700 24px Narasi Sans, sans-serif; letter-spacing: 0.5px;">KODE BUDGET</p>
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
                                                <td>Musyawarah</td>

                                                <td style="padding-left: 64px; !important">Type</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>Live Streaming</td>

                                                <td style="padding-left: 64px; !important">Budget Code</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td></td>

                                            </tr>
                                            <tr>
                                                <td>Episode</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>Hasil Rekapitulasi KPU</td>

                                                <td style="padding-left: 64px; !important">Producer Name</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td></td>

                                                <td style="padding-left: 64px; !important">Date of Shooting</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>28-10-2023</td>


                                            </tr>
                                            <tr>
                                                <td>Location</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>Kantor Narasi</td>

                                                <td style="padding-left: 64px; !important">Manager Name</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td></td>

                                                <td style="padding-left: 64px; !important">Date of Upload</td>
                                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                <td>28-10-2023</td>


                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div style=" margin-bottom: 24px; margin-top: -32px; padding:9px;">
                        <table class="table table-bordered " style="font: 12px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center ">
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
                                <tr>
                                    <td class="text-start">Guest</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td class="text-start">Guest</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td class="text-start">Guest</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-start " style="font-weight: 500; background-color: #ffe900;">SUB TOTAL PERFORMER/HOST/GUEST</td>
                                    <td class="text-end">3,000,000</td>
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
                                <tr>
                                    <th class="text-start">Sub Desc</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="text-start">Crew</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td class="text-start">Crew</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td class="text-start">Crew</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-start " style="font-weight: 500; background-color: #ffe900;">SUB TOTAL PRODUCTION CREWS</td>
                                    <td class="text-end">3,000,000</td>
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
                                <tr>
                                    <th class="text-start">Sub Desc</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="text-start">Tools</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td class="text-start">Tools</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td class="text-start">Tools</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-start " style="font-weight: 500; background-color: #ffe900;">SUB TOTAL PRODUCTION TOOLS</td>
                                    <td class="text-end">3,000,000</td>
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
                                <tr>
                                    <th class="text-start">Sub Desc</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="text-start">Tools</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td class="text-start">Tools</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td class="text-start">Tools</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-start " style="font-weight: 500; background-color: #ffe900;">SUB TOTAL OPERATIONAL</td>
                                    <td class="text-end">3,000,000</td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td colspan="8"></td>
                                </tr>
                            </tbody>

                            {{-- LOCATION RENTAL --}}
                            <tbody class="text-center" >
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
                                <tr>
                                    <th class="text-start">Sub Desc</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="text-start">Tools</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td class="text-start">Tools</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td class="text-start">Tools</td>
                                    <td>NCS</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-end">1,000,000</td>
                                    <td class="text-end">1,000,000</td>
                                    <td></td>
                                    <td class="text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-start " style="font-weight: 500; background-color: #ffe900;">SUB TOTAL LOCATION RENTAL</td>
                                    <td class="text-end">3,000,000</td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td colspan="8"></td>
                                </tr>
                            </tbody>

                            {{-- TOTAL --}}
                            <tbody class="text-center" >
                                <tr>
                                    <td colspan="5" class="text-start " style="font-weight: 500; background-color: #bbc8f396;">TOTAL</td>
                                    <td class="text-end">100,000,000</td>
                                    <td></td>
                                    <td></td>

                                </tr>
                            </tbody>

                        </table>

                        <table class="table table-bordered " style="font: 12px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center ">
                            <thead style="font-weight: 500; background-color: rgba(28, 187, 140, 0.25)">
                                <tr class="dicobain">
                                    <th rowspan="2" scope="col" class="text-center" style="background: #bbc8f396; text-align: center; vertical-align: middle; width: 43%;">TOTAL CREWS & PERFORMERS</th>
                                    <th scope="col ">NCS</th>
                                    <th scope="col ">OUT</th>
                                    <th scope="col ">TOTAL</th>
                                </tr>
                            </thead>

                            <tbody class="text-center" >
                                <tr>
                                    <td  class="text-center" style="font-weight: 500;">25</td>
                                    <td  class="text-center" style="font-weight: 500;">25</td>
                                    <td  class="text-center" style="font-weight: 500;">50</td>
                                </tr>

                            </tbody>

                        </table>
                    </div>

                    <div style="margin: 12px; border-radius: 4px; border-bottom: none;">
                        <table class="table table-bordered" style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                            <thead style="font-weight: 500; ">
                                <tr class="dicobain ">
                                    <th scope="col ">Requester</th>
                                    <th scope="col ">Approval 1</th>
                                    <th scope="col ">Studio Production Review</th>
                                    <th scope="col ">Approval 2</th>
                                    <th scope="col ">Approval 3</th>
                                </tr>
                            </thead>
                            <tbody >
                                <tr>
                                    <td style="justify-content: center; align-items: center; width: 20%;">Asep Ngebul</td>
                                    <td style="justify-content: center; align-items: center; width: 20%;"><img style="width:84px; padding-bottom: -12px" src="asset/image/PENDING.png" alt=""><div style="text-align: center; vertical-align: middle;">Manager</div></td>
                                    <td style="justify-content: center; align-items: center; width: 20%;"><img style="width:84px; padding-bottom: -12px" src="asset/image/REJECT.png" alt=""><div style="text-align: center; vertical-align: middle;">Procurement</div></td>

                                    <td style="justify-content: center; align-items: center; width: 20%;"><img style="width:84px; padding-bottom: -12px" src="asset/image/APPROVED.png" alt=""><div style="text-align: center; vertical-align: middle;">Finance 1</div></td>

                                    <td style="justify-content: center; align-items: center; width: 20%;"><img style="width:84px; padding-bottom: -12px" src="asset/image/PENDING.png" alt=""><div style="text-align: center; vertical-align: middle;">Finance 2</div></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>



