@extends('bookingroom.layout.app')

@section('title')
   Cancel Confirmation
@endsection

@section('content')
    <!--Badan Isi-->

        <div class="judulhalaman" style="display: flex; align-items: center; margin-top: -12px; ">Cancel Confirmation</div>


    <div class="container tablenih" style="justify-content: center; text-align: center">
        <div style="justify-content: space-between; display: flex; margin-left: 12px; margin-right: 12px; margin-top: 12px;">
            <div>
                <div>
                    <p class="text-start" style="font: 400 16px Narasi Sans, sans-serif; color: #4A25AA; margin-left: 2px;">Booking Number</p>
                    <div class="judulhalaman" style="text-align: start; margin-top: -16px;; margin-left:-1px">{{ $booking->br_number }}</div>
                </div>
            </div>
                    <div class="button-approv" style="margin-top: -px;">
                        <form method="POST" action="{{ route('bookingroom.destroy', $booking->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >Cancel Booking</button>
                        </form>
                    </div>

        </div>

        <div class="table-responsive" style="border: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; margin-bottom: 24px;  ">


    <table class="table " style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 8px; margin-bottom: 0px; text-align: center ">
        <thead style="font-weight: 500">
            <tr class="dicobain">
                <th scope="" style="width:150px">No</th>
                <th scope="col" style="text-align: start; width: 200px">Detail</th>
                <th scope="col " style="text-align: start"></th>
            </tr>
        </thead>
        <tbody style="">
            <tr>
                <th scope="row">1</th>
                <td style="text-align: start;">Description</td>
                <td class="total-price" style="font-weight: 300;text-align: start" >{{ $booking->desc }}</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td style="text-align: start;">Start Time</td>
                <td class="total-price" style="font-weight: 300;text-align: start" >{{ $booking->start }}</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td style="text-align: start; ">End Time</td>
                <td class="total-price" style="font-weight: 300;text-align: start">{{ $booking->end }}</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td style="text-align: start; ">Room</td>
                <td class="total-price" style="font-weight: 300;text-align: start">{{ $booking->room->room_name }}</td>
            </tr>
            @if ($booking->hybrid)
                <tr>
                    <th scope="row">5</th>
                    <td style="text-align: start; ">Video Conference Link</td>
                    <td class="total-price" style="font-weight: 300;text-align: start"> <a href="{{ $booking->hybrid->link }}">{{ $booking->hybrid->link }}</a> </td>
                </tr>
                <tr>
                    <th scope="row ">6</th>
                    <td style="text-align: start; ">Employee</td>
                    <td class="total-price" style="font-weight: 300; text-align: start ">
                        <ul>
                        @foreach($booking->guests as $guest)
                            <li>{{ $guest->user->name }}</li>
                        @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th scope="row ">7</th>
                    <td style="text-align: start; ">External Guests</td>
                    <td class="total-price" style="font-weight: 300; text-align: start ">
                        <ul>
                        @foreach($booking->externalGuests as $externalGuest)
                            <li>{{ $externalGuest->email }}</li>
                        @endforeach
                        </ul>
                    </td>
                </tr>
            @else
            <tr>
                <th scope="row ">6</th>
                <td style="text-align: start; ">Employee</td>
                <td class="total-price" style="font-weight: 300; text-align: start ">
                    <ul>
                    @foreach($booking->guests as $guest)
                        <li>{{ $guest->user->name }}</li>
                    @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th scope="row ">7</th>
                <td style="text-align: start; ">External Guests</td>
                <td class="total-price" style="font-weight: 300; text-align: start ">
                    <ul>
                    @foreach($booking->externalGuests as $externalGuest)
                        <li>{{ $externalGuest->email }}</li>
                    @endforeach
                    </ul>
                </td>
            </tr>
            @endif

        </tbody>

    </table>




        </div>
    </div>



@endsection


