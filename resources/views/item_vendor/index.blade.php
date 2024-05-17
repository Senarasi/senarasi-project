@extends('layout.index')

@section('title')
    Budget Dashboard
@endsection

@section('content')
    <!--Badan Isi-->
    <div class="judulhalaman" style=" display: flex; align-items: center; ">Barang Pricelist
        {{-- <form style="margin-left: 12px" class="d-flex has-search" role="search ">
            <input style="font-size: 14px; justify-content: center;" class="form-control me-2" type="search "
                placeholder="Search " aria-label="Search" />
        </form> --}}
    </div>
    <form>
        <div style="display: inline-flex; gap: 12px;">
            <a href="/item-create" type="button" class="button-departemen" style="text-decoration: none"> Add
                Barang <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white" />
                </svg>
            </a>
        </div>

        <div class="tablenih" style="padding-top: -24px;">
            <div class="table-responsive p-3">
                <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; display: 100%; width: 100% ;  color: #4A25AA;">
                    <thead style="font-weight: 500; text-align: center">
                        <tr class="dicobain">
                            <th scope="col">No.</th>
                            <th scope="col" style="text-align:start;">Nama Barang</th>
                            <th scope="col">Harga Barang</th>
                            <th scope="col">Vendor</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" style="text-align: center;">1</th>
                            <td>Laptop (Legion 5 Gen 7 (15″ AMD))</td>
                            <td style="text-align: center;">20402170001</td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center;">
                                <a href="/item-edit" class="text-decoration-none text-end">
                                    <button type="button" class="uwuq" style="width: fit-content;">Edit</button>
                                </a>
                                <button type="button" class="btn btn-danger" style="width: fit-content;">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope=" row " style="text-align: center; ">2</th>
                            <td>Mouse Logitech M275 </td>
                            <td style="text-align: center; ">20402170001</td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center;">
                                <a href="/item-edit" class="text-decoration-none text-end">
                                    <button type="button" class="uwuq" style="width: fit-content;">Edit</button>
                                </a>
                                <button type="button" class="btn btn-danger" style="width: fit-content;">Delete</button>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row " style="text-align: center; ">3</th>
                            <td>Kabel LAN</td>
                            <td style="text-align: center; ">20402170001</td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center;">
                                <a href="/item-edit" class="text-decoration-none text-end">
                                    <button type="button" class="uwuq" style="width: fit-content;">Edit</button>
                                </a>
                                <button type="button" class="btn btn-danger" style="width: fit-content;">Delete</button>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </form>
@endsection

