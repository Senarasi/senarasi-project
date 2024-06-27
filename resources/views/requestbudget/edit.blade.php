@extends('layout.index')

@section('title')
    Create Request Budget - Budgeting System
@endsection

@section('content')
    <a href="{{ url()->previous() }}" style="text-decoration: none;"> <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10 " height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                                                      7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back
        </button>
    </a>
    <!--blablabla -->
    <div class="judulhalaman" style="text-align: start">Request Budget</div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active tablinks" id="home-tab" data-bs-toggle="tab" data-url="{{route('request-budget.edit', $requestBudget->request_budget_id)}}" data-bs-target="#home-tab-pane"
                type="button" role="tab" aria-controls="home-tab-pane" aria-selected="false" disabled>Header</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data1-tab" data-url="{{ route('request-budget.performer', $requestBudget->request_budget_id) }}"
                data-bs-toggle="tab" data-bs-target="#data1-tab-pane" type="button" role="tab"
                aria-controls="data1-tab-pane" aria-selected="false">Performer</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data2-tab" data-url="{{ route('request-budget.productioncrew', $requestBudget->request_budget_id) }}"
                data-bs-toggle="tab" data-bs-target="#data2-tab-pane" type="button" role="tab"
                aria-controls="data2-tab-pane" aria-selected="false">Production Crews</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data3-tab" data-url="{{ route('request-budget.productiontool', $requestBudget->request_budget_id) }}"
                data-bs-toggle="tab" data-bs-target="#data3-tab-pane" type="button" role="tab"
                aria-controls="data3-tab-pane" aria-selected="false">Production
                Tools</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data4-tab" data-url="{{ route('request-budget.operational', $requestBudget->request_budget_id) }}"
                data-bs-toggle="tab" data-bs-target="#data4-tab-pane" type="button" role="tab"
                aria-controls="data4-tab-pane" aria-selected="false">Operational</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data5-tab" data-url="{{ route('request-budget.location', $requestBudget->request_budget_id) }}"
                data-bs-toggle="tab" data-bs-target="#data5-tab-pane" type="button" role="tab"
                aria-controls="data1-tab-pane" aria-selected="false">Location</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="preview-tab" data-url="{{ route('request-budget.preview', $requestBudget->request_budget_id) }}"
                data-bs-toggle="tab" data-bs-target="#preview-tab-pane" type="button" role="tab"
                aria-controls="preview-tab-pane" aria-selected="false">Preview</button>
        </li>
        <li class="nav-item" role="presentation">
        </li>
    </ul>

    <div class="tab-content" id="myTabContent" style="margin-top: 24px">
        <!-- home -->
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <form action="{{ route('request-budget.update', $requestBudget->request_budget_id) }}" method="POST"
                class="formrequest">
                @csrf
                @method('PUT')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                    <div class="mb-3">
                        <label for="Select " class="form-label">Pilih Program</label>
                        <select name="program_id" id="program_option" class="form-select ">
                            <option disabled selected>Choose One</option>
                            @forelse ($programs as $program_id => $program_name)
                                <option value="{{ $program_id }}"
                                    {{ $requestBudget->program_id == $program_id ? 'selected' : '' }}>{{ $program_name }}
                                </option>
                            @empty
                                <option disabled selected>Data not found</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Select" class="form-label">Select Month</label>
                        <select name="month" id="month" class="form-select">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $requestBudget->month == $i ? 'selected' : '' }}>
                                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                            @endfor
                            {{-- <option disabled selected>Choose One</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option> --}}
                        </select>
                    </div>

                </div>
                <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                    <div class="mb-3">
                        <label for="producer_id" class="form-label">Producer Name</label>
                        <select id="producer_id" name="producer_id" class="form-select">
                            <option disabled selected>Choose One</option>
                            @forelse ($producers as $producer)
                                <option value="{{ $producer->employee_id }}"
                                    {{ $requestBudget->producer_id == $producer->employee_id ? 'selected' : '' }}>
                                    {{ $producer->full_name }}</option>
                            @empty
                                <option disabled selected>Data not found</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <fieldset disabled>
                            <label for="manager_id" class="form-label">Manager Name</label>
                            {{-- <select id="manager_id" name="manager_id" class="form-select"> --}}
                            <input type="text " name="manager_name" id="manager_display" class="form-control"
                                placeholder="{{ $manager->full_name }}" value="{{ $manager->full_name }}" readonly />
                        </fieldset>
                        <!-- Hidden input field to store the manager_id -->
                        <input type="hidden" id="manager_id" name="manager_id" value="{{ $manager->employee_id }}">
                    </div>
                </div>
                <fieldset disabled>
                    <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                        <div class="mb-3"><label for="disabledTextInput" class="form-label">Budget Code</label>
                            <input type="text " name="budget_code_display" id="budget_code_display"
                                class="form-control" placeholder="" value="{{ $requestBudget->budget_code }}" />
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput " class="form-label">Remaining Budget</label>
                            <input type="text " name="budget_display" id="budget_display" class="form-control"
                                placeholder="" value="{{ $requestBudget->budget }}" />
                        </div>
                    </div>
                </fieldset>
                <input type="hidden" name="budget_code" id="budget_code" value="{{ $requestBudget->budget_code }}" />
                <input type="hidden" name="budget" id="budget" value="{{ $requestBudget->budget }}"/>
                <input type="hidden" name="monthly_budget_id" id="monthly_budget_id" value="{{ $requestBudget->monthly_budget_id }}"/>

                <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                    <div class="mb-3">
                        <label for="disabledTextInput " class="form-label">Episode Name</label>
                        <input type="text" name="episode" id="disabledTextInput " class="form-control"
                            placeholder=" " value="{{ $requestBudget->episode }}" />
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput " class="form-label">Location</label>
                        <input type="text" name="location" id="disabledTextInput " class="form-control"
                            placeholder="" value="{{ $requestBudget->location }}" />
                    </div>
                </div>

                <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                    <div class="mb-3">
                        <label for="managerform" class="form-label">Date Of Shooting</label>
                        <input type="date" name="date_start" id="disabledTextInput " class="form-control"
                            value="{{ $requestBudget->date_start }}" />
                    </div>
                    <div class="mb-3">
                        <label for="managerform" class="form-label">
                            Date Of Completion Of Shooting</label>
                        <input type="date" name="date_end" id="disabledTextInput " class="form-control"
                            value="{{ $requestBudget->date_end }}" />
                    </div>
                </div>
                <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr;">
                    <div class="mb-3">
                        <label for="Select " class="form-label">Type</label>
                        <select id="type" name="type" id="type" class="form-select">
                            <option disabled selected>Choose One</option>
                            <option value="Tapping" {{ $requestBudget->type == 'Tapping' ? 'selected' : '' }}>Tapping
                            </option>
                            <option value="Live Streaming"
                                {{ $requestBudget->type == 'Live Streaming' ? 'selected' : '' }}>Live Streaming</option>
                            <option value="Event" {{ $requestBudget->type == 'Event' ? 'selected' : '' }}>Event</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="managerform" class="form-label">Date Of Upload</label>
                        <input type="date" name="date_upload" id="disabledTextInput " class="form-control"
                            value="{{ $requestBudget->date_upload }}" />
                    </div>
                </div>
                <button type="submit" class="button-departemen"
                    style="justify-content: center; align-items: center; display: flex; gap: 16px" id="nextButton">Save
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"
                        fill="none">
                        <path d="M17 10L10.1429 4M17 10L10.1429 16M17 10H1" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
@endsection

@section('custom-js')
    {{-- <script src="{{ asset('js/formrequest.js') }}"></script> --}}
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
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#program_option, #month').on('change', function() {
                var programId = $('#program_option').val();
                var month = $('#month').val();

                if (programId && month) {
                    $.ajax({
                        url: '{{ route('getMonthlyBudget') }}',
                        type: 'GET',
                        data: {
                            program_id: programId,
                            month: month
                        },
                        success: function(data) {
                            $('#budget_code_display').val(data.budget_code);
                            $('#budget_code').val(data.budget_code);
                            // Format monthly_budget before setting it to #budget input
                            var formattedBudget = parseFloat(data.monthly_budget)
                                .toLocaleString(); // Using toLocaleString for number formatting
                            $('#budget_display').val(formattedBudget);
                            $('#budget').val(data.monthly_budget);
                            $('#monthly_budget_id').val(data.monthly_budget_id);
                        },
                        error: function() {
                            $('#budget_code_display').val('');
                            $('#budget_display').val('');
                            $('#budget_code').val('');
                            $('#budget').val('');
                            $('#monthly_budget_id').val('');
                        }
                    });
                } else {
                    $('#budget_code_display').val('');
                    $('#budget_display').val('');
                    $('#budget_code').val('');
                    $('#budget').val('');
                    $('#monthly_budget_id').val('');
                }
            });
        });
    </script>
@endsection
