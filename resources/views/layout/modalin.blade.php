<style>
    .modal-setting {
        letter-spacing: 0.5px;
        font: 350 14px Narasi Sans, sans-serif;
    }

    .modal-dialog-setting {
        align-self: none;
        justify-content: none;
        border-radius: none;
    }

    .modal-body-setting {
        margin: 0px;
        border-radius: 0px;
        padding: 0px;

    }

    .modal-content-setting {
        background: white;
        margin: none;
    } */
    .nav-link {
    text-decoration: none; /* Menghapus garis bawah dari link */
    color: inherit;

}

.iwiq {
    right: 0;
    color: white;
    border-radius: 4px;
    background-color: #4a25aa;
    border: none;
    text-align: center;
    text-decoration: none;
    font: 300 14px Narasi Sans, sans-serif;
    align-self: center;
    padding: 10px 16px;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.iwiq:hover {
    background-color: #34128c;
}

.form-control {
    font-family: 'Narasi Sans', sans-serif; /* Ganti dengan font yang diinginkan */
    font-size: 16px; /* Mengubah ukuran font */
    font-weight:300; /* Mengubah ketebalan font */
    color: #333; /* Mengubah warna font */
}

.nav-link.active {
    color: #4a25aa;
    font-weight: 700;
    letter-spacing: 1px; /* Warna teks saat link aktif */
}


    input::placeholder {
    font-family: 'Narasi Sans', sans-serif; /* Ganti dengan font yang diinginkan */
    font-size: 14px; /* Atur ukuran font */
    color: #888888; /* Atur warna placeholder */
    font-style: italic; /* Bisa menambahkan gaya lainnya seperti italic */
    font-weight: 300; /* Atur ketebalan font */
    }
    input[type="date"] {
    font-family: 'Narasi Sans', sans-serif; /* Ubah font menjadi font yang diinginkan */
    font-size: 14px; /* Ubah ukuran font */
    color:  #1a1a1a;; /* Ubah warna teks */
    font-weight: 300; /* Atur ketebalan font */
}

.content-scrollable {
    height: 400px; /* Sesuaikan dengan kebutuhan */
    overflow: hidden; /* Atur overflow sesuai kebutuhan */
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

</style>

<!-- Modal -->
 <div class="modal fade custom-modal-unique modal-setting" id="customModalUnique" tabindex="-1" aria-labelledby="customModalLabelUnique" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-setting">
      <div class="modal-content custom-modal-content-unique modal-content-setting">
        <div class="modal-header">
          <h2 class="modal-title fs-5" id="customModalLabelUnique">Setting</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal-body-setting">
          <div class="row">
            <!-- Sidebar Navigasi Sticky -->
            <div class="col pt-3" style="max-width: 180px; background-color: rgb(244, 244, 244); margin: none; padding:0px; margin-left: 12px; border-bottom-left-radius: 8px;">
              <div class="sidebar-sticky-unique" style="position: sticky; top: 0; ">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" style="text-decoration: none" href="#" onclick="setActive(this, 'yourAccountUnique')">
                      <span data-feather="home"></span> Profile
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="text-decoration: none" href="#" onclick="setActive(this, 'passwordUnique')">
                      <span data-feather="dollar-sign"></span> Password
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="text-decoration: none" href="#" onclick="setActive(this, 'accessibilityUnique')">
                      <span data-feather="eye"></span> Accessibility
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <!-- Konten Modal Scrollable -->
            <div class="col pt-3" style="max-width: 570px">
                <div class="content-scrollable ps-3" style="">
                  <!-- Isi konten yang dapat digulir -->
                  <div id="imageContainer" style="align-items: center;">
                    <img style="width: 120px; height: 120px" src="{{ asset('asset/image/Questions-amico.png')  }}" alt=" " />
                </div>
                  <div id="yourAccountUnique" class="content-section-unique " style="display: none;">
                    <form id="updateProfileForm">

                        <div class="d-flex gap-3 mb-3">
                            <div class="col">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Full Name">
                            </div>
                            <div class="col">
                                <label for="date" class="form-label">Birth Date</label>
                                <input type="date" class="form-control" id="name">
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
                            <button type="button" class="iwiq" id="saveButton">Save</button>
                        </div>
                    </form>

            </div>
            <div id="passwordUnique" class="content-section-unique" style="display: none;">
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
                      <button type="button" class="iwiq" id="saveButton">Save</button>
                  </div>
              </form>
          </div>
          <div id="accessibilityUnique" class="content-section-unique" style="display: none;">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col">
                        <label for="name" class="form-label" style="font-weight: 400;">Open access anytime for Transport Requests</label>
                        <p class="text-muted" style="font-size: 12px;">User can make requests anytime while this open access is active.</p>
                    </div>
                    <div class="col-auto d-flex justify-content-end">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    function setActive(element, sectionId) {
        // Sembunyikan gambar
        var imageContainer = document.getElementById('imageContainer');
        if (imageContainer) {
            imageContainer.style.display = 'none';
        }

        // Sembunyikan semua bagian konten
        var sections = document.getElementsByClassName('content-section-unique');
        for (var i = 0; i < sections.length; i++) {
            sections[i].style.display = 'none';
        }

        // Tampilkan bagian konten yang dipilih
        var selectedSection = document.getElementById(sectionId);
        if (selectedSection) {
            selectedSection.style.display = 'block';
        }

        // Hapus kelas aktif dari semua tautan navigasi
        var navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(function(link) {
            link.classList.remove('active');
        });

        // Tambahkan kelas aktif pada tautan yang diklik
        element.classList.add('active');
    }

    document.addEventListener('DOMContentLoaded', function() {
        var modalElement = document.getElementById('customModalUnique');

        modalElement.addEventListener('shown.bs.modal', function () {
            var imageContainer = document.getElementById('imageContainer');
            if (imageContainer) {
                // Tampilkan gambar ketika modal ditampilkan
                imageContainer.style.display = 'block';
            }
        });

        modalElement.addEventListener('hidden.bs.modal', function () {
            var imageContainer = document.getElementById('imageContainer');
            var sections = document.getElementsByClassName('content-section-unique');

            // Setel ulang tampilan modal ke state awal
            if (imageContainer) {
                imageContainer.style.display = 'block'; // Tampilkan gambar
            }

            // Sembunyikan semua bagian konten
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }

            // Hapus kelas aktif dari semua tautan navigasi
            var navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function(link) {
                link.classList.remove('active');
            });
        });

        // Pasang event listener untuk semua tautan navigasi
        var navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                var sectionId = this.getAttribute('onclick').match(/'(.*?)'/)[1];
                setActive(this, sectionId);
            });
        });
    });
</script>


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



