@extends('layout.index')

@section('title')
    Employee Narasi
@endsection
@section('content')
    <div class="judulhalaman" style="display: flex; align-items: center; ">Narasi Audit Laptop
    </div>
    <a href="{{ route('audit_laptop.create') }}" style="text-decoration: none"> <button type="button " class="button-general"
            style="width: fit-content; ">CHECK LAPTOP</button>
    </a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="tablenih" style="margin-top: 24px;">
        <div class="table-responsive p-3">
            <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi, sans-serif; display: 100%; width: 100% ;   color: #4A25AA;">
                <thead style="font-weight: 500; text-align: center;">
                    <tr class="dicobain">
                        <th scope="col">Employee Name</th>
                        <th scope="col">Laptop Number</th>
                        <th scope="col">Serial Number</th>
                        <th scope="col">Status</th>
                        <th scope="col" style="width: 140px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($auditLaptops as $auditLaptop)
                        <tr>
                            <th scope="row" style="text-align: center; ">{{ $auditLaptop->employee->full_name }}</th>
                            <td style="text-align: center; ">{{ $auditLaptop->laptop_number }}</td>
                            <td style="text-align: center; ">{{ $auditLaptop->serial_number }}</td>
                            <td style="text-align: center; ">{{ $auditLaptop->status }}</td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="{{ route('audit_laptop.show', $auditLaptop->audit_laptop_id) }}"  class="uwuq" style="width: fit-content; ">Show</a>
                                <a href="{{ route('audit_laptop.edit', $auditLaptop->audit_laptop_id) }}"  class="uwuq" style="width: fit-content; ">Edit</a>
                                <form action="{{ route('audit_laptop.destroy', $auditLaptop->audit_laptop_id) }}"
                                    method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger "
                                    style="width: fit-content; ">Delete</button>
                                </form>
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
    </div>
@endsection
