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
        .button-report {
            right: 0;
            color: #ffff !important;
            border-radius: 6px;
            background-color: #dc3545;
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
    <div style="background-color: #eeeeee; padding-top: 64px; padding-bottom: 64px;">
        <div class="logo container" style="text-align: center">
            <img src="https://imgur.com/GYooEjc.png" alt="Company Logo"  style="display: inline-block;">
        </div>
        <div class="email-container">

            <h3 style="text-align: center;">Booking Room Confirmation.</h3>
            <h3>Dear {{ $booking->employee->full_name }},</h3>
            <h3>This is a reminder that you have booked the room {{$booking->room->room_name}} for {{ $booking->desc }} from {{$booking->start}} to {{$booking->end}}.</h3>
            <h3>If you decide not to use the room as scheduled, please cancel your booking as soon as possible. If you still plan to use the room, you can ignore this email.</h3>
            <h3>Thank you.</h3>
            <h3><a  href="{{ route('bookingroom.confirmDelete', $booking->id) }}" class="button-report" >Cancel Booking</a></h3>
        </div>
    </div>

</body>
</html>
