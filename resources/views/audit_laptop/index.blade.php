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
            <div class="d-flex justify-content-end mb-2">
                <a class="btn btn-outline-success" href="{{ route('audit_laptop.exportExcel') }}"
                    style="width: auto; padding-bottom: 8px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32">
                        <defs>
                            <linearGradient id="vscodeIconsFileTypeExcel0" x1="4.494" x2="13.832" y1="-2092.086"
                                y2="-2075.914" gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#18884f" />
                                <stop offset=".5" stop-color="#117e43" />
                                <stop offset="1" stop-color="#0b6631" />
                            </linearGradient>
                        </defs>
                        <path fill="#185c37"
                            d="M19.581 15.35L8.512 13.4v14.409A1.19 1.19 0 0 0 9.705 29h19.1A1.19 1.19 0 0 0 30 27.809V22.5Z" />
                        <path fill="#21a366"
                            d="M19.581 3H9.705a1.19 1.19 0 0 0-1.193 1.191V9.5L19.581 16l5.861 1.95L30 16V9.5Z" />
                        <path fill="#107c41" d="M8.512 9.5h11.069V16H8.512Z" />
                        <path d="M16.434 8.2H8.512v16.25h7.922a1.2 1.2 0 0 0 1.194-1.191V9.391A1.2 1.2 0 0 0 16.434 8.2"
                            opacity="0.1" />
                        <path d="M15.783 8.85H8.512V25.1h7.271a1.2 1.2 0 0 0 1.194-1.191V10.041a1.2 1.2 0 0 0-1.194-1.191"
                            opacity="0.2" />
                        <path d="M15.783 8.85H8.512V23.8h7.271a1.2 1.2 0 0 0 1.194-1.191V10.041a1.2 1.2 0 0 0-1.194-1.191"
                            opacity="0.2" />
                        <path d="M15.132 8.85h-6.62V23.8h6.62a1.2 1.2 0 0 0 1.194-1.191V10.041a1.2 1.2 0 0 0-1.194-1.191"
                            opacity="0.2" />
                        <path fill="url(#vscodeIconsFileTypeExcel0)"
                            d="M3.194 8.85h11.938a1.193 1.193 0 0 1 1.194 1.191v11.918a1.193 1.193 0 0 1-1.194 1.191H3.194A1.19 1.19 0 0 1 2 21.959V10.041A1.19 1.19 0 0 1 3.194 8.85" />
                        <path fill="#fff"
                            d="m5.7 19.873l2.511-3.884l-2.3-3.862h1.847L9.013 14.6c.116.234.2.408.238.524h.017q.123-.281.26-.546l1.342-2.447h1.7l-2.359 3.84l2.419 3.905h-1.809l-1.45-2.711A2.4 2.4 0 0 1 9.2 16.8h-.024a1.7 1.7 0 0 1-.168.351l-1.493 2.722Z" />
                        <path fill="#33c481" d="M28.806 3h-9.225v6.5H30V4.191A1.19 1.19 0 0 0 28.806 3" />
                        <path fill="#107c41" d="M19.581 16H30v6.5H19.581Z" />
                    </svg>
                    <span style="vertical-align: middle">EXPORT TO EXCEL</span>
                </a>
            </div>
            <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi, sans-serif; display: 100%; width: 100% ;   color: #4A25AA;">
                <thead style="font-weight: 500; text-align: center;">
                    <tr class="dicobain">
                        <th scope="col">Employee Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Laptop Number</th>
                        <th scope="col">Serial Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal Audit</th>
                        <th scope="col" style="width: 140px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($auditLaptops as $auditLaptop)
                        <tr>
                            <th scope="row" style="text-align: center; ">{{ $auditLaptop->employee->full_name }}</th>
                            <th scope="row" style="text-align: center; ">
                                {{ $auditLaptop->employee->department->department_name }}</th>
                            <td style="text-align: center; ">{{ $auditLaptop->laptop_number }}</td>
                            <td style="text-align: center; ">{{ $auditLaptop->serial_number }}</td>
                            <td style="text-align: center; ">{{ $auditLaptop->audit_status }}</td>
                            <td style="text-align: center; ">{{ $auditLaptop->created_at }}</td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                {{-- <a href="{{ route('audit_laptop.show', $auditLaptop->audit_laptop_id) }}"  class="uwuq" style="width: fit-content; ">Show</a> --}}
                                <a href="{{ route('audit_laptop.edit', $auditLaptop->audit_laptop_id) }}" class="uwuq"
                                    style="width: fit-content; ">Edit</a>
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
