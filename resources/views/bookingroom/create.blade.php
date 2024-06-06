@extends('bookingroom.layout.app')

@section('title')
   Booking Room
@endsection

@section('content')
    <!--Badan Isi-->

    <div style="margin-left: 24px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="tablenih" style="padding-top: -24px; margin-top: 32px;" >
                    {{-- <div class="judulhalaman " style="text-align: start;">Room 1 Calendar</div> --}}
                    <p style="font: 700 24px Narasi Sans, sans-serif; color: #4A25AA; margin: 12px;">Room 1 Calendar</p>

                    <div id="calendar" class="p-3"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tablenih p-3" style="padding-top: -24px; margin-top: 32px;" >
                <p style="font: 700 24px Narasi Sans, sans-serif; color: #4A25AA; margin: 12px;">Form Booking</p>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="" action="" style="margin:12px">
                        @csrf

                        <input type="hidden" class="form-control" name="room_id" value="">
                        <div class="row">
                            <div class="col mb-3">
                                <label class="d-flex" for="inputroom_name">Room Name  </label>
                                <input type="text" class="form-control"
                                id="inputroom_name" name="room_name" value="Room 1" disabled>
                            </div>

                            <div class="col mb-3">
                                <label class="d-flex" for="inputcapacity">Max Capacity  </label>
                                <input type="text" class="form-control"
                                id="inputcapacity" name="capacity" value="10 " disabled>
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
                <h5 id="eventModalTitle"></h5>
                <div class="mb-3"><strong>Booked By : </strong> <span class="fw-lighter" id="eventModalUser" ></span></div>

                <div class="mb-3"><strong>Contact (WhatsApp) : </strong> <span id="eventModalTelephone"></span></div>

                <div class="row mb-3">
                <div class="col">
                    <strong>Start:</strong> <span class="fw-lighter" id="eventModalStart"></span>
                </div>
                <div class="col">
                    <strong>End:</strong> <span class="fw-lighter" id="eventModalEnd"></span>
                </div>
                </div>

                <div class="mb-3"><strong>Description : </strong> <span id="eventModalDesc"></span></div>
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
      initialDate: '2023-01-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      displayEventTime: true,
      displayEventEnd: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'Meeting',
          start: '2024-06-12T10:30:00',
          end: '2024-06-12T12:30:00'
        },
        ],
        eventClick: function(info) {
        // Populate modal with event data
        document.getElementById('eventModalTitle').innerText = info.event.title;
        document.getElementById('eventModalStart').innerText = info.event.start.toLocaleString();
        document.getElementById('eventModalEnd').innerText = info.event.end.toLocaleString();
        document.getElementById('eventModalDesc').innerText = info.event.extendedProps.description || '';
        document.getElementById('eventModalUser').innerText = info.event.extendedProps.user || '';
        document.getElementById('eventModalTelephone').innerText = info.event.extendedProps.telephone || '';

        // Show the modal
        var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
        eventModal.show();
      }
    });

    calendar.render();
  });

  $(function () {
    $('.datetimepicker').datetimepicker();
  });
</script>
@endsection


