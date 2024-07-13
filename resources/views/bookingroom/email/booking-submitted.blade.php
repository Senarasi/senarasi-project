<!DOCTYPE html>
<html>
<head>
    <title>Booking Room Confirmation</title>
</head>
<body>
    <h3>The room has been successfully booked.</h3>
    Booking Room Details:
    <p><strong>Description:</strong> {{ $desc }}</p>
    <p><strong>Location:</strong> INTILAND TOWER LT. 20, Jl. Jend. Sudirman Kav. 32, Jakarta Pusat, 10220 </p>
    <p><strong>Room:</strong> {{ $room_name }}</p>
    <p><strong>Start Time:</strong> {{ $start }}</p>
    <p><strong>End Time:</strong> {{ $end }}</p>
    <p><strong>Booked By:</strong> {{ $name }} </p>
    <p>CP Booking (WA):</strong> {{ $telephone }}</p>
    <p><strong>Employee:</strong></p>
    <ul>
        @foreach($guests as $guest)
            <li>{{ $guest->full_name }}</li>
        @endforeach
    </ul>
    <p><strong>Eksternal Guests:</strong></p>
    <ul>
        @foreach ($externalguests as $email)
            <li>{{ $email }}</li>
        @endforeach
    </ul>

</body>
</html>
