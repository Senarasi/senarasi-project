@extends('layout.index')

@section('title')
    Budget - Budgeting System
@endsection

@section('content')
    <div class="judulhalaman" style="display: flex; align-items: center">
        Input Budget Department Narasi
    </div>


    <div class="tab-content" id="myTabContent" >
        <div style="display: flex; justify-content: space-between">
            <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#modal-add-budget-department">
                Input Budget
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white" />
                </svg>
            </button>

            <button type="button" class="button-bro" data-bs-toggle=" modal " data-bs-target="#none">
                Import File
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path
                        d="M0 2C0 0.896875 0.896875 0 2 0H7V4C7 4.55313 7.44687 5 8 5H12V9.5H5.5C4.39688 9.5 3.5 10.3969 3.5 11.5V16H2C0.896875 16 0 15.1031 0 14V2ZM12 4H8V0L12 4ZM6.25 11H6.75C7.44063 11 8 11.5594 8 12.25V12.5C8 12.775 7.775 13 7.5 13C7.225 13 7 12.775 7 12.5V12.25C7 12.1125 6.8875 12 6.75 12H6.25C6.1125 12 6 12.1125 6 12.25V14.75C6 14.8875 6.1125 15 6.25 15H6.75C6.8875 15 7 14.8875 7 14.75V14.5C7 14.225 7.225 14 7.5 14C7.775 14 8 14.225 8 14.5V14.75C8 15.4406 7.44063 16 6.75 16H6.25C5.55937 16 5 15.4406 5 14.75V12.25C5 11.5594 5.55937 11 6.25 11ZM10.4094 11H11.5C11.775 11 12 11.225 12 11.5C12 11.775 11.775 12 11.5 12H10.4094C10.1844 12 10 12.1844 10 12.4094C10 12.5719 10.0937 12.7188 10.2437 12.7844L11.4125 13.3031C11.9219 13.5281 12.25 14.0344 12.25 14.5906C12.25 15.3687 11.6187 16 10.8406 16H9.5C9.225 16 9 15.775 9 15.5C9 15.225 9.225 15 9.5 15H10.8406C11.0656 15 11.25 14.8156 11.25 14.5906C11.25 14.4281 11.1563 14.2812 11.0063 14.2156L9.8375 13.6969C9.32812 13.4719 9 12.9656 9 12.4094C9 11.6313 9.63125 11 10.4094 11ZM13.5 11C13.775 11 14 11.225 14 11.5V12.4875C14 13.2063 14.1719 13.9125 14.5 14.55C14.8281 13.9156 15 13.2094 15 12.4875V11.5C15 11.225 15.225 11 15.5 11C15.775 11 16 11.225 16 11.5V12.4875C16 13.5719 15.6781 14.6344 15.075 15.5375L14.9156 15.7781C14.8219 15.9187 14.6656 16 14.5 16C14.3344 16 14.1781 15.9156 14.0844 15.7781L13.925 15.5375C13.3219 14.6344 13 13.5719 13 12.4875V11.5C13 11.225 13.225 11 13.5 11Z"
                        fill="#4A25AA" />
                </svg>
            </button>
        </div>

        <div class="tablenih">
            <div class="table-responsive p-2">
                <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px;">
                <thead class="table-light">
                        <tr class="dicobain">
                            {{-- <th scope="col" class="col-1">No</th> --}}
                            <th scope="col ">Budget Code</th>
                            <th scope="col ">Year</th>
                            <th scope="col ">Department</th>
                            <th scope="col ">Budget Name</th>
                            <th scope="col ">Budget Yearly</th>
                            <th scope="col ">Budget Monthly</th>
                            <th scope="col ">Remaining Budget</th>
                            <th scope="col " style="width: 200px"></th>
                        </tr>
                    </thead>
                    <tbody style="">
                        @foreach ($departmentYearlyBudgets as $budgetYearly)
                        <tr>
                            {{-- <th scope="row ">1</th> --}}
                            <td>{{ $budgetYearly->budget_code }}</td>
                            <td>{{ $budgetYearly->year }}</td>
                            <td>{{ $budgetYearly->department->department_name}}</td>
                            <td>{{ $budgetYearly->budget_name }}</td>
                            <td style="text-transform:none">{{ 'Rp ' . number_format($budgetYearly->budget_yearly, 0, ',', '.') }}</td>
                            <td style="text-transform:none">{{ 'Rp ' . number_format($budgetYearly->budget_monthly, 0, ',', '.') }}</td>
                            <td style="text-transform:none">{{ 'Rp ' . number_format($budgetYearly->remaining_budget, 0, ',', '.') }}</td>

                            <td>
                                <span style="display: flex; gap: 8px; justify-content: center">
                                    <a type="button " class="uwuq" data-bs-toggle="modal" data-bs-target="#modal-edit-budget-department-{{ $budgetYearly->department_yearly_budget_id}}" >Edit</a>

                                    <form method="POST" action="{{ route('budget.department.destroy', $budgetYearly->department_yearly_budget_id )}}" class="" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </span>
                            </td>
                            @include('budget.modal_edit_budget_department', ['data' => $budgetYearly])
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('modal')
    <!-- Modal add -->
    <div class="modal justify-content-center fade" id="modal-add-budget-department" data-bs-keyboard="false"
        tabindex="-1 " aria-labelledby="staticBackdropLabel " aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{ route('budget.department.store') }}" method="POST" class=" " id="mainForm" style="font:Narasi Sans, sans-serif">
                        @csrf
                        <div class="row mb-3">
                            <div class="col ">
                                <label for="namaprogram " class="form-label">Budget Name</label>
                                <input type="text" class="form-control p-2  @error('budget_name') is-invalid @enderror" id="budgetname" name="budget_name" oninput="this.value = this.value.toUpperCase()" />
                                @error('budget_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="department_option" class="form-label">Department</label>
                                <select name="department_id"  class="selectize" id="department_option" required>
                                    <option disabled selected>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="year" class="form-label">Year</label>
                                <select class="year selectize"  name="year">
                                    <option style="color: rgb(189, 189, 189);">Choose Year</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="kodebudget" class="form-label">Budget Code</label>
                                <input type="text " class="form-control p-2  @error('budget_code') is-invalid @enderror" id="kodebudget" name="budget_code" oninput="this.value = this.value.toUpperCase()"/>
                            </div>
                            @error('budget_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="budgetyearly" class="form-label">Budget Yearly</label>
                            <input type="text" class="form-control p-2" id="formatted_budget_yearly" name="formatted_budget_yearly" />
                            <input type="hidden" id="budget_yearly" name="budget_yearly" class="@error('budget_yearly') is-invalid @enderror" />
                            @error('budget_yearly')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <button type="submit " class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')}} " alt=" " />
            </div>
        </div>
    </div>

    <!-- Modal alert -->
    @include('layout.alert')

@endsection

@section('custom-js')
<script>
    $(document).ready(function () {
  $('.selectize').selectize({
    placeholder: "Type to search...",
            allowClear: true,
            create: false
  });
});
</script>
<script>
    const addYearOptions = () => {
        const yearSelects = document.querySelectorAll('.year');
        const currentYear = new Date().getFullYear();
        const startYear = currentYear - 2; // Tahun saat ini - 2 tahun
        const endYear = currentYear + 10; // Tahun saat ini + 10 tahun

        yearSelects.forEach(yearSelect => {
            for (let year = startYear; year <= endYear; year++) {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                yearSelect.appendChild(option);
            }
        });
    };

    addYearOptions();
</script>


{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const tabButtons = document.querySelectorAll('.nav-link.tablinks');

        tabButtons.forEach(button => {
            // Set initial color for inactive tabs
            if (!button.classList.contains('active')) {
                button.style.color = '#4a25aa';

            } else {

                button.style.backgroundColor = '';
                button.style.color = 'black';
            }

            button.addEventListener('click', function() {
                // Remove active class and reset styles from all buttons
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.style.color = '#4aa25a';
                    btn.style.backgroundColor = '';


                });

                // Add active class and styles to the clicked button
                button.classList.add('active');
                button.style.backgroundColor = '';
                button.style.color = 'black';


                const targetUrl = button.getAttribute('data-url');
                // Redirect to the URL specified in the data-url attribute
                window.location.href = targetUrl;
            });
        });
    });
</script> --}}
{{-- <script>
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
</script> --}}

<script>
    var budgetYearlyInput = document.getElementById('formatted_budget_yearly');
    var rawBudgetInput = document.getElementById('budget_yearly');

    budgetYearlyInput.addEventListener('keyup', function(e) {
        var formattedBudget = formatRupiah(this.value, 'Rp');
        budgetYearlyInput.value = formattedBudget; // Update the input field with the formatted value

        // Set the raw numeric value to the hidden input
        rawBudgetInput.value = parseRawBudget(formattedBudget);
    });

    /* Fungsi formatRupiah */
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
        return formattedBudget.replace(/[^\d]/g, '');
    }
</script>



    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this data?');
        }
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
