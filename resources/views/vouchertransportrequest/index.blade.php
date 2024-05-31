@extends('layout.index3')

@section('title')
    Transport Request
@endsection

@section('content')
 <div style="margin-left: 24px">
        <div class="judulhalaman" style="display: flex; align-items: center">Transportation Request</div>

        <div style="display: inline-flex; gap: 12px; margin-left:4px;">
            <a href="/voucher-transportrequest/create" type="button" class="button-departemen" style="text-decoration: none"> Add
                Transportion Voucher Request <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white" />
                </svg>
            </a>
        </div>

        <div class="tablenih">
            <div class="table-responsive p-3">
                <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                    <thead style="font-weight: 500">
                        <tr class="dicobain">
                            <th scope="col" style="padding-right: 15px !important;">No</th>
                            <th scope="col ">Date</th>
                            <th scope="col ">User</th>
                            <th scope="col ">User Phone</th>
                            <th scope="col ">Start Location</th>
                            <th scope="col ">Final Location</th>
                            <th scope="col ">Requirement</th>
                            <th scope="col"> Action</th>



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
                            <td></td>
                            <td>
                                <span style="display: flex; gap: 8px; justify-content: center">
                                    <a type="button " class="uwuq" data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</a>
                                    <button type="button " class="btn btn-danger">Delete</button>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
 </div>
@endsection

@section('modal')
    <div class="modal justify-content-center fade" id="modal-edit"  data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif">
                        
                            <div class="mb-3">
                                <label for="vendor" class="form-label">Date</label>
                                <input type="date" class="form-control" id="vendor" />
                            </div>
                            <div class="row">
                                <fieldset disabled="disabled">
                                    <div class="col mb-3">
                                        <label for="PIC" class="form-label">User</label>
                                        <input type="text" class="form-control" id="pic" />
                                    </div>
                                </fieldset>
                                
                                <div class="col mb-3">
                                    <label for="PIC" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="pic" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="PIC" class="form-label">Start Location</label>
                                    <input type="location" class="form-control" id="pic" />
                                </div>
                                <div class="col mb-3">
                                    <label for="PIC" class="form-label">Final Location</label>
                                    <input type="location" class="form-control" id="pic" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="vendor" class="form-label">Requirement</label>
                                <input type="text" class="form-control" id="vendor" />
                            </div>
    
                        
    
    
                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
            </div>
    </div>

@endsection