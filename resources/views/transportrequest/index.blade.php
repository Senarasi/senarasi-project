@extends('transportrequest.layout.app')

@section('title')
    Transport Request
@endsection

@section('costum-css')
<link href='https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.css' rel='stylesheet' />
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />
<style>
    .button-departemen.disabled {
        pointer-events: none;
        opacity: 0.8;
    }
    .button-submit.disabled {
        pointer-events: none;
        opacity: 0.8;
    }
    .pac-container {
                    z-index: 10000 !important;
                    /* Ensure autocomplete dropdown appears above other elements */
                }
    .button-submit{
        width: 100%;
        background: var( --Semantic-Main, linear-gradient(270deg, #4a25aa 0%, #b60f7f 50%, #4a25aa 100%))
    }
            .button-submit:hover{
        background: var( --Semantic-Main, linear-gradient(270deg, #34128c 0%, #910c65 50%, #34128c 100%));
    }
</style>
@endsection

@section('modal')
@include('layout.alert')
@endsection

@section('content')

    <div class="judulhalaman" style="display: flex; align-items: center; margin-top: -8px;">Transportation Request</div>




        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="tablenih" style="padding-top: -24px; border-color: red;">

                        <div style="display: flex; align-items: center; align-self:center; justify-content:center; margin-bottom: 36px; margin-top: 16px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                <path d="M14 8.16933V15.5027M14 19.8307V19.164M8.40667 2.62533C8.88 2.15333 9.268 2 9.916 2H18.084C18.732 2 19.1213 2.15333 19.5933 2.62533L25.3747 8.40667C25.8467 8.87867 26 9.268 26 9.916V18.084C26 18.7507 25.8333 19.1347 25.3747 19.5933L19.5933 25.3747C19.1213 25.8467 18.732 26 18.084 26H9.916C9.24933 26 8.86533 25.8333 8.40667 25.3747L2.62667 19.5933C2.15333 19.12 2 18.732 2 18.084V9.916C2 9.24933 2.16667 8.86533 2.62533 8.40667L8.40667 2.62533Z" stroke="#E43539" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div style="font-size:24px; font-weight: 700; color: red ;margin: 0 24px; letter-spacing: 0.5px">INFORMASI PENTING</div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                <path d="M14 8.16933V15.5027M14 19.8307V19.164M8.40667 2.62533C8.88 2.15333 9.268 2 9.916 2H18.084C18.732 2 19.1213 2.15333 19.5933 2.62533L25.3747 8.40667C25.8467 8.87867 26 9.268 26 9.916V18.084C26 18.7507 25.8333 19.1347 25.3747 19.5933L19.5933 25.3747C19.1213 25.8467 18.732 26 18.084 26H9.916C9.24933 26 8.86533 25.8333 8.40667 25.3747L2.62667 19.5933C2.15333 19.12 2 18.732 2 18.084V9.916C2 9.24933 2.16667 8.86533 2.62533 8.40667L8.40667 2.62533Z" stroke="#E43539" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>

                        <p style="margin-bottom: 16px; margin-left: 8px">Mohon<b> dibaca</b> semua <b>syarat dan ketentuan</b> yang berlaku.</b></p>
                        <ul style="text-align: justify; margin-bottom: 52px;">
                            <li class="mb-1">Request transport untuk <b>hari H</b> hanya dapat dibuat pada jam <b>07:00 WIB - 17:00 WIB</b>.</li>
                            <li class="mb-1">Request transport untuk <b>hari-hari selanjutnya</b> dapat dibuat pada jam <b>07:00 WIB - 19:00 WIB</b>.</li>
                            <li class="mb-1">Request transport hanya dapat dibuat sebanyak <b>5 kali</b> dalam <b>seminggu</b>.</li>
                            <li class="mb-1">Harap segera hubungi <b>atasan langsung</b> atau <b>GA untuk re</b>.</li>


                            <li class="mb-1">Diharapkan untuk segera <b>upload report</b> segera setelah perjalanan selesai.</li>
                        </ul>

                        <p class="mb-1" style="margin-left: 8px">Terima kasih.</p>
                        <p class="mb-1" style="margin-left: 8px">-General Affair Narasi-</p>

                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="tablenih p-4" style="padding-top: -24px; width:100%" >
                <p style="font: 700 20px Narasi Sans, sans-serif; color: #4A25AA;">Form Transport Request</p>
                <form method="POST" action="{{ route('transport-request.store') }}" class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                                    <label for="vendor" class="form-label">Date</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{old('date') }}" required/>
                                    @error('date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                                    <label for="program" class="form-label">Program/Department</label>
                                    <input type="text" class="form-control @error('program') is-invalid @enderror" id="program"
                                    name="program" value="{{ old('program') }}" required />
                                    @error('program')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="person" class="form-label">Passenger</label>
                                    <span class="text-info text-center ms-1"  data-bs-toggle="tooltip" data-bs-placement="top" title="How many people are on this trip?" style="position: relative; top: -2px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                            <g clip-path="url(#clip0_1148_1367)">
                                              <path d="M0 6C0 4.4087 0.632141 2.88258 1.75736 1.75736C2.88258 0.632141 4.4087 0 6 0C7.5913 0 9.11742 0.632141 10.2426 1.75736C11.3679 2.88258 12 4.4087 12 6C12 7.5913 11.3679 9.11742 10.2426 10.2426C9.11742 11.3679 7.5913 12 6 12C4.4087 12 2.88258 11.3679 1.75736 10.2426C0.632141 9.11742 0 7.5913 0 6ZM6 1.125C4.70707 1.125 3.46709 1.63861 2.55285 2.55285C1.63861 3.46709 1.125 4.70707 1.125 6C1.125 7.29293 1.63861 8.53291 2.55285 9.44715C3.46709 10.3614 4.70707 10.875 6 10.875C7.29293 10.875 8.53291 10.3614 9.44715 9.44715C10.3614 8.53291 10.875 7.29293 10.875 6C10.875 4.70707 10.3614 3.46709 9.44715 2.55285C8.53291 1.63861 7.29293 1.125 6 1.125ZM4.875 5.8125C4.875 5.66332 4.93426 5.52024 5.03975 5.41475C5.14524 5.30926 5.28832 5.25 5.4375 5.25H6.1875C6.33668 5.25 6.47976 5.30926 6.58525 5.41475C6.69074 5.52024 6.75 5.66332 6.75 5.8125V7.875H6.9375C7.08668 7.875 7.22976 7.93426 7.33525 8.03975C7.44074 8.14524 7.5 8.28832 7.5 8.4375C7.5 8.58668 7.44074 8.72976 7.33525 8.83525C7.22976 8.94074 7.08668 9 6.9375 9H5.4375C5.28832 9 5.14524 8.94074 5.03975 8.83525C4.93426 8.72976 4.875 8.58668 4.875 8.4375C4.875 8.28832 4.93426 8.14524 5.03975 8.03975C5.14524 7.93426 5.28832 7.875 5.4375 7.875H5.625V6.375H5.4375C5.28832 6.375 5.14524 6.31574 5.03975 6.21025C4.93426 6.10476 4.875 5.96168 4.875 5.8125ZM6 4.5C5.80109 4.5 5.61032 4.42098 5.46967 4.28033C5.32902 4.13968 5.25 3.94891 5.25 3.75C5.25 3.55109 5.32902 3.36032 5.46967 3.21967C5.61032 3.07902 5.80109 3 6 3C6.19891 3 6.38968 3.07902 6.53033 3.21967C6.67098 3.36032 6.75 3.55109 6.75 3.75C6.75 3.94891 6.67098 4.13968 6.53033 4.28033C6.38968 4.42098 6.19891 4.5 6 4.5Z" fill="#75757E"/>
                                            </g>
                                            <defs>
                                              <clipPath id="clip0_1148_1367">
                                                <rect width="12" height="12" fill="white"/>
                                              </clipPath>
                                            </defs>
                                          </svg>
                                    </span>
                                    <input type="number" class="form-control @error('person') is-invalid @enderror" id="person" name="person" value="{{old('person')}} " required/>
                                    @error('person')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                                    <label for="start_time" class="form-label">Start Time</label>
                                    <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time') }}" required />
                                    @error('start_time')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                                    <label for="end_time" class="form-label">Estimated Time of Arrival</label>
                                    <input type="time"  class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{old('end_time')}}" required />
                                    @error('end_time')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                                    <div class="row">
                                        <label for="" class="form-label">Service Type</label>
                                        <div class="col ms-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="service_type" id="inlineRadio1" value="Drop Off">
                                                <label class="form-check-label align-middle" for="inlineRadio1">Drop Off</label>
                                            </div>
                                        </div>
                                        <div class="col ms-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="service_type" id="inlineRadio2" value="Stand By">
                                                <label class="form-check-label align-middle" for="inlineRadio2">Stand By</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" mb-3">
                                <label for="start_loc" class="form-label">Current Location</label>
                                <input type="text" class="form-control @error('start_loc') is-invalid @enderror" id="start_loc"
                                    name="start_loc" value="{{ old('start_loc') }}" required />
                                @error('start_loc')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row row-cols-auto ">
                                @foreach($topStartLocations as $location)
                                    <div class="col mb-3">
                                        <button type="button" class="btn btn-sm btn-outline-secondary text-truncate" style="max-width: 250px;" onclick="document.getElementById('start_loc').value='{{ $location->start_loc }}'">
                                            {{ $location->start_loc }}
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <div class=" mb-3">
                                <label for="final_loc" class="form-label">Destination</label>
                                <input type="text" class="form-control @error('final_loc') is-invalid @enderror" id="final_loc"
                                name="final_loc" value="{{ old('final_loc') }}" required />
                                @error('final_loc')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row row-cols-auto">
                                @foreach($topDestinations as $location)
                                    <div class="col mb-3">
                                        <button type="button" class="btn btn-sm btn-outline-secondary text-truncate" style="max-width: 230px;" onclick="document.getElementById('final_loc').value='{{ $location->final_loc }}'">
                                            {{ $location->final_loc }}
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label for="acritivy" class="form-label">Activity</label>
                                <textarea  rows="4" name="activity" class="form-control @error('activity') is-invalid @enderror" id="activity" style="font-size: 14px;  font-weight: normal" required>{{ old('activity') }}</textarea>
                                @error('activity')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Notes</label>
                                <textarea  style="height: 200px" name="note" class="form-control @error('note') is-invalid @enderror" id="note" style="" required></textarea>
                                @error('note')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="button-submit" id="transportRequestButton" style="letter-spacing: 0.5px;">S U B M I T</button>
                        </div>
                    </div>

                </form>
                </div>
            </div>
        </div>



        <div class="tablenih">
            <div class="table-responsive p-2">

                <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px;">
                    <thead class="table-light">
                        <tr class="dicobain">
                            {{-- <th scope="col" style="padding-right: 15px !important; width: 80px">No</th> --}}
                            <th scope="col ">Activity</th>
                            <th scope="col " style="width: 180px">Date</th>
                            <th scope="col " style="width: 180px">Time</th>
                            {{-- <th scope="col " style="width: 200px">Start Location</th>
                            <th scope="col " style="width: 200px">Final Location</th> --}}
                            {{-- <th scope="col ">Person</th> --}}

                            <th scope="col " style="width: 250px">Status</th>
                            {{-- <th scope="col ">Transport</th>
                            <th scope="col ">Voucher</th> --}}


                            <th scope="col "  style="width: 200px"></th>



                            {{-- <th scope="col ">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                        @php $iteration = 1; @endphp
                        @foreach ($transportrequests as $transportrequest)
                        @can('ownertr', $transportrequest)
                        {{-- @if ($transportrequest->user_id == Auth::id()) --}}
                        @unless ($transportrequest->status == 'Report Uploaded')
                        <tr>
                            {{-- <th scope="row" class="text-center">{{$iteration++}}</th> --}}
                            <td style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 100px;">{{ $transportrequest->activity }}</td>
                            <td>{{ \Carbon\Carbon::parse($transportrequest->date)->translatedFormat('d F Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($transportrequest->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($transportrequest->end_time)->format('H:i') }}</td>
                            {{-- <td style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 100px;">
                                {{ $transportrequest->startLocation->start_loc }}
                            </td>
                            <td style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 100px;">{{ $transportrequest->destination->final_loc }}</td> --}}
                            {{-- <td>{{ $transportrequest->person }}</td> --}}

                            @if ($transportrequest->status == "Waiting for Head's Approval" || $transportrequest->status == 'Waiting for GA Approval' )
                            <td><span class="badge rounded-pill text-bg-warning">{{ $transportrequest->status }}</span></td>
                            @elseif ($transportrequest->status == 'Approved')
                            <td><span class="badge rounded-pill text-bg-success">{{ $transportrequest->status }}</span></td>
                            @elseif  ($transportrequest->status == 'Rejected by GA' || $transportrequest->status == 'Rejected by Head')
                            <td><span class="badge rounded-pill text-bg-danger">{{ $transportrequest->status }}</span></td>
                            @elseif  ($transportrequest->status == 'Report Uploaded' || $transportrequest->status == 'Pending Report' )
                            <td><span class="badge rounded-pill text-bg-secondary">{{ $transportrequest->status }}</span></td>
                            @endif
                            {{-- <td>{{ $transportrequest->transport ?: '-' }}</td>
                            <td>{{ $transportrequest->voucher ?: '-' }}</td> --}}

                            <td>
                                <span style="display: flex; gap: 8px; justify-content: center">
                                    @if ($transportrequest->status == "Waiting for Head's Approval" || $transportrequest->status == 'Rejected by GA' || $transportrequest->status == 'Rejected by Head' )
                                    <a  href="{{ route('transport-request.edit', $transportrequest->id) }}" type="button " class="uwuq" style="font-size: 14px; ; letter-spacing: 0.5px; color: #ffe900">DETAIL</a>
                                    <form onsubmit="return confirm('Are you sure want to delete this request?');" action="{{ route('transport-request.destroy', $transportrequest->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="uwuq" style="font-size: 14px; background:rgb(230, 0, 0); letter-spacing: 0.5px">DELETE</button>
                                    </form>
                                    @elseif ($transportrequest->status == 'Waiting for GA Approval')
                                    <a  href="{{ route('transport-request.edit', $transportrequest->id) }}" type="button " class="uwuq" style="font-size: 14px; ; letter-spacing:  0.5px; color: #ffe900">DETAIL</a>
                                    {{-- <button type="button" class="btn btn-primary" style="background-color: #4a25aa; border:0;">Detail</button> --}}
                                    <button type="button" class="uwuq disabled" style="font-size: 14px; background:#f5c6cb; letter-spacing: 0.5px">DELETE</button>
                                    @elseif ($transportrequest->status == 'Approved' || $transportrequest->status == 'Pending Report')
                                    <a  href="{{ route('transport-request.edit', $transportrequest->id) }}" type="button " class="uwuq" style="font-size: 14px; ; letter-spacing:  0.5px; color: #ffe900">DETAIL</a>
                                    @if ($transportrequest->transport == 'Operational Car' || $transportrequest->status == 'Pending Report')
                                    <button type="button" class="btn btn-success" style="font-size: 14px; ; letter-spacing:  0.5px" disabled>REPORT</button>
                                    @else
                                    <a  href="{{ route('transport-request.formReport', $transportrequest->id) }}" type="button" class="btn btn-success report-tr" style="font-size: 14px; ; letter-spacing:  0.5px">REPORT</a>
                                    @endif
                                    @endif
                                </span>
                            </td>
                        </tr>
                        @endunless
                        @endcan
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
 </div>
@endsection


@section('custom-js')



    <!-- Google Maps JavaScript API -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCITH6ZGGP23YhZwCV74b_HMXfyiytWRA&libraries=places"></script>
    <script>
        function initAutocomplete() {
            const startInput = document.getElementById('start_loc');
            const finalInput = document.getElementById('final_loc');

            const startAutocomplete = new google.maps.places.Autocomplete(startInput, {
                types: ['geocode']
            });
            const finalAutocomplete = new google.maps.places.Autocomplete(finalInput, {
                types: ['geocode']
            });

            startAutocomplete.addListener('place_changed', function() {
                const place = startAutocomplete.getPlace();
                console.log('Selected place (start):', place);
                startInput.value = place.formatted_address || place.name;
            });

            finalAutocomplete.addListener('place_changed', function() {
                const place = finalAutocomplete.getPlace();
                console.log('Selected place (final):', place);
                finalInput.value = place.formatted_address || place.name;
            });
        }

        $(document).ready(function() {
            initAutocomplete();
        });
    </script> --}}


{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
    function checkButtonAvailability() {
        var currentTime = new Date();
        var currentHour = currentTime.getHours();

        var button = document.getElementById('transportRequestButton');

        if (currentHour >= 7 && currentHour <= 10) {
            button.classList.remove('disabled');
            button.removeAttribute('disabled');
        } else {
            button.classList.add('disabled');
            button.setAttribute('disabled', 'disabled');
        }
    }

    checkButtonAvailability();
    setInterval(checkButtonAvailability, 60000); // Check every minute
});

document.addEventListener('DOMContentLoaded', function () {
    // Function to disable or enable the button based on time
    function toggleButton() {
        const button = document.getElementById('transportRequestButton');
        const now = new Date();
        const day = now.getDay(); // 0 is Sunday, 6 is Saturday
        const hour = now.getHours();

        // Check if the current time is between 7 AM and 7 PM on weekdays
        if (day >= 1 && day <= 5 && hour >= 7 && hour < 19) {
            button.classList.remove('disabled');
        } else {
            button.classList.add('disabled');
        }
    }

    // Initial check
    toggleButton();

    // Update every minute
    setInterval(toggleButton, 60000);
}); --}}

</script>
<script>
    document.getElementById('start_time').addEventListener('input', function (e) {
        var timeValue = e.target.value;
        if (timeValue) {
            var [hours, minutes] = timeValue.split(':');
            hours = parseInt(hours, 10);
            if (hours < 10) {
                hours = '0' + hours;
            }
            e.target.value = `${hours}:${minutes}`;
        }
    });
</script>

<script>
    /* Dengan Rupiah */
    document.getElementById('costtransport').addEventListener('keyup', function(e) {
        this.value = formatRupiah(this.value, 'Rp');
    });

    document.getElementById('start-balance').addEventListener('keyup', function(e) {
        this.value = formatRupiah(this.value, 'Rp');
    });

    document.getElementById('end-balance').addEventListener('keyup', function(e) {
        this.value = formatRupiah(this.value, 'Rp');
    });

    document.getElementById('toll').addEventListener('keyup', function(e) {
        this.value = formatRupiah(this.value, 'Rp');
    });

    document.getElementById('parking').addEventListener('keyup', function(e) {
        this.value = formatRupiah(this.value, 'Rp');
    });

    document.getElementById('fuel').addEventListener('keyup', function(e) {
        this.value = formatRupiah(this.value, 'Rp');
    });
    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? 'Rp ' + rupiah : '';
    }
</script>
<script>
    $(document).ready(function(){
      // Initialize Bootstrap tooltips
      $('[data-bs-toggle="tooltip"]').tooltip();
    });
    </script>
<script>
    $(document).ready(function() {
        $('#note').summernote({
            height: 110, // Atur tinggi editor
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol']],

            ]
        });
    });
</script>

{{-- <script>
    $('#start_time').timepicker({
        minuteStep: 1,
        showSeconds: false,
        showMeridian: false  // Nonaktifkan AM/PM
    });

    $('#end_time').timepicker({
        minuteStep: 1,
        showSeconds: false,
        showMeridian: false
    });
</script> --}}

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
