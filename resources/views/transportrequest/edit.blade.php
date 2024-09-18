@extends('transportrequest.layout.app')

@section('title')
    Edit Transport Request
@endsection
@section('costum-css')
<style>
    .pac-container {
                z-index: 1051 !important;
                /* Ensure autocomplete dropdown appears above other elements */
            }
</style>
@endsection

@section('content')

<div style="margin-left: 24px">
    <a href="{{ route('transport-request.index') }}" class="text-decoration-none text-end">
        <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                      7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back to Transportation Request
        </button>
    </a>

    <div style="margin-top: 24px"></div>
    <div class="container tablenih" style="padding: 24px">
        <form method="POST" action="{{ route('transport-request.update', $transportrequest->id) }}" class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <div class="form" style="border: none; padding: none; font-size: 20px">
                    @if ($transportrequest->status == "Waiting for Head's Approval" || $transportrequest->status == 'Waiting for GA Approval' )
                    <span class="badge rounded-pill text-bg-warning">{{ $transportrequest->status }}</span>
                    @elseif ($transportrequest->status == 'Approved')
                    <span class="badge rounded-pill text-bg-success">{{ $transportrequest->status }}</span>
                    @elseif  ($transportrequest->status == 'Rejected by GA' || $transportrequest->status == 'Rejected by Head')
                    <span class="badge rounded-pill text-bg-danger">{{ $transportrequest->status }}</span>
                    @elseif  ($transportrequest->status == 'Report Uploaded')
                    <span class="badge rounded-pill text-bg-secondary">{{ $transportrequest->status }}</span>

                    @endif
                </div>

            </div>

            @if ($transportrequest->status == "Waiting for Head's Approval" || $transportrequest->status == 'Rejected by GA' | $transportrequest->status == 'Rejected by Head' )

                <div class="mb-3">
                    <label for="activity" class="form-label">Activity</label>
                    <input type="text" name="activity" class="form-control @error('activity') is-invalid @enderror" id="activity" value="{{ old('activity', $transportrequest->activity) }}">
                    @error('activity')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>





                <div class="row">
                    <div class="col mb-3">
                        <label for="vendor" class="form-label">Date</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $transportrequest->date) }}" />
                        @error('date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="program" class="form-label">Program/Department</label>
                        <input type="text" class="form-control @error('program') is-invalid @enderror" id="program" name="program" value="{{ old('program', $transportrequest->program) }}" />
                        @error('program')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="person" class="form-label">Passenger</label>
                        <input type="number" class="form-control @error('person') is-invalid @enderror" id="person" name="person" value="{{ old('person', $transportrequest->person) }}" />
                        @error('person')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="service" class="form-label">Service Type</label>
                        <input type="text" class="form-control @error('service_type') is-invalid @enderror" id="service_type"
                        name="service_type" value="{{ old('service_type', $transportrequest->service_type) }}" readonly/>
                        @error('service_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="start_time" class="form-label">Start Time</label>
                        <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ \Carbon\Carbon::parse($transportrequest->start_time)->format('H:i') }}" />
                        @error('start_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="end_time" class="form-label">Estimated Time of Arrival</label>
                        <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{ \Carbon\Carbon::parse($transportrequest->end_time)->format('H:i') }}" />
                        @error('end_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="start_loc" class="form-label">Start Location</label>
                    <input type="text" class="form-control @error('start_loc') is-invalid @enderror" id="start_loc"
                        name="start_loc" value="{{ old('start_loc', $transportrequest->startLocation->start_loc) }}" required />
                    @error('start_loc')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row row-cols-auto ">
                    @foreach($topStartLocations as $location)
                        <div class="col mb-3">
                            <button type="button" class="btn btn-sm btn-outline-secondary text-truncate" style="max-width: 400px;" onclick="document.getElementById('start_loc').value='{{ $location->start_loc }}'">
                                {{ $location->start_loc }}
                            </button>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="final_loc" class="form-label">Destination</label>
                    <input type="text" class="form-control @error('final_loc') is-invalid @enderror" id="final_loc"
                    name="final_loc" value="{{ old('final_loc', $transportrequest->destination->final_loc) }}" required />
                    @error('final_loc')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row row-cols-auto">
                    @foreach($topDestinations as $location)
                        <div class="col mb-3">
                            <button type="button" class="btn btn-sm btn-outline-secondary text-truncate" style="max-width: 400px;" onclick="document.getElementById('final_loc').value='{{ $location->final_loc }}'">
                                {{ $location->final_loc }}
                            </button>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="note" class="form-label">Notes</label>


                    <textarea  style="height: 200px" name="note" class="form-control @error('note') is-invalid @enderror" id="note" style="font-size: 14px;  font-weight: normal" required>
                        {{ old('note') ?? $transportrequest->note }}
                    </textarea>
                    @error('note')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="button-submit" style=" letter-spacing: 1px;">E D I T</button>
            @else
                <fieldset disabled>
                    <div class="mb-3">
                        <label for="activity" class="form-label">Activity</label>
                        <input type="text" name="activity" class="form-control @error('activity') is-invalid @enderror" id="activity" value="{{ old('activity', $transportrequest->activity) }}">
                        @error('activity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="row">
                        <div class="col mb-3">
                            <label for="vendor" class="form-label">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $transportrequest->date) }}" />
                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="program" class="form-label">Program/Department</label>
                            <input type="text" class="form-control @error('program') is-invalid @enderror" id="program" name="program" value="{{ old('program', $transportrequest->program) }}" />
                            @error('program')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="person" class="form-label">Passenger</label>
                            <input type="number" class="form-control @error('person') is-invalid @enderror" id="person" name="person" value="{{ old('person', $transportrequest->person) }}" />
                            @error('person')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="service" class="form-label">Service Type</label>
                            <input type="text" class="form-control @error('service_type') is-invalid @enderror" id="service_type"
                            name="service_type" value="{{ old('service_type', $transportrequest->service_type) }}" readonly/>
                            @error('service_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="start_time" class="form-label">Start Time</label>
                            <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ \Carbon\Carbon::parse($transportrequest->start_time)->format('H:i') }}" />
                            @error('start_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="end_time" class="form-label">Estimated Time of Arrival</label>
                            <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{ \Carbon\Carbon::parse($transportrequest->end_time)->format('H:i') }}" />
                            @error('end_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="start_loc" class="form-label">Start Location</label>
                        <input type="text" class="form-control @error('start_loc') is-invalid @enderror" id="start_loc"
                            name="start_loc" value="{{ old('start_loc', $transportrequest->startLocation->start_loc) }}" required />
                        @error('start_loc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="final_loc" class="form-label">Destination</label>
                        <input type="text" class="form-control @error('final_loc') is-invalid @enderror" id="final_loc"
                        name="final_loc" value="{{ old('final_loc', $transportrequest->destination->final_loc) }}" required />
                        @error('final_loc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="finalLocation" class="form-label">Notes</label>
                        <div class="card" style="background: #e9ecef; border:1px;">
                            <div class="card-body">
                                {!! $transportrequest->note !!}
                            </div>
                        </div>
                    </div>

                    @if ($transportrequest->status == 'Approved')

                        @if ($transportrequest->transitLocations->isEmpty())
                            <div class="mb-3">
                                <label for="transport" class="form-label">Transportation</label>
                                <input type="text" class="form-control @error('transport') is-invalid @enderror" id="transport"
                                name="transport" value="{{ old('transport', $transportrequest->transport) }}" />
                                @error('transport')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @if ($transportrequest->transport == 'Grab')
                            <div class="mb-3">
                                <label for="transport" class="form-label">Voucher</label>
                                <input type="text" class="form-control @error('voucher') is-invalid @enderror" id="voucher"
                                name="voucher" value="{{ old('voucher', $transportrequest->voucher) }}" />
                                @error('transport')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @endif
                            @if ($transportrequest->transport == 'MRT' || $transportrequest->transport == 'KRL' || $transportrequest->transport == 'LRT')
                            <div class="mb-3">
                                <label for="transit_voucher" class="form-label">Card Type</label>
                                <input type="text" class="form-control " id="transit_voucher"
                                name="transit_voucher" value="{{ implode(', ', $transit->transportCards->pluck('card_type')->toArray()) }}" />
                            </div>
                            @endif
                        @else
                        <label for="transport" class="form-label">Transportation Details</label>
                        <div class="row">

                            @php
                                $previousDestination = null; // Initialize a variable to store the previous destination
                            @endphp
                            @foreach ($transportrequest->transitLocations as $index => $transit)
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="transit_destination" class="form-label">Start Location</label>
                                    <input type="text" class="form-control " id="transit_destination"
                                    name="transit_destination"  @if ($index == 0)
                                    value="{{ $transportrequest->startLocation->start_loc }} "
                                    @else
                                       value="{{ $previousDestination }}"
                                    @endif
                                    />
                                </div>
                                <div class="col">
                                    <label for="transit_destination" class="form-label">Destination</label>
                                    <input type="text" class="form-control " id="transit_destination"
                                    name="transit_destination" value="{{ $transit->destination }}" />
                                </div>
                                <div class="col">
                                    <label for="transit_transport" class="form-label">Transportation</label>
                                    <input type="text" class="form-control " id="transit_transport"
                                    name="transit_transport" value="{{ $transit->transport }}" />
                                </div>
                                <div class="col">
                                    @if ($transit->transport == 'Grab')
                                    <label for="transit_voucher" class="form-label">Voucher</label>
                                    <input type="text" class="form-control " id="transit_voucher"
                                    name="transit_voucher" value="{{ $transit->voucher ?? '-' }}" />
                                    @endif
                                    @if ($transit->transport == 'MRT' || $transit->transport == 'KRL' || $transit->transport == 'LRT')
                                    <label for="transit_voucher" class="form-label">Card Type</label>
                                    <input type="text" class="form-control " id="transit_voucher"
                                    name="transit_voucher" value="{{ implode(', ', $transit->transportCards->pluck('card_type')->toArray()) }}" />
                                    @endif
                                </div>
                            </div>
                            @php
                                $previousDestination = $transit->destination; // Update the previous destination at the end of each iteration
                            @endphp
                            @endforeach
                        </div>
                        @endif


                    @endif
                </fieldset>
            @endif
        </form>
    </div>

</div>
@endsection

@section('modal')
@include('layout.alert')
@endsection

@section('custom-js')

{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRL-WJ--IJvzEicA-27cSOuOCLlePND7I&libraries=places">
</script>

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

    document.addEventListener('DOMContentLoaded', function() {
        initAutocomplete();
    });
</script> --}}

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
