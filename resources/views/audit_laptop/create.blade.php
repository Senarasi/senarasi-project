@extends('audit_laptop.layout.app')

@section('title')
    Create Audit Laptop
@endsection
@section('costum-css')
    <style>
        .profile-photo {
            width: 150px;
            height: 150px;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-section {}

        .form-footer {
            display: flex;
            justify-content: flex-start;
            margin-top: -10px;
        }

        .form-footer button {
            font-size: 14px;
            letter-spacing: 0.5px;
            color: #ffe900;
        }

        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 9999;
        }

        /* Modal Content (image) */
        .modal-content-unique {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 80%;
            max-height: 80%;
            object-fit: contain;
            display: block;
        }

        .btn-custom-upload {
            display: inline-block;
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
            color: #fff;
            background-color: #4a25aa;
            border: none;
            border-radius: 4px;

        }

        .btn-custom-upload:hover {
            background-color: #35255e;
        }


        /* Close Button */
        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #ffffff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            opacity: 1;
        }


        .close:hover,
        .close:focus {
            color: #ffffff;
            text-decoration: none;
            cursor: pointer;
        }

        .content-section-unique {
            padding: 20px;
        }

        .file-input {
            height: auto;
        }

        /* Styling for the custom upload button */
    </style>
@endsection
@section('content')
    <a href="{{ route('audit_laptop.index') }}" class="text-decoration-none text-end">
        <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
                <path
                    d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                                                                                                                                                                                  7.2501 0 7.6501 0 8.0501Z "
                    fill="#4A25AA " />
            </svg>
            Back
        </button>
    </a>

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

    {{-- <form action="{{ route('audit_laptop.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                </div>
                <div id="preview"></div>
            </div>
            <div class="mb-3">
                <label for="audit_status">Audit Status</label>
                <select name="audit_status" id="audit_status" class="form-control">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
                <small class="form-text text-muted">
                    Note: The system will automatically set status based on form completeness
                </small>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div> --}}

    <div class="tablenih" style="margin-top: 12px;">
        <div class="content-section-unique">
            <div class="judulhalaman" style="display: flex; align-items: center; margin:0px">Laptop Audit</div>

            <form action="{{ route('audit_laptop.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Profile Photo Preview -->
                <div class="profile-photo" id="profilePhoto">
                    <img src="https://via.placeholder.com/300" alt="Profile Photo" id="profilePhotoPreview"
                        onclick="openModal(this)">
                </div>

                <!-- Custom Upload and Save Buttons -->
                <div class="row">
                    <div class="upload-section mt-2 mb-3">
                        <div class="col">
                            <label for="photoInput" class="form-label" id="photoLabel">Laptop Condition Photo</label>
                        </div>

                        <!-- Custom button for file input, placed below the label -->
                        {{-- <button type="button" class="btn-custom-upload mb-3"
                            onclick="document.getElementById('photoInput').click()">
                            Take a Photo
                        </button> --}}
                        <input type="file" id="picture" name="picture" accept="image/*" capture="environment" multiple>
                        <!-- Span to display the chosen file name -->
                        <span id="fileName" class="ms-2"></span>

                        <!-- Hidden actual file input -->
                        <input class="form-control file-input" type="file" id="photoInput" accept="image/*"
                            onchange="handleFileSelect(event)" style="display: none;">
                    </div>
                </div>

                <!-- Modal for Image -->
                <div id="myModal" class="modal">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <img class="modal-content-unique" id="imgModal">
                </div>

                <div class="row mb-3">
                    <div class="col">
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
                    <div class="col">
                        <label for="laptop_number" class="form-label">Laptop Number</label>
                        <input type="text" class="form-control" name="laptop_number" id="laptop_number"
                            placeholder="Laptop Number" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="laptop_type" class="form-label">Laptop Type</label>
                        <input type="text" class="form-control" name="laptop_type" id="laptop_type"
                            placeholder="Laptop Type" required>
                    </div>
                    <div class="col">
                        <label for="serial_number" class="form-label">Serial Laptop Number</label>
                        <input type="text" class="form-control" name="serial_number" id="serial_number"
                            placeholder="Serial Laptop Number" required>
                    </div>
                    <div class="col">
                        <label for="no_asset" class="form-label">Asset Number</label>
                        <input type="asset" class="form-control" name="no_asset" id="no_asset" placeholder="Asset Number"
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col ">
                        <label for="processor">Processor</label>
                        <select name="processor" id="processor" class="form-control dynamic-select">
                            <option value="">Select Processor</option>
                            <option value="Core i3">Core i3</option>
                            <option value="Core i5">Core i5</option>
                            <option value="Core i7">Core i7</option>
                            <option value="Ryzen 5">Ryzen 5</option>
                            <option value="Ryzen 7">Ryzen 7</option>
                            <option value="other">Other</option>
                        </select>
                        <input type="text" name="processor_other" id="processor_other"
                            class="form-control mt-2 other-input" style="display:none;" placeholder="Enter Processor">
                    </div>
                    <div class="col ">
                        <label for="ram">RAM</label>
                        <select name="ram" id="ram" class="form-control dynamic-select">
                            <option value="">Select RAM</option>
                            <option value="4GB">4GB</option>
                            <option value="8GB">8GB</option>
                            <option value="12GB">12GB</option>
                            <option value="16GB">16GB</option>
                            <option value="32GB">32GB</option>
                            <option value="other">Other</option>
                        </select>
                        <input type="text" name="ram_other" id="ram_other" class="form-control mt-2 other-input"
                            style="display:none;" placeholder="Enter RAM">
                    </div>
                    <div class="col ">
                        <label for="ssd">SSD</label>
                        <select name="ssd" id="ssd" class="form-control dynamic-select">
                            <option value="">Select SSD</option>
                            <option value="256GB">256GB</option>
                            <option value="512GB">512GB</option>
                            <option value="1TB">1TB</option>
                            <option value="2TB">2TB</option>
                            <option value="other">Other</option>
                        </select>
                        <input type="text" name="ssd_other" id="ssd_other" class="form-control mt-2 other-input"
                            style="display:none;" placeholder="Enter SSD">
                    </div>
                </div>
                <div class="judulhalaman mb-2"
                    style="font-size: 16px ;display: flex; align-items: center; margin:0px; padding: 0px">Laptop Physical
                    Condition </div>

                <div class="row mb-3">
                    <div class="col ">
                        <label for="charger" class="form-label">Charger Condition</label>
                        <select id="charger" name="charger" placeholder="Choose Condition" required
                            class="form-control component-status">
                            <option disabled selected value="">Choose Condition</option>
                            <option value="Good">Good</option>
                            <option value="Damaged">Damaged</option>
                            <option value="Missing">Missing</option>
                        </select>
                        <textarea name="charger_reason" id="charger_reason" class="form-control mt-2 reason-input"
                            placeholder="Provide reason for Damaged/Missing status" style="display:none;"></textarea>
                    </div>
                    <div class="col ">
                        <label for="lcd" class="form-label">Screen Condition</label>
                        <select id="lcd" name="lcd" placeholder="Choose Condition" required
                            class="form-control component-status">
                            <option disabled selected value="">Choose Condition</option>
                            <option value="Good">Good</option>
                            <option value="Damaged">Damaged</option>
                            <option value="Missing">Missing</option>
                        </select>
                        <textarea name="lcd_reason" id="lcd_reason" class="form-control mt-2 reason-input"
                            placeholder="Provide reason for Damaged/Missing status" style="display:none;"></textarea>
                    </div>
                    <div class="col ">
                        <label for="keyboard" class="form-label">Keyboard Condition</label>
                        <select id="keyboard" name="keyboard" placeholder="Choose Condition" required
                            class="form-control component-status">
                            <option disabled selected value="">Choose Condition</option>
                            <option value="Good">Good</option>
                            <option value="Damaged">Damaged</option>
                            <option value="Missing">Missing</option>
                        </select>
                        <textarea name="keyboard_reason" id="keyboard_reason" class="form-control mt-2 reason-input"
                            placeholder="Provide reason for Damaged/Missing status" style="display:none;"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col ">
                        <label for="camera" class="form-label">Camera Condition</label>
                        <select id="camera" name="camera" placeholder="Choose Condition" required
                            class="form-control component-status">
                            <option disabled selected value="">Choose Condition</option>
                            <option value="Good">Good</option>
                            <option value="Damaged">Damaged</option>
                            <option value="Missing">Missing</option>
                        </select>
                        <textarea name="camera_reason" id="camera_reason" class="form-control mt-2 reason-input"
                            placeholder="Provide reason for Damaged/Missing status" style="display:none;"></textarea>
                    </div>
                    <div class="col ">
                        <label for="body" class="form-label">Body Condition</label>
                        <select id="body" name="body" placeholder="Choose Condition" required
                            class="form-control component-status">
                            <option disabled selected value="">Choose Condition</option>
                            <option value="Good">Good</option>
                            <option value="Damaged">Damaged</option>
                            <option value="Missing">Missing</option>
                        </select>
                        <textarea name="body_reason" id="body_reason" class="form-control mt-2 reason-input"
                            placeholder="Provide reason for Damaged/Missing status" style="display:none;"></textarea>
                    </div>
                    <div class="col ">
                        <label for="speaker" class="form-label">Speaker Condition</label>
                        <select id="speaker" name="speaker" placeholder="Choose Condition" required
                            class="form-control component-status">
                            <option disabled selected value="">Choose Condition</option>
                            <option value="Good">Good</option>
                            <option value="Damaged">Damaged</option>
                            <option value="Missing">Missing</option>
                        </select>
                        <textarea name="speaker_reason" id="speaker_reason" class="form-control mt-2 reason-input"
                            placeholder="Provide reason for Damaged/Missing status" style="display:none;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Battery Capacity</label>
                        <div class="row">
                            <div class="col">
                                <input type="number" name="battery_current_capacity" id="battery_current_capacity"
                                    class="form-control" placeholder="Current Capacity (mAh)">
                            </div>
                            <div class="col">
                                <input type="number" name="battery_design_capacity" id="battery_design_capacity"
                                    class="form-control" placeholder="Design Capacity (mAh)">
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="other" class="form-label">Note</label>
                        <textarea class="form-control" name="other" id="other" cols="3" rows="3"></textarea>
                    </div>

                    <div class="col mb-3">
                        <label for="audit_status" class="form-label">Audit Status</label>
                        <select name="audit_status" id="audit_status" class="form-control">
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                        </select>
                        <small class="form-text text-muted">
                            Note: The system will automatically set status based on form completeness
                        </small>
                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit" class="uwuq" id="saveButton">Save</button>
                </div>
            </form>
        </div>
    </div>


@endsection
@section('custom-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dynamic other input fields for selects
            const dynamicSelects = document.querySelectorAll('.dynamic-select');
            const componentStatuses = document.querySelectorAll('.component-status');

            dynamicSelects.forEach(select => {
                select.addEventListener('change', function() {
                    // Find the corresponding other input
                    const otherInput = this.nextElementSibling;

                    if (this.value === 'other') {
                        otherInput.style.display = 'block';
                        otherInput.required = true;
                    } else {
                        otherInput.style.display = 'none';
                        otherInput.required = false;
                        otherInput.value = '';
                    }
                });
            });

            // Handle component status reasons
            componentStatuses.forEach(select => {
                select.addEventListener('change', function() {
                    // Find the corresponding reason textarea
                    const reasonInput = this.nextElementSibling;

                    if (this.value === 'Damaged' || this.value === 'Missing') {
                        reasonInput.style.display = 'block';
                        reasonInput.required = true;
                    } else {
                        reasonInput.style.display = 'none';
                        reasonInput.required = false;
                        reasonInput.value = '';
                    }
                });
            });
        });
    </script>
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
