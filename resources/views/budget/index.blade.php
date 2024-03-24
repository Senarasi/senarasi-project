@extends('layout.index')
@section('title')
    Budget Dashboard
@endsection
@section('content')
    <div class="judulhalaman" style="display: flex; align-items: center; ">Request Budget Narasi
        <form style="margin-left: 12px" class="d-flex has-search" role="search ">
            <input style="font-size: 14px; justify-content: center;" class="form-control me-2" type="search "
                placeholder="Search " aria-label="Search" />
        </form>
    </div>
    <form>
        <div class="keteranganbudget">
            <div class="tunggu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="12" fill="#FFE900" />
                </svg><span class="text-center">menunggu approval</span>
            </div>
            <div class="tolak">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="12" fill="#E73638" />
                </svg><span class="text-center">approval ditolak</span>
            </div>
            <div class="diterima">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="12" fill="#4A25AA" />
                </svg><span class="text-center">approval disetujui</span>
            </div>
        </div>


        <div class=" modal justify-content-center fade " id="staticBackdrop " data-bs-backdrop="static "
            data-bs-keyboard="false " tabindex="-1 " aria-labelledby="staticBackdropLabel " aria-hidden="true ">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content ">
                    <div class="modal-body bg-white ">
                        <form class="modal-form-check " style="font: 500 14px Narasi Sans, sans-serif ">
                            <div class="mb-3 ">
                                <label for="namakaryawan " class="form-label ">Nama Departemen</label>
                                <input type="text " class="form-control " id="namakaryawan " />
                            </div>

                            <button type="add " class="button-submit ">Submit</button>
                            <button type="close " class="button-tutup ">Close</button>
                        </form>
                    </div>
                    <img class="img-8 " src="image/Narasi_Brandmark - Alternate Lockup alternate color version 1.svg "
                        alt=" " />
                </div>
            </div>
        </div>
        <div class="tablenih">
            <table class="table table-hover "
                style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                <thead style="font-weight: 500; ">
                    <tr class="dicobain ">
                        <th scope="col ">NO</th>
                        <th scope="col ">Request Number</th>
                        <th scope="col ">Nama Program</th>
                        <th scope="col ">Approval 1</th>
                        <th scope="col ">Approval 2</th>
                        <th scope="col ">Approval 3</th>
                        <th scope="col ">User Submit</th>
                        <th scope="col ">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row ">1</th>
                        <td>1</td>
                        <td> Mata Najwa</td>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <circle cx="12" cy="12" r="12" fill="#E73638" />
                            </svg></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="gap: 8px; display: flex; justify-content: center; "><button type="button "
                                class="button-general" style="width: fit-content; ">DETAIL</button></td>
                    </tr>
                    <tr>
                        <th scope=" row ">2</th>
                        <td> </td>
                        <td></td>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <circle cx="12" cy="12" r="12" fill="#E73638" />
                            </svg></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="gap: 8px; display: flex; justify-content: center; "><button type="button "
                                class="button-general" style="width: fit-content; ">DETAIL</button></td>

                    </tr>
                    <tr>
                        <th scope="row ">3</th>
                        <td></td>
                        <td></td>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <circle cx="12" cy="12" r="12" fill="#E73638" />
                            </svg></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="gap: 8px; display: flex; justify-content: center; "><button type="button "
                                class="button-general" style="width: fit-content; ">DETAIL</button></td>

                    </tr>
                </tbody>
            </table>

        </div>

    </form>
@endsection
