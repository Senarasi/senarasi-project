@extends('bookingroom.layout.app')

@section('title')
   Booking Room
@endsection

@auth
    <script>
        window.authUserId = {{ auth()->user()->id }};
        window.userRole = "{{ Auth::user()->role }}";
    </script>
@endauth

@section('content')
    <!--Badan Isi-->
    <div style="margin-left: 24px; ">
        <div class="judulhalaman" style="display: flex; align-items: center; margin-top: -12px;">Booking Room Narasi</div>
            {{-- <div style="display: inline-flex; gap: 12px; margin-left:4px;">
                <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#modal-sop"> Upload
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                            fill="white" />
                    </svg>
                </button>
            </div> --}}

            <div class="tablenih" style="padding-top: -24px;">
                {{-- <div class="judulhalaman " style="text-align: start;">Booking Room</div> --}}
                <div class="table-responsive p-3">
                    <table id="datatable" class="table table-hover"
                    style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; display: 100%; width: 100% ;  color: #4A25AA; ">
                    <thead style="font-weight: 500; text-align: center">
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Room  Name</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">Description</th>
                            <th scope="col">action</th>

                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;" class="text-center">
                        @foreach ($rooms as $room)
                        <tr>
                            <th scope="row" class="text-center">{{$loop->iteration}}</th>
                            <td>{{ $room->room_name }}</td>
                            <td>{{ $room->capacity }}</td>
                            <td>{{ $room->desc }}</td>
                            <td>
                                <a href="{{ route('bookingroom.create', $room->id )}}" class="text-decoration-none text-end">
                                   <button type="button" class="uwuq" style="width: fit-content;">Book</button>
                               </a>
                           </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>

            </div>

            <div class="tablenih" style="padding-top: -24px; margin-top: 32px;" >
                <p style="font: 700 24px Narasi Sans, sans-serif; color: #4A25AA; margin: 12px;">Room Calendar</p>
                <form id="roomFilterForm">
                    <div class="row form-group mb-3 text-center d-flex justify-content-center">
                        <div class="col-6">
                            <select class="form-select" name="room" id="roomSelect">
                                <option selected>Select Room</option>
                                @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="uwuq" style="width: fit-content;">{{ __('Filter') }}</button>
                        </div>
                    </div>
                </form>

                <div id="calendar" class="p-3"></div>
            </div>


    </div>

@endsection

@section('modal')
    <div class="modal justify-content-center fade" id="eventModal"  data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
            {{-- <div class="modal-header">
              <h1 class="modal-title fs-5" >Booking Details</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="modal-body  bg-white">
                <h5 class="mb-4"  id="eventModalTitle"></h5>
                <div class="mb-3"><strong>Booked By : </strong> <span class="fw-lighter" id="eventModalUser" ></span></div>

                <div class="mb-3"><strong>Contact (WhatsApp) : </strong> <a style="text-decoration: none" id="eventModalTelephone" href="#" target="_blank"></a></div>

                <div class="row mb-3">
                  <div class="col">
                      <strong>Start:</strong> <span class="fw-lighter" id="eventModalStart"></span>
                  </div>
                  <div class="col">
                      <strong>End:</strong> <span class="fw-lighter" id="eventModalEnd"></span>
                  </div>
                </div>

                <div class="mb-3"><strong>Description : </strong> <span id="eventModalDesc"></span></div>

                <input type="hidden" id="eventModalBookingId" value="">
                <div class="text-end">
                    <button type="button" class="btn btn-danger" id="deleteBookingBtn">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
            <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
        </div>
    </div>
@endsection

@section('custom-js')
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var roomFilterForm = document.getElementById('roomFilterForm');
        var roomSelect = document.getElementById('roomSelect');

        // Initialize FullCalendar
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            navLinks: true,
            editable: true,
            displayEventTime: true,
            displayEventEnd: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: function(fetchInfo, successCallback, failureCallback) {
                var room_id = roomSelect.value;

                if (room_id === "Select Room") {
                    successCallback([]); // No events if no room selected
                    return;
                }

                $.ajax({
                    url: '/getevents',
                    type: 'GET',
                    data: {
                        room_id: room_id,
                        start: fetchInfo.startStr,
                        end: fetchInfo.endStr
                    },
                    success: function(response) {
                        successCallback(response.events);
                    },
                    error: function() {
                        failureCallback();
                    }
                });
            },
            eventClick: function(info) {
                var startDate = moment(info.event.start).format('DD-MM-YYYY HH:mm');
                var endDate = moment(info.event.end).format('DD-MM-YYYY HH:mm');

                // Open modal and populate with event details
                $('#eventModalTitle').text(info.event.title);
                $('#eventModalUser').text(info.event.extendedProps.user.name);
                $('#eventModalStart').text(startDate);
                $('#eventModalEnd').text(endDate);
                $('#eventModalDesc').text(info.event.extendedProps.desc);

                var telephone = info.event.extendedProps.telephone;
                var whatsappLink = 'https://wa.me/+62' + telephone.replace(/[^0-9]/g, ''); // Clean non-numeric characters

                $('#eventModalTelephone').text(telephone).attr('href', whatsappLink);
                $('#eventModalBookingId').val(info.event.id);

                // Show or hide delete button based on ownership
                if (window.authUserId == info.event.extendedProps.user_id || window.userRole === 'admin') {
                    $('#deleteBookingBtn').show();
                } else {
                    $('#deleteBookingBtn').hide();
                }

                $('#eventModal').modal('show');
            }
        });
        calendar.render();


        // Handle delete booking
        $('#deleteBookingBtn').on('click', function() {
            var bookingId = $('#eventModalBookingId').val();

            $.ajax({
                url: '/bookingroom/' + bookingId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}' // Add CSRF token
                },
                success: function(response) {
                    // Hide modal after booking is successfully deleted
                    location.reload();
                    alert('Booking successfully deleted.');
                },
                error: function(response) {
                    // Show error message
                    location.reload();
                }
            });
        });

        // Handle form submission
        roomFilterForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way
            calendar.refetchEvents(); // Fetch events based on the selected room
        });
    });
</script>
@endsection
