<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .email-container {

            background-color: #ffffff;
            padding: 32px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(192, 192, 192, 0.1);
            max-width: 800px;
            margin: auto;
            text-align: left;
        }
        .logo {
            text-align:left;
            margin-top:-24px;
            margin-bottom: 20px;

        }
        .logo img {
            max-width: 220px;
        }
        h3 {
            color: #333;
            text-align: center;
        }
        p, ul {
            color: #555;
        }
        ul {
            padding-left: 20px;
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 8px 0;
            vertical-align: top;
            font-size: 16px;
        }
        .label {
            width: 30%;
            font-weight: bold;
        }
        .value {
            width: 70%;
        }
        .alert {
        position: relative;
        padding: 5px 5px;
        margin-bottom: 1px;
        border: 1px solid transparent;
        border-radius: 0.20rem;
        font-size: 12px !important;

        }

        .alert-primary {
        color: #084298;
        background-color: #cfe2ff;
        border-color: #084298;
        }

        .alert-secondary {
        color: #41464b;
        background-color: #e2e3e5;
        border-color: #41464b;
        }

        .alert-success {
        color: #0f5132;
        background-color: #d1e7dd;
        border-color: #0f5132;
        }

        .alert-danger {
        color: #842029;
        background-color: #f8d7da;
        border-color: #842029;
        }

        .alert-warning {
        color: #664d03;
        background-color: #fff3cd;
        border-color: #664d03;
        }

        .alert-info {
        color: #055160;
        background-color: #cff4fc;
        border-color: #055160;
        }

        .alert-light {
        color: #636464;
        background-color: #fefefe;
        border-color: #636464;
        }

        .alert-dark {
        color: #141619;
        background-color: #d3d3d4;
        border-color: #141619;
        }

        .button-report {
            right: 0;
            color: #ffff !important;
            border-radius: 6px;
            background-color: #4a25aa;
            border: none;
            text-align: center;
            text-decoration: none;
            font: 400 16px Narasi Sans, sans-serif;
            align-self: center;
            padding: 10px 14px;
            margin-top: 12px;
            display: block;
        }
    </style>
</head>
<body>
    <div style="background-color: #f9f9f9; padding-top: 64px; padding-bottom: 64px;">
        <div class="logo container" style="text-align: center">
            <img src="https://imgur.com/GYooEjc.png" alt="Company Logo"  style="display: inline-block;">
        </div>
        <div class="email-container">

            <h3 style="margin-bottom: 24px">{{ $transportrequest->user->name }} uploaded a transport report.</h3>
            <table style="margin-bottom: 0px">
                <tr>
                    <td class="label">Status</td>
                    <td>: <span class="alert alert-success">{{ $transportrequest->status }}</span></td>
                </tr>
                <tr>
                    <td class="label">Requested Date</td>
                    <td>: {{ \Carbon\Carbon::parse($transportrequest->date)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Requested Time</td>
                    <td>: {{ \Carbon\Carbon::parse($transportrequest->start_time)->format('H:i') }} WIB - {{ \Carbon\Carbon::parse($transportrequest->end_time)->format('H:i')  }} WIB</td>
                </tr>
                <tr>
                    <td class="label">Program / Department</td>
                    <td>: {{ $transportrequest->program }}</td>
                </tr>
                <tr>
                    <td class="label">Activity</td>
                    <td>: {{ $transportrequest->activity }}</td>
                </tr>
                <tr>
                    <td class="label">Passanger</td>
                    <td>: {{ $transportrequest->person }}</td>
                </tr>
                <tr>
                    <td class="label">Start Location</td>
                    <td>: {{ $transportrequest->startLocation->start_loc }}</td>
                </tr>
                <tr>
                    <td class="label">Destination</td>
                    <td>: {{ $transportrequest->destination->final_loc }}</td>
                </tr>
                <tr>
                    <td class="label">Service Type</td>
                    <td>: {{ $transportrequest->service_type }}</td>
                </tr>
                <tr>
                    <td class="label">Notes</td>
                    <td>: {{ strip_tags($transportrequest->note) }}</td>
                </tr>
                @if ($transportrequest->transitLocations->isEmpty())
                    <tr>
                        <td class="label">Transportation</td>
                        <td>: {{ $transportrequest->transport }}</td>
                    </tr>
                    @if ($transportrequest->transport == 'Grab' )
                    @foreach ($transportrequest->transportReports as $report)
                    <tr>
                        <td class="label">Voucher</td>
                        <td>: <span class="alert alert-primary">{{ $transportrequest->voucher}}</span></td>
                    </tr>
                    <tr>
                        <td class="label">Transportation Cost</td>
                        <td>: {{ $report->cost}}</td>
                    </tr>
                    {{-- <tr>
                        <td class="label">Screenshoot</td>
                        <td><img src="{{ $message->embed(public_path('storage/'.$report->screenshoot)) }}" alt="Contoh Gambar" style="max-width: 100px; height: auto;"></td>
                    </tr> --}}
                    @endforeach
                    @endif
                    @if ($transportrequest->transport == 'MRT'  || $transportrequest->transport == 'KRL'|| $transportrequest->transport == 'LRT')
                    <tr>
                        <td class="label">Card Report</td>
                        <td>:
                            <ol>
                                @foreach ($transportrequest->transportReports as $report)
                                <li>
                                    <div style="display: flex;">
                                        <p style="flex: 1;">Card</p>
                                        <p style="flex: 3;">: {{ $report->transportCard->card_type }}</p>
                                    </div>
                                    <div style="display: flex;">
                                        <p style="flex: 1;">Start Balance</p>
                                        <p style="flex: 3;">: {{ $report->initial_balance }}</p>
                                    </div>
                                    <div style="display: flex;">
                                        <p style="flex: 1;">Final Balance</p>
                                        <p style="flex: 3;">: {{ $report->final_balance }}</p>
                                    </div>
                                    {{-- <div>
                                        <p>Screenshoot Initial Balance: </p>
                                        <p><img src="{{ $message->embed(public_path('storage/'.$report->ss_initial_balance)) }}" alt="Contoh Gambar" style="max-width: 100px; height: 100px;"></p>
                                    </div> --}}
                                    {{-- <div>
                                        <p>Screenshoot Final Balance: </p>
                                        <p><img src="{{ $message->embed(public_path('storage/'.$report->ss_final_balance)) }}" alt="Contoh Gambar" style="max-width: 100px; height: 100px;"></p>
                                    </div> --}}
                                </li>
                                @endforeach
                            </ol>
                        </td>
                    </tr>
                    @endif
                    @if ($transportrequest->transport == 'Reimburse' )
                        @foreach ($transportrequest->transportReports as $report)
                            @if ($report->fuel != null)
                                <tr>
                                    <td class="label">Fuel</td>
                                    <td>: {{ $report->fuel }}</td>
                                </tr>
                                {{-- <tr>
                                    <td class="label">fuel Receipt</td>
                                    <td> <img src="{{ $message->embed(public_path('storage/'.$report->fuel_receipt)) }}" alt="Contoh Gambar" style="max-width: 100px; height: 100px;"></td>
                                </tr> --}}
                            @endif
                            @if ($report->toll != null)
                                <tr>
                                    <td class="label">Toll</td>
                                    <td>: {{ $report->toll }}</td>
                                </tr>
                                {{-- <tr>
                                    <td class="label">Toll Receipt</td>
                                    <td> <img src="{{ $message->embed(public_path('storage/'.$report->toll_receipt)) }}" alt="Contoh Gambar" style="max-width: 100px; height: 100px;"></td>
                                </tr> --}}
                            @endif
                            @if ($report->parking != null)
                                <tr>
                                    <td class="label">Parking</td>
                                    <td> {{ $report->parking }}</td>
                                </tr>
                                {{-- <tr>
                                    <td class="label">Parking Receipt</td>
                                    <td> <img src="{{ $message->embed(public_path('storage/'.$report->parking_receipt)) }}" alt="Contoh Gambar" style="max-width: 100px; height: 100px;"></td>
                                </tr> --}}
                            @endif
                            @if ($report->fuel != null)
                                <tr>
                                    <td class="label">Transportation Cost</td>
                                    <td> {{ $report->cost }}</td>
                                </tr>
                                {{-- <tr>
                                    <td class="label">Screenshoot</td>
                                    <td><img src="storage/{{ $report->screenshoot }}" alt="Contoh Gambar" style="max-width: 100px; height: 100px;"></td>
                                </tr> --}}
                            @endif
                        @endforeach
                    @endif
                @else
                <tr>
                    <td class="label">Transportartion Details</td>
                    <td>:
                    </td>
                </tr>
                @endif
            </table>
            @php
                $previousDestination = null; // Initialize a variable to store the previous destination
            @endphp
            @foreach ($transportrequest->transitLocations as $index => $transit)
            <table class="custom-tables" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; margin-bottom: 12px; margin-top: -24px table-layout: fixed;">
                <tr>
                    <td style="width: 780px; padding: 0; vertical-align: top;">
                        <!-- Destination and Transportation Information -->
                        <table cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; margin-bottom: 12px; table-layout: fixed;">
                            {{-- <tr>
                                <td style="width: 120px; padding: 0;">Destination</td>
                                <td style="padding: 0;">: {{ $transit->destination }}</td>
                            </tr> --}}
                            <tr>
                                <td style="width: 120px; padding: 0;">Route</td>
                                <td style="padding: 0;">:
                                    @if ($index == 0)
                                        {{ $transportrequest->startLocation->start_loc }} <!-- If it's the first transit, use the start location -->
                                    @else
                                        {{ $previousDestination }} <!-- For other transits, use the previous destination -->
                                    @endif
                                    -
                                    {{ $transit->destination }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 120px; padding: 0;">Transportation</td>
                                <td style="padding: 0;">: {{ $transit->transport }}</td>
                            </tr>
                        </table>

                        <!-- Additional Information Table (Grab Cost, MRT, etc.) -->
                        @if ($transit->transport == 'Grab')
                        <table cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 780px; margin-bottom: 12px; table-layout: fixed;">
                            <thead style="background: #e6e6e6; text-align: center">
                                <tr>
                                    <th style="border: 1px solid #ddd; padding: 8px; width: 50%;">Voucher</th>
                                    <th style="border: 1px solid #ddd; padding: 8px; width: 50%;">Grab Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transit->transportReports as $report)
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $transit->voucher ?? '-' }}</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $report->cost ?? '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif

                        @if ($transit->transport == 'MRT' || $transit->transport == 'KRL' || $transit->transport == 'LRT' )
                        <table cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 780px; margin-bottom: 12px; table-layout: fixed;">
                            <thead style="background: #e6e6e6; text-align: center">
                                <tr>
                                    <th style="border: 1px solid #ddd; padding: 8px; width: 33%;">Card</th>
                                    <th style="border: 1px solid #ddd; padding: 8px; width: 33%;">Initial Balance</th>
                                    <th style="border: 1px solid #ddd; padding: 8px; width: 33%;">Final Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transit->transportReports as $report)
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $report->transportCard->card_type }}</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $report->initial_balance }}</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $report->final_balance }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif

                        @if ($transit->transport == 'Reimburse')
                        <table cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 780px; margin-bottom: 12px; table-layout: fixed;">
                            <thead style="background: #e6e6e6; text-align: center">
                                <tr>
                                    <th style="border: 1px solid #ddd; padding: 8px; width: 50%;">Item</th>
                                    <th style="border: 1px solid #ddd; padding: 8px; width: 50%;">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transit->transportReports as $report)
                                @if ($report->fuel != null)
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Fuel</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $report->fuel ?? '-' }}</td>
                                </tr>
                                @endif
                                @if ($report->toll != null)
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Toll</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $report->toll ?? '-' }}</td>
                                </tr>
                                @endif
                                @if ($report->parking != null)
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Parking</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $report->parking ?? '-' }}</td>
                                </tr>
                                @endif
                                @if ($report->cost != null)
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Grab Cost</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $report->cost ?? '-' }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </td>
                </tr>
            </table>
            @php
                $previousDestination = $transit->destination; // Update the previous destination at the end of each iteration
            @endphp
            @endforeach
            <div>
            </div>
        </div>
    </div>

</body>
</html>
