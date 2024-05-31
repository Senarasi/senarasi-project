@extends('layout.index2')

@section('title')
    Payment Requestgit
@endsection

@section('content')
    <div style="margin-left: 24px">
        <div class="judulhalaman" style="display: flex; align-items: center">Payment Request</div>

            <div style="display: flex; justify-content: space-between; margin-left:4px;">
                <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#modal-paymentrequest">
                    Add Payment Request
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                            fill="white" />
                    </svg>
                </button>
            </div>

            <div class="tablenih">
                <div class="table-responsive p-3">
                    <table id="datatable" class="table table-hover"
                    style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                        <thead style="font-weight: 500">
                            <tr class="dicobain">
                                <th scope="col ">No</th>
                                <th scope="col ">Request Number</th>
                                <th scope="col ">Date</th>
                                <th scope="col ">Company Name</th>
                                <th scope="col ">Total</th>
                                <th scope="col ">Invoice</th>
                                {{-- <th scope="col ">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle;">
                            <tr>
                                <th scope="row ">1</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                {{-- <td>
                                    <span style="display: flex; gap: 8px; justify-content: center">
                                        <a type="button " class="uwuq" data-bs-toggle="modal" data-bs-target="#modal2">Edit</a>
                                        <button type="button " class="btn btn-danger">Delete</button>
                                    </span>
                                </td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('modal')
<div class="modal justify-content-center fade" id="modal-paymentrequest"  data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif">
                        <div class="mb-3">
                            <label for="nomorRequest" class="form-label">Request Number</label>
                            <input type="text" class="form-control" id="nomorRequest" />
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" />
                        </div>
                        <div class="mb-3">
                            <label for="ptName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="ptName" />
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="text" class="form-control" id="total" />
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Invoice</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>

                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
            </div>
        </div>
    </div>
@endsection

@section('custom-js')

@endsection
