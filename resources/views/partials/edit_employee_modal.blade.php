<div class="modal justify-content-center fade" id="editModal-{{ $data->employee_id }}" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{ route('employee.update', $data->employee_id) }}" method="POST"
                        class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">ID Karyawan</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id"
                                value="{{ $data->employee_id ?? '' }}" />
                        </div>
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                value="{{ $data->full_name ?? '' }}" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $data->email ?? '' }}" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <input name="password" type="password" value="" class="input form-control"
                                        id="password" placeholder="password" aria-label="password"
                                        aria-describedby="basic-addon1" />
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="departposisi">
                            <div style="font: 300 12; justify-content: space-between; align-items: center; flex: 1 0 0">
                                <label for="department_id" class="form-label">Departemen</label>
                                <select name="department_id" class="form-select" id="department_option" required>
                                    <option disabled selected>Select Department</option>
                                    @forelse ($departments as $department_id => $department_name)
                                        <option value="{{ $department_id }}"
                                            {{ $data->department_id == $department_id ? 'selected' : '' }}>
                                            {{ $department_name }} </option>
                                    @empty
                                        <option disabled selected>Data not found</option>
                                    @endforelse
                                </select>
                            </div>
                            <div style="font: 300 12; justify-content: space-between; align-items: center; flex: 1 0 0">
                                <label for="position_id" class="form-label">Posisi</label>
                                <select name="position_id" id="position_option" class="form-select">
                                    <option disabled selected>Select Position</option>
                                    @forelse ($positions as $position_id => $position_name)
                                        <option value="{{ $position_id }}"
                                            {{ $data->position_id == $position_id ? 'selected' : '' }}>
                                            {{ $position_name }}</option>
                                    @empty
                                        <option disabled selected>Data not found</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="status">
                            <div style="font: 300 12px; justify-content: space-between; align-items: center; flex: 1 0 0">
                                <label for="role" class="form-label">Role</label>
                                <select id="role_option" name="role" class="form-select" style="font: 300 12">
                                    <option style="color: rgb(189, 189, 189)">Choose One</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{asset("image/Narasi_Logo.svg")}}" alt=" " />
            </div>
        </div>
    </div>