<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
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

            <h3 style="margin-bottom: 24px">Daily Operational Car Report.</h3>
            <table>

                <tr>
                    <td class="label">Date</td>
                    <td>: {{ \Carbon\Carbon::parse($operationalCarReport->report_date)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Fuel Total</td>
                    <td>: {{ $operationalCarReport->fuel }}</td>
                </tr>
                <tr>
                    <td class="label">Toll Total</td>
                    <td>: {{ $operationalCarReport->toll }}</td>
                </tr>
                <tr>
                    <td class="label">Parking Total</td>
                    <td>: {{ $operationalCarReport->parking }}</td>
                </tr>
                <tr>
                    <td class="label">Notes</td>
                    <td>: {{ $operationalCarReport->notes ?: '-' }}</td>
                </tr>
                <tr>
                    <td class="label">User Details</td>
                    <td>: </td>
                </tr>
            </table>
            <table cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 800px; margin-bottom: 12px; margin-top: 12px; table-layout: fixed;">
                <thead style="background: #e6e6e6;">
                    <tr>
                        {{-- <th style="border: 1px solid #ddd; padding: 8px; width: 5%; text-align: center;">No</th> --}}
                        {{-- <th style="border: 1px solid #ddd; padding: 8px; width: 33%;">Date</th> --}}
                        <th style="border: 1px solid #ddd; padding: 8px; width: 18%;">Time</th>
                        <th style="border: 1px solid #ddd; padding: 8px; width: 33%;">User</th>
                        <th style="border: 1px solid #ddd; padding: 8px; width: 33%;">Start Location</th>
                        <th style="border: 1px solid #ddd; padding: 8px; width: 33%;">Destination</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($operationalCarReport->operationalCarUsers as $carUser)
                        @php
                            $requestTransport = $carUser->requestTransport;
                        @endphp
                        @if ($requestTransport->transitLocations->isEmpty())
                            <tr>
                                {{-- <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{$loop->iteration}}</td> --}}
                                {{-- <td style="border: 1px solid #ddd; padding: 8px;">{{ \Carbon\Carbon::parse($carUser->requestTransport->date)->translatedFormat('d F Y') }}</td> --}}
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ \Carbon\Carbon::parse($requestTransport->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($requestTransport->end_time)->format('H:i') }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $requestTransport->user->name }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $requestTransport->startLocation->start_loc }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $requestTransport->destination->final_loc }}</td>
                            </tr>
                        @else
                            @php
                                $previousDestination = null;
                            @endphp

                            {{-- Loop transit setelah transit pertama --}}
                            @foreach ($requestTransport->transitLocations as $index => $transit)
                                @if ($transit->transport == 'Operational Car')
                                    <tr>
                                        {{-- <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{$loop->iteration}}</td> --}}
                                        {{-- <td style="border: 1px solid #ddd; padding: 8px;">{{ \Carbon\Carbon::parse($carUser->requestTransport->date)->translatedFormat('d F Y') }}</td> --}}
                                        <td style="border: 1px solid #ddd; padding: 8px;">{{ \Carbon\Carbon::parse($requestTransport->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($requestTransport->end_time)->format('H:i') }}</td>
                                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $requestTransport->user->name }}</td>
                                        <td style="border: 1px solid #ddd; padding: 8px;">
                                            @if ($index == 0)
                                                {{ $requestTransport->startLocation->start_loc }} <!-- If it's the first transit, use the start location -->
                                            @else
                                                {{ $previousDestination }} <!-- For other transits, use the previous destination -->
                                            @endif
                                        </td>
                                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $transit->destination }}</td>
                                    </tr>
                                @endif
                                @php
                                    $previousDestination = $transit->destination;
                                @endphp
                            @endforeach
                        @endif

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
