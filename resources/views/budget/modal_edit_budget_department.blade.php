<div class="modal justify-content-center fade" id="modal-edit-budget-department-{{ $budgetYearly->department_yearly_budget_id}}" data-bs-keyboard="false"
tabindex="-1 " aria-labelledby="staticBackdropLabel " aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body bg-white">
            <form action="{{ route('budget.department.update', $budgetYearly->department_yearly_budget_id) }}" method="POST" class=" " id="mainForm" style="font:Narasi Sans, sans-serif">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                    <div class="col ">
                        <label for="namaprogram " class="form-label">Budget Name</label>
                        <input type="text" class="form-control p-2" id="budgetname" name="budget_name" value="{{ $budgetYearly->budget_name }}" oninput="this.value = this.value.toUpperCase()" />
                    </div>
                    <div class="col">
                        <label for="department_option" class="form-label">Department</label>
                        <select name="department_id"  class="selectize" id="department_option" required>
                            @foreach ($departments as $department)
                                @if ($department->department_id == $budgetYearly->department_id)
                                <option value="{{ $department->department_id }}" selected="selected">{{ $department->department_name }}</option>
                                @else
                                <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
                                @endif
                                @endforeach
                        </select>
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="year" class="form-label">Year</label>
                        {{-- <select class="year selectize"  name="year">
                            <option style="color: rgb(189, 189, 189);">Choose Year</option>
                        </select> --}}

                        <select class="year selectize" name="year">
                            @for ($year = date('Y') - 2; $year <= date('Y') + 10; $year++)
                                <option value="{{ $year }}" {{ $year == old('year', $budgetYearly->year) ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endfor
                        </select>
                    </div>



                    <div class="col">
                        <label for="kodebudget" class="form-label">Budget Code</label>
                        <input type="text " class="form-control p-2" id="kodebudget" name="budget_code"  value="{{ $budgetYearly->budget_code }}" oninput="this.value = this.value.toUpperCase()"/>
                    </div>

                </div>

                {{-- <div class="mb-3">
                    <label for="budgetyearly" class="form-label">Budget Yearly</label>
                    <input type="text" class="form-control p-2" id="edit_formatted_budget_yearly" name="formatted_budget_yearly"
                           value="Rp. {{ number_format($budgetYearly->budget_yearly, 0, ',', '.') }}" oninput="formatInput(this)" />
                    <input type="hidden" id="edit_budget_yearly" name="budget_yearly"
                           class="@error('budget_yearly') is-invalid @enderror" value="{{ $budgetYearly->budget_yearly }}" />
                    @error('budget_yearly')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <label for="budgetyearly_{{ $budgetYearly->department_yearly_budget_id }}" class="form-label">Budget Yearly</label>

                    <!-- Tampilkan nilai yang sudah terformat pada input yang terlihat oleh user -->
                    <input
                        type="text"
                        class="form-control p-2 formatted_budget_yearly"
                        id="edit_formatted_budget_yearly_{{ $budgetYearly->department_yearly_budget_id }}"
                        name="formatted_budget_yearly"
                        value="{{ old('formatted_budget_yearly', 'Rp ' . number_format($budgetYearly->budget_yearly, 0, ',', '.')) }}"
                    />

                    <!-- Input hidden untuk menyimpan nilai raw tanpa format -->
                    <input
                        type="hidden"
                        id="edit_budget_yearly_{{ $budgetYearly->department_yearly_budget_id }}"
                        name="budget_yearly"
                        value="{{ old('budget_yearly', $budgetYearly->budget_yearly) }}"
                        class="budget_yearly @error('budget_yearly') is-invalid @enderror"
                    />

                    <!-- Error feedback -->
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


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Pasang event listener pada semua input dengan class 'formatted_budget_yearly'
    var formattedBudgetInputs = document.querySelectorAll('.formatted_budget_yearly');

    formattedBudgetInputs.forEach(function(budgetYearlyInput) {
        budgetYearlyInput.addEventListener('keyup', function(e) {
            var formattedBudget = formatRupiah(this.value, 'Rp');
            this.value = formattedBudget; // Update the input field with the formatted value

            // Cari hidden input yang sesuai dengan input ini dan update raw value
            var rawBudgetInputId = this.id.replace('edit_formatted_', 'edit_');
            var rawBudgetInput = document.getElementById(rawBudgetInputId);
            rawBudgetInput.value = parseRawBudget(formattedBudget);
        });

        // Format nilai saat halaman pertama kali di-load
        var initialValue = budgetYearlyInput.value;
        if (initialValue) {
            var formattedInitialValue = formatRupiah(initialValue, 'Rp');
            budgetYearlyInput.value = formattedInitialValue; // Set formatted value on page load
        }
    });
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
