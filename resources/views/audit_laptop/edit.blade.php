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

        <form action="{{ route('audit_laptop.update', $laptop->audit_laptop_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="employee_id" class="form-label">Employee</label>
                    <select id="employee_option" name="employee_id">
                        <option disabled>Choose One</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->employee_id }}"
                                {{ $user->employee_id == $laptop->employee_id ? 'selected' : '' }}>
                                {{ $user->full_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="laptop_number">Laptop Number</label>
                    <input type="text" name="laptop_number" id="laptop_number" class="form-control"
                        value="{{ $laptop->laptop_number }}" required>
                </div>
            </div>

            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="serial_number">Serial Number</label>
                    <input type="text" name="serial_number" id="serial_number" class="form-control"
                        value="{{ $laptop->serial_number }}" required>
                </div>

                <div class="mb-3">
                    <label for="no_asset">No Asset</label>
                    <input type="text" name="no_asset" id="no_asset" class="form-control"
                        value="{{ $laptop->no_asset }}" required>
                </div>
            </div>
            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="processor" class="form-label">Processor</label>
                    <select id="processor" name="processor" class="form-select"
                        onchange="toggleOtherInput(this, 'processor_other')">
                        <option disabled>Choose One</option>
                        @foreach (['CORE I3', 'CORE I5', 'CORE I7', 'RYZEN 5', 'RYZEN 7'] as $processor)
                            <option value="{{ $processor }}" {{ $laptop->processor == $processor ? 'selected' : '' }}>
                                {{ $processor }}</option>
                        @endforeach
                        <option value="other"
                            {{ !in_array($laptop->processor, ['CORE I3', 'CORE I5', 'CORE I7', 'RYZEN 5', 'RYZEN 7']) ? 'selected' : '' }}>
                            Other</option>
                    </select>
                    <input type="text" id="processor_other" name="processor_other" class="form-control mt-2"
                        placeholder="Enter custom processor"
                        value="{{ !in_array($laptop->processor, ['CORE I3', 'CORE I5', 'CORE I7', 'RYZEN 5', 'RYZEN 7']) ? $laptop->processor : '' }}"
                        style="display: {{ !in_array($laptop->processor, ['CORE I3', 'CORE I5', 'CORE I7', 'RYZEN 5', 'RYZEN 7']) ? 'block' : 'none' }};"
                        oninput="this.value = this.value.toUpperCase();">
                </div>

                <div class="mb-3">
                    <label for="ram">RAM</label>
                    <select id="ram" name="ram" class="form-select"
                        onchange="toggleOtherInput(this, 'ram_other')">
                        @foreach (['4GB', '8GB', '12GB', '16GB', '32GB'] as $ram)
                            <option value="{{ $ram }}" {{ $laptop->ram == $ram ? 'selected' : '' }}>
                                {{ $ram }}</option>
                        @endforeach
                        <option value="other"
                            {{ !in_array($laptop->ram, ['4GB', '8GB', '12GB', '16GB', '32GB']) ? 'selected' : '' }}>Other
                        </option>
                    </select>
                    <input type="text" id="ram_other" name="ram_other" class="form-control mt-2"
                        placeholder="Enter custom RAM size"
                        value="{{ !in_array($laptop->ram, ['4GB', '8GB', '12GB', '16GB', '32GB']) ? $laptop->ram : '' }}"
                        style="display: {{ !in_array($laptop->ram, ['4GB', '8GB', '12GB', '16GB', '32GB']) ? 'block' : 'none' }};"
                        oninput="this.value = this.value.toUpperCase();">
                </div>
            </div>

            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="ssd">SSD</label>
                    <select id="ssd" name="ssd" class="form-select"
                        onchange="toggleOtherInput(this, 'ssd_other')">
                        <option disabled>Choose One</option>
                        @foreach (['256GB', '512GB', '1TB', '2TB'] as $ssd)
                            <option value="{{ $ssd }}" {{ $laptop->ssd == $ssd ? 'selected' : '' }}>
                                {{ $ssd }}</option>
                        @endforeach
                        <option value="other"
                            {{ !in_array($laptop->ssd, ['256GB', '512GB', '1TB', '2TB']) ? 'selected' : '' }}>Other
                        </option>
                    </select>
                    <input type="text" id="ssd_other" name="ssd_other" class="form-control mt-2"
                        placeholder="Enter custom SSD size"
                        value="{{ !in_array($laptop->ssd, ['256GB', '512GB', '1TB', '2TB']) ? $laptop->ssd : '' }}"
                        style="display: {{ !in_array($laptop->ssd, ['256GB', '512GB', '1TB', '2TB']) ? 'block' : 'none' }};"
                        oninput="this.value = this.value.toUpperCase();">
                </div>

                <div class="mb-3">
                    <label for="charger">Charger</label>
                    <input type="text" name="charger" id="charger" class="form-control" value="{{ $laptop->charger }}"
                        required>
                </div>
            </div>

            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="battery">Battery</label>
                    <input type="text" name="battery" id="battery" class="form-control" value="{{ $laptop->battery }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="layar">Layar</label>
                    <input type="text" name="layar" id="layar" class="form-control"
                        value="{{ $laptop->layar }}" required>
                </div>
            </div>

            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="keyboard">Keyboard</label>
                    <input type="text" name="keyboard" id="keyboard" class="form-control"
                        value="{{ $laptop->keyboard }}" required>
                </div>

                <div class="mb-3">
                    <label for="body">Body</label>
                    <input type="text" name="body" id="body" class="form-control"
                        value="{{ $laptop->body }}" required>
                </div>
            </div>

            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="speaker">Speaker</label>
                    <input type="text" name="speaker" id="speaker" class="form-control"
                        value="{{ $laptop->speaker }}" required>
                </div>

                <div class="mb-3">
                    <label for="kamera">Kamera</label>
                    <input type="text" name="kamera" id="kamera" class="form-control"
                        value="{{ $laptop->kamera }}" required>
                </div>
            </div>

            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="lainnya">Lainnya</label>
                    <input type="text" name="lainnya" id="lainnya" class="form-control"
                        value="{{ $laptop->lainnya }}">
                </div>

                <div class="mb-3">
                    <label for="picture" class="form-label">Update Picture</label>
                    @if ($laptop->picture)
                        <img src="{{ asset('storage/' . $laptop->picture) }}" alt="Current Picture"
                            style="max-width: 150px;">
                    @endif
                    <input type="file" id="picture" name="picture" accept="image/*" capture="environment">
                    <button type="button" id="cameraButton">Take a Photo</button>
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
    <script>
        const fileInput = document.getElementById('picture');
        const cameraButton = document.getElementById('cameraButton');

        cameraButton.addEventListener('click', () => {
            fileInput.setAttribute('capture', 'camera');
            fileInput.click();
        });
    </script>
@endsection
