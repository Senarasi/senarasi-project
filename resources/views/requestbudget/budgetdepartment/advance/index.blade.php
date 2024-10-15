@extends('layout.index')

@section('title')
    Request Purchase - Budgeting System
@endsection

@section('content')


    <div class="judulhalaman" style="display: flex; align-items: center; ">Department Advance Request</div>
            <a href="{{ route('request-budget-department.advance.create') }}" type="button" style="width: fit-content; text-decoration: none" class="button-departemen">
                Advance Request<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white" />
                </svg>
            </a>

        <div class="tablenih">
            <div class="table-responsive p-2">
                <table id="datatable" class="table table-hover "
                style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px;">
                <thead class="table-light">
                        <tr class="dicobain ">
                            {{-- <th scope="col " style="width:64px">No</th> --}}
                            <th scope="col " >Request Number</th>
                            <th scope="col ">Requester</th>
                            <th scope="col "  >Total</th>
                            <th scope="col " style="width:64px">Action</th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                        <tr>
                            {{-- <th scope="row ">1</th> --}}
                            <td>12 December 2024</td>
                            <td> Mata Najwa</td>
                            <td >Rp 100.000.000</td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="{{ route('request-budget-department.advance.create.description') }}"  style="text-decoration: none"> <button type="button "
                                    class="button-general" style="width: fit-content; ">DETAIL</button>
                                </a></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

@endsection



@section('custom-js')

<script>
    $(document).ready(function () {
  $('.selectize').selectize({
    placeholder: "Type to search...",
            allowClear: true,
            create: false
  });
});
</script>
@endsection
