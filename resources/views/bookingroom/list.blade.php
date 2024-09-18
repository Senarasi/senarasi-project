@extends('bookingroom.layout.app')

@section('title')
   Booking Room
@endsection

@section('content')
    <!--Badan Isi-->

        <div class="judulhalaman" style="display: flex; align-items: center; margin-top: -12px; ">Booking List</div>

            <div class="tablenih" style="padding-top: -24px;">
                {{-- <div class="judulhalaman " style="text-align: start;">Booking Room</div> --}}
                <div class="table-responsive p-2">
                    <table id="datatable" class="table table-hover"
                    style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; display: 100%; width: 100% ;  color: #4A25AA; ">
                    <thead class="table-light">
                        <tr>
                            {{-- <th scope="col">No.</th> --}}
                            {{-- <th scope="col">Booking Number</th> --}}
                            <th scope="col" style="max-width: 10rem">Room  Name</th>
                            <th scope="col" style="width: 13rem">Booked by</th>
                            {{-- <th scope="col">CP Booking</th> --}}
                            <th scope="col">Description</th>
                            <th scope="col"  style="max-width: 7rem">Date</th>
                            <th scope="col" style="max-width: 5rem">Time</th>
                            <th scope="col" style="max-width: 4rem">Person</th>
                            {{-- <th scope="col">Created Date</th>
                            <th scope="col">Updated Date</th> --}}
                            <th scope="col" style="max-width: 4rem"></th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                        @php $iteration = 1 @endphp
                        @foreach ($bookings as $booking)
                            @if (Auth::user()->role == 'admin' || Gate::allows('owner', $booking))
                                <tr>
                                    {{-- <th scope="row">{{$iteration++}}</th> --}}
                                    {{-- <td>{{ $booking->br_number }}</td> --}}
                                    <td>{{ $booking->room->room_name }}</td>
                                    <td>{{ $booking->user->full_name }}</td>
                                    {{-- <td>
                                        <a style="text-decoration: none;" href="https://wa.me/+62{{ $booking->user->telephone }}" target="_blank">{{ $booking->user->telephone }}</a>
                                    </td> --}}
                                    <td>{{ $booking->desc }}</td>
                                    <td>
                                        @if (\Carbon\Carbon::parse($booking->start)->isSameDay(\Carbon\Carbon::parse($booking->end)))
                                        {{ \Carbon\Carbon::parse($booking->start)->translatedFormat(' d F Y ') }}
                                    @else
                                        {{ \Carbon\Carbon::parse($booking->start)->translatedFormat(' d F Y ') }} - {{ \Carbon\Carbon::parse($booking->end)->translatedFormat(' d F Y ') }}
                                    @endif
                                </td>
                                    <td>{{ \Carbon\Carbon::parse($booking->start)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->end)->format('H:i') }}</td>
                                    <td>
                                        {{-- <a href="#" style="text-decoration: none;"  class="show-guests" data-guests="{{ $booking->guests->pluck('user.name')->implode(', ') }}" data-externalguests="{{ $booking->externalGuests->pluck('email')->implode(', ') }}"> --}}
                                            {{ $booking->guests->count() + $booking->externalGuests->count() }}
                                        {{-- </a> --}}
                                    </td>
                                    {{-- <td>{{ \Carbon\Carbon::parse($booking->created_at)->translatedFormat('d F Y H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->updated_at)->translatedFormat('d F Y H:i') }}</td> --}}
                                    <td>
                                        <span style="display: flex; gap: 8px; justify-content: center">
                                            <a href="#" class="uwuq" data-bs-toggle="modal" data-bs-target="#modal-{{ $booking->id}}">Detail</a>

                                        </span>
                                    </td>
                                </tr>
                                @include('bookingroom.modal_detail', ['data' => $booking])
                            @endif
                        @endforeach
                    </tbody>

                    </table>
                </div>

            </div>


@endsection

@section('modal')
@include('layout.alert')
{{-- <div class="modal justify-content-center fade" id="guestsModal"  data-bs-keyboard="false"
        tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
            <div class="modal-body  bg-white">

                <div class="mb-3"><strong>Employee : </strong></div>
                <div class="mb-3"><ul id="guestsList" class="list-group">
                    <!-- List of guests will be inserted here dynamically -->
                </ul></div>

                <div class="mb-3"><strong>External Guests:</strong></div>
                <div class="mb-3"><ul id="externalGuestsList" class="list-group">
                        <!-- List of external guests will be inserted here dynamically -->
                </ul></div>

                <input type="hidden" id="eventModalBookingId" value="">
                <div class="text-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
            <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
        </div>
    </div> --}}
@endsection

@section('custom-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var guestLinks = document.querySelectorAll('.show-guests');

        guestLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                var internalGuests = this.getAttribute('data-guests').split(',');
                var externalGuests = this.getAttribute('data-externalguests').split(',');
                var guestsList = document.getElementById('guestsList');
                var externalGuestsList = document.getElementById('externalGuestsList');

                guestsList.innerHTML = '';
                externalGuestsList.innerHTML = '';

                internalGuests.forEach(function(guest) {
                    var listItem = document.createElement('li');
                    listItem.classList.add('list-group-item');
                    listItem.textContent = guest.trim();
                    guestsList.appendChild(listItem);
                });

                externalGuests.forEach(function(guest) {
                    var listItem = document.createElement('li');
                    listItem.classList.add('list-group-item');
                    listItem.textContent = guest.trim();
                    externalGuestsList.appendChild(listItem);
                });

                var guestsModal = new bootstrap.Modal(document.getElementById('guestsModal'));
                guestsModal.show();
            });
        });
    });
</script>
@endsection

@section('alert')
@if (session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#successModal').modal('show');
            setTimeout(function() {
                $('#successModal').modal('hide');
            }, 3000);
        });
    </script>
@endif
@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#errorModal').modal('show');
        });
    </script>
@endif
@endsection
