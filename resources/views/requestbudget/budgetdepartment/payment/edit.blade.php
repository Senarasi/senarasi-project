@extends('layout.index')

@section('title')
    Create Request Payment - Budgeting System
@endsection
@section('costum-css')
<style>

</style>
@endsection
@section('content')
    <a href="{{ route('request-budget-department.payment.index') }}" class="navback" style="text-decoration: none;">
            <svg xmlns="http://www.w3.org/2000/svg " width="10 " height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                                                  7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back
    </a>
    <!--blablabla -->
    <div class="judulhalaman" style="text-align: start">Payment Request</div>

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 24px; font: 600 18px Narasi Sans, sans-serif;">
        <li class="nav-item" role="presentation" style="flex: 1; text-align: center;">
            <button class="nav-link active tablinks" id="data5-tab" data-url="{{ route('request-budget-department.payment.edit', $departmentRequestPayment->department_request_payment_id) }}"
                data-bs-toggle="tab" data-bs-target="#data5-tab-pane" type="button" role="tab"
                aria-controls="data1-tab-pane" aria-selected="false" style="width: 100%; letter-spacing: 0.5px;">GENERAL</button>
        </li>

        <li class="nav-item" role="presentation"  style="flex: 1; text-align: center;">
            <button class="nav-link tablinks" id="preview-tab" data-url="{{ route('request-budget-department.payment.description', $departmentRequestPayment->department_request_payment_id) }}"
                data-bs-toggle="tab" data-bs-target="#preview-tab-pane" type="button" role="tab"
                aria-controls="preview-tab-pane" aria-selected="true" style="width: 100%; letter-spacing: 0.5px; color: #4a25aa; letter-spacing: 0.5px; font-weight: 300 ">DESCRIPTION
            </button>
        </li>
    </ul>


    <div class="tab-content" id="myTabContent" style="margin-top: 24px">
        <!-- home -->
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <form action="{{ route('request-budget-department.payment.update', $departmentRequestPayment->department_request_payment_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH') <!-- Method PUT untuk update data -->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col mb-3">
                        <label for="department_id" class="form-label">Department</label>
                        <select id="department_id" name="department_id" class="selectize">
                            <option disabled>Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->department_id }}" {{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->department_id == $department->department_id ? 'selected' : '' }}>
                                    {{ $department->department_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col mb-3">
                        <label for="budget_name" class="form-label">Budget Name</label>
                        <select id="budget_name" name="department_yearly_budget_id" class="selectize">
                            <option disabled>Select Budget</option>
                            @foreach ($departmentYearlyBudgets as $YearlyBudget)
                            @if ($departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->department_id == $YearlyBudget->department_id )
                            <option value="{{ $YearlyBudget->department_yearly_budget_id }}" {{ $departmentRequestPayment->departmentMonthlyBudget->department_yearly_budget_id == $YearlyBudget->department_yearly_budget_id ? 'selected' : '' }}>
                                {{ $YearlyBudget->budget_name }}
                            </option>
                            @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="col mb-3">
                        <label for="Select" class="form-label">Select Month</label>
                        <select name="month" id="month" class="form-select">
                            <option disabled>Choose One</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $departmentRequestPayment->departmentMonthlyBudget->month == $i ? 'selected' : '' }}>
                                    {{ strtoupper(DateTime::createFromFormat('!m', $i)->format('F')) }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="budget_code" class="form-label">Budget Code</label>
                        <input type="text" class="form-control" id="budget_code" value="{{ $departmentRequestPayment->departmentMonthlyBudget->budget_code }}" disabled />
                        <input type="hidden" class="form-control" name="department_monthly_budget_id" id="department_monthly_budget_id" value="{{ $departmentRequestPayment->department_monthly_budget_id }}"/>
                    </div>

                    <div class="col mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $departmentRequestPayment->date }}" />
                    </div>

                    <div class="col mb-3">
                        <label for="companypayment" class="form-label">Paid To</label>
                        <input type="text" class="form-control" id="companypayment" name="paid_to" value="{{ $departmentRequestPayment->paid_to }}"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="paidvia" class="form-label">Paid Via</label>
                        <select id="producer_id" name="paid_via" class="selectize">
                            <option disabled>Choose One</option>
                            <option value="transfer" {{ $departmentRequestPayment->paid_via == 'transfer' ? 'selected' : '' }}>Transfer</option>
                            <option value="Virtual Account" {{ $departmentRequestPayment->paid_via == 'Virtual Account' ? 'selected' : '' }}>Virtual Account</option>
                            <option value="cash" {{ $departmentRequestPayment->paid_via == 'cash' ? 'selected' : '' }}>Cash</option>
                        </select>
                    </div>

                    <div class="col mb-3">
                        <label for="bank" class="form-label">Bank</label>
                        <select id="bank" name="bank_name" class="selectize">
                            <option disabled>Choose One</option>
                            <option value="Bank Central Asia (BCA)" {{ $departmentRequestPayment->bank_name == 'Bank Central Asia (BCA)' ? 'selected' : '' }}>Bank Central Asia (BCA)</option>
                            <option value="Bank Rakyat Indonesia (BRI)" {{ $departmentRequestPayment->bank_name == 'Bank Rakyat Indonesia (BRI)' ? 'selected' : '' }}>Bank Rakyat Indonesia (BRI)</option>
                            <option value="Bank Mandiri" {{ $departmentRequestPayment->bank_name == 'Bank Mandiri' ? 'selected' : '' }}>Bank Mandiri</option>
                            <option value="Bank Negara Indonesia (BNI)" {{ $departmentRequestPayment->bank_name == 'Bank Negara Indonesia (BNI)' ? 'selected' : '' }}>Bank Negara Indonesia (BNI)</option>
                            <option value="Bank Syariah Indonesia (BSI)" {{ $departmentRequestPayment->bank_name == 'Bank Syariah Indonesia (BSI)' ? 'selected' : '' }}>Bank Syariah Indonesia (BSI)</option>
                            <option value="Bank Danamon" {{ $departmentRequestPayment->bank_name == 'Bank Danamon' ? 'selected' : '' }}>Bank Danamon</option>
                            <option value="Bank CIMB Niaga" {{ $departmentRequestPayment->bank_name == 'Bank CIMB Niaga' ? 'selected' : '' }}>Bank CIMB Niaga</option>
                            <option value="Bank Tabungan Negara (BTN)" {{ $departmentRequestPayment->bank_name == 'Bank Tabungan Negara (BTN)' ? 'selected' : '' }}>Bank Tabungan Negara (BTN)</option>
                            <option value="Bank Permata" {{ $departmentRequestPayment->bank_name == 'Bank Permata' ? 'selected' : '' }}>Bank Permata</option>
                            <option value="Bank OCBC NISP" {{ $departmentRequestPayment->bank_name == 'Bank OCBC NISP' ? 'selected' : '' }}>Bank OCBC NISP</option>
                            <option value="Bank Mega" {{ $departmentRequestPayment->bank_name == 'Bank Mega' ? 'selected' : '' }}>Bank Mega</option>
                            <option value="Bank Sinarmas" {{ $departmentRequestPayment->bank_name == 'Bank Sinarmas' ? 'selected' : '' }}>Bank Sinarmas</option>
                            <option value="Bank Panin" {{ $departmentRequestPayment->bank_name == 'Bank Panin' ? 'selected' : '' }}>Bank Panin</option>
                            <option value="Bank UOB Indonesia" {{ $departmentRequestPayment->bank_name == 'Bank UOB Indonesia' ? 'selected' : '' }}>Bank UOB Indonesia</option>
                            <option value="Bank Maybank Indonesia" {{ $departmentRequestPayment->bank_name == 'Bank Maybank Indonesia' ? 'selected' : '' }}>Bank Maybank Indonesia</option>
                            <option value="Bank Commonwealth" {{ $departmentRequestPayment->bank_name == 'Bank Commonwealth' ? 'selected' : '' }}>Bank Commonwealth</option>
                            <!-- Tambahkan bank lainnya -->
                        </select>
                    </div>

                    <div class="col mb-3">
                        <label for="bank_account" class="form-label">Bank Account Name</label>
                        <input type="text" class="form-control" id="account_name" name="account_name" value="{{  $departmentRequestPayment->account_name }}" />
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="companypayment" class="form-label">Virtual Account</label>
                        <input type="text" class="form-control" id="companypayment" name="account_number" value="{{  $departmentRequestPayment->account_number }}"/>
                    </div>

                    <div class="col mb-3">
                        <label for="document_number" class="form-label">No. Document / No. Invoice</label>
                        <input type="text" class="form-control" id="document_number" name="document_number" value="{{  $departmentRequestPayment->document_number }}" />
                    </div>

                    <div class="col mb-3">
                        <label for="formFile" class="form-label">Upload File (pdf, jpg, png, jpeg)</label>
                        <a target="_blank" href="{{ $departmentRequestPayment->fileDocument() }}" class="fst-italic">view current file</a>
                        <input class="form-control" type="file" id="formFile" name="file_invoice" accept=".pdf, .jpg, .jpeg, .png">


                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="note" class="form-label">Note</label>
                        <textarea class="form-control" id="note" name="note" cols="30" rows="3">{{  $departmentRequestPayment->note }}</textarea>
                    </div>
                </div>

                <button type="submit" class="button-departemen"
                    style="justify-content: center; align-items: center; display: flex; gap: 16px; text-decoration: none; width: fit-content; margin-top: 16px" id="nextButton">Next
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

@section('modal')
    @include('layout.alert')
@endsection

@section('custom-js')
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
<script>
    $(document).ready(function () {
        $('.selectize').selectize({
            placeholder: "Type to search...",
            allowClear: true,
            create: false // Enable creation of new items
        });
    });
</script>


<script>
    $(document).ready(function() {
        // Inisialisasi Selectize
        var $budgetSelect = $('#budget_name').selectize();
        var selectize = $budgetSelect[0].selectize; // Ambil instance Selectize

        $('#department_id').change(function() {
            var departmentId = $(this).val();

            // Clear the budget_name dropdown
            selectize.clear(); // Clear previous selections
            selectize.clearOptions(); // Clear existing options

            // Tambahkan opsi default
            selectize.addOption({ value: '', text: 'Choose One' }); // Add default option

            if (departmentId) {
                $.ajax({
                    url: '/budgeting-system/request-budget-department/payment/get-budget-names/' + departmentId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data); // Debug response

                        // Check if data is not empty
                        if (data.length > 0) {
                            $.each(data, function(index, budget) {
                                // Tambahkan opsi ke Selectize
                                selectize.addOption({ value: budget.department_yearly_budget_id, text: budget.budget_name });
                            });
                        } else {
                            selectize.addOption({ value: '', text: 'No budgets available' });
                        }

                        // Update dropdown untuk menampilkan opsi baru
                        selectize.refresh(); // Coba gunakan ini
                    },
                    error: function(xhr, status, error) {
                        console.error('Error retrieving budgets:', error); // Log error
                        alert('Error retrieving budgets. Please try again later.');
                    }
                });
            }
        });

        // Update Budget Code based on selections
        $('#budget_name').change(updateBudgetCode);
        $('#month').change(updateBudgetCode);

        function updateBudgetCode() {
            var budgetId = $('#budget_name').val();
            var month = $('#month').val();

            if (budgetId && month) {
                $.ajax({
                    url: '/budgeting-system/request-budget-department/payment/get-budget-code', // Adjust the URL to your endpoint
                    type: 'GET',
                    data: {
                        department_yearly_budget_id: budgetId,
                        month: month
                    },
                    success: function(data) {
                        $('#budget_code').val(data.budget_code); // Assuming the response has a 'budget_code' field
                        $('#department_monthly_budget_id').val(data.department_monthly_budget_id); // Assuming the response has a 'budget_code' field
                    },
                    error: function(xhr, status, error) {
                        console.error('Error retrieving budget code:', error);
                        $('#budget_code').val(''); // Clear the field on error
                    }
                });
            } else {
                $('#budget_code').val(''); // Clear the field if any selection is missing
            }
        }
    });


</script>


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


@endsection
