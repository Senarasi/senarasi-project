<html>
<head>
    <title>Meeting Invitation</title>
</head>
<body>
    <h1>Dear {{ $guest->full_name }},</h1>
    <p>You have been invited to a Meeting.</p>
    <p><strong>Location:</strong> INTILAND TOWER LT. 20, Jl. Jend. Sudirman Kav. 32, Jakarta Pusat, 10220 </p>
    <p><strong>Room:</strong> {{ $booking->room->room_name }}</p>
    <p><strong>Start Time:</strong> {{ $booking->start_time }}</p>
    <p><strong>End Time:</strong> {{ $booking->end_time }}</p>
    <p>Thank you!</p>
</body>
</html>
