@extends('layout.index')

@section('title')
    Employee Narasi
@endsection

<style>
    #cameraButton {
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        padding: 10px 20px;
        cursor: pointer;
    }
</style>
@section('content')
    <a href="{{ route('audit_laptop.index') }}" class="text-decoration-none text-end">
        <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                      7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back
        </button>
    </a>
    <div class="container">
        <h2>Insert New Record</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('audit_laptop.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                <div class="mb-3">
                    <label for="laptop_number">Laptop Number</label>
                    <input type="text" name="laptop_number" id="laptop_number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="laptop_type">Laptop Type</label>
                    <input type="text" name="laptop_type" id="laptop_type" class="form-control" required>
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
                        placeholder="Enter custom processor" style="display: none;"
                        oninput="this.value = this.value.toUpperCase();">
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
                        placeholder="Enter custom RAM size" style="display: none;"
                        oninput="this.value = this.value.toUpperCase();">
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
                        placeholder="Enter custom SSD size" style="display: none;"
                        oninput="this.value = this.value.toUpperCase();">
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

                <div class="input-group">
                    <label for="picture">Choose images:</label>
                    <input type="file" id="picture" name="picture" accept="image/*" capture="environment"
                        multiple>
                    <button type="button" id="cameraButton">Take Photos</button>
                </div>
                <div id="preview"></div>
            </div>
            <div class="mb-3">
                <label for="lainnya"></label>
                <input type="checkbox" id="status" name="status" value="DONE"> DONE
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
            fileInput.click();
        });

        // Preview selected images
        fileInput.addEventListener('change', function() {
            const preview = document.getElementById('preview');
            preview.innerHTML = ''; // Clear previous preview
            Array.from(fileInput.files).forEach(file => {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.maxWidth = '100px';
                img.style.margin = '5px';
                preview.appendChild(img);
            });
        });
    </script>
@endsection
