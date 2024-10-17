@extends('bookingroom.layout.app')

@section('title')
    Booking Room
@endsection

{{-- @auth
    <script>
        window.authUserId = {{ auth()->user()->id }};
        window.userRole = "{{ Auth::user()->role }}";
    </script>
@endauth --}}
@section('costum-css')
    <style>
        .tagify {
            width: 100%;
            height: auto;
        }

        .tagify_input {
            width: 100% !important;
            min-width: 200px;
            /* Adjust as necessary */
            min-height: fit-content;
            padding:
        }

        .hidden {
            display: none;
        }

        .fc .fc-col-header-cell-cushion {
            padding: 0 !important;
            /* Menghilangkan padding di elemen <th> pada FullCalendar */
        }

        .fc .fc-col-header-cell {
            padding: 0 !important;
        }

        table.fc-scrollgrid.fc-scrollgrid-liquid {
            padding: 0 !important;
        }

        .fc .fc-scrollgrid-section-footer>*,
        .fc .fc-scrollgrid-section-header>* {
            padding: 0 !important;
        }

        .fc .fc-scrollgrid-section-footer>*,
        .fc .fc-scrollgrid-section-header>* {
            padding: 0 !important;
        }

        .fc .fc-daygrid-body,
        .fc .fc-button-group>.fc-button.fc-button-active {
            z-index: 0;
        }
    </style>
@endsection
@section('content')
    <!--Badan Isi-->

    <div class="row justify-content-center" style="margin-top: -12px">
        {{-- @if (session('status'))
            <div class="alert alert-success ms-2" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if (session('error'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        $('#errorModal').modal('show');
                    });
                </script>
            @endif --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-lg-8 col-md-12 col-sm-12">

            <div class="tablenih" style="padding-top: -24px; margin-top: 32px;">

                <p style="font: 700 24px Narasi Sans, sans-serif; color: #4A25AA; margin: 12px;">{{ $room->room_name }}
                    Calendar</p>

                <div id="calendar" class="p-3"></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="tablenih p-3" style="padding-top: -24px; margin-top: 32px;">
                <p style="font: 700 24px Narasi Sans, sans-serif; color: #4A25AA; margin: 12px;">Form Booking Room</p>
                <form method="POST" action="{{ route('bookingroom.store') }}" style="margin:12px">
                    @csrf

                    <input type="hidden" class="form-control" name="room_id" value="{{ $room->id }}">

                    <div class="row">
                        <div class="col mb-3">
                            <label class="d-flex" for="inputroom_name">Room Name </label>
                            <input type="text" class="form-control" id="inputroom_name" name="room_name"
                                value="{{ old('room_name') ?? $room->room_name }} " disabled>
                        </div>

                        <div class="col mb-3">
                            <label class="d-flex" for="inputcapacity">Max Capacity</label>
                            <input type="text" class="form-control" id="inputcapacity" name="capacity"
                                value="{{ old('capacity') ?? $room->capacity }}" disabled>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="d-flex" for="inputdesc">Description </label>
                        <input type="text" class="form-control @error('desc') is-invalid @enderror" id="inputdesc"
                            name="desc" value="{{ old('desc') }} ">
                        @error('desc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label class="d-flex" for="inputstart">Start Time</label>
                            <input type="text" class="form-control datetimepicker @error('start') is-invalid @enderror"
                                id="inputstart" name="start" value="{{ old('start') }}">
                            @error('start')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label class="d-flex" for="inputend">End Time</label>
                            <input type="text" class="form-control datetimepicker @error('end') is-invalid @enderror"
                                id="inputend" name="end" value="{{ old('end') }}">
                            @error('end')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="guests" class="d-flex">Employee</label>
                        <select class="form-control @error('guests') is-invalid @enderror" id="select2" name="guests[]"
                            multiple="multiple">
                            @foreach ($users as $user)
                                @if ($user->employee_id !== auth()->id())
                                    <option value="{{ $user->employee_id }}">{{ $user->full_name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @error('guests')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="additional_emails" class="d-flex">External Guests</label>
                        <select class="form-control @error('additional_emails') is-invalid @enderror" id="additional_emails"
                            name="additional_emails[]" multiple="multiple">
                            <!-- Options will be added dynamically by Select2 -->
                        </select>
                        @error('additional_emails')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" onchange="toggleVia()">
                            <label class="form-check-label" style="top:4px;" for="inlineCheckbox2">Hybrid</label>
                        </div>

                        <div class="mb-3 hidden" id="viaContainer">
                            <label for="meetingvia" class="d-flex">Via</label>
                            <select name="meetingvia" class="form-select" id="meetingvia" required>
                                <option style="color: rgb(189, 189, 189);" disabled selected>Choose one </option>
                                <option value="Google Meet">Google Meet</option>
                                <option value="Zoom">Zoom</option>
                            </select>
                        </div> --}}

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="meetingvia" value="Google Meet"
                            id="googleMeet">
                        <label class="form-check-label" for="googleMeet">
                            Add Google Meet Link
                        </label>
                    </div>



                    <div class="d-flex justify-content-center">
                        <button type="submit" class="uwuq w-100 mt-3">Book</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection

@section('modal')
    @include('layout.alert')
    <div class="modal justify-content-center fade" id="eventModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body  bg-white">
                    <div class="mb-3">
                        <h5 style="text-transform: uppercase" id="eventModalDesc"></h5>
                    </div>
                    <hr>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 14px;" height="16"
                                    width="16.25" viewBox="0 0 448 512" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Date">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#4a25aa"
                                        d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                </svg>
                                <span class="fw-lighter align-middle" id="eventModalDate"></span>
                            </div>
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 12px;" height="16"
                                    width="17" viewBox="0 0 576 512" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Room Name">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#4a25aa"
                                        d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                                </svg>
                                <span class="fw-lighter align-middle" id="eventModalRoom"></span>
                            </div>
                            <div class="mb-3" id="googleMeetContainer" style="display: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 14px" width="16"
                                    height="16" viewBox="0 0 28 28">
                                    <path fill="#4a25aa"
                                        d="M6.75 5A3.75 3.75 0 0 0 3 8.75v9.083a4.7 4.7 0 0 1 1.75-.333h5.5a4.75 4.75 0 0 1 4.584 3.5h.416q.36-.001.701-.065A3.75 3.75 0 0 0 19 17.25v-8.5A3.75 3.75 0 0 0 15.25 5zM20 16.747l4.252 2.936c1.16.801 2.744-.03 2.744-1.44V7.753c0-1.41-1.583-2.242-2.744-1.44L20 9.249zM4.75 20a2.25 2.25 0 0 0 0 4.5h.5a.75.75 0 0 1 0 1.5h-.5a3.75 3.75 0 1 1 0-7.5h.5a.75.75 0 0 1 0 1.5zM4 22.25a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 0 1.5h-5.5a.75.75 0 0 1-.75-.75m6.25 2.25a2.25 2.25 0 0 0 0-4.5h-.5a.75.75 0 0 1 0-1.5h.5a3.75 3.75 0 1 1 0 7.5h-.5a.75.75 0 0 1 0-1.5z" />
                                </svg>
                                <span class="fw-lighter align-middle">
                                    <a id="eventModalGoogleMeet" href="#" target="_blank"></a>
                                </span>
                            </div>
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 14px;" height="16"
                                    width="16" viewBox="0 0 512 512" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Time">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#4a25aa"
                                        d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>
                                <span class="fw-lighter align-middle" id="eventModalTime"></span>
                            </div>
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 14px;" height="16"
                                    width="16.25" viewBox="0 0 448 512" data-bs-toggle="tooltip"
                                    data-bs-title="Default tooltip">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#4a25aa"
                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                </svg>
                                <span class="fw-lighter align-middle" id="eventModalUser"></span>
                            </div>
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 14px;" height="16"
                                    width="16" viewBox="0 0 512 512" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                    data-bs-title="CP Booking (whatsapp)">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#4a25aa"
                                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                </svg>
                                <span><a style="text-decoration: none; vertical-align: middle" id="eventModalTelephone"
                                        href="#" target="_blank"></a></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <span><strong>Participants </strong></span>
                                <ul class="pt-2">
                                    <li class="fw-lighter mb-2" id="eventModalGuests"></li>
                                    <li class="fw-lighter mb-2" id="eventModalExternalGuests"></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="mb-2"><span class="mb-2">Employee : </span>  <ul class="fw-lighter" class="mb-2" id="eventModalGuests"></ul></div>

                <div class="mb-2"><strong class="mb-2">External Guests : </strong>  <ul class="fw-lighter mb-2" id="eventModalExternalGuests"></ul></div> --}}

                    <input type="hidden" id="eventModalBookingId" value="">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary" style="background-color: #4a25aa; border: 0px"
                            id="editBookingBtn">Edit</button>
                        <button type="button" class="btn btn-danger" id="deleteBookingBtn">Delete</button>
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}

                    </div>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg') }}" alt=" " />
            </div>
        </div>
    @endsection

    @section('custom-js')
        <script>
            window.authUserId = {{ auth()->user()->employee_id }};
            window.userRole = "{{ Auth::user()->role }}";
        </script>
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
                    dayMaxEvents: true,
                    eventTimeFormat: { // Menentukan format waktu
                        hour: 'numeric',
                        minute: '2-digit',
                        hour12: false // Mengatur agar menggunakan format 24 jam (false untuk 24 jam, true untuk 12 jam)
                    },
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
                        // Memisahkan tanggal dan waktu
                        var startDate = moment(info.event.start).format('DD MMMM YYYY');
                        var startTime = moment(info.event.start).format('HH:mm');
                        var endDate = moment(info.event.end).format('DD MMMM YYYY');
                        var endTime = moment(info.event.end).format('HH:mm');

                        // Membuat variabel time yang berisi waktu mulai dan waktu selesai
                        var time = startTime + ' - ' + endTime;
                        var date = startDate;
                        if (startDate === endDate) {
                            date = startDate + ' '; // Jika sama, tampilkan hanya satu tanggal dengan waktu
                        } else {
                            date = startDate + ' - ' + endDate; // Jika berbeda, tampilkan rentang tanggal
                        }

                        // Menampilkan tanggal dan waktu yang sudah dipisah
                        $('#eventModalDate').text(date);

                        // Menampilkan time yang berisi HH:mm start - HH:mm end
                        $('#eventModalTime').text(time);

                        // Mengisi informasi lainnya ke dalam modal
                        $('#eventModalDesc').text(info.event.title);
                        $('#eventModalUser').text(info.event.extendedProps.user.full_name);
                        $('#eventModalRoom').text(info.event.extendedProps.room.room_name);

                        var telephone = info.event.extendedProps.user.phone;
                        var whatsappLink = 'https://wa.me/+62' + telephone.replace(/[^0-9]/g,
                            ''); // Menghapus karakter non-numerik

                        $('#eventModalTelephone').text(telephone).attr('href', whatsappLink);
                        $('#eventModalBookingId').val(info.event.id);

                        // Menampilkan daftar tamu
                        var guestsList = $('#eventModalGuests');
                        guestsList.empty();
                        info.event.extendedProps.guests.forEach(function(guest) {
                            guestsList.append('<li>' + guest + '</li>');
                        });

                        var externalGuestsList = $('#eventModalExternalGuests');
                        externalGuestsList.empty();

                        if (info.event.extendedProps.externalGuests && info.event.extendedProps
                            .externalGuests.length > 0) {
                            info.event.extendedProps.externalGuests.forEach(function(externalGuest) {
                                externalGuestsList.append('<li>' + externalGuest + '</li>');
                            });
                            externalGuestsList.find('li:contains("No external guests")').remove();
                            externalGuestsList.show();
                        } else {
                            externalGuestsList.hide();
                        }

                        var googleMeetLink = info.event.extendedProps.google_meet_link;
                        if (googleMeetLink) {
                            // Tampilkan container jika ada link Google Meet
                            var googleMeetText = googleMeetLink.replace(/^https?:\/\//, '');
                            $('#googleMeetContainer').show(); // Menampilkan elemen dengan ikon dan link
                            $('#eventModalGoogleMeet').text(googleMeetText).attr('href', googleMeetLink);
                        } else {
                            // Sembunyikan container jika tidak ada link
                            $('#googleMeetContainer').hide();
                        }

                        // Menampilkan atau menyembunyikan tombol berdasarkan kepemilikan
                        if (window.authUserId == info.event.extendedProps.user_id || window.userRole ===
                            'admin') {
                            $('#deleteBookingBtn').show();
                            $('#editBookingBtn').show();
                        } else {
                            $('#deleteBookingBtn').hide();
                            $('#editBookingBtn').hide();
                        }

                        $('#eventModal').modal('show');
                    }

                });
                calendar.render();


                $('#deleteBookingBtn').on('click', function() {
                    var bookingId = $('#eventModalBookingId').val();

                    $.ajax({
                        url: '/bookingroom/' + bookingId,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE' // Simulasi metode DELETE
                        },
                        success: function(response) {
                            alert('Your booking has been successfully deleted!');
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error deleting booking:', error);
                            alert('Failed to delete booking. Please try again later.');
                        }
                    });
                });

                $('#editBookingBtn').on('click', function() {
                    var bookingId = $('#eventModalBookingId').val();
                    window.location.href = '/bookingroom/' + bookingId + '/edit';
                });

            });

            $(function() {
                $('.datetimepicker').datetimepicker();
            });
        </script>

        <script>
            $(document).ready(function() {
                $("#select2").select2({
                    placeholder: "Select Guests"
                });
            });
        </script>

        {{-- <script>
    function toggleVia() {
        var checkbox = document.getElementById("inlineCheckbox2");
        var viaContainer = document.getElementById("viaContainer");
        if (checkbox.checked) {
            viaContainer.classList.remove("hidden");
        } else {
            viaContainer.classList.add("hidden");
        }
    }
</script> --}}

        {{-- <script>
  document.addEventListener("DOMContentLoaded", function() {


        // Inisialisasi Tagify untuk input email
        var input = document.querySelector('#additional_emails');
        new Tagify(input, {
            delimiters: ", ", // Bisa disesuaikan, misalnya dengan menambahkan spasi setelah koma
            pattern: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/, // Regex untuk validasi email
            placeholder: "Enter additional email addresses"
        });
    });
 </script> --}}


        <script>
            $(document).ready(function() {
                $('#additional_emails').select2({
                    tags: true,
                    tokenSeparators: [',', ' '],
                    placeholder: "Enter email addresses of external guests",
                    multiple: true,
                    createTag: function(params) {
                        // Ensure the tag is a valid email format
                        var term = $.trim(params.term);
                        if (term.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
                            return {
                                id: term,
                                text: term
                            };
                        }
                        return null;
                    }
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
