@extends('transportrequest.layout.app')

@section('title')
    Add Transport Request
@endsection
@section('costum-css')

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

    @if  ($transportrequest->status == 'Report Uploaded')
    <div class="container tablenih" style="width: fit-content; justify-content: center; text-align: center">
        <div style="justify-content: space-between; display: flex; margin-left: 12px; margin-right: 12px; margin-top: 12px; ">
            <div>
                <div>
                    <p class="text-start" style="font: 400 16px Narasi Sans, sans-serif; color: #4A25AA; margin-left: 2px;">Request Number</p>
                    <div class="judulhalaman" style="text-align: start; margin-top: -16px;; margin-left:-1px"> {{ $transportrequest->request_tr_number }}</div>
                </div>
            </div>
        </div>

        <div style="border: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; margin-bottom: 24px; border-bottom: none; width:auto">
            <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                <thead style="font-weight: 500">
                    <tr class="dicobain">
                        <th scope="" style="width:10%">No</th>
                        <th scope="col" style="text-align: start;width: 15%">Description</th>
                        <th scope="col " style="text-align: start"></th>
                    </tr>
                </thead>
                <tbody style="vertical-align: middle;">
                    <tr>
                        <th scope="row">1</th>
                        <td style="text-align: start;">Date</td>
                        <td class="total-price" style="font-weight: 300;text-align: start" >{{ \Carbon\Carbon::parse($transportrequest->date)->translatedFormat('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td style="text-align: start;">Time</td>
                        <td class="total-price" style="font-weight: 300;text-align: start" >{{ \Carbon\Carbon::parse($transportrequest->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($transportrequest->end_time)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td style="text-align: start; ">User</td>
                        <td class="total-price" style="font-weight: 300;text-align: start">{{ $transportrequest->user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row ">4</th>
                        <td style="text-align: start; ">User Phone</td>
                        <td class="total-price" style="font-weight: 300; text-align: start "><a style="text-decoration: none;" href="https://wa.me/+62{{ $transportrequest->user->telephone }}" target="_blank">{{ $transportrequest->user->telephone }}</a></td>
                    </tr>
                    <tr>
                        <th scope="row ">5</th>
                        <td style="text-align: start; ">Program / Department</td>
                        <td class="total-price" style="font-weight: 300; text-align: start ">{{ $transportrequest->program }}</td>
                    </tr>
                    <tr>
                        <th scope="row ">6</th>
                        <td style="text-align: start; ">Activity</td>
                        <td class="total-price" style="font-weight: 300; text-align: start ">{{ $transportrequest->activity }}</td>
                    </tr>
                    <tr>
                        <th scope="row ">7</th>
                        <td style="text-align: start; ">Start Location</td>
                        <td class="total-price" style="font-weight: 300; text-align: start ">{{ $transportrequest->startLocation->start_loc }}</td>
                    </tr>
                    <tr>
                        <th scope="row ">8</th>
                        <td style="text-align: start; ">Destination</td>
                        <td class="total-price" style="font-weight: 300; text-align: start ">{{ $transportrequest->destination->final_loc }}</td>
                    </tr>
                    <tr>
                        <th scope="row ">9</th>
                        <td style="text-align: start; ">Service Type</td>
                        <td class="total-price" style="font-weight: 300; text-align: start ">{{ $transportrequest->service_type }}</td>
                    </tr>
                    <tr>
                        <th scope="row ">10</th>
                        <td style="text-align: start; ">Passenger</td>
                        <td class="total-price" style="font-weight: 300; text-align: start ">{{ $transportrequest->person }}</td>
                    </tr>
                    <tr>
                        <th scope="row ">11</th>
                        <td style="text-align: start; ">Notes</td>
                        <td class="total-price" style="font-weight: 300;text-align: start ">{!! $transportrequest->note !!}</td>
                    </tr>
                    <tr>
                        <th scope="row ">12</th>
                        <td style="text-align: start; ">Status</td>
                        <td class="total-price" style="font-weight: 300;text-align: start ">
                            @if ($transportrequest->status == "Waiting for Head's Approval" || $transportrequest->status == 'Waiting for GA Approval' )
                            <span class="badge rounded-pill text-bg-warning">{{ $transportrequest->status }}</span>
                            @elseif ($transportrequest->status == 'Approved')
                            <span class="badge rounded-pill text-bg-success">{{ $transportrequest->status }}</span>
                            @elseif  ($transportrequest->status == 'Rejected by GA' || $transportrequest->status == 'Rejected by Head')
                            <span class="badge rounded-pill text-bg-danger">{{ $transportrequest->status }}</span>
                            @elseif  ($transportrequest->status == 'Report Uploaded')
                            <span class="badge rounded-pill text-bg-secondary">{{ $transportrequest->status }}</span>

                            @endif
                        </td>
                    </tr>
                    @if ($transportrequest->transitLocations->isEmpty())
                        <tr>
                            <th scope="row ">13</th>
                            <td style="text-align: start; ">Transportation</td>
                            <td class="total-price" style="font-weight: 300;text-align: start ">{{ $transportrequest->transport ?: '-' }}</td>
                        </tr>


                            @if ($transportrequest->transport == 'Grab')
                                @foreach ($transportrequest->transportReports as $report)
                                <tr>
                                    <th scope="row ">14</th>
                                    <td style="text-align: start; ">Voucher</td>
                                    <td class="total-price" style="font-weight: 300;text-align: start ">{{ $transportrequest->voucher ?: '-' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row ">15</th>
                                    <td style="text-align: start; ">Transportation Cost</td>
                                    <td class="total-price" style="font-weight: 300;text-align: start ">{{ $report->cost ?: '-' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row ">16</th>
                                    <td style="text-align: start; ">Screenshoot</td>
                                    <td class="total-price" style="font-weight: 300;text-align: start ">
                                        <a href="{{ $report->screenshoot() }}" target="_blank">
                                            <img src="{{ $report->screenshoot() }}" alt="Contoh Gambar" style="max-width: 100px; height: auto;">
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            @if ($transportrequest->transport == 'MRT' || $transportrequest->transport == 'KRL' || $transportrequest->transport == 'LRT')
                            <tr>
                                <th scope="row ">14</th>
                                <td style="text-align: start; ">Card Report</td>
                                <td class="total-price" style="font-weight: 300;text-align: start ">
                                    <ol>
                                        @foreach ($transportrequest->transportReports as $report)

                                            <li>
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Card</p>
                                                    <p style="flex: 3;">: {{ $report->transportCard->card_type }}</p>
                                                </div>
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Start Balance</p>
                                                    <p style="flex: 3;">: {{ $report->initial_balance }}</p>
                                                </div>
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Final Balance</p>
                                                    <p style="flex: 3;">: {{ $report->final_balance }}</p>
                                                </div>
                                                <div style="display: flex;">
                                                    <p style="flex: 1; margin-bottom: 32px">Screenshoot Initial and Final Balance</p>
                                                    <div style="flex: 3; display: flex;">
                                                        <p>: <a href="{{ $report->ssInitialBalance() }}" target="_blank">View Initial Balance</a></p>
                                                        <p style="margin-left: 40px;"><a href="{{ $report->ssFinalBalance() }}" target="_blank">View Final Balance</a></p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </td>
                            </tr>
                            @endif
                            @if ($transportrequest->transport == 'Reimburse')
                            @foreach ($transportrequest->transportReports as $report)
                            <tr>
                                <th scope="row ">14</th>
                                <td style="text-align: start; ">Transportation Cost</td>
                                <td class="total-price" style="font-weight: 300;text-align: start ">{{ $report->cost ?: '-' }}</td>
                            </tr>
                            <tr>
                                <th scope="row ">15</th>
                                <td style="text-align: start; ">Screenshoot</td>
                                <td class="total-pice" style="font-weight: 300;text-align: start ">
                                    <a href="{{ $report->screenshoot() }}" target="_blank">
                                        <img src="{{ $report->screenshoot() }}" alt="-" style="max-width: 100px; height: auto;">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row ">16</th>
                                <td style="text-align: start; ">Fuel</td>
                                <td class="total-price" style="font-weight: 300;text-align: start ">{{ $report->parking ?: '-' }}</td>
                            </tr>
                            <tr>
                                <th scope="row ">17</th>
                                <td style="text-align: start; ">Fuel Receipt</td>
                                <td class="total-pice" style="font-weight: 300;text-align: start ">
                                    <a href="{{ $report->fuelReceipt() }}" target="_blank">
                                        <img src="{{ $report->fuelReceipt() }}" alt="Contoh Gambar" style="max-width: 100px; height: auto;">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row ">18</th>
                                <td style="text-align: start; ">Toll</td>
                                <td class="total-price" style="font-weight: 300;text-align: start ">{{ $report->toll ?: '-' }}</td>
                            </tr>
                            <tr>
                                <th scope="row ">19</th>
                                <td style="text-align: start; ">Toll Receipt</td>
                                <td class="total-pice" style="font-weight: 300;text-align: start ">
                                    <a href="{{ $report->tollReceipt() }}" target="_blank">
                                        <img src="{{ $report->tollReceipt() }}" alt="Contoh Gambar" style="max-width: 100px; height: auto;">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row ">20</th>
                                <td style="text-align: start; ">Parking</td>
                                <td class="total-price" style="font-weight: 300;text-align: start ">{{ $report->parking ?: '-' }}</td>
                            </tr>
                            <tr>
                                <th scope="row ">21</th>
                                <td style="text-align: start; ">Parking Receipt</td>
                                <td class="total-pice" style="font-weight: 300;text-align: start ">
                                    <a href="{{ $report->parkingReceipt() }}" target="_blank">
                                        <img src="{{ $report->parkingReceipt() }}" alt="Contoh Gambar" style="max-width: 100px; height: auto;">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                    @else
                    <tr>
                        <th scope="row" style=" vertical-align:top">13</th>
                        <td style="text-align: start; vertical-align:top; padding-top:15px">Transportation Details</td>
                        <td class="total-price" style="font-weight: 300; text-align: start; padding-top:15px">
                            <ol >
                                @foreach ($transportrequest->transitLocations as $transit)
                                    <li style="margin-left: -12px">
                                        <!-- Destination -->
                                        <div style="display: flex;">
                                            <p style="flex: 1;">Destination</p>
                                            <p style="flex: 3;">: {{ $transit->destination }}</p>
                                        </div>
                                        <!-- Transportation -->
                                        <div style="display: flex;">
                                            <p style="flex: 1;">Transportation</p>
                                            <p style="flex: 3;">: {{ $transit->transport }}</p>
                                        </div>

                                        <!-- Grab -->
                                        @if ($transit->transport == 'Grab')
                                        @foreach ($transit->transportReports as $report )
                                        <div style="display: flex;">
                                            <p style="flex: 1;">Voucher</p>
                                            <p style="flex: 3;">: {{ $transit->voucher ?? '-' }}</p>
                                        </div>
                                        <div style="display: flex;">
                                            <p style="flex: 1;">Grab Cost</p>
                                            <p style="flex: 3;">: {{ $report->cost ?? '-' }}</p>
                                        </div>
                                        <div style="display: flex;">
                                            <p style="flex: 1;">Screenshot</p>
                                            <p style="flex: 3;">:
                                                <a href="{{ $report->screenshoot() }}" target="_blank">View Screenshot</a>
                                            </p>
                                        </div>
                                        @endforeach

                                        @endif

                                        <!-- MRT -->
                                        @if ($transit->transport == 'MRT' || $transit->transport == 'KRL' || $transit->transport == 'LRT')
                                            @foreach ($transit->transportReports as $report )
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Card</p>
                                                    <p style="flex: 3;">: {{ $report->transportCard->card_type ?? '-' }}</p>
                                                </div>
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Initial Balance</p>
                                                    <div style="flex: 3; display: flex;">
                                                        <p>: {{ $report->initial_balance ?? '-' }}</p>
                                                    </div>
                                                </div>
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Final Balance</p>
                                                    <div style="flex: 3; display: flex;">
                                                        <p>: {{ $report->final_balance ?? '-' }}</p>
                                                    </div>
                                                </div>
                                                <div style="display: flex;">
                                                    <p style="flex: 1; margin-bottom: 32px">Screenshot Initial and Final Balance</p>
                                                    <div style="flex: 3; display: flex;">
                                                        <p>:
                                                            <a href="{{ $report->ssInitialBalance() }}" target="_blank">View Initial Balance</a>
                                                        </p>
                                                        <p style="margin-left: 40px;">
                                                            <a href="{{ $report->ssFinalBalance() }}" target="_blank">View Final Balance</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        <!-- Reimburse -->
                                        @if ($transit->transport == 'Reimburse')
                                            @foreach ($transit->transportReports as $report )
                                            @if ($report->cost !== null)
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Grab Cost</p>
                                                    <p style="flex: 3;">: {{ $report->cost ?? '-' }}</p>
                                                </div>
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Screenshoot Grab</p>
                                                    <p style="flex: 3;">:
                                                        <a href="{{ $report->screenshoot() }}" target="_blank">View Screenshot</a>
                                                    </p>
                                                </div>
                                            @endif

                                            @if ($report->fuel != null)
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Fuel</p>
                                                    <p style="flex: 3;">: {{ $report->fuel ?? '-' }}</p>
                                                </div>
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Fuel Receipt</p>
                                                    <p style="flex: 3;">:
                                                        <a href="{{ $report->fuelReceipt() }}" target="_blank">View Fuel Receipt</a>
                                                    </p>
                                                </div>
                                            @endif

                                            @if ($report->toll != null)
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Toll</p>
                                                    <p style="flex: 3;">: {{ $report->toll ?? '-' }}</p>
                                                </div>
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Toll Receipt</p>
                                                    <p style="flex: 3;">:
                                                        <a href="{{ $report->tollReceipt() }}" target="_blank">View Toll Receipt</a>
                                                    </p>
                                                </div>
                                            @endif

                                            @if ($report->parking != null)
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Parking</p>
                                                    <p style="flex: 3;">: {{ $report->parking ?? '-' }}</p>
                                                </div>
                                                <div style="display: flex;">
                                                    <p style="flex: 1;">Parking Receipt</p>
                                                    <p style="flex: 3;">:
                                                        <a href="{{ $report->parkingReceipt() }}" target="_blank">View Parking Receipt</a>
                                                    </p>
                                                </div>
                                            @endif
                                            @endforeach
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        </td>
                    </tr>
                    @endif

                    @if ($transportrequest->transport == 'Operational Car')
                    <tr>
                        <th scope="row ">11</th>
                        <td style="text-align: start; ">Fuel</td>
                        <td class="total-price" style="font-weight: 300;text-align: start ">{{ $transportrequest->fuel ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th scope="row ">12</th>
                        <td style="text-align: start; ">Parking</td>
                        <td class="total-price" style="font-weight: 300;text-align: start ">{{ $transportrequest->parking ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th scope="row ">13</th>
                        <td style="text-align: start; ">Toll</td>
                        <td class="total-price" style="font-weight: 300;text-align: start ">{{ $transportrequest->toll ?: '-' }}</td>
                    </tr>
                    @endif


                </tbody>
            </table>
        </div>
    </div>
    @else
    <div style="margin-top: 24px"></div>
    <div class="container tablenih" style="padding: 24px">
        <form method="POST" action="{{ route('transport-request.report', $transportrequest->id) }}" enctype="multipart/form-data" class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif">
            @csrf

            <input type="hidden" class="form-control" name="transport_type" value="{{ $transportrequest->transport }} ">
            <div class="row">
                <div class="col mb-3">
                    <label for="vendor" class="form-label">Date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $transportrequest->date) }}" disabled/>
                </div>
                <div class="col mb-3">
                    <label for="date" class="form-label">Time</label>
                    <input type="text" name="time" class="form-control p-2" id="date" value="{{ \Carbon\Carbon::parse($transportrequest->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($transportrequest->end_time)->format('H:i') }}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="program" class="form-label">Program / Department</label>
                    <input type="text" class="form-control @error('program') is-invalid @enderror" id="program"
                        name="program" value="{{ old('program', $transportrequest->program) }}" disabled/>
                </div>
                <div class="col mb-3">
                    <label for="person" class="form-label">Passanger</label>
                    <input type="number" class="form-control @error('person') is-invalid @enderror" id="person" name="person" value="{{ old('person', $transportrequest->person) }}" disabled />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="activity" class="form-label">Activity</label>
                    <input type="text" class="form-control @error('activity') is-invalid @enderror" id="activity"
                        name="activity" value="{{ old('activity', $transportrequest->activity) }}" disabled/>
                </div>
                <div class="col mb-3">
                    <label for="modal-desc" class="form-label">Service Type</label>
                    <input type="text" name="desc" class="form-control @error('desc') is-invalid @enderror" id="desc" value="{{ old('desc', $transportrequest->service_type) }}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="start_loc" class="form-label">Start Location</label>
                    <input type="text" class="form-control @error('start_loc') is-invalid @enderror" id="start_loc"
                        name="start_loc" value="{{ old('start_loc', $transportrequest->startLocation->start_loc) }}" disabled/>
                </div>
                <div class="col mb-3">
                    <label for="final_loc" class="form-label">Destination</label>
                    <input type="text" class="form-control @error('final_loc') is-invalid @enderror" id="final_loc"
                    name="final_loc" value="{{ old('final_loc', $transportrequest->destination->final_loc) }}" disabled/>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="finalLocation" class="form-label">Notes</label>
                    <div class="card" style="background: #e9ecef; border:1px;">
                        <div class="card-body">
                            {!! $transportrequest->note !!}
                        </div>
                    </div>
                </div>
            </div>

            @if ($transportrequest->transitLocations->isEmpty())
            <div class="row">
                <div class="col mb-3">
                    <fieldset disabled="disabled">
                        <label for="modal-transport" class="form-label">Transportation</label>
                        <input type="text" class="form-control @error('transport') is-invalid @enderror" id="transport" name="transport" value="{{ old('transport', $transportrequest->transport) }}" />
                    </fieldset>
                </div>
                @if ($transportrequest->transport == 'Grab')
                <div class="col mb-3">
                    <fieldset disabled="disabled">
                        <label for="modal-transport" class="form-label">Voucher</label>
                        <input type="text" class="form-control @error('voucher') is-invalid @enderror" id="voucher" name="voucher" value="{{ old('voucher', $transportrequest->voucher) }}" />
                    </fieldset>
                </div>
                @endif
                @if ($transportrequest->transport == 'MRT')
                <div class="col mb-3">
                    <fieldset disabled="disabled">
                        <label for="modal-transport" class="form-label">Card Type</label>
                        <input type="text" class="form-control @error('card') is-invalid @enderror" id="card" name="card" value="{{ old('card', $transportrequest->card) }}" />
                    </fieldset>
                </div>
                @endif
            </div>

            <!-- MRT related inputs -->
            @if ($transportrequest->transport == 'MRT')
            @foreach($transportrequest->transportCards as $cardIndex => $card)
            <input type="hidden" name="transport_card_id[{{ $cardIndex }}]" value="{{ $card->id }}">
            <div class="row">
                <div class="col mb-3">
                    <fieldset disabled="disabled">
                        <label for="modal-transport" class="form-label">Card </label>
                        <input type="text" class="form-control @error('transport') is-invalid @enderror" id="transport" value="{{ old('transport', $card->card_type) }}" />
                    </fieldset>
                </div>
            </div>
            <div class="row mb-3" >
                <div class="col">
                     <label for="start-balance" class="form-label">Initial Balance <span style="font-weight:300">(e-money / tapcash / flazz)</span></label>
                     <input type="text" class="form-control" id="start-balance" name="initial_balance[{{ $cardIndex }}]" value="{{ old('initial_balance.' . $cardIndex) }}"   required/>
                </div>
                <div class="col">
                    <label for="end-balance" class="form-label">Final Balance <span style="font-weight:300">(e-money / tapcash / flazz)</span></label>
                    <input type="text" class="form-control" id="end-balance" name="final_balance[{{ $cardIndex }}]" value="{{ old('final_balance.' . $cardIndex) }}"  required/>
                </div>
            </div>
            <div class="row mb-3" >
                <div class="col">
                    <label for="formFile" class="form-label">Upload Screenshoot Initial Balance (jpg, png, jpeg)</label>
                    <input class="form-control" type="file" id="formFile" name="ss_initial_balance[{{ $cardIndex }}]" accept=".jpg, .jpeg, .png" required>
                </div>
                <div class="col">
                    <label for="formFile" class="form-label">Upload Screenshoot Initial Balance (jpg, png, jpeg)</label>
                    <input class="form-control" type="file" id="formFile" name="ss_final_balance[{{ $cardIndex }}]" accept=".jpg, .jpeg, .png" required>
                </div>
            </div>
            @endforeach
            @endif

            <!-- Grab related inputs -->
            @if ($transportrequest->transport == 'Grab')

            <div class="row mb-3">
                <div class="col">
                    <label for="costtransport" class="form-label">Transportation Cost</label>
                    <input type="text" class="form-control" id="costtransport" name="cost"  value="{{ old('cost') }}"  required/>
                </div>
                <div class="col">
                    <label for="formFile" class="form-label">Upload Screensoot <span style="font-weight:300">  (jpg, png, jpeg)</span> </label>
                    <input class="form-control" type="file" id="formFile" name="screenshoot" accept=".jpg, .jpeg, .png" required>
                </div>
            </div>
            @endif

            <!-- Reimburse related inputs -->
            @if ($transportrequest->transport == 'Reimburse')
            <div class="row mb-3">
                <div class="col">
                    <label for="costtransport" class="form-label">Transportation Cost</label>
                    <input type="text" class="form-control" id="costtransport" name="cost"  value="{{ old('cost') }}"  />
                </div>
                <div class="col">
                    <label for="formFile" class="form-label">Upload Screensoot <span style="font-weight:300">  (jpg, png, jpeg)</span></label>
                    <input class="form-control" type="file" id="formFile" name="screenshoot" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="costtransport" class="form-label">fuel</label>
                    <input type="text" class="form-control" id="costtransport" name="fuel"  value="{{ old('fuel') }}"  />
                </div>
                <div class="col">
                    <label for="formFile" class="form-label">Upload Fuel Receipt <span style="font-weight:300">  (jpg, png, jpeg)</span></label>
                    <input class="form-control" type="file" id="formFile" name="fuel_receipt" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <div class="row mb-3" >
                <div class="col">
                    <label for="parking" class="form-label">Parking</label>
                    <input type="text" class="form-control" id="parking" name="parking"  value="{{ old('parking') }}"   />
                </div>

                <div class="col">
                    <label for="formFile" class="form-label">Upload Parking Receipt <span style="font-weight:300">  (jpg, png, jpeg)</span></label>
                    <input class="form-control" type="file" id="formFile" name="parking_receipt" accept=".jpg, .jpeg, .png">
                </div>


            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="toll" class="form-label">Toll</label>
                    <input type="text" class="form-control" id="toll" name="toll"  value="{{ old('toll') }}" />
                </div>

                <div class="col">
                    <label for="formFile" class="form-label">Upload Toll Receipt <span style="font-weight:300">  (jpg, png, jpeg)</span></label>
                    <input class="form-control" type="file" id="formFile" name="toll_receipt" accept=".jpg, .jpeg, .png">
                </div>

            </div>
            @endif

            @else

            <label for="transport" class="form-label">Transportation Details</label>

                @php
                    $previousDestination = null; // Initialize a variable to store the previous destination
                @endphp

                @foreach ($transportrequest->transitLocations as $index => $transit)
                @if ($transit->transport != 'Operational Car')
                <!-- Form input untuk ID transit_location -->
                <input type="hidden" name="transit_location_id[{{ $index }}]" value="{{ $transit->id }}">
                <input type="hidden" class="form-control" name="transport_type[{{ $index }}]" value="{{ $transit->transport }} ">

                <div class="row mt-3">
                    <div class="col mb-3">
                        <fieldset disabled="disabled">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="transit_destination" class="form-label">Route</label>
                                    <input type="text" class="form-control " id="transit_destination"
                                    name="transit_destination"  @if ($index == 0)
                                    value="{{ $transportrequest->startLocation->start_loc }} - {{ $transit->destination }} "
                                    @else
                                       value="{{ $previousDestination }} - {{ $transit->destination }} "
                                    @endif
                                    />
                                </div>
                                {{-- <div class="col">
                                    <label for="transit_destination" class="form-label">Destination</label>
                                    <input type="text" class="form-control " id="transit_destination"
                                    name="transit_destination" value="{{ $transit->destination }}" />
                                </div> --}}
                                <div class="col">
                                    <label for="transit_transport" class="form-label">Transportation</label>
                                    <input type="text" class="form-control " id="transit_transport"
                                    name="transit_transport" value="{{ $transit->transport }}" />
                                </div>
                            </div>
                        </fieldset>

                        @if ($transit->transport == 'MRT' || $transit->transport == 'KRL' || $transit->transport == 'LRT')
                        @foreach($transit->transportCards as $cardIndex => $card)
                            <input type="hidden" name="transport_card_id[{{ $index }}][{{ $cardIndex }}]" value="{{ $card->id }}">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <fieldset disabled>
                                        <label for="card-type-{{ $index }}-{{ $cardIndex }}" class="form-label">Card {{$loop->iteration}}</label>
                                        <input type="text" class="form-control @error('transport') is-invalid @enderror" id="card-type-{{ $index }}-{{ $cardIndex }}" value="{{ old('transport', $card->card_type) }}" />
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="start-balance-{{ $index }}-{{ $cardIndex }}" class="form-label">Initial Balance <span style="font-weight:300">(e-money / tapcash / flazz)</span></label>
                                    <input type="text" class="form-control" id="start-balance-{{ $index }}-{{ $cardIndex }}" name="initial_balance[{{ $index }}][{{ $cardIndex }}]" value="{{ old('initial_balance.' . $index . '.' . $cardIndex) }}" required/>
                                </div>
                                <div class="col">
                                    <label for="end-balance-{{ $index }}-{{ $cardIndex }}" class="form-label">Final Balance <span style="font-weight:300">(e-money / tapcash / flazz)</span></label>
                                    <input type="text" class="form-control" id="end-balance-{{ $index }}-{{ $cardIndex }}" name="final_balance[{{ $index }}][{{ $cardIndex }}]" value="{{ old('final_balance.' . $index . '.' . $cardIndex) }}" required/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="ss_initial_balance-{{ $index }}-{{ $cardIndex }}" class="form-label">Upload Screenshoot Initial Balance <span style="font-weight:300">(jpg, png, jpeg)</span></label>
                                    <input class="form-control" type="file" id="ss_initial_balance-{{ $index }}-{{ $cardIndex }}" name="ss_initial_balance[{{ $index }}][{{ $cardIndex }}]" accept=".jpg, .jpeg, .png" required>
                                </div>
                                <div class="col">
                                    <label for="ss_final_balance-{{ $index }}-{{ $cardIndex }}" class="form-label">Upload Screenshoot Final Balance (jpg, png, jpeg)</label>
                                    <input class="form-control" type="file" id="ss_final_balance-{{ $index }}-{{ $cardIndex }}" name="ss_final_balance[{{ $index }}][{{ $cardIndex }}]" accept=".jpg, .jpeg, .png" required>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                    <!-- MRT related inputs -->

                @endif


                <!-- Grab related inputs -->
                @if ($transit->transport == 'Grab')
                <div class="row mb-3">
                    <div class="col">
                        <label for="costtransport" class="form-label">Transportation Cost</label>
                        <input type="text" class="form-control" id="costtransport" name="cost[{{ $index }}]" value="{{ old('cost['.$index.']') }}" required/>
                    </div>
                    <div class="col">
                        <label for="formFile" class="form-label">Upload Screenshoot <span style="font-weight:300">  (jpg, png, jpeg)</span> </label>
                        <input class="form-control" type="file" id="formFile" name="screenshoot[{{ $index }}]" accept=".jpg, .jpeg, .png" required>
                    </div>
                </div>
                @endif

                <!-- Reimburse related inputs -->
                @if ($transit->transport == 'Reimburse')
                <div class="row mb-3">
                    <div class="col">
                        <label for="costtransport" class="form-label">Transportation Cost</label>
                        <input type="text" class="form-control" id="costtransport" name="cost[{{ $index }}]" />
                    </div>
                    <div class="col">
                        <label for="formFile" class="form-label">Upload Screenshoot <span style="font-weight:300">  (jpg, png, jpeg)</span></label>
                        <input class="form-control" type="file" id="formFile" name="screenshoot[{{ $index }}]" accept=".jpg, .jpeg, .png">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="costtransport" class="form-label">fuel</label>
                        <input type="text" class="form-control" id="costtransport" name="fuel[{{ $index }}]"  value="{{ old('fuel') }}"  />
                    </div>
                    <div class="col">
                        <label for="formFile" class="form-label">Upload Fuel Receipt <span style="font-weight:300">  (jpg, png, jpeg)</span></label>
                        <input class="form-control" type="file" id="formFile" name="fuel_receipt[{{ $index }}]" accept=".jpg, .jpeg, .png">
                    </div>
                </div>
                <div class="row mb-3" >
                    <div class="col">
                        <label for="parking" class="form-label">Parking</label>
                        <input type="text" class="form-control" id="parking" name="parking[{{ $index }}]"  />
                    </div>

                    <div class="col">
                        <label for="toll" class="form-label">Toll</label>
                        <input type="text" class="form-control" id="toll" name="toll[{{ $index }}]" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="formFile" class="form-label">Upload Parking Receipt <span style="font-weight:300">  (jpg, png, jpeg)</span></label>
                        <input class="form-control" type="file" id="formFile" name="parking_receipt[{{ $index }}]" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="col">
                        <label for="formFile" class="form-label">Upload Toll Receipt <span style="font-weight:300">  (jpg, png, jpeg)</span></label>
                        <input class="form-control" type="file" id="formFile" name="toll_receipt[{{ $index }}]" accept=".jpg, .jpeg, .png">
                    </div>
                </div>
                @endif
                @endif
                @php
                    $previousDestination = $transit->destination; // Update the previous destination at the end of each iteration
                @endphp
                @endforeach
            @endif

            <button type="submit" class="button-submit">Submit</button>
        </form>
    </div>
    @endif
</div>
@endsection

@section('custom-js')

<script>
//     document.addEventListener('DOMContentLoaded', function () {
//     const inputs = ['costtransport', 'start-balance[]', 'end-balance[]', 'toll', 'parking', 'fuel'];
//     inputs.forEach(id => {
//         const element = document.getElementById(id);
//         if (element) {
//             element.addEventListener('keyup', function (e) {
//                 this.value = formatRupiah(this.value, 'Rp');
//             });
//         }
//     });

//     function formatRupiah(angka, prefix) {
//         var number_string = angka.replace(/[^,\d]/g, '').toString(),
//             split = number_string.split(','),
//             sisa = split[0].length % 3,
//             rupiah = split[0].substr(0, sisa),
//             ribuan = split[0].substr(sisa).match(/\d{3}/gi);

//         if (ribuan) {
//             separator = sisa ? '.' : '';
//             rupiah += separator + ribuan.join('.');
//         }

//         rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
//         return prefix === undefined ? rupiah : rupiah ? 'Rp ' + rupiah : '';
//     }
// });

document.addEventListener('DOMContentLoaded', function () {
    // Fungsi untuk memformat input menjadi format Rupiah
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

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : rupiah ? 'Rp ' + rupiah : '';
    }

    // Pilih semua elemen input dengan nama yang relevan dan tambahkan event listener
    document.querySelectorAll('input[name^="initial_balance"], input[name^="final_balance"], input[name^="cost"], input[name^="toll"], input[name^="parking"], input[name^="fuel"]').forEach(element => {
        element.addEventListener('keyup', function (e) {
            this.value = formatRupiah(this.value, 'Rp');
        });
    });
});
</script>
@endsection
