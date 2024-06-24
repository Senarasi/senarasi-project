<!DOCTYPE html>
<html>
<head>
    <title>Booking Room Confirmation</title>
</head>
<body>
    <h3>The room has been successfully booked.</h3>
    Booking Room Details:
    <p><strong>Booking Title:</strong> {{ $title}}</p>
    <p><strong>Room:</strong> {{ $room_name }}</p>
    <p><strong>Start Time:</strong> {{ $start }}</p>
    <p><strong>End Time:</strong> {{ $end }}</p>
    <p><strong>Description:</strong> {{ $desc }}</p>
    <p><strong>Booked By:</strong> {{ $name }} </p>
    <p><strong>Contact:</strong></p>
    <p>Email:</strong> {{ $email }}</p>
    <p>Phone Number (WhatsApp):</strong> {{ $telephone }}</p>
</body>
</html>
