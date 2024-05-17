@extends('layout.index')

@section('title')
    Approval - Budgeting System
@endsection

@section('content')
    {{-- <a href="/approval-detail" class="text-decoration-none text-end">
        <button class="button-adminapprov ">
            <div style="display: flex; flex-direction: column; align-items: flex-start ">
                <span style="font: 700 32px Narasi Sans, sans-serif; padding-bottom: 8px; ">Mata Najwa</span>
                <span style="font: 700 24px Narasi Sans, sans-serif ">Rp100.000.000<span
                        style="font: 500 16px Narasi Sans, sans-serif ">/year</span></span>
                <span style="font: 500 16px Narasi Sans, sans-serif ">12 April 2024</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg " width="56 " height="57 " viewBox="0 0 56 57 " fill="none ">
                <g clip-path="url(#clip0_217_638) ">
                    <path fill-rule="evenodd " clip-rule="evenodd " d="M37.4733 26.0267C38.1287 26.6829 38.4969 27.5725 38.4969 28.5C38.4969 29.4275 38.1287 30.3171 37.4733 30.9733L24.2759 44.1753C23.6194 44.8316 22.729 45.2002 21.8006 45.2C20.8723 45.1997 19.9821 44.8307 19.3258 44.1742C18.6695
          43.5176 18.3009 42.6272 18.3011 41.6988C18.3014 40.7705 18.6704 39.8803 19.3269 39.224L30.0509 28.5L19.3269 17.776C18.6891 17.1162 18.3359 16.2322 18.3434 15.3145C18.3509 14.3968 18.7186 13.5188 19.3672 12.8696C20.0159 12.2203 20.8935 11.8518
          21.8112 11.8434C22.7289 11.835 23.6132 12.1874 24.2736 12.8246L37.4756 26.0243L37.4733 26.0267Z "
                        fill="#4A25AA " />
                </g>
                <defs>
                    <clipPath id="clip0_217_638 ">
                        <rect width="56 " height="56 " fill="white " transform="matrix(0 -1 1 0 0 56.5) " />
                    </clipPath>
                </defs>
            </svg>
        </button>
    </a> --}}

    <div class="judulhalaman" style="display: flex; align-items: center; ">Approval
        {{-- <form style="margin-left: 12px" class="d-flex has-search" role="search ">
            <input style="font-size: 14px; justify-content: center;" class="form-control me-2" type="search "
                placeholder="Search " aria-label="Search" />
        </form> --}}
    </div>
    <form>


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
            <div class="table-responsive p-3">
                <table  id="datatable" class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                    <thead style="font-weight: 500; ">
                        <tr class="dicobain">
                            <th scope="col ">NO</th>
                            <th scope="col ">Request Number</th>
                            <th scope="col ">Nama Program</th>
                            <th scope="col ">Total Cost</th>
                            <th scope="col ">User Submit</th>
                            <th scope="col ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row ">1</th>
                            <td>1</td>
                            <td> Mata Najwa</td>
                            <td></td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="/approval-detail"  style="text-decoration: none"> <button type="button "
                                    class="button-general" style="width: fit-content; ">DETAIL</button>
                                </a></td>

                        </tr>
                        <tr>
                            <th scope=" row ">2</th>
                            <td> </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="/approval-detail"  style="text-decoration: none"> <button type="button "
                                    class="button-general" style="width: fit-content; ">DETAIL</button>
                                </a></td>

                        </tr>
                        <tr>
                            <th scope="row ">3</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="gap: 8px; display: flex; justify-content: center; ">
                                <a href="/approval-detail"  style="text-decoration: none"> <button type="button "
                                    class="button-general" style="width: fit-content; ">DETAIL</button>
                                </a></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </form>

    {{-- <button class="button-adminapprov ">
        <div style="display: flex; flex-direction: column; align-items: flex-start ">
            <span style="font: 700 32px Narasi Sans, sans-serif; padding-bottom: 8px; ">Mata Najwa</span>
            <span style="font: 700 24px Narasi Sans, sans-serif ">Rp100.000.000<span
                    style="font: 500 16px Narasi Sans, sans-serif ">/year</span></span>
            <span style="font: 500 16px Narasi Sans, sans-serif ">12 April 2024</span>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg " width="56 " height="57 " viewBox="0 0 56 57 " fill="none ">
            <g clip-path="url(#clip0_217_638) ">
                <path fill-rule="evenodd " clip-rule="evenodd " d="M37.4733 26.0267C38.1287 26.6829 38.4969 27.5725 38.4969 28.5C38.4969 29.4275 38.1287 30.3171 37.4733 30.9733L24.2759 44.1753C23.6194 44.8316 22.729 45.2002 21.8006 45.2C20.8723 45.1997 19.9821 44.8307 19.3258 44.1742C18.6695
      43.5176 18.3009 42.6272 18.3011 41.6988C18.3014 40.7705 18.6704 39.8803 19.3269 39.224L30.0509 28.5L19.3269 17.776C18.6891 17.1162 18.3359 16.2322 18.3434 15.3145C18.3509 14.3968 18.7186 13.5188 19.3672 12.8696C20.0159 12.2203 20.8935 11.8518
      21.8112 11.8434C22.7289 11.835 23.6132 12.1874 24.2736 12.8246L37.4756 26.0243L37.4733 26.0267Z " fill="#4A25AA " />
            </g>
            <defs>
                <clipPath id="clip0_217_638 ">
                    <rect width="56 " height="56 " fill="white " transform="matrix(0 -1 1 0 0 56.5) " />
                </clipPath>
            </defs>
        </svg>
    </button>
    <button class="button-adminapprov ">
        <div style="display: flex; flex-direction: column; align-items: flex-start ">
            <span style="font: 700 32px Narasi Sans, sans-serif; padding-bottom: 8px; ">Mata Najwa</span>
            <span style="font: 700 24px Narasi Sans, sans-serif ">Rp100.000.000<span
                    style="font: 500 16px Narasi Sans, sans-serif ">/year</span></span>
            <span style="font: 500 16px Narasi Sans, sans-serif ">12 April 2024</span>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg " width="56 " height="57 " viewBox="0 0 56 57 " fill="none ">
            <g clip-path="url(#clip0_217_638) ">
                <path fill-rule="evenodd " clip-rule="evenodd " d="M37.4733 26.0267C38.1287 26.6829 38.4969 27.5725 38.4969 28.5C38.4969 29.4275 38.1287 30.3171 37.4733 30.9733L24.2759 44.1753C23.6194 44.8316 22.729 45.2002 21.8006 45.2C20.8723 45.1997 19.9821 44.8307 19.3258 44.1742C18.6695
          43.5176 18.3009 42.6272 18.3011 41.6988C18.3014 40.7705 18.6704 39.8803 19.3269 39.224L30.0509 28.5L19.3269 17.776C18.6891 17.1162 18.3359 16.2322 18.3434 15.3145C18.3509 14.3968 18.7186 13.5188 19.3672 12.8696C20.0159 12.2203 20.8935 11.8518
          21.8112 11.8434C22.7289 11.835 23.6132 12.1874 24.2736 12.8246L37.4756 26.0243L37.4733 26.0267Z "
                    fill="#4A25AA " />
            </g>
            <defs>
                <clipPath id="clip0_217_638 ">
                    <rect width="56 " height="56 " fill="white " transform="matrix(0 -1 1 0 0 56.5) " />
                </clipPath>
            </defs>
        </svg>
    </button>
    <button class="button-adminapprov ">
        <div style="display: flex; flex-direction: column; align-items: flex-start ">
            <span style="font: 700 32px Narasi Sans, sans-serif; padding-bottom: 8px; ">Mata Najwa</span>
            <span style="font: 700 24px Narasi Sans, sans-serif ">Rp100.000.000<span
                    style="font: 500 16px Narasi Sans, sans-serif ">/year</span></span>
            <span style="font: 500 16px Narasi Sans, sans-serif ">12 April 2024</span>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg " width="56 " height="57 " viewBox="0 0 56 57 " fill="none ">
            <g clip-path="url(#clip0_217_638) ">
                <path fill-rule="evenodd " clip-rule="evenodd " d="M37.4733 26.0267C38.1287 26.6829 38.4969 27.5725 38.4969 28.5C38.4969 29.4275 38.1287 30.3171 37.4733 30.9733L24.2759 44.1753C23.6194 44.8316 22.729 45.2002 21.8006 45.2C20.8723 45.1997 19.9821 44.8307 19.3258 44.1742C18.6695
              43.5176 18.3009 42.6272 18.3011 41.6988C18.3014 40.7705 18.6704 39.8803 19.3269 39.224L30.0509 28.5L19.3269 17.776C18.6891 17.1162 18.3359 16.2322 18.3434 15.3145C18.3509 14.3968 18.7186 13.5188 19.3672 12.8696C20.0159 12.2203 20.8935 11.8518
              21.8112 11.8434C22.7289 11.835 23.6132 12.1874 24.2736 12.8246L37.4756 26.0243L37.4733 26.0267Z "
                    fill="#4A25AA " />
            </g>
            <defs>
                <clipPath id="clip0_217_638 ">
                    <rect width="56 " height="56 " fill="white " transform="matrix(0 -1 1 0 0 56.5) " />
                </clipPath>
            </defs>
        </svg>
    </button> --}}
@endsection
