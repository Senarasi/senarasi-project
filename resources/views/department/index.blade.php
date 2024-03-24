@extends('layout.index')
@section('title')
    Budget Dashboard
@endsection
@section('content')
    <!--Badan Isi-->

        <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Add Department
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                    fill="white" />
            </svg>
        </button>

        <div class="modal justify-content-center fade" id="staticBackdrop" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body bg-white">
                        <form action="{{ route('department.store') }}" method="POST" class="modal-form-check"
                            style="font: 500 14px Narasi Sans, sans-serif">
                            @csrf
                            <div class="mb-3">
                                <label for="namakaryawan" class="form-label">Department Name</label>
                                <input type="text" class="form-control" name="department_name"
                                    placeholder="Department Name">
                            </div>
                            <button type="submit" class="button-submit">Submit</button>
                            <button type="close" class="button-tutup">Close</button>
                        </form>
                    </div>
                    <img class="img-8" src="image/Narasi_Brandmark - Alternate Lockup alternate color version 1.svg "
                        alt=" " />
                </div>
            </div>
        </div>

    <div class="tablenih" style="margin-top: 24px;">
        <table class="table table-hover"
            style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; display: 100%; width: 100% ; ;  color: #4A25AA;">
            <thead style="font-weight: 500; text-align: center">
                <tr class="dicobain">
                    <th scope="col">#</th>
                    <th scope="col" style="text-align:start;">Department</th>
                    <th scope="col">Position</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($department as $key => $data)
                    <tr>
                        <th scope="row" style="text-align: center;">{{ $department->firstItem() + $key }}</th>
                        <td style="width:200px">{{ $data->department_name }}</td>

                        <td style="text-align: center; margin-top: 14px;">
                            @forelse ($data->position->sortBy('department_name') as $position)
                                <span
                                    style="font: 300 12px Narasi sans, sans-serif; color: black; border: 1px solid #4A25AA; border-radius:4px ;background-color: #eceaef; padding: 4px 8px; display: inline-block; margin: 4px;"><small>{{ $position->position_name }}</small></span>
                            @empty
                                <small><i>Position doesn't exist</i></small>
                            @endforelse
                        </td>

                        <td>
                            <span style="display: flex; gap: 8px;">
                                <a href="{{ route('department.edit', $data->department_id) }}" class="uwuq">
                                    <button type="button" class="uwuq">Edit</button>
                                </a>
                                <button type="button " class="btn btn-danger ">Delete</button>
                            </span>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Post belum Tersedia.
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection