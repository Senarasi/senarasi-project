@extends('employee.layout.app')

@section('title')
    Employee Narasi
@endsection
@section('content')
    <div class="judulhalaman" style="display: flex; align-items: center; ">Narasi Employee
        {{-- <form style="margin-left: 12px" class="d-flex has-search" role="search ">
        <input style="font-size: 14px; justify-content: center;" class="form-control me-2" type="search "
            placeholder="Search " aria-label="Search" />
    </form> --}}
    </div>
    {{-- <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add
        Employee<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                fill="white" />
        </svg>
    </button>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div class="tablenih" style="margin-top: 24px;">
        <div class="table-responsive p-3">
            <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi, sans-serif; display: 100%; width: 100% ;   color: #4A25AA;">
                <thead style="font-weight: 500; text-align: center;">
                    <tr class="dicobain">
                        <th scope="col">Employee ID</th>
                        <th scope="col" style="text-align:start; ">Employee Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Position</th>
                        <th scope="col">Email</th>
                        {{-- <th scope="col">Role</th> --}}
                        {{-- <th scope="col" style="width: 140px">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $key => $data)
                        <tr>
                            <th scope="row" style="text-align: left; ">{{ $data->employee_id }}</th>
                            <td>{{ $data->full_name }}</td>
                            <td style="text-align: left; ">{{ $data->department->department_name }}</td>
                            <td style="text-align: left; ">{{ $data->position->position_name }}</td>
                            <td style="text-align: left; ">{{ $data->email }}</td>
                            {{-- <td style="text-align: left; ">{{ $data->employeeStatus->status_name ?? 'not assigned' }}</td> --}}
                            {{-- <td style="gap: 8px; display: flex; justify-content: left; ">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('employee.destroy', $data->employee_id) }}" method="POST">
                                    <a href="{{ route('employee.edit', $data->employee_id) }}" class="uwuq"
                                        data-bs-toggle="modal" data-bs-target="#editModal-{{ $data->employee_id }}"
                                        style="width: fit-content; ">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger "
                                        style="width: fit-content; ">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                        @include('partials.edit_employee_modal', [
                            'data' => $data,
                            'department' => $departments,
                            'position' => $positions,
                        ])
                    @empty
                        <div class="alert alert-danger">
                            Data Post belum Tersedia.
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
<!--Modal-->
@section('modal')
    <div class="modal justify-content-center fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{ route('employee.store') }}" method="POST" class="modal-form-check"
                        style="font: 500 14px Narasi Sans, sans-serif">
                        @csrf
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id" />
                        </div>
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Employee Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" />
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
                                <label for="department_id" class="form-label">Department</label>
                                <select name="department_id" class="form-select" id="department_option" required>
                                    <option disabled selected>Select Department</option>
                                    @forelse ($departments as $department_id => $department_name)
                                        <option value="{{ $department_id }}">{{ $department_name }}</option>
                                    @empty
                                        <option disabled selected>Data not found</option>
                                    @endforelse
                                </select>
                            </div>
                            <div style="font: 300 12; justify-content: space-between; align-items: center; flex: 1 0 0">
                                <label for="position_id" class="form-label">Position</label>
                                <select name="position_id" id="position_option" class="form-select">
                                    <option disabled selected>Select Position</option>
                                    @forelse ($positions as $position_id => $position_name)
                                        <option value="{{ $position_id }}">{{ $position_name }}</option>
                                    @empty
                                        <option disabled selected>Data not found</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="managername mb-3"
                            style="font: 300 12; justify-content: space-between; align-items: center; flex: 1 0 0">
                            <label for="managerid" class="form-label">Manager</label>
                            <select name="manager_id" class="form-select" id="manager_id">
                                <option disabled selected>Select Manager</option>
                                @forelse ($managers as $manager)
                                    <option value="{{ $manager->employee_id }}">{{ $manager->full_name }}</option>
                                @empty
                                    <option disabled selected>Data not found</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="status">
                            <div style="font: 300 12px; justify-content: space-between; align-items: center; flex: 1 0 0">
                                <label for="role" class="form-label">Role</label>
                                <select id="role_option" name="role" class="form-select" style="font: 300 12">
                                    <option style="color: rgb(189, 189, 189)">Choose One</option>
                                    @forelse ($employeeStatus as $status)
                                        <option value="{{ $status->employee_status_id }}">{{ $status->status_name }}
                                        </option>
                                    @empty
                                        <option disabled selected>Data not found</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                            <label for="roles">Level</label>
                            @foreach ($access as $role)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="access[]"
                                        value="{{ $role->access_id }}">
                                    <label class="form-check-label">
                                        {{ $role->access_name }}
                                    </label>
                                </div>
                            @endforeach

                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('image/Narasi_Logo.svg') }}" alt=" " />
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
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
        });
    </script>
@endsection
