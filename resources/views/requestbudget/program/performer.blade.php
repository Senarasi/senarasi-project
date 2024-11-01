@extends('layout.index')

@section('title')
    Create Request Budget - Budgeting System
@endsection

@section('content')
    <a href="{{ url()->previous() }}" style="text-decoration: none;"> <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10 " height="17 " viewBox="0 0 10 17 " fill="none ">
                <path
                    d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                                                                                                                                                                                                                                                                                                                          7.2501 0 7.6501 0 8.0501Z "
                    fill="#4A25AA " />
            </svg>
            Back
        </button>
    </a>
    <!--blablabla -->
    <div class="judulhalaman" style="text-align: start">Request Budget</div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="home-tab" data-bs-toggle="tab"
                data-url="{{ route('request-budget.edit', $id) }}" data-bs-target="#home-tab-pane" type="button"
                role="tab" aria-controls="home-tab-pane" aria-selected="false">General</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active tablinks" id="data1-tab" data-url="{{ route('request-budget.performer', $id) }}"
                data-bs-toggle="tab" data-bs-target="#data1-tab-pane" type="button" role="tab"
                aria-controls="data1-tab-pane" aria-selected="false" disabled>Performer</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data2-tab" data-url="{{ route('request-budget.productioncrew', $id) }}"
                data-bs-toggle="tab" data-bs-target="#data2-tab-pane" type="button" role="tab"
                aria-controls="data2-tab-pane" aria-selected="false">Production Crews</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data3-tab" data-url="{{ route('request-budget.productiontool', $id) }}"
                data-bs-toggle="tab" data-bs-target="#data3-tab-pane" type="button" role="tab"
                aria-controls="data3-tab-pane" aria-selected="false">Production
                Tools</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data4-tab" data-url="{{ route('request-budget.operational', $id) }}"
                data-bs-toggle="tab" data-bs-target="#data4-tab-pane" type="button" role="tab"
                aria-controls="data4-tab-pane" aria-selected="false">Operational</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data5-tab" data-url="{{ route('request-budget.location', $id) }}"
                data-bs-toggle="tab" data-bs-target="#data5-tab-pane" type="button" role="tab"
                aria-controls="data1-tab-pane" aria-selected="false">Venue</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="preview-tab" data-url="{{ route('request-budget.preview', $id) }}"
                data-bs-toggle="tab" data-bs-target="#preview-tab-pane" type="button" role="tab"
                aria-controls="preview-tab-pane" aria-selected="false">Preview & Submit</button>
        </li>
        <li class="nav-item" role="presentation">
        </li>
    </ul>


    <div class="tab-content" id="myTabContent" style="margin-top: 24px">
        <!-- PERFORMER -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="mainForm" action=""></form>
        <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px; border-bottom:none; border-top:none;">
            <table class="table table-hover align-middle"
                style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center;">
                <thead class="table-light" style="border:1px solid #c4c4c4">
                    <tr class="dicobain">
                        <th scope="col" style="width: 5%">No</th>
                        <th scope="col" style="width: 70%">Description</th>
                        <th scope="col ">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row ">1</th>
                        <td style="text-align: start; font-weight: 400">Performer<span
                                style="font-weight: 300; color:rgb(173, 173, 173); padding-left: 12px">( Host, Guest /
                                Speaker )</span></td>

                        <td class="total-price"
                            style="position: relative; text-align: end; padding-left: 24px; font-weight: 300; padding-right: 24px; ">
                            <span style="float: left;">Rp</span>
                            <span style="float: right;">{{ number_format($totalperformer) ?? 0 }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th scope=" row ">2</th>
                        <td style="text-align: start; font-weight: 400;">Production Crews<span
                                style="font-weight: 300; color:rgb(173, 173, 173); padding-left: 12px">( Internal team,
                                Production Studio, Business Development, Operational )</span></td>
                        <td class="total-price"
                            style="position: relative; text-align: end; padding-left: 24px; font-weight: 300; padding-right: 24px; ">
                            <span style="float: left;">Rp</span>
                            <span style="float: right;">{{ number_format($totalproductioncrew) ?? 0 }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row ">3</th>
                        <td style="text-align: start; font-weight: 400">Production Tools<span
                                style="font-weight: 300; color:rgb(173, 173, 173); padding-left: 12px"> (Broadcast System,
                                Audio System, Lightning System, Set/Property, Internet, Electricity )</span></td>
                        <td class="total-price"
                            style="position: relative; text-align: end; padding-left: 24px; font-weight: 300; padding-right: 24px; ">
                            <span style="float: left;">Rp</span>
                            <span style="float: right;">{{ number_format($totalproductiontool) ?? 0 }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row ">4</th>
                        <td style="text-align: start; font-weight: 400">Operational<span
                                style="font-weight: 300; color:rgb(173, 173, 173); padding-left: 12px">( Meals,
                                Transportaion, etc )</span></td>
                        <td class="total-price"
                            style="position: relative; text-align: end; padding-left: 24px; font-weight: 300; padding-right: 24px; ">
                            <span style="float: left;">Rp</span>
                            <span style="float: right;">{{ number_format($totaloperational) ?? 0 }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row ">5</th>
                        <td style="text-align: start; font-weight: 400">Venue<span
                                style="font-weight: 300; color:rgb(173, 173, 173); padding-left: 12px">( Location Rental,
                                Overtime AC, etc )</span> </td>
                        <td class="total-price"
                            style="position: relative; text-align: end; padding-left: 24px; font-weight: 300; padding-right: 24px; ">
                            <span style="float: left;">Rp</span>
                            <span style="float: right;">{{ number_format($totallocation) ?? 0 }}</span>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #c4c4c4;">
                        <td colspan="2" class="text-center" style="font-weight: 500; background-color: #dbdee8">
                            Total</td>
                        <td
                            style="position: relative; text-align: end; padding-left: 24px; font-weight: 400; padding-right: 24px; ">
                            <span style="float: left;">Rp</span>
                            <span style="float: right;">{{ number_format($totalAll) }}
                                / <span style="color: red">Rp.
                                    {{ number_format($budget) }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex">
            <button type="button" class="button-departemen me-3" onclick="addItem()" data-bs-toggle="modal"
                data-bs-target="#additem">Add Item<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white" />
                </svg>
            </button>
            {{-- <button type="button" class="button-departemen me-3" onclick="addBundleItems()">Add Bundle Items<svg
                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white" />
                </svg>
            </button> --}}
        </div>

        <div class="tablenih" style="margin-top: 24px;">
            <div class="table-responsive p-3" style="max-height: 450px; overflow-y: auto;">
                <table id="datatablerequest" class="table table-hover">
                    <thead class="table-light">
                        <tr class="dicobain">
                            <th scope="col">Sub Description</th>
                            <th scope="col">REP</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width: 80px;">Day</th>
                            <th scope="col" style="width: 80px;">QTY</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Total</th>
                            <th scope="col">Assign To</th>
                            <th scope="col">Note</th>
                            <th scope="col" style="width: 140px" class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody id="performerTableBody">
                        @forelse ($performer as $key => $data)
                            <tr>
                                <td>
                                    {{ $data->subdescription->sub_description_name ?? '' }}
                                </td>
                                <td>{{ $data->rep ?? '' }}</td>
                                <td>{{ $data->name ?? '' }}</td>
                                <td>{{ $data->day ?? 0 }}</td>
                                <td>{{ $data->qty ?? 0 }}</td>
                                <td>Rp. {{ number_format($data->cost) ?? 0 }}</td>
                                <td>Rp. {{ number_format($data->total_cost) ?? 0 }}</td>
                                <td>{{ $data->assign ?? '' }}</td>
                                <td>{{ $data->note ?? '' }}</td>
                                <td>
                                    <span style="display: flex; gap: 8px; justify-content: center">
                                        {{-- <a href="javascript:;" class="uwuq editModalBtn" style="font-size: 14px"
                                            data-id="{{ $data->performer_id }}"
                                            data-url="{{ route('performer.edit', $data->performer_id) }}"
                                            data-bs-toggle="modal" data-bs-target="#edititem">Edit</a> --}}
                                        <form class="form-delete" onsubmit="return confirm('Konfirmasi hapus data ini?')"
                                            action="{{ route('performer.destroy', $data->performer_id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="url_back"
                                                value="{{ route('request-budget.performer', $id) }}">
                                            <a href="#" onclick="$(this).closest('form').submit();"
                                                class="btn btn-danger"
                                                style="font-size: 14px; font-weight: 500; padding: 7px 10px;">Delete</a>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="12">Data not found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal justify-content-center fade" id="additem" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{ route('performer.store') }}" method="POST" class="modal-form-check"
                        style="font: 500 14px Narasi Sans, sans-serif">
                        @csrf
                        <div class="row">
                            <div class="col mb-3">

                                <label for="sub_description_id" class="form-label">Sub Description</label>
                                <select name="sub_description_id" class="form-select" id="sub_description_option"
                                    required>
                                    {{-- <option disabled selected>Select Sub Description</option>
                                    @forelse ($subdescription as $sub_description_id => $sub_description_name) --}}
                                    <option value="1">Host/Performer/Guest
                                    </option>
                                    {{-- @empty
                                        <option disabled selected>Data not found</option>
                                    @endforelse --}}
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="usage" class="form-label">Usage</label>
                                <select name="usage" class="form-select" id="usage_option" required>
                                    {{-- <option disabled selected>Choose One</option> --}}
                                    <option value="MAN POWER">Man Power</option>
                                    {{-- <option value="TOOLS">Tools</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="rep" class="form-label">REP</label>
                                <select name="rep" class="form-select" id="rep_option" required>
                                    <option disabled selected>Choose One</option>
                                    <option value="NCS">NCS</option>
                                    <option value="OUT">OUT</option>
                                </select>
                            </div>
                            <div class="col mb-3">

                                <label for="name" class="form-label">Name</label>
                                <div id="name_container">
                                    <select name="name" class="form-select" id="name_option" required>
                                        <option disabled selected>Select Name</option>
                                        @forelse ($performer_list as $performer)
                                            <option value="{{ $performer->performer_name }}"
                                                data-price="{{ $performer->price }}">{{ $performer->performer_name }}
                                            </option>
                                        @empty
                                            <option disabled selected>Data not found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="day" class="form-label">Day</label>
                                    {{-- <select name="day" class="form-select" id="day" required>
                                        <option disabled selected>Select Day</option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select> --}}
                                    <input type="number" class="form-control" id="day" name="day"
                                        style="padding: 8px" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="qty" class="form-label">QTY</label>
                                    <input type="number" class="form-control" id="qty" name="qty"
                                        style="padding: 8px" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="assign" class="form-label">Assign To</label>
                                    <select name="assign" class="form-select" id="assign_option" required>
                                        {{-- <option disabled selected>Select Department</option> --}}
                                        {{-- <option selected value="HC">HC</option> --}}
                                        <option selected value="FINANCE">FINANCE</option>
                                        {{-- <option value="PROCUREMENT">Procurement</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cost" class="form-label">Cost</label>
                                    <input type="text" class="form-control" id="cost" name="cost"
                                        style="padding: 8px" />
                                    <input type="hidden" id="raw_budget" name="raw_budget" />
                                    <!-- Hidden input field for storing the raw numeric value -->
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="note" class="form-label">Note</label>
                                <textarea type="text" class="form-control" id="note" name="note" cols="30" rows="2"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="request_budget_id" value="{{ $id }}">
                        <input type="hidden" name="url_back"
                            value="{{ route('request-budget.performer', $requestbudget->request_budget_id) }}">
                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg') }}" alt=" " />
            </div>
        </div>
    </div>

    {{-- <div class="modal justify-content-center fade" id="additem" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{ route('performer.store') }}" method="POST" class="modal-form-check"
                        style="font: 500 14px Narasi Sans, sans-serif">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="sub_description_id" class="form-label">Sub Description</label>
                                    <select name="sub_description_id" class="form-select" id="sub_description_option"
                                        required>
                                        <option disabled selected>Select Sub Description</option>
                                        @forelse ($subdescription as $sub_description_id => $sub_description_name)
                                            <option value="{{ $sub_description_id }}">{{ $sub_description_name }}
                                            </option>
                                        @empty
                                            <option disabled selected>Data not found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="usage" class="form-label">Usage</label>
                                    <select name="usage" class="form-select" id="usage_option" required>
                                        <option disabled selected>Choose One</option>
                                        <option value="man power">Man Power</option>
                                        <option value="tools">Tools</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="rep" class="form-label">REP</label>
                                    <select name="rep" class="form-select" id="rep_option" required>
                                        <option disabled selected>Choose One</option>
                                        <option value="NCS">NCS</option>
                                        <option value="OUT">OUT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <div id="name_container">
                                        <select name="name" class="form-select" id="name_option" required>
                                            <option disabled selected>Select Name</option>
                                            @forelse ($performer_list as $performer)
                                                <option value="{{ $performer->performer_name }}"
                                                    data-price="{{ $performer->price }}">{{ $performer->performer_name }}
                                                </option>
                                            @empty
                                                <option disabled selected>Data not found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="day" class="form-label">Day</label>
                                    <input type="text" class="form-control" id="day" name="day" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="qty" class="form-label">QTY</label>
                                    <input type="text" class="form-control" id="qty" name="qty" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cost" class="form-label">Cost</label>
                                    <input type="text" class="form-control" id="cost" name="cost" />
                                    <input type="hidden" id="raw_budget" name="raw_budget" />
                                    <!-- Hidden input field for storing the raw numeric value -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="assign" class="form-label">Forward To</label>
                                    <select name="assign" class="form-select" id="assign_option" required>
                                        <option disabled selected>Select Department</option>
                                        <option value="hc">HC</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Procurement">Procurement</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="note" class="form-label">Note</label>
                                    <input type="text" class="form-control" id="note" name="note" />
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="request_budget_id" value="{{ $id }}">
                        <input type="hidden" name="url_back"
                            value="{{ route('request-budget.performer', $requestbudget->request_budget_id) }}">
                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg') }}" alt=" " />
            </div>
        </div>
    </div> --}}
@endsection
@section('custom-js')
    {{-- <script>
        document.getElementById('name_option').addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            let price = selectedOption.getAttribute('data-price');
            document.getElementById('cost').value = price;
        });
    </script> --}}
    {{-- for change tab --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabButtons = document.querySelectorAll('.nav-link.tablinks');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetUrl = button.getAttribute('data-url');

                    // Redirect to the URL specified in the data-url attribute
                    window.location.href = targetUrl;
                });
            });
        });
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#additem').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });
        });
    </script>
    <script>
        var budgetInput = document.getElementById('cost');
        var rawBudgetInput = document.getElementById('raw_budget');

        budgetInput.addEventListener('keyup', function(e) {
            var formattedBudget = formatRupiah(this.value, 'Rp');
            budgetInput.value = formattedBudget; // Update the budget input field with the formatted value
            var rawValue = parseRawBudget(formattedBudget); // Parse the raw numeric value
            rawBudgetInput.value = rawValue; // Store the raw numeric value in the hidden input field
        });

        /* Dengan Rupiah */
        var budgettahunan = document.getElementById('cost');
        budgettahunan.addEventListener('keyup', function(e) {
            budgettahunan.value = formatRupiah(this.value, 'Rp');
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

        function parseRawBudget(formattedBudget) {
            // Remove any non-numeric characters from the formatted budget value
            var rawValue = formattedBudget.replace(/[^\d]/g, '');
            return rawValue;
        }
    </script>
    {{-- for change if choose NCS or OUT --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const repOption = document.getElementById('rep_option');
            const nameContainer = document.getElementById('name_container');

            repOption.addEventListener('change', function() {
                if (repOption.value === 'OUT') {
                    nameContainer.innerHTML =
                        '<input type="text" name="name" class="form-control" id="name_option" required>';
                } else if (repOption.value === 'NCS') {
                    nameContainer.innerHTML = `
                <select name="name" class="form-select" id="name_option" required>
                                            <option disabled selected>Select Name</option>
                                            @forelse ($performer_list as $performer)
                                                <option value="{{ $performer->id }}"
                                                    data-price="{{ $performer->price }}">{{ $performer->performer_name }}
                                                </option>
                                            @empty
                                                <option disabled selected>Data not found</option>
                                            @endforelse
                                        </select>`;
                }
            });
        });
    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const repOption = document.getElementById('rep_option');
            const nameContainer = document.getElementById('name_container');
            const costInput = document.getElementById('cost');
            const performerNameInput = document.getElementById('name');
            const rawCostInput = document.getElementById('raw_budget');

            repOption.addEventListener('change', function() {
                if (repOption.value === 'OUT') {
                    nameContainer.innerHTML =
                        '<input type="text" name="name" class="form-control" id="name" style="text-transform: uppercase;" required>';
                    document.getElementById('name').addEventListener('input', function() {
                        performerNameInput.value = this.value;
                    });
                } else if (repOption.value === 'NCS') {
                    nameContainer.innerHTML = `
            <select name="name" class="form-select" id="name_option" required>
                <option disabled selected>Select Name</option>
                @forelse ($performer_list as $performer)
                    <option value="{{ $performer->performer_name }}"
                        data-price="{{ $performer->price }}">{{ $performer->performer_name }}
                    </option>
                @empty
                    <option disabled selected>Data not found</option>
                @endforelse
            </select>`;

                    function numberFormat(number, decimals = 2, decPoint = '.', thousandsSep = ',') {
                        number = Number(number).toFixed(decimals);
                        let parts = number.split('.');
                        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousandsSep);
                        return parts.join(decPoint);
                    }
                    document.getElementById('name_option').addEventListener('change', function() {
                        let selectedOption = this.options[this.selectedIndex];
                        let price = selectedOption.getAttribute('data-price');
                        let formattedPrice = numberFormat(
                            price); // Use the numberFormat function to format the price
                        let performerName = selectedOption.text;
                        costInput.value = formattedPrice;
                        rawCostInput.value = price;
                        performerNameInput.value = performerName;
                    });
                }
            });
        });
    </script>
@endsection
