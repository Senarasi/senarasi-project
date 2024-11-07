@extends('setting.layout.app2')
@section('title')
Setting - Senarasi
@endsection
@section('costum-css')
<style>

    .nav-link-uniques {
        text-align: center;
        font-weight: 500;
        color: #333;
        vertical-align: middle;
        flex-grow: 1; 
        gap: 12px;
        padding: 20px 0px ;
        border-radius: 8px;
        text-decoration: none;
        
    }
    .content-section-unique {
        padding: 20px;
    }
    .content-subsection-unique {
        padding: 20px;
        border: 1px solid #ddd;
        margin-top: 10px;
    }

    .img-container {
            position: relative;
            width: 150px; /* Ukuran lingkaran */
            height: 150px; /* Ukuran lingkaran */
            border-radius: 50%;
            overflow: hidden;
            background: #f0f0f0;
            margin: 0 auto;
            display: flex;
            /* align-items: center;
            justify-content: center; */
        }
        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .upload-btn {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 50%;
            padding: 10px;
            font-size: 20px;
        }
        .modal-lg {
            max-width: 90%;
        }
        .form-check-input:checked {
            background-color: #009579; /* Warna background aktif */
            border-color: #009579; /* Warna border aktif */
        }

        .nav-link-uniques.active {
            color:#ffe900!important; /* Warna teks saat aktif */
            background-color:#4a25aa  !important; /* Warna background saat aktif */
    
        }
        .nav-link-uniques:hover{    
            color:#ffe900!important; /* Warna teks saat aktif */
            background-color:#4a25aa  !important; /* Warna background saat aktif */
  
        }

        .nav-link-uniques:hover svg path {
        fill: #ffe900;
    }

    .nav-link-uniques.active svg path {
    fill: #ffe900; /* Change to the color you want */
}

    .form-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .form-footer button {
            font-size: 14px;
            letter-spacing: 0.5px;
            color: #ffe900;
        }
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
        .save-btn {
            background-color: #4a25aa;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
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
  color: #fff;
  font-size: 40px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
    /* Styling khusus untuk input file agar tidak mempengaruhi fungsionalitas */
    .file-input {
        height: auto;
        padding: 6px 8px; /* Atur sesuai kebutuhan */
        max-width: 20%;
    }
    </style>

@endsection


@section('content')

    <div class="">
        <div class="tablenih" style="height: auto; ">
            {{-- tambahkan style di dalam tablenih yg atas kalau mau sticky  position: sticky; top: 0;  z-index: 1000;  background-color: white; --}}

            <div  style="display: flex; justify-content:space-between">
                <a class="nav-link-uniques" style="margin-right: 12px" href="#" id="profileLink" onclick="setActive(this, 'yourAccountUnique')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0001 4.66634C12.3676 4.66604 10.7636 5.09391 9.34822 5.90724C7.93281 6.72057 6.75548 7.89091 5.93374 9.30145C5.112 10.712 4.67458 12.3134 4.66516 13.9458C4.65574 15.5782 5.07464 17.1846 5.88005 18.6045C6.42443 17.897 7.12422 17.3242 7.92532 16.9303C8.72642 16.5364 9.60736 16.3321 10.5001 16.333H17.5001C18.3927 16.3321 19.2737 16.5364 20.0748 16.9303C20.8759 17.3242 21.5757 17.897 22.1201 18.6045C22.9255 17.1846 23.3444 15.5782 23.3349 13.9458C23.3255 12.3134 22.8881 10.712 22.0664 9.30145C21.2446 7.89091 20.0673 6.72057 18.6519 5.90724C17.2365 5.09391 15.6325 4.66604 14.0001 4.66634ZM23.2669 21.0883C23.4131 20.8978 23.5531 20.7026 23.6869 20.5027C24.9803 18.5808 25.6697 16.3162 25.6667 13.9997C25.6667 7.55617 20.4436 2.33301 14.0001 2.33301C7.55655 2.33301 2.33339 7.55617 2.33339 13.9997C2.32971 16.5626 3.17343 19.0548 4.73322 21.0883L4.72739 21.1093L5.14155 21.5912C6.23575 22.8704 7.59433 23.8972 9.12366 24.6008C10.653 25.3043 12.3167 25.6678 14.0001 25.6663C14.2521 25.6663 14.5025 25.6586 14.7514 25.643C16.8565 25.5103 18.8857 24.8064 20.6209 23.6072C21.4507 23.0347 22.2029 22.357 22.8586 21.5912L23.2727 21.1093L23.2669 21.0883ZM14.0001 6.99967C13.0718 6.99967 12.1816 7.36842 11.5252 8.0248C10.8688 8.68118 10.5001 9.57142 10.5001 10.4997C10.5001 11.4279 10.8688 12.3182 11.5252 12.9745C12.1816 13.6309 13.0718 13.9997 14.0001 13.9997C14.9283 13.9997 15.8185 13.6309 16.4749 12.9745C17.1313 12.3182 17.5001 11.4279 17.5001 10.4997C17.5001 9.57142 17.1313 8.68118 16.4749 8.0248C15.8185 7.36842 14.9283 6.99967 14.0001 6.99967Z" fill="#999999" />
                    </svg>
                    <span style="vertical-align: middle"> Profile</span>
                </a>
                <a class="nav-link-uniques" style="margin-right: 12px" href="#" onclick="setActive(this, 'passwordUnique')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <path d="M19.8333 10.4997V8.16634C19.8333 4.89967 17.2666 2.33301 14 2.33301C10.7333 2.33301 8.16663 4.89967 8.16663 8.16634V10.4997C6.18329 10.4997 4.66663 12.0163 4.66663 13.9997V22.1663C4.66663 24.1497 6.18329 25.6663 8.16663 25.6663H19.8333C21.8166 25.6663 23.3333 24.1497 23.3333 22.1663V13.9997C23.3333 12.0163 21.8166 10.4997 19.8333 10.4997ZM10.5 8.16634C10.5 6.18301 12.0166 4.66634 14 4.66634C15.9833 4.66634 17.5 6.18301 17.5 8.16634V10.4997H10.5V8.16634Z" fill="#999999"/>
                      </svg>
                      <span style="vertical-align: middle">  Password</span>
                </a>
                <a class="nav-link-uniques" style="margin-right: 12px" href="#" onclick="setActive(this, 'accessibilityUnique')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <path d="M2 14C2 10.8174 3.26428 7.76516 5.51472 5.51472C7.76516 3.26428 10.8174 2 14 2C17.1826 2 20.2348 3.26428 22.4853 5.51472C24.7357 7.76516 26 10.8174 26 14C26 17.1826 24.7357 20.2348 22.4853 22.4853C20.2348 24.7357 17.1826 26 14 26C10.8174 26 7.76516 24.7357 5.51472 22.4853C3.26428 20.2348 2 17.1826 2 14ZM9.57031 9.96406C8.99844 9.72031 8.3375 9.98281 8.09375 10.5547C7.85 11.1266 8.1125 11.7875 8.68438 12.0312L9.24219 12.2703C10.0531 12.6172 10.8922 12.875 11.7547 13.0344V15.3828C11.7547 15.5844 11.7219 15.7859 11.6562 15.9734L10.3109 20.0094C10.1141 20.6 10.4328 21.2375 11.0234 21.4344C11.6141 21.6313 12.2516 21.3125 12.4484 20.7219L13.5922 17.2906C13.6531 17.1125 13.8172 16.9906 14.0047 16.9906C14.1922 16.9906 14.3609 17.1125 14.4172 17.2906L15.5609 20.7219C15.7578 21.3125 16.3953 21.6313 16.9859 21.4344C17.5766 21.2375 17.8953 20.6 17.6984 20.0094L16.3531 15.9734C16.2875 15.7813 16.2547 15.5844 16.2547 15.3828V13.0344C17.1172 12.8703 17.9563 12.6172 18.7672 12.2703L19.325 12.0312C19.8969 11.7875 20.1594 11.1266 19.9156 10.5547C19.6719 9.98281 19.0109 9.72031 18.4391 9.96406L17.8766 10.2031C16.6531 10.7281 15.3359 11 14 11C12.6641 11 11.3516 10.7281 10.1234 10.2031L9.56562 9.96406H9.57031ZM14 9.5C14.4973 9.5 14.9742 9.30246 15.3258 8.95083C15.6775 8.59919 15.875 8.12228 15.875 7.625C15.875 7.12772 15.6775 6.65081 15.3258 6.29917C14.9742 5.94754 14.4973 5.75 14 5.75C13.5027 5.75 13.0258 5.94754 12.6742 6.29917C12.3225 6.65081 12.125 7.12772 12.125 7.625C12.125 8.12228 12.3225 8.59919 12.6742 8.95083C13.0258 9.30246 13.5027 9.5 14 9.5Z" fill="#999999"/>
                      </svg>
                      <span style="vertical-align: middle">  Accessibility</span>
                </a>
                <a class="nav-link-uniques" href="#" onclick="setActive(this, 'helpCenterUnique')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <path d="M13.9417 20.9997C14.35 20.9997 14.6954 20.8585 14.9777 20.5762C15.26 20.2938 15.4008 19.9489 15.4 19.5413C15.3993 19.1338 15.2585 18.7885 14.9777 18.5053C14.6969 18.2222 14.3516 18.0815 13.9417 18.083C13.5318 18.0846 13.1869 18.2257 12.9069 18.5065C12.6269 18.7873 12.4857 19.1322 12.4834 19.5413C12.481 19.9505 12.6222 20.2958 12.9069 20.5773C13.1915 20.8589 13.5365 20.9997 13.9417 20.9997ZM12.8917 16.508H15.05C15.05 15.8663 15.1232 15.3608 15.2694 14.9913C15.4156 14.6219 15.8286 14.1163 16.5084 13.4747C17.0139 12.9691 17.4125 12.4877 17.7042 12.0303C17.9959 11.573 18.1417 11.0239 18.1417 10.383C18.1417 9.29412 17.7431 8.45801 16.9459 7.87468C16.1487 7.29135 15.2056 6.99968 14.1167 6.99968C13.0084 6.99968 12.1093 7.29135 11.4194 7.87468C10.7295 8.45801 10.248 9.15801 9.97504 9.97468L11.9 10.733C11.9973 10.383 12.2162 10.0038 12.5569 9.59551C12.8975 9.18718 13.4175 8.98301 14.1167 8.98301C14.7389 8.98301 15.2056 9.15335 15.5167 9.49401C15.8278 9.83468 15.9834 10.2088 15.9834 10.6163C15.9834 11.0052 15.8667 11.37 15.6334 11.7107C15.4 12.0513 15.1084 12.3671 14.7584 12.658C13.9028 13.4163 13.3778 13.99 13.1834 14.3788C12.9889 14.7677 12.8917 15.4775 12.8917 16.508ZM14 25.6663C12.3862 25.6663 10.8695 25.3603 9.45004 24.7482C8.0306 24.1361 6.79588 23.3046 5.74588 22.2538C4.69588 21.2031 3.86482 19.9683 3.25271 18.5497C2.6406 17.131 2.33415 15.6143 2.33338 13.9997C2.3326 12.385 2.63904 10.8683 3.25271 9.44968C3.86638 8.03101 4.69743 6.79629 5.74588 5.74551C6.79432 4.69474 8.02904 3.86368 9.45004 3.25235C10.871 2.64101 12.3877 2.33457 14 2.33301C15.6124 2.33146 17.129 2.6379 18.55 3.25235C19.971 3.86679 21.2058 4.69785 22.2542 5.74551C23.3027 6.79318 24.1341 8.0279 24.7485 9.44968C25.363 10.8715 25.669 12.3881 25.6667 13.9997C25.6644 15.6112 25.3579 17.1279 24.7474 18.5497C24.1368 19.9715 23.3058 21.2062 22.2542 22.2538C21.2027 23.3015 19.9679 24.133 18.55 24.7482C17.1322 25.3634 15.6155 25.6695 14 25.6663ZM14 23.333C16.6056 23.333 18.8125 22.4288 20.6209 20.6205C22.4292 18.8122 23.3334 16.6052 23.3334 13.9997C23.3334 11.3941 22.4292 9.18718 20.6209 7.37885C18.8125 5.57051 16.6056 4.66635 14 4.66635C11.3945 4.66635 9.18754 5.57051 7.37921 7.37885C5.57088 9.18718 4.66671 11.3941 4.66671 13.9997C4.66671 16.6052 5.57088 18.8122 7.37921 20.6205C9.18754 22.4288 11.3945 23.333 14 23.333Z" fill="#999999"/>
                      </svg>
                      <span style="vertical-align: middle"> Help Center</span>
                </a>
            </div>
           
        </div>
   
            <div class="tablenih" style="height: auto">
                <div id="yourAccountUnique" class="content-section-unique">

                    <h2 class="mb-5">Update Profile</h2>
                    <form id="updateProfileForm">
<!-- Profile Photo Preview -->
<div class="profile-photo" id="profilePhoto">
    <img src="https://via.placeholder.com/300" alt="Profile Photo" id="profilePhotoPreview" onclick="openModal(this)">
</div>

<!-- Upload and Save Buttons -->
<div class="upload-section mb-5">
    <input class="form-control file-input" type="file" id="photoInput" accept="image/*" onchange="loadFile(event)">
</div>

<!-- Modal gambar -->
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content-unique" id="imgModal">
</div>
    
                        <div class="d-flex gap-3 mb-3">
                            <div class="col">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Full Name">
                            </div>
                            <div class="col">
                                <label for="date" class="form-label">Birth Date</label>
                                <input type="date" class="form-control" id="name" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-3">
                            <div class="col">
                                <label for="name" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="name" placeholder="Full Name">
                            </div>
                            <div class="col">
                                <label for="npwp" class="form-label">NPWP</label>
                                <input type="text" class="form-control" id="name" placeholder="NPWP">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Full Address">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telephone Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="Telephone Number">
                        </div>
                        <div class="form-footer">
                            <button type="button" class="uwuq" id="saveButton">Save</button>
                        </div>
                    </form>

            </div>
            <div id="passwordUnique" class="content-section-unique" style="display: none;">
                <h2 class="mb-5">Update Password</h2>
                <form id="updatePasswordForm">
                    <div class="mb-3">
                        <label for="old_password" class="form-label">Old Password</label>
                        <div class="input-group">
                            <input name="password" type="password" value="" class="masukkan form-control" id="old_password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                            <span class="input-group-text" onclick="password_show_hide('old_password', 'old_show_eye', 'old_hide_eye');">
                                <i class="fas fa-eye" id="old_show_eye"></i>
                                <i class="fas fa-eye-slash d-none" id="old_hide_eye"></i>
                            </span>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-3">
                        <div class="col">
                            <label for="new_password" class="form-label">New Password</label>
                            <div class="input-group">
                                <input name="password" type="password" value="" class="masukkan form-control" id="new_password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                                <span class="input-group-text" onclick="password_show_hide('new_password', 'new_show_eye', 'new_hide_eye');">
                                    <i class="fas fa-eye" id="new_show_eye"></i>
                                    <i class="fas fa-eye-slash d-none" id="new_hide_eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                            <div class="input-group">
                                <input name="password" type="password" value="" class="masukkan form-control" id="confirm_new_password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" onkeyup="check_password_match();" />
                                <span class="input-group-text" onclick="password_show_hide('confirm_new_password', 'confirm_show_eye', 'confirm_hide_eye');">
                                    <i class="fas fa-eye" id="confirm_show_eye"></i>
                                    <i class="fas fa-eye-slash d-none" id="confirm_hide_eye"></i>
                                </span>
                            </div>
                            <small id="password_match_message" class="form-text"></small>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="button" class="uwuq" id="saveButton">Save</button>
                    </div>
                </form>
            </div>
            <div id="accessibilityUnique" class="content-section-unique" style="display: none;">
                <h2 class="mb-5">Accessibility</h2>

                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-9">
                            <h5>Open access anytime for Transport Requests</h5>
                            <p>User can make requests anytime while this open access is active.</p>
                        </div>
                        <div class="col-1 d-flex justify-content-end">
                            <div class="form-check form-switch " >
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked style="width: 48px; height:24px">
                            </div>
                        </div>
                    </div>



            </div>
            <div id="helpCenterUnique" class="content-section-unique" style="display: none;">
                <h2 class="mb-5">Help Center</h2>
                <p>contact it@narasi.tv</p>
            </div>
            </div>
        </div>
    </div>


@endsection


@section('modal')
 {{-- <!-- Modal untuk Crop Foto -->
 <div class="modal fade" id="cropModal" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cropModalLabel">Edit Foto Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <img id="modalImage" src="{{ asset('asset/image/foto_profile.jpeg')  }}" alt="Crop Image">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="cropButton">Crop & Simpan</button>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('custom-js')
<script>
    function setActive(element, sectionId) {
        // Hide all sections
        var sections = document.getElementsByClassName('content-section-unique');
        for (var i = 0; i < sections.length; i++) {
            sections[i].style.display = 'none';
        }

        // Display the selected section
        var selectedSection = document.getElementById(sectionId);
        if (selectedSection) {
            selectedSection.style.display = 'block';
        }

        // Remove active class from all nav links
        var navLinks = document.querySelectorAll('.nav-link-uniques');
        navLinks.forEach(function(link) {
            link.classList.remove('active');
        });

        // Add active class to the clicked nav link
        element.classList.add('active');
    }

    // Automatically activate the 'Profile' section when the page loads
    document.addEventListener('DOMContentLoaded', function () {
        var profileLink = document.getElementById('profileLink');
        setActive(profileLink, 'yourAccountUnique');
    });
</script>


<script>
    // Function to handle image upload and update preview
    function loadFile(event) {
        var reader = new FileReader();
        reader.onload = function(){
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



    {{-- <script>
        let cropper;
        const profileImageInput = document.getElementById('profileImage');
        const previewImage = document.getElementById('previewImage');
        const modalImage = document.getElementById('modalImage');
        const cropButton = document.getElementById('cropButton');
        const saveButton = document.getElementById('saveButton');
        const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));

        profileImageInput.addEventListener('change', (e) => {
            const files = e.target.files;
            if (files && files.length > 0) {
                const file = files[0];
                const reader = new FileReader();
                reader.onload = () => {
                    modalImage.src = reader.result;
                    cropModal.show();
                };
                reader.readAsDataURL(file);
            }
        });

        cropModal._element.addEventListener('shown.bs.modal', () => {
            if (cropper) {
                cropper.destroy();
            }
            cropper = new Cropper(modalImage, {
                aspectRatio: 1,
                viewMode: 1
            });
        });

        cropButton.addEventListener('click', () => {
            const canvas = cropper.getCroppedCanvas({
                width: 150,
                height: 150,
            });
            canvas.toBlob((blob) => {
                const url = URL.createObjectURL(blob);
                previewImage.src = url;
                cropModal.hide();
            });
        });

        saveButton.addEventListener('click', () => {
            // Tambahkan logika penyimpanan profil di sini jika diperlukan
            alert('Perubahan disimpan!');
        });
    </script> --}}


    <script>
        function password_show_hide(passwordFieldId, showEyeId, hideEyeId) {
            var x = document.getElementById(passwordFieldId);
            var show_eye = document.getElementById(showEyeId);
            var hide_eye = document.getElementById(hideEyeId);
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }

        function check_password_match() {
            var newPassword = document.getElementById('new_password').value;
            var confirmPassword = document.getElementById('confirm_new_password').value;
            var message = document.getElementById('password_match_message');

            if (newPassword !== confirmPassword) {
                message.textContent = "Passwords do not match.";
            } else {
                message.textContent = "";
            }
        }
        </script>


@endsection
