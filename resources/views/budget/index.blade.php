@extends('layout.index')
@section('title')
    Budget Dashboard
@endsection
@section('content')
    <div class="judulhalaman" style="display: flex; align-items: center">
        Input Budget Narasi
        <form style="margin-left: 12px" class="d-flex has-search" role="search ">
            <input style="font-size: 14px; justify-content: center" class="form-control me-2" type="search "
                placeholder="Search " aria-label="Search" />
        </form>
    </div>
    <form>
        <div style="display: flex; justify-content: space-between">
            <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#modal1">
                Input Budget
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white" />
                </svg>
            </button>

            <button type="button" class="button-bro" data-bs-toggle=" modal " data-bs-target="#none">
                Import File
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path
                        d="M0 2C0 0.896875 0.896875 0 2 0H7V4C7 4.55313 7.44687 5 8 5H12V9.5H5.5C4.39688 9.5 3.5 10.3969 3.5 11.5V16H2C0.896875 16 0 15.1031 0 14V2ZM12 4H8V0L12 4ZM6.25 11H6.75C7.44063 11 8 11.5594 8 12.25V12.5C8 12.775 7.775 13 7.5 13C7.225 13 7 12.775 7 12.5V12.25C7 12.1125 6.8875 12 6.75 12H6.25C6.1125 12 6 12.1125 6 12.25V14.75C6 14.8875 6.1125 15 6.25 15H6.75C6.8875 15 7 14.8875 7 14.75V14.5C7 14.225 7.225 14 7.5 14C7.775 14 8 14.225 8 14.5V14.75C8 15.4406 7.44063 16 6.75 16H6.25C5.55937 16 5 15.4406 5 14.75V12.25C5 11.5594 5.55937 11 6.25 11ZM10.4094 11H11.5C11.775 11 12 11.225 12 11.5C12 11.775 11.775 12 11.5 12H10.4094C10.1844 12 10 12.1844 10 12.4094C10 12.5719 10.0937 12.7188 10.2437 12.7844L11.4125 13.3031C11.9219 13.5281 12.25 14.0344 12.25 14.5906C12.25 15.3687 11.6187 16 10.8406 16H9.5C9.225 16 9 15.775 9 15.5C9 15.225 9.225 15 9.5 15H10.8406C11.0656 15 11.25 14.8156 11.25 14.5906C11.25 14.4281 11.1563 14.2812 11.0063 14.2156L9.8375 13.6969C9.32812 13.4719 9 12.9656 9 12.4094C9 11.6313 9.63125 11 10.4094 11ZM13.5 11C13.775 11 14 11.225 14 11.5V12.4875C14 13.2063 14.1719 13.9125 14.5 14.55C14.8281 13.9156 15 13.2094 15 12.4875V11.5C15 11.225 15.225 11 15.5 11C15.775 11 16 11.225 16 11.5V12.4875C16 13.5719 15.6781 14.6344 15.075 15.5375L14.9156 15.7781C14.8219 15.9187 14.6656 16 14.5 16C14.3344 16 14.1781 15.9156 14.0844 15.7781L13.925 15.5375C13.3219 14.6344 13 13.5719 13 12.4875V11.5C13 11.225 13.225 11 13.5 11Z"
                        fill="#4A25AA" />
                </svg>
            </button>
        </div>

        <div class="tablenih">
            <table class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                <thead style="font-weight: 500">
                    <tr class="dicobain">
                        <th scope="col ">NO</th>
                        <th scope="col ">Request Number</th>
                        <th scope="col ">Nama Program</th>
                        <th scope="col ">Budget</th>
                        <th scope="col ">User Submit</th>
                        <th scope="col ">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row ">1</th>
                        <td>1</td>
                        <td>Mata Najwa</td>
                        <td></td>
                        <td></td>
                        <td>
                            <span style="display: flex; gap: 8px; justify-content: center">
                                <a type="button " class="uwuq" data-bs-toggle="modal" data-bs-target="#modal2">Edit</a>
                                <button type="button " class="btn btn-danger">Delete</button>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope=" row ">2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span style="display: flex; gap: 8px; justify-content: center">
                                <a type="button " class="uwuq" data-bs-toggle="modal" data-bs-target="#modal2">Edit</a>
                                <button type="button " class="btn btn-danger">Delete</button>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row ">3</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span style="display: flex; gap: 8px; justify-content: center">
                                <a type="button " class="uwuq" data-bs-toggle="modal" data-bs-target="#modal2">Edit</a>
                                <button type="button " class="btn btn-danger">Delete</button>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
@endsection
@section('modal')
    <!-- Modal 1 -->
    <div class="modal justify-content-center fade" id="modal1" data-bs-backdrop="static " data-bs-keyboard="false "
        tabindex="-1 " aria-labelledby="staticBackdropLabel " aria-hidden="true ">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form class="modal-form-check">
                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="disabledTextInput " class="form-label">User</label>
                                <input type="text " id="disabledTextInput " class="form-control"
                                    placeholder="Rp10.000.000 " readonly />
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="namaprogram " class="form-label">Nama Program</label>
                            <input type="text " class="form-control" id="namaprogram " />
                        </div>
                        <!-- <div class="mb-3 ">
                                    <label for="departemen " class="form-label ">Kategori</label>
                                    <select id="departemen " class="form-select ">
                                    <option style="color: rgb(189, 189, 189) ">Choose One</option>
                                    <option>REGULAR</option>
                                    <option>EVENT</option>
                                </select>
                                </div> -->
                        <div id="budgettahunanContainer " class="mb-3">
                            <label for="budgettahunan " class="form-label">Budget Tahunan</label>
                            <input type="text " class="form-control" id="budgettahunan " />
                        </div>
                        <button type="submit " class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{asset("image/Narasi_Logo.svg")}}" alt=" " />
            </div>
        </div>
    </div>

    <!--Modal 2-->
    <div class="modal justify-content-center fade" id="modal2" data-bs-backdrop="static" data-bs-keyboard="false "
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form class="modal-form-check">
                        <fieldset disabled>
                            <div class="departposisi">
                                <div
                                    style="font: 300 12; justify-content: space-between; align-items: center; flex: 1 0 0">
                                    <label for="departemen " class="form-label">Request Number</label>
                                    <input type="text " class="form-control" id="departemen " />
                                </div>
                                <div
                                    style="font: 300 12; justify-content: space-between; align-items: center; flex: 1 0 0">
                                    <label for="statuskaryawan " class="form-label">User</label>
                                    <input type="text " class="form-control" id="statuskaryawan " />
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="namaprogram " class="form-label">Nama Program</label>
                            <input type="text " class="form-control" id="namaprogram " />
                        </div>
                        <!-- <div class="mb-3 ">
                            <label for="departemen " class="form-label ">Kategori</label>
                            <select id="departemen " class="form-select ">
                            <option style="color: rgb(189, 189, 189) ">Choose One</option>
                            <option>REGULAR</option>
                            <option>EVENT</option>
                        </select>
                        </div> -->
                        <div id="budgettahunanContainer " class="mb-3">
                            <label for="budgettahunan " class="form-label">Budget</label>
                            <input type="text " class="form-control" id="budgettahunan " />
                        </div>
                        <button type="submit " class="button-submit">Submit</button>
                        <button type="button " class="button-close btn-secondary" data-bs-dismiss="modal ">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{asset("image/Narasi_Logo.svg")}}" alt=" " />
            </div>
        </div>
    </div>
@endsection
