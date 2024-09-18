<!DOCTYPE html>
<html>
<head>
    <title>Booking Room Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
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
            font-size: 14px;
        }
        .label {
            width: 30%;
            font-weight: bold;
        }
        .value {
            width: 70%;
        }
    </style>
</head>
<body>
    <div style="background-color: #eeeeee; padding-top: 64px; padding-bottom: 64px;">
        <div class="logo container" style="text-align: center">
            <img src="https://imgur.com/GYooEjc.png" alt="Company Logo"  style="display: inline-block;">
        </div>
        <div class="email-container">

            <h3>The room has been successfully booked.</h3>
            <table>
                <tr>
                    <td class="label">Description</td>
                    <td class="value">: {{ $desc }}</td>
                </tr>
                <tr>
                    <td class="label">Location</td>
                    <td class="value">: INTILAND TOWER LT. 20, Jl. Jend. Sudirman Kav. 32, Jakarta Pusat, 10220</td>
                </tr>
                <tr>
                    <td class="label">Room</td>
                    <td class="value">: {{ $room_name }}</td>
                </tr>
                @if ($meetingLink)
                <tr>
                    <td class="label">Video Conference Link:</td>
                    <td class="value">:
                        <a href="{{ $meetingLink }}">
                            {{ $meetingLink }}
                        </a>
                    </td>
                </tr>
                @endif
                <tr>
                    <td class="label">Start Time</td>
                    <td class="value">: {{ $start }}</td>
                </tr>
                <tr>
                    <td class="label">End Time</td>
                    <td class="value">: {{ $end }}</td>
                </tr>
                <tr>
                    <td class="label">Booked By</td>
                    <td class="value">: {{ $name }}</td>
                </tr>
                <tr>
                    <td class="label">CP Booking (WA)</td>
                    <td class="value">: {{ $telephone }}</td>
                </tr>
                <tr>
                    <td class="label">Employee</td>
                    <td class="value">:
                        <ul>
                            @foreach($guests as $guest)
                                <li>{{ $guest->full_name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td class="label">External Guests</td>
                    <td class="value">:
                        <ul>
                            @foreach ($externalguests as $email)
                                <li>{{ $email }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>


            </table>
            <div>

            </div>
        </div>
    </div>

</body>
</html>
