@extends('layout.index')

@section('title')
    Employee Narasi
@endsection
@section('content')
    <div class="container">
        <h2>Insert New Record</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('audit_laptop.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="employee_id" class="form-label">Employee</label>
                    <select id="employee_option" name="employee_id">
                        <option disabled selected>Choose One</option>
                        @forelse ($users as $user)
                            <option value="{{ $user->employee_id }}">{{ $user->full_name }}</option>
                        @empty
                            <option disabled>Data not found</option>
                        @endforelse
                    </select>
                </div>
                <div class="mb-3">
                    <label for="laptop_number">Laptop Number</label>
                    <input type="text" name="laptop_number" id="laptop_number" class="form-control" required>
                </div>
            </div>

            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="serial_number">Serial Number</label>
                    <input type="text" name="serial_number" id="serial_number" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="no_asset">No Asset</label>
                    <input type="text" name="no_asset" id="no_asset" class="form-control" required>
                </div>
            </div>


            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="processor" class="form-label">Processor</label>
                    <select id="processor" name="processor" class="form-select"
                        onchange="toggleOtherInput(this, 'processor_other')">
                        <option disabled selected>Choose One</option>
                        <option value="CORE I3">CORE I3</option>
                        <option value="CORE I5">CORE I5</option>
                        <option value="CORE I7">CORE I7</option>
                        <option value="RYZEN 5">RYZEN 5</option>
                        <option value="RYZEN 7">RYZEN 7</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="text" id="processor_other" name="processor_other" class="form-control mt-2"
                        placeholder="Enter custom processor" style="display: none;" oninput="this.value = this.value.toUpperCase();">
                </div>

                <div class="mb-3">
                    <label for="ram">RAM</label>
                    <select id="ram" name="ram" class="form-select"
                        onchange="toggleOtherInput(this, 'ram_other')">
                        <option disabled selected>Choose One</option>
                        <option value="4GB">4GB</option>
                        <option value="8GB">8GB</option>
                        <option value="12GB">12GB</option>
                        <option value="16GB">16GB</option>
                        <option value="32GB">32GB</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="text" id="ram_other" name="ram_other" class="form-control mt-2"
                        placeholder="Enter custom RAM size" style="display: none;" oninput="this.value = this.value.toUpperCase();">
                </div>
            </div>

            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="ssd">SSD</label>
                    <select id="ssd" name="ssd" class="form-select"
                        onchange="toggleOtherInput(this, 'ssd_other')">
                        <option disabled selected>Choose One</option>
                        <option value="256GB">256GB</option>
                        <option value="512GB">512GB</option>
                        <option value="1TB">1TB</option>
                        <option value="2TB">2TB</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="text" id="ssd_other" name="ssd_other" class="form-control mt-2"
                        placeholder="Enter custom SSD size" style="display: none;" oninput="this.value = this.value.toUpperCase();">
                </div>

                <div class="mb-3">
                    <label for="charger">Charger</label>
                    <input type="text" name="charger" id="charger" class="form-control" required>
                </div>
            </div>

            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="battery">Battery</label>
                    <input type="text" name="battery" id="battery" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="layar">Layar</label>
                    <input type="text" name="layar" id="layar" class="form-control" required>
                </div>
            </div>

            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="keyboard">Keyboard</label>
                    <input type="text" name="keyboard" id="keyboard" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="body">Body</label>
                    <input type="text" name="body" id="body" class="form-control" required>
                </div>
            </div>

            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="speaker">Speaker</label>
                    <input type="text" name="speaker" id="speaker" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="kamera">Kamera</label>
                    <input type="text" name="kamera" id="kamera" class="form-control" required>
                </div>
            </div>

            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="lainnya">Lainnya</label>
                    <input type="text" name="lainnya" id="lainnya" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="picture" class="form-label">Take Picture</label>
                    <input type="file" id="picture" name="picture" class="form-control" accept="image/*" capture="environment">
                    <input type="file" name="image" accept="image/*" capture="camera">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection
@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#employee_option').selectize({
                placeholder: "Type to search...", // Placeholder text for the dropdown
                allowClear: true,
                onDropdownOpen: function() {
                    // Automatically focus the input when the dropdown opens
                    this.clear();
                    this.$control_input.focus();
                }
            });
        });
    </script>

    <script>
        function toggleOtherInput(select, otherInputId) {
            const otherInput = document.getElementById(otherInputId);
            if (select.value === 'other') {
                otherInput.style.display = 'block';
                otherInput.required = true;
            } else {
                otherInput.style.display = 'none';
                otherInput.required = false;
                otherInput.value = '';
            }
        }
    </script>
@endsection
