@extends('admin.layout.app')

@section('title')
    Cretae Employee Narasi
@endsection
@section('costum-css')
    <style>
        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
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

        .upload-section {
            margin-top: 20px;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;

        }

        .form-footer button {
            color: #ffe900;
            text-transform: uppercase;
            letter-spacing: 1px;
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

        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, minmax(100px, 140px));
            /* Minimal 100px, maksimal proporsional */
        }

        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: repeat(3, auto);
                /* Tiga kolom untuk layar kecil */
            }
        }
    </style>
@endsection
@section('content')
    <a href="{{ route('employee.index') }}" class="text-decoration-none text-end">
        <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                                  7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back
        </button>
    </a>

    <div class="tablenih" style="margin-top: 12px;">
        <div class="content-section-unique">
            <div class="judulhalaman" style="display: flex; align-items: center; margin:0px">Create Narasi Employee data
            </div>

            <form id="updateProfileForm" class="pt-3">
                <!-- Profile Photo Preview -->
                <div class="profile-photo" id="profilePhoto">
                    <img src="https://via.placeholder.com/300" alt="Profile Photo" id="profilePhotoPreview"
                        onclick="openModal(this)">
                </div>

                <!-- Upload and Save Buttons -->
                <div class=" upload-section mb-3">
                    <input class="form-control file-input" type="file" id="photoInput" accept="image/*"
                        onchange="loadFile(event)">
                </div>

                <!-- Modal gambar -->
                <div id="myModal" class="modal">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <img class="modal-content-unique" id="imgModal">
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" placeholder="First Name" required>
                    </div>
                    <div class="col">
                        <label for="name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Last Name" required>
                    </div>
                    <div class="col">
                        <label for="date" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="name" placeholder="Date of Birth" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="date" class="form-label">Place of Birth</label>
                        <input type="location" class="form-control" id="name" placeholder="location" required>
                    </div>
                    <div class="col">
                        <label for="name" class="form-label">Citizen ID</label>
                        <input type="text" class="form-control" id="name" placeholder="NIK" required>
                    </div>
                    <div class="col">
                        <label for="npwp" class="form-label">NPWP</label>
                        <input type="text" class="form-control" id="name" placeholder="NPWP" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-8">
                        <label for="address" class="form-label">Citizen ID Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Full Address" required>
                    </div>
                    <div class="col">
                        <label for="religion" class="form-label">Religion</label>
                        <select id="religion" name="religion" placeholder="Choose Religion" required>
                            <option disabled selected value="">Choose Religion</option>
                            <option value="islam">Islam</option>
                            <option value="protestant">Protestant Christianity</option>
                            <option value="catholic">Catholic Christianity</option>
                            <option value="hinduism">Hinduism</option>
                            <option value="buddhism">Buddhism</option>
                            <option value="confucianism">Confucianism</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-8">
                        <label for="date" class="form-label">NIP</label>
                        <input type="nip" class="form-control" id="nip" placeholder="NIP" required>
                    </div>
                    <div class="col ">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" name="access" placeholder="Choose Role" required>
                            <option disabled selected value="">Choose Role</option>
                            <option value="staff">Staff</option>
                            <option value="manager">Manager</option>
                            <option value="vp">VP</option>
                            <option value="bod">BOD</option>


                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col ">
                        <label for="phone" class="form-label">Mobile Phone Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Telephone Number"
                            required>
                    </div>
                    <div class="col ">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" name="gender" placeholder="Choose Gender" required>
                            <option value="">Choose Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col ">
                        <label for="marital_status" class="form-label">Marital Status</label>
                        <select id="marital_status" name="marital_status" placeholder="Choose Marital Status" required>
                            <option value="">Choose Marital Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="widow">Widow</option>
                            <option value="widower">Widower</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="department_id" class="form-label">Department</label>
                        <select name="department_id" id="department_option" placeholder="Choose Department" class="form-select" required>
                            @forelse ($department as $department_id => $department_name)
                                <option value="{{ $department_id }}">{{ $department_name }}</option>
                            @empty
                                <option disabled selected>Data not found</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col ">
                        <label for="job_position" class="form-label">Job Position</label>
                        <select name="position_id" id="position_option" placeholder="Choose Job Position" class="form-select" required>
                            <option value="">Select Department First</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="managername" class="form-label">Manager</label>
                        <select id="managername" name="managername">
                            <option disabled selected>Choose One</option>
                            @forelse ($users as $user)
                                <option value="{{ $user->employee_id }}">{{ $user->full_name }}</option>
                            @empty
                                <option disabled>Data not found</option>
                            @endforelse
                        </select>
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="Access" class="form-label">Access for Senarasi</label>
                    <div class="col">
                        <div class="grid-container">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-label" for="inlineCheckbox1">Admin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-label" for="inlineCheckbox2">CEO</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                <label class="form-label" for="inlineCheckbox3">BOD</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
                                <label class="form-label" for="inlineCheckbox4">VP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option5">
                                <label class="form-label" for="inlineCheckbox5">Manager</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option6">
                                <label class="form-label" for="inlineCheckbox6">Finance</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option7">
                                <label class="form-label" for="inlineCheckbox7">Procurement</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="option8">
                                <label class="form-label" for="inlineCheckbox8">Legal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox9" value="option9">
                                <label class="form-label" for="inlineCheckbox9">HC</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox10" value="option10">
                                <label class="form-label" for="inlineCheckbox10">GA</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox11" value="option11">
                                <label class="form-label" for="inlineCheckbox11">Staff</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit" class="uwuq" id="saveButton">Save</button>
                </div>
            </form>
        </div>




    </div>
@endsection

<!--Modal-->
@section('modal')
@endsection

@section('custom-js')
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#department_option').on('change', function() {
                $.ajax({
                    url: "{{ route('ajax.getpositionfromdepartment') }}",
                    method: 'POST',
                    data: {
                        department_id: this.value,
                        _token: '{{ csrf_token() }}'
                    },
                    async: true,
                    dataType: "json",
                    success: function(data) {
                        var $select = $('#position_option');
                        if (!$.trim(JSON.parse(data.data))) {
                            $select.html('');
                            $select.append(
                                '<option value="">Position doesnt exist/Select Department First</option>'
                            );
                        } else {
                            $select.html('');
                            $.each(JSON.parse(data.data), function(key, value) {
                                $select.append('<option value=' + key +
                                    '>' + value + '</option>');
                            });
                        }
                    }
                });
            });
            $('#check-pw').click(function() {
                if ('password' == $('#input-pw').attr('type')) {
                    $('#input-pw').prop('type', 'text');
                } else {
                    $('#input-pw').prop('type', 'password');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#access").select2({
                placeholder: "Select Guests"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#gender, #marital_status, #religion, #role, #department_id').selectize({
                create: false,
                sortField: 'text',


            });
        });
    </script>
    <script>
        // Function to handle image upload and update preview
        function loadFile(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('profilePhotoPreview');
                output.src = reader.result; // Update profile photo preview

                // Set modal image to the uploaded image
                var modalImg = document.getElementById('imgModal');
                modalImg.src = reader.result;

                // Create a temporary image element to get natural size
                var tempImg = new Image();
                tempImg.src = reader.result;
                tempImg.onload = function() {
                    // Set modal image size to natural dimensions
                    modalImg.style.width = tempImg.naturalWidth + 'px';
                    modalImg.style.height = tempImg.naturalHeight + 'px';
                };
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // Open the Modal
        function openModal(element) {
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("imgModal");

            modal.style.display = "block";
            modalImg.src = element.src;
        }

        // Close the Modal
        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
    </script>
    <script type='text/javascript'>
        function password_show_hide() {
            var x = document.getElementById('password');
            var show_eye = document.getElementById('show_eye');
            var hide_eye = document.getElementById('hide_eye');
            hide_eye.classList.remove('d-none');
            if (x.type === 'password') {
                x.type = 'text';
                show_eye.style.display = 'none';
                hide_eye.style.display = 'block';
            } else {
                x.type = 'password';
                show_eye.style.display = 'block';
                hide_eye.style.display = 'none';
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#managername').selectize({
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
@endsection
