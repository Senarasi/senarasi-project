<div class="modal justify-content-center fade" id="edit-payment-item-{{ $item->department_request_payment_item_id}}" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-body bg-white">
            <form action="{{ route('request-budget-department.payment.description.update', $item->department_request_payment_item_id)}}" method="POST" class="modal-form-check"
            style="font: 500 14px Narasi Sans, sans-serif">
            @csrf
            @method("PATCH")
            <input type="hidden" class="form-control" id="desc" name="department_request_payment_id" value="{{ $departmentRequestPayment->department_request_payment_id }}"/>
            <div class="row">
                <div class="col mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <input type="text" class="form-control" id="desc" name="description"  style="padding: 8px" value="{{ $item->description }}" required/>
                </div>

            </div>

            <div class="mb-3">
                <label for="edit_formatted_amount_{{ $item->department_request_payment_item_id }}" class="form-label">Amount</label>

                <!-- Tampilkan nilai yang sudah terformat pada input yang terlihat oleh user -->
                <input
                    type="text"
                    class="form-control p-2 formatted_amount"
                    id="edit_formatted_amount_{{ $item->department_request_payment_item_id }}"
                    name="formatted_amount"
                    value="{{ old('formatted_amount', 'Rp ' . number_format($item->amount, 0, ',', '.')) }}"
                />

                <!-- Input hidden untuk menyimpan nilai raw tanpa format -->
                <input
                    type="hidden"
                    id="edit_amount_{{ $item->department_request_payment_item_id }}"
                    name="amount"
                    value="{{ old('amount', $item->amount) }}"
                    class="amount @error('amount') is-invalid @enderror"
                />
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <textarea type="text"  class="form-control" id="note" name="note" cols="30" rows="2">{{ $item->note }}</textarea>
                </div>
            </div>
            <button type="submit" class="button-submit">Submit</button>
            <button type="button" class="button-tutup" data-bs-dismiss="modal" >Close</button>
        </form>
        </div>
        <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg') }}" alt=" " />
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Pasang event listener pada semua input dengan class 'formatted_budget_yearly'
        var formattedAmountInputs = document.querySelectorAll('.formatted_amount');

        formattedAmountInputs.forEach(function(AmountInput) {
            AmountInput.addEventListener('keyup', function(e) {
                var formattedAmount = formatRupiah(this.value, 'Rp');
                this.value = formattedAmount; // Update the input field with the formatted value

                // Cari hidden input yang sesuai dengan input ini dan update raw value
                var amountInputId = this.id.replace('edit_formatted_', 'edit_');
                var amountInput = document.getElementById(amountInputId);
                amountInput.value = parseAmount(formattedAmount);
            });

            // Format nilai saat halaman pertama kali di-load
            var initialValue = AmountInput.value;
            if (initialValue) {
                var formattedInitialValue = formatRupiah(initialValue, 'Rp');
                AmountInput.value = formattedInitialValue; // Set formatted value on page load
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

    function parseAmount(formattedAmount) {
        // Remove any non-numeric characters from the formatted budget value
        return formattedAmount.replace(/[^\d]/g, '');
    }
    </script>
