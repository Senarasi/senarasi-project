<div class="modal justify-content-center fade" id="modal-edit-budget-department" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body bg-white">
                <form method="POST" id="mainForm" style="font: Narasi Sans, sans-serif">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="namaprogram" class="form-label">Budget Name</label>
                            <input type="text" class="form-control p-2" id="budgetname" name="budget_name" value="Example Budget Name" />
                        </div>
                        <div class="col">
                            <label for="department_option" class="form-label">Department</label>
                            <select name="department_id" class="selectize" id="department_option" required>
                                <!-- Static department options -->
                                <option value="1" selected="selected">Department 1</option>
                                <option value="2">Department 2</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="year" class="form-label">Year</label>
                            <select class="year selectize" name="year">
                                <option value="2022">2022</option>
                                <option value="2023" selected>2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="kodebudget" class="form-label">Budget Code</label>
                            <input type="text" class="form-control p-2" id="kodebudget" name="budget_code" value="BUDG123" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="budgetyearly" class="form-label">Budget Yearly</label>
                        <input
                            type="text"
                            class="form-control p-2 formatted_budget_yearly"
                            id="edit_formatted_budget_yearly"
                            name="formatted_budget_yearly"
                            value="Rp 1.000.000"
                        />
                        <input
                            type="hidden"
                            id="edit_budget_yearly"
                            name="budget_yearly"
                            value="1000000"
                            class="budget_yearly"
                        />
                    </div>

                    <button type="submit" class="button-submit">Submit</button>
                    <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
            <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')}} " alt=" " />
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var formattedBudgetInputs = document.querySelectorAll('.formatted_budget_yearly');
    formattedBudgetInputs.forEach(function(budgetYearlyInput) {
        budgetYearlyInput.addEventListener('keyup', function(e) {
            var formattedBudget = formatRupiah(this.value, 'Rp');
            this.value = formattedBudget;
            var rawBudgetInput = document.getElementById('edit_budget_yearly');
            rawBudgetInput.value = parseRawBudget(formattedBudget);
        });

        var initialValue = budgetYearlyInput.value;
        if (initialValue) {
            var formattedInitialValue = formatRupiah(initialValue, 'Rp');
            budgetYearlyInput.value = formattedInitialValue;
        }
    });
});

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
    return formattedBudget.replace(/[^\d]/g, '');
}
</script>
