@extends('admin.layout.app')
@section('title')
    Budget Program - Budgeting System
@endsection
@section('content')
    <div class="judulhalaman" style="display: flex; align-items: center">
        Input Budget Narasi
        {{-- <form style="margin-left: 12px" class="d-flex has-search" role="search ">
        <input style="font-size: 14px; justify-content: center" class="form-control me-2" type="search "
            placeholder="Search " aria-label="Search" />
    </form> --}}
    </div>
    <div style="display: flex; justify-content: space-between">
        <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Input Budget
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                    fill="white" />
            </svg>
        </button>

        {{-- <button type="button" class="button-bro" data-bs-toggle=" modal " data-bs-target="#none">
                Import File
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path
                        d="M0 2C0 0.896875 0.896875 0 2 0H7V4C7 4.55313 7.44687 5 8 5H12V9.5H5.5C4.39688 9.5 3.5 10.3969 3.5 11.5V16H2C0.896875 16 0 15.1031 0 14V2ZM12 4H8V0L12 4ZM6.25 11H6.75C7.44063 11 8 11.5594 8 12.25V12.5C8 12.775 7.775 13 7.5 13C7.225 13 7 12.775 7 12.5V12.25C7 12.1125 6.8875 12 6.75 12H6.25C6.1125 12 6 12.1125 6 12.25V14.75C6 14.8875 6.1125 15 6.25 15H6.75C6.8875 15 7 14.8875 7 14.75V14.5C7 14.225 7.225 14 7.5 14C7.775 14 8 14.225 8 14.5V14.75C8 15.4406 7.44063 16 6.75 16H6.25C5.55937 16 5 15.4406 5 14.75V12.25C5 11.5594 5.55937 11 6.25 11ZM10.4094 11H11.5C11.775 11 12 11.225 12 11.5C12 11.775 11.775 12 11.5 12H10.4094C10.1844 12 10 12.1844 10 12.4094C10 12.5719 10.0937 12.7188 10.2437 12.7844L11.4125 13.3031C11.9219 13.5281 12.25 14.0344 12.25 14.5906C12.25 15.3687 11.6187 16 10.8406 16H9.5C9.225 16 9 15.775 9 15.5C9 15.225 9.225 15 9.5 15H10.8406C11.0656 15 11.25 14.8156 11.25 14.5906C11.25 14.4281 11.1563 14.2812 11.0063 14.2156L9.8375 13.6969C9.32812 13.4719 9 12.9656 9 12.4094C9 11.6313 9.63125 11 10.4094 11ZM13.5 11C13.775 11 14 11.225 14 11.5V12.4875C14 13.2063 14.1719 13.9125 14.5 14.55C14.8281 13.9156 15 13.2094 15 12.4875V11.5C15 11.225 15.225 11 15.5 11C15.775 11 16 11.225 16 11.5V12.4875C16 13.5719 15.6781 14.6344 15.075 15.5375L14.9156 15.7781C14.8219 15.9187 14.6656 16 14.5 16C14.3344 16 14.1781 15.9156 14.0844 15.7781L13.925 15.5375C13.3219 14.6344 13 13.5719 13 12.4875V11.5C13 11.225 13.225 11 13.5 11Z"
                        fill="#4A25AA" />
                </svg>
            </button> --}}
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="tablenih">
        <div class="table-responsive p-2">
            <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px;">
                <thead class="table-light">
                    <tr class="dicobain" style="">
                        {{-- <th scope="col" class="col-1">No</th> --}}
                        <th scope="col ">Budget Code</th>
                        <th scope="col ">Quarter</th>
                        <th scope="col ">Year</th>
                        <th scope="col ">Program Name</th>
                        <th scope="col ">Budget</th>
                        <th scope="col ">Requester</th>
                        <th scope="col "></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                        $romanNumerals = ['I', 'II', 'III', 'IV'];
                    @endphp
                    @forelse ($budget as $data)
                        @foreach ($data->quarterlyBudgets as $quarterlyBudget)
                            <tr class="dicobain">
                                <td>{{ $quarterlyBudget->budget_code }}</td>
                                <td>{{ $romanNumerals[$quarterlyBudget->quarter - 1] }}</td>
                                <td>{{ $data->year }}</td>
                                <td>{{ $quarterlyBudget->program->program_name }}</td>
                                <td> Rp. {{ number_format($quarterlyBudget->quarter_budget, 2) }}</td>
                                <td>{{ $quarterlyBudget->employee->full_name }}</td>
                                <td>
                                    <span style="display: flex; gap: 8px; justify-content: center">
                                        <button type="button " class="uwuq edit-button" data-bs-toggle="modal"
                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                            data-quarter="{{ $quarterlyBudget->quarter }}" data-year="{{ $data->year }}"
                                            data-budget_code="{{ $quarterlyBudget->budget_code }}"
                                            data-program_id="{{ $quarterlyBudget->program->program_id }}"
                                            data-quarter_budget="{{ $quarterlyBudget->quarter_budget }}"
                                            data-quarterly_budget_id="{{ $quarterlyBudget->quarterly_budget_id }}">Edit</a>

                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('budget.destroy', $quarterlyBudget->quarterly_budget_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="width: fit-content;">Delete</button>
                                            </form>
                                    </span>

                                </td>
                            </tr>
                        @endforeach
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('modal')
    <!-- Modal 1 -->
    <div class="modal justify-content-center fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{ route('budget.store') }}" method="POST" class="modal-form-check"
                        style="font: 500 14px Narasi Sans, sans-serif">
                        @csrf
                        <div class="mb-3">
                            <label for="program_name" class="form-label">Program Name</label>
                            {{-- <input type="text " class="form-control" id="namaprogram " /> --}}
                            <select name="program_id" id="program_option" class="form-select ">
                                <option selected disabled>Select Program</option>
                                @forelse ($program as $program_id => $program_name)
                                    <option value="{{ $program_id }}">{{ $program_name }}</option>
                                @empty
                                    <option disabled selected>Data not found</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="quarter" class="form-label">Quarter</label>
                                {{-- <input type="text " class="form-control" id="quarter" /> --}}
                                <select name="quarter" id="quarter" class="form-select ">
                                    <option selected disabled>Choose One</option>
                                    <option value="1">Q1</option>
                                    <option value="2">Q2</option>
                                    <option value="3">Q3</option>
                                    <option value="4">Q4</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="budget_code" class="form-label">Budget Code</label>
                                <input type="text" class="form-control p-2" name="budget_code" id="budget_code" oninput="this.value = this.value.toUpperCase()" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="quarter_budget" class="form-label">Budget Quarter</label>
                            <input type="text" class="form-control" name="quarter_budget" id="quarter_budget"
                                name="budget" required />
                            <!-- Input field for entering the budget value -->
                            <input type="hidden" id="raw_budget" name="raw_budget" />
                            <!-- Hidden input field for storing the raw numeric value -->

                        </div>
                        <input type="hidden" id="employee_id" name="employee_id"
                            value="{{ Auth::user()->employee_id }}" />
                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('image/Narasi_Logo.svg') }}" alt=" " />
            </div>
        </div>
    </div>

    <!-- modal2 -->
    <div class="modal justify-content-center fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="" method="POST" class="modal-form-check"
                        style="font: 500 14px Narasi Sans, sans-serif" id="editBudgetForm">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="quarterly_budget_id" id="editQuarterlyBudgetId">
                        <div class="mb-3">
                            <label for="program_name" class="form-label">Program Name</label>
                            <select name="program_id" id="editProgramOption" class="form-select">
                                <option selected disabled>Select Program</option>
                                @forelse ($program as $program_id => $program_name)
                                    <option value="{{ $program_id }}">{{ $program_name }}</option>
                                @empty
                                    <option disabled selected>Data not found</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="quarter" class="form-label">Quarter</label>
                                <select name="quarter" id="editQuarter" class="form-select">
                                    <option selected disabled>Choose One</option>
                                    <option value="1">Q1</option>
                                    <option value="2">Q2</option>
                                    <option value="3">Q3</option>
                                    <option value="4">Q4</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="budget_code" class="form-label">Budget Code</label>
                                <input type="text" class="form-control p-2" name="budget_code" id="editBudgetCode">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="quarter_budget" class="form-label">Budget Quarter</label>
                            <input type="text" class="form-control" name="quarter_budget" id="editQuarterBudget"
                                required>
                            <!-- Input field for entering the budget value -->
                            <input type="hidden" id="edit_raw_budget" name="raw_budget" />
                            <!-- Hidden input field for storing the raw numeric value -->
                        </div>
                        <input type="hidden" id="employee_id" name="employee_id"
                            value="{{ Auth::user()->employee_id }}" />
                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('image/Narasi_Logo.svg') }}" alt="">
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#staticBackdrop').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var budgetInput = document.getElementById('quarter_budget');
            var rawBudgetInput = document.getElementById('raw_budget');

            budgetInput.addEventListener('keyup', function(e) {
                var formattedBudget = formatRupiah(this.value, 'Rp');
                budgetInput.value =
                    formattedBudget; // Update the budget input field with the formatted value
                var rawValue = parseRawBudget(formattedBudget); // Parse the raw numeric value
                rawBudgetInput.value = rawValue; // Store the raw numeric value in the hidden input field
            });

            /* Format budget input to Rupiah */
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

            /* Parse the raw budget value */
            function parseRawBudget(formattedBudget) {
                // Remove any non-numeric characters from the formatted budget value
                var rawValue = formattedBudget.replace(/[^\d]/g, '');
                return rawValue;
            }

            // This part is only needed if you have an edit functionality in the same page
            var editButtons = document.querySelectorAll('.edit-button');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var quarter = this.getAttribute('data-quarter');
                    var budgetCode = this.getAttribute('data-budget_code');
                    var programId = this.getAttribute('data-program_id');
                    var quarterBudget = this.getAttribute('data-quarter_budget');
                    var quarterlyBudgetId = this.getAttribute('data-quarterly_budget_id');
                    var formAction = "{{ route('budget.update', ':id') }}".replace(':id',
                        quarterlyBudgetId);

                    document.getElementById('program_option').value = programId;
                    document.getElementById('quarter').value = quarter;
                    document.getElementById('budget_code').value = budgetCode;
                    document.getElementById('quarter_budget').value = quarterBudget;
                    document.getElementById('quarterlyBudgetId').value = quarterlyBudgetId;

                    document.querySelector('.modal-form-check').action = formAction;
                });
            });
        });
    </script>
    <script>
        var budgetInput = document.getElementById('quarter_budget');
        var rawBudgetInput = document.getElementById('raw_budget');

        budgetInput.addEventListener('keyup', function(e) {
            var formattedBudget = formatRupiah(this.value, 'Rp');
            budgetInput.value = formattedBudget; // Update the budget input field with the formatted value
            var rawValue = parseRawBudget(formattedBudget); // Parse the raw numeric value
            rawBudgetInput.value = rawValue; // Store the raw numeric value in the hidden input field
        });

        /* Dengan Rupiah */
        var budgettahunan = document.getElementById('quarter_budget');
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

        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('.edit-button');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var quarter = this.getAttribute('data-quarter');
                    var year = this.getAttribute('data-year');
                    var budgetCode = this.getAttribute('data-budget_code');
                    var programId = this.getAttribute('data-program_id');
                    var quarterBudget = this.getAttribute('data-quarter_budget');
                    var quarterlyBudgetId = this.getAttribute('data-quarterly_budget_id');
                    var formAction = "{{ route('budget.update', ':id') }}".replace(':id',
                        quarterlyBudgetId);

                    document.getElementById('editProgramOption').value = programId;
                    document.getElementById('editQuarter').value = quarter;
                    document.getElementById('editBudgetCode').value = budgetCode;
                    document.getElementById('editQuarterBudget').value = quarterBudget;
                    document.getElementById('editQuarterlyBudgetId').value = quarterlyBudgetId;

                    document.getElementById('editBudgetForm').action = formAction;
                });
            });
        });
    </script>
    <script>
        var budgetInput = document.getElementById('editQuarterBudget');
        var rawBudgetInput = document.getElementById('edit_raw_budget');

        budgetInput.addEventListener('keyup', function(e) {
            var formattedBudget = formatRupiah(this.value, 'Rp');
            budgetInput.value = formattedBudget; // Update the budget input field with the formatted value
            var rawValue = parseRawBudget(formattedBudget); // Parse the raw numeric value
            rawBudgetInput.value = rawValue; // Store the raw numeric value in the hidden input field
        });

        /* Dengan Rupiah */
        var budgettahunan = document.getElementById('editQuarterBudget');
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
@endsection
