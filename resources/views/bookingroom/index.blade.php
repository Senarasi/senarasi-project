@extends('bookingroom.layout.app')

@section('title')
    Booking Room
@endsection

@section('costum-css')
    <style>
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

        .fc .fc-daygrid-body,
        .fc .fc-button-group>.fc-button.fc-button-active {
            z-index: 0;
        }
    </style>


    </style>
@endsection


@section('content')
    <!--Badan Isi-->

    <div class="judulhalaman" style="display: flex; align-items: center; margin-top: -12px;">Booking Room Narasi</div>
    <div class="row">
        <div class="col-lg-7 col-md-12 col-sm-12">
            <div class="tablenih" style="padding-top: -24px; ">
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
        <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="tablenih" style="padding-top: -24px; border-color: red;">
                <div style="display: flex; gap: 8px">
                    <div>
                        <div
                            style="display: flex; align-items: center; align-self:center; justify-content:center; margin-bottom: 24px; margin-top: 12px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                                fill="none">
                                <path
                                    d="M14 8.16933V15.5027M14 19.8307V19.164M8.40667 2.62533C8.88 2.15333 9.268 2 9.916 2H18.084C18.732 2 19.1213 2.15333 19.5933 2.62533L25.3747 8.40667C25.8467 8.87867 26 9.268 26 9.916V18.084C26 18.7507 25.8333 19.1347 25.3747 19.5933L19.5933 25.3747C19.1213 25.8467 18.732 26 18.084 26H9.916C9.24933 26 8.86533 25.8333 8.40667 25.3747L2.62667 19.5933C2.15333 19.12 2 18.732 2 18.084V9.916C2 9.24933 2.16667 8.86533 2.62533 8.40667L8.40667 2.62533Z"
                                    stroke="#E43539" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div
                                style="font-size:24px; font-weight: 700; color: red ;margin: 0 12px; letter-spacing: 0.5px">
                                INFORMASI PENTING</div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                                fill="none">
                                <path
                                    d="M14 8.16933V15.5027M14 19.8307V19.164M8.40667 2.62533C8.88 2.15333 9.268 2 9.916 2H18.084C18.732 2 19.1213 2.15333 19.5933 2.62533L25.3747 8.40667C25.8467 8.87867 26 9.268 26 9.916V18.084C26 18.7507 25.8333 19.1347 25.3747 19.5933L19.5933 25.3747C19.1213 25.8467 18.732 26 18.084 26H9.916C9.24933 26 8.86533 25.8333 8.40667 25.3747L2.62667 19.5933C2.15333 19.12 2 18.732 2 18.084V9.916C2 9.24933 2.16667 8.86533 2.62533 8.40667L8.40667 2.62533Z"
                                    stroke="#E43539" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>

                        <p style="margin-bottom: 8px; margin-left: 8px">Mohon <b>dibaca</b> semua <b>syarat dan
                                ketentuan</b> yang berlaku.</b></p>
                        <ul style="text-align: justify;">
                            <li>Ruangan hanya dapat dipesan untuk maksimal <b>satu minggu </b> ke depan.</li>
                            {{-- <li>Jika partisipan melebihi kapasitas ruangan, maka kursi dan kebutuhan lainnya menjadi <b>tanggung jawab pemesan</b>.</li> --}}
                        </ul>
                        <p style="margin-left: 8px">Terima kasih.</p>
                        <p style="margin-left: 8px">-General Affair Narasi-</p>
                    </div>
                </div>
            </div>
            <div class="tablenih" style="padding-top: -24px; margin-top: 32px;">
                <div class="table-responsive p-2">
                    <table id="datatable" class="table table-hover"
                        style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; display: 100%; width: 100% ;  color: #4A25AA; ">
                        <thead class="table-light">
                            <tr>
                                {{-- <th scope="col" style="width: 120px">No.</th> --}}
                                <th scope="col">Room Name</th>
                                <th scope="col">Max Capacity</th>
                                <th scope="col" style="width: 120px"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                                <tr>
                                    {{-- <th scope="row" class="text-center">{{$loop->iteration}}</th> --}}
                                    <td>{{ $room->room_name }}</td>
                                    <td>{{ $room->capacity }}</td>
                                    <td class="text-center">
                                        {{-- <a href="{{ route('bookingroom.create', $room->id )}}" class="text-decoration-none text-end"> --}}
                                        <form action="{{ route('google.calendar.auth') }}" method="GET">
                                            @csrf
                                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                                            <button type="submit" class="uwuq" style="width: fit-content;">Book</button>
                                        </form>
                                        {{-- <button type="button" class="uwuq" style="width: fit-content;">Book</button> --}}
                                        {{-- </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection


{{-- @auth
    <script>
        window.authUserId = {{ auth()->user()->id }};
        window.userRole = "{{ Auth::user()->role }}";
    </script>
@endauth --}}


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
                                    width="16.25" viewBox="0 0 448 512" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Date">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#4a25aa"
                                        d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                </svg>
                                <span class="fw-lighter align-middle" id="eventModalDate"></span>
                            </div>
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 12px;" height="16"
                                    width="17" viewBox="0 0 576 512" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Room Name">
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
                                </ul>
                            </div>
                            <div class="mb-3">
                                <span><strong>Participants External </strong></span>
                                <ul class="pt-2">
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
                    eventTimeFormat: {
                        hour: 'numeric',
                        minute: '2-digit',
                        hour12: false // Mengatur agar menggunakan format 24 jam (false untuk 24 jam, true untuk 12 jam)
                    },
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


                $('#editBookingBtn').on('click', function() {
                    var bookingId = $('#eventModalBookingId').val();
                    window.location.href = '/bookingroom/' + bookingId + '/edit';
                });

                // Handle delete booking
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
                            alert('Booking successfully deleted.');
                            location.reload();

                        },
                        error: function(xhr, status, error) {
                            console.error('Error deleting booking:', error);
                            alert('Failed to delete booking. Please try again later.');
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
