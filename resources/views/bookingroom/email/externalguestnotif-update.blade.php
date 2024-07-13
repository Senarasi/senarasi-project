<html>
<head>
    <title>Meeting Invitation Updated</title>
</head>
<body>
    <p>This Invitation Meeting has been Updated.</p>
    <p><strong>Description:</strong> {{ $booking->description }}</p>
    <p><strong>Location:</strong> INTILAND TOWER LT. 20, Jl. Jend. Sudirman Kav. 32, Jakarta Pusat, 10220 </p>
    <p><strong>Room:</strong> {{ $booking->room->room_name }}</p>
    <p><strong>Start Time:</strong> {{ $booking->start_time }}</p>
    <p><strong>End Time:</strong> {{ $booking->end_time }}</p>
    <p>Thank you!</p>
</body>
</html>
