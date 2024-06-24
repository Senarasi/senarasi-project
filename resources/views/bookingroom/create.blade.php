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
    <div style="margin-left: 24px">
        <div class="row justify-content-center" style="margin-top: -12px">
            @if (session('status'))
                    <div class="alert alert-success ms-2" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger  ms-2" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
            <div class="col-md-8" style="margin-top: -12px">

                <div class="tablenih" style="padding-top: -24px; margin-top: 32px;" >

                    <p style="font: 700 24px Narasi Sans, sans-serif; color: #4A25AA; margin: 12px;">{{ $room->room_name }} Calendar</p>

                    <div id="calendar" class="p-3"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tablenih p-3" style="padding-top: -24px; margin-top: 32px;" >
                <p style="font: 700 24px Narasi Sans, sans-serif; color: #4A25AA; margin: 12px;">Form Booking Room</p>
                    <form method="POST" action="{{ route('bookingroom.store') }}" style="margin:12px">
                        @csrf

                        <input type="hidden" class="form-control" name="room_id" value="{{ $room->id }}">
                        <div class="row">
                            <div class="col mb-3">
                                <label class="d-flex" for="inputroom_name">Room Name  </label>
                                <input type="text" class="form-control"
                                id="inputroom_name" name="room_name" value="{{old('room_name') ?? $room->room_name }} " disabled>
                            </div>

                            <div class="col mb-3">
                                <label class="d-flex" for="inputcapacity">Max Capacity  </label>
                                <input type="text" class="form-control"
                                id="inputcapacity" name="capacity" value="{{old('capacity') ?? $room->capacity }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="d-flex" for="inputtitle">Booking Title  </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="inputtitle" name="title" value="{{old('title')}} ">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label class="d-flex" for="inputstart">Start Time</label>
                                <input type="text" class="form-control datetimepicker @error('start') is-invalid @enderror"
                                id="inputstart" name="start" value="{{old('start')}}">
                                @error('start')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <label class="d-flex" for="inputend">End Time</label>
                                <input type="text" class="form-control datetimepicker @error('end') is-invalid @enderror"
                                id="inputend" name="end" value="{{old('end')}}">
                                @error('end')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="d-flex" for="inputTelephone">Contact (WhatsApp)  </label>

                            <input type="text" class="form-control @error('telephone') is-invalid @enderror"
                            id="inputTelephone" name="telephone" value="{{old('telephone')}} ">
                            @error('telephone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="d-flex" for="inputdesc">Description </label>
                            <input type="text" class="form-control @error('desc') is-invalid @enderror"
                            id="inputdesc" name="desc" value="{{old('desc')}} ">
                            @error('desc')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>



                        <div class="d-flex justify-content-center">
                            <button type="submit" class="uwuq w-100 mt-3">Book</button>
                        </div>

                    </form>
                </div>
            </div>
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
                <h5 class="mb-4" id="eventModalTitle"></h5>
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
            drop: function(arg) {
                // is the "remove after drop" checkbox checked?
                if (document.getElementById('drop-remove').checked) {
                    // if so, remove the element from the "Draggable Events" list
                    arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                }
            },
            events: function(fetchInfo, successCallback, failureCallback) {
                var room_id = '{{ $room->id }}'; // Get the room ID from the Blade variable
                $.ajax({
                    url: '/getevents',
                    type: 'GET',
                    data: {
                        room_id: room_id,
                        start: fetchInfo.startStr,
                        end: fetchInfo.endStr,
                    },
                    success: function(response) {
                        successCallback(response.events);
                    },
                    error: function() {
                        failureCallback();
                    },
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
                error: function(response) {
                    location.reload();
                },
                success: function(response) {
                    location.reload();
                    alert('Booking successfully deleted.');
                },

            });
        });
    });

  $(function () {
    $('.datetimepicker').datetimepicker();
  });
</script>
@endsection


