<div class="modal justify-content-center fade" id="modal2-{{ $quarterlyBudget->quarterly_budget_id }}" data-bs-backdrop="static"
    data-bs-keyboard="false " tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body bg-white">
                <form action="{{ route('budget.update', $quarterlyBudget->quarterly_budget_id) }}" method="POST"
                    class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif">
                    @csrf
                    @method('PUT')
                    <fieldset disabled>
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">User</label>
                            <input type="text" id="employee_id" class="form-control" name="employee_id"
                                value="{{ $quarterlyBudget->employee->full_name }}" placeholder="" readonly />
                        </div>
                    </fieldset>
                    <div class="mb-3">
                        <label for="namaprogram " class="form-label">Nama Program</label>
                        {{-- <input type="text " class="form-control" id="namaprogram " /> --}}
                        <select id="namaprogram" class="selectize">
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
                            <select id="quarter" class="selectize">
                                <option style="color: rgb(189, 189, 189) ">Choose One</option>
                                <option>Q1</option>
                                <option>Q2</option>
                                <option>Q3</option>
                                <option>Q4</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="budget_code" class="form-label">Budget Code</label>
                        <input type="text " class="form-control" id="budget_code" name="budget_code"
                            value="{{ $quarterlyBudget->budget_code }}" />
                        </div>
                    </div>
                    {{-- <div class="mb-3 ">
                            <label for="departemen " class="form-label ">Kategori</label>
                            <select id="departemen " class="form-select ">
                                <option style="color: rgb(189, 189, 189) ">Choose One</option>
                                <option>REGULAR</option>
                                <option>EVENT</option>
                            </select>
                        </div> --}}
                    {{-- <div class="mb-3">
                        @foreach ($data->yearlyBudgets as $yearly)
                            <label for="budget" class="form-label">Budget Tahunan</label>
                            <input type="text" class="form-control" id="budget" name="budget"
                                value="{{ $yearly->budget_amount }}" required />
                            <!-- Input field for entering the budget value -->
                            <input type="hidden" id="raw_budget" name="raw_budget"
                                value="{{ $yearly->budget_amount }}" />
                            <!-- Hidden input field for storing the raw numeric value -->
                        @endforeach
                    </div> --}}
                    <button type="submit " class="button-submit">Submit</button>
                    <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
            <img class="img-8" src="{{ asset('image/Narasi_Logo.svg') }}" alt=" " />
        </div>
    </div>
</div>
