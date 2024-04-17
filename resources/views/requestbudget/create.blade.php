@extends('layout.index')
@section('title')
    Budget Dashboard
@endsection
@section('content')
    <a href="/dashboard-budget" <button class="navback">
        <svg xmlns="http://www.w3.org/2000/svg " width="10 " height="17 " viewBox="0 0 10 17 " fill="none ">
            <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
              7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
        </svg>
        Back to Main Dashboard
        </button>
    </a>

    <div class="judulhalaman" style="text-align: start">Request Budget</div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Header</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="data1-tab" data-bs-toggle="tab" data-bs-target="#data1-tab-pane" type="button"
                role="tab" aria-controls="data1-tab-pane" aria-selected="false" disabled>Data 1</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="data2-tab" data-bs-toggle="tab" data-bs-target="#data2-tab-pane" type="button"
                role="tab" aria-controls="data2-tab-pane" aria-selected="false" disabled>Data 2</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="data3-tab" data-bs-toggle="tab" data-bs-target="#data3-tab-pane" type="button"
                role="tab" aria-controls="data3-tab-pane" aria-selected="false" disabled>Data 3</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="data4-tab" data-bs-toggle="tab" data-bs-target="#data4-tab-pane" type="button"
                role="tab" aria-controls="data4-tab-pane" aria-selected="false" disabled>Data 4</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="data5-tab" data-bs-toggle="tab" data-bs-target="#data5-tab-pane" type="button"
                role="tab" aria-controls="data1-tab-pane" aria-selected="false" disabled>Data 5</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="preview-tab" data-bs-toggle="tab" data-bs-target="#preview-tab-pane" type="button"
                role="tab" aria-controls="preview-tab-pane" aria-selected="false" disabled>Preview</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane"
                type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false"
                disabled>Disabled</button>
        </li>
    </ul>

    <!-- home -->
    <div class="tab-content" id="myTabContent" style="margin-top: 24px">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
            tabindex="0">
            <form class="formrequest">
                <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                    <div class="mb-3">
                        <label for="Select " class="form-label">Pilih Program</label>
                        <select id="Select " class="form-select">
                            <option>Choose One</option>
                        </select>
                    </div>
                    <fieldset disabled>
                        <div class="mb-3"><label for="disabledTextInput" class="form-label">Kode Budget</label>
                            <input type="text " id="disabledTextInput " class="form-control"
                                placeholder="Rp10.000.000 " />
                        </div>
                    </fieldset>

                </div>


                <fieldset disabled>
                    <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Budget Tahunan</label>
                            <input type="text " id="disabledTextInput " class="form-control"
                                placeholder="Rp10.000.000 " />
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput " class="form-label">Remaining Budget</label>
                            <input type="text " id="disabledTextInput " class="form-control"
                                placeholder="Rp10.000.000 " />
                        </div>
                    </div>
                </fieldset>

                <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                    <div class="mb-3">
                        <label for="disabledTextInput " class="form-label">Episode</label>
                        <input type="text " id="disabledTextInput " class="form-control"
                            placeholder="Rp10.000.000 " />
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput " class="form-label">Location</label>
                        <input type="text " id="disabledTextInput " class="form-control"
                            placeholder="Rp10.000.000 " />
                    </div>
                </div>

                <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                    <div class="mb-3">
                        <label for="managerform" class="form-label">Tanggal Mulai</label>
                        <input type="date" id="disabledTextInput " class="form-control"
                            placeholder="Rp10.000.000 " />
                    </div>
                    <div class="mb-3">
                        <label for="managerform" class="form-label">Tanggal Selesai</label>
                        <input type="date" id="disabledTextInput " class="form-control"
                            placeholder="Rp10.000.000 " />
                    </div>
                </div>
            </form>


            <button type="button" class="button-departemen"
                style="justify-content: center; align-items: center; display: inline-flex" id="nextButton">Next
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"
                    fill="none">
                    <path d="M17 10L10.1429 4M17 10L10.1429 16M17 10H1" stroke="white" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>

        <!-- isi 1 -->
        <div class="tab-pane fade" id="data1-tab-pane" role="tabpanel" aria-labelledby="data1e-tab" tabindex="0">
            <form action="" class="formrequest">
                <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px">
                    <table class="table table-hover"
                        style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                        <thead style="font-weight: 500">
                            <tr class="dicobain">
                                <th scope="col ">NO</th>
                                <th scope="col ">Description</th>
                                <th scope="col ">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row ">1</th>
                                <td style="text-align: start">SUB TOTAL PRODUCTION CREWS</td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <th scope=" row ">2</th>
                                <td style="text-align: start"></td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <th scope="row ">3</th>
                                <td style="text-align: start"></td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right"
                                    style="font-weight: 500; background-color: #dbdee8">Total</td>
                                <td class="total-price">$80</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="tableContainer">
                    <div class="tablein" style="padding: 24px;">
                        <div class="delete-button" style="margin-bottom:-12px; text-align: right;">
                            <button type="button" class="btn"
                                style="background-color: #4A25AA;color: white; padding: 8px 24px;">Save</button>

                        </div>
                        <div class="mb-3">
                            <label for="Select" class="form-label">Choose Description</label>
                            <select id="Select" class="form-select">
                                <option>Choose One</option>
                                <optio n>Production Crews</optio>
                                <option>Alat Produksi</option>
                                <option>Operasional</option>
                                <option>Sewa Lokasi</option>
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                                        <label for="name" class="form-label" style="margin-bottom: 12px">Sub Description</label>
                                        <input type="text" class="form-control" id="costdirect" aria-describedby="emailHelp" />
                                    </div> -->
                        <!--
                                    <div class="mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" style="margin-left: 8px;margin-top: 2px" for="flexCheckDefault">Make it Bundle</label>
                                    </div> -->
                        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <!-- Input nama berbentuk select jika REP dipilih sebagai NCS -->
                                <div id="nameInputContainer">
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Select" class="form-label">REP</label>
                                <select id="repSelect" class="form-select" onchange="toggleNameInput()">
                                    <option value="in">Choose</option>
                                    <option value="out">Out</option>
                                    <option value="ncs">NCS</option>
                                </select>
                            </div>
                        </div>

                        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr 1fr">
                            <div class="mb-3">
                                <label for="name" class="day form-label">DAY</label>
                                <input type="number" class="form-control" id="day"
                                    aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="name" class="qty form-label">QTY</label>
                                <input type="number" class="form-control" id="qty"
                                    aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="name" class="freq form-label">FREQ</label>
                                <input type="number" class="form-control" id="freq"
                                    aria-describedby="emailHelp" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label" style="margin-bottom: 12px">COST</label>
                            <input type="text" class="form-control" id="costdirect" aria-describedby="emailHelp" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="content" style="margin-bottom: 12px">Notes</label>
                            <textarea class="form-control" id="content" rows="5" placeholder="Notes"></textarea>
                        </div>
                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="name" class="form-label" style="margin-bottom: 12px">TOTAL COST</label>
                                <input type="text" class="form-control" id="totalcostdirect"
                                    aria-describedby="emailHelp" />
                            </div>
                        </fieldset>
                        <div class="garisbutton" style="margin-top: 12px; margin-bottom: -12px;">
                            <button type="button" class="garisbutton" onclick="addVendor(event) ">Tambah
                                Deskripsi</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>


        <!-- isi 2-->
        <div class="tab-pane fade" id="data2-tab-pane" role="tabpanel" aria-labelledby="data2e-tab" tabindex="0">
            <form action="" class="formrequest">
                <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px">
                    <table class="table table-hover"
                        style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                        <thead style="font-weight: 500">
                            <tr class="dicobain">
                                <th scope="col ">NO</th>
                                <th scope="col ">Description</th>
                                <th scope="col ">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row ">1</th>
                                <td style="text-align: start">SUB TOTAL PRODUCTION CREWS</td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <th scope=" row ">2</th>
                                <td style="text-align: start"></td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <th scope="row ">3</th>
                                <td style="text-align: start"></td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right"
                                    style="font-weight: 500; background-color: #dbdee8">Total</td>
                                <td class="total-price">$80</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="button-departemen" onclick="addSesi()">Add Sesi<svg
                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                            fill="white" />
                    </svg>
                </button>

                <div id="tableContainer"></div>
            </form>
        </div>


        <!-- isi 3 -->
        <div class="tab-pane fade" id="data3-tab-pane" role="tabpanel" aria-labelledby="data3e-tab" tabindex="0">
            <form action="" class="formrequest">
                <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px">
                    <table class="table table-hover"
                        style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                        <thead style="font-weight: 500">
                            <tr class="dicobain">
                                <th scope="col ">NO</th>
                                <th scope="col ">Description</th>
                                <th scope="col ">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row ">1</th>
                                <td style="text-align: start">SUB TOTAL PRODUCTION CREWS</td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <th scope=" row ">2</th>
                                <td style="text-align: start"></td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <th scope="row ">3</th>
                                <td style="text-align: start"></td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right"
                                    style="font-weight: 500; background-color: #dbdee8">Total</td>
                                <td class="total-price">$80</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="button-departemen" onclick="addSesi()">Add Sesi<svg
                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                            fill="white" />
                    </svg>
                </button>

                <div id="tableContainer"></div>
            </form>
        </div>

        <!-- isi -->
        <div class="tab-pane fade" id="data4-tab-pane" role="tabpanel" aria-labelledby="data4e-tab" tabindex="0">
            <form action="" class="formrequest">
                <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px">
                    <table class="table table-hover"
                        style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                        <thead style="font-weight: 500">
                            <tr class="dicobain">
                                <th scope="col ">NO</th>
                                <th scope="col ">Description</th>
                                <th scope="col ">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row ">1</th>
                                <td style="text-align: start">SUB TOTAL PRODUCTION CREWS</td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <th scope=" row ">2</th>
                                <td style="text-align: start"></td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <th scope="row ">3</th>
                                <td style="text-align: start"></td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right"
                                    style="font-weight: 500; background-color: #dbdee8">Total</td>
                                <td class="total-price">$80</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="button-departemen" onclick="addSesi()">Add Sesi<svg
                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                            fill="white" />
                    </svg>
                </button>

                <div id="tableContainer"></div>
            </form>
        </div>


        <!-- isi -->
        <div class="tab-pane fade" id="data5-tab-pane" role="tabpanel" aria-labelledby="data5e-tab" tabindex="0">
            <form action="" class="formrequest">
                <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px">
                    <table class="table table-hover"
                        style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                        <thead style="font-weight: 500">
                            <tr class="dicobain">
                                <th scope="col ">NO</th>
                                <th scope="col ">Description</th>
                                <th scope="col ">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row ">1</th>
                                <td style="text-align: start">SUB TOTAL PRODUCTION CREWS</td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <th scope=" row ">2</th>
                                <td style="text-align: start"></td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <th scope="row ">3</th>
                                <td style="text-align: start"></td>

                                <td class="total-price" style="font-weight: 300">$20</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right"
                                    style="font-weight: 500; background-color: #dbdee8">Total</td>
                                <td class="total-price">$80</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="button-departemen" onclick="addSesi()">Add Sesi<svg
                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                            fill="white" />
                    </svg>
                </button>

                <div id="tableContainer"></div>
            </form>
        </div>

        <!-- Isi preview -->
        <div class="tab-pane fade" id="preview-tab-pane" role="tabpanel" aria-labelledby="preview-tab" tabindex="0">
            <button type="button" class="button-permintaan"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                    height="32" viewBox="0 0 32 32" fill="none">
                    <path
                        d="M16 2C13.2311 2 10.5243 2.82109 8.22202 4.35943C5.91973 5.89777 4.12532 8.08427 3.06569 10.6424C2.00607 13.2006 1.72882 16.0155 2.26901 18.7313C2.80921 21.447 4.14258 23.9416 6.10051 25.8995C8.05845 27.8574 10.553 29.1908 13.2687 29.731C15.9845 30.2712 18.7994 29.9939 21.3576 28.9343C23.9157 27.8747 26.1022 26.0803 27.6406 23.778C29.1789 21.4757 30 18.7689 30 16C30 12.287 28.525 8.72601 25.8995 6.1005C23.274 3.475 19.713 2 16 2ZM23.447 16.895L11.447 22.895C11.2945 22.9712 11.1251 23.0072 10.9548 22.9994C10.7845 22.9917 10.619 22.9406 10.474 22.8509C10.329 22.7613 10.2093 22.636 10.1264 22.4871C10.0434 22.3381 9.99993 22.1705 10 22V10C10.0001 9.82961 10.0437 9.66207 10.1268 9.51327C10.2098 9.36448 10.3294 9.23936 10.4744 9.14981C10.6194 9.06025 10.7848 9.00921 10.955 9.00155C11.1252 8.99388 11.2946 9.02984 11.447 9.106L23.447 15.106C23.6129 15.1891 23.7524 15.3168 23.8498 15.4747C23.9473 15.6326 23.9989 15.8145 23.9989 16C23.9989 16.1855 23.9473 16.3674 23.8498 16.5253C23.7524 16.6832 23.6129 16.8109 23.447 16.894"
                        fill="white" />
                </svg>Preview</button>
            <button type="button" class="button-departemen">Submit
            </button>
        </div>
        <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab"
            tabindex="0">...</div>


    </div>
    <fieldset disabled></fieldset>
@endsection
@section('custom-js')
<script src="script.js"></script>
<script>
    // Event listener for the "Next" button
    document.getElementById('nextButton').addEventListener('click', function() {
        // Enable the "Data 1" button and update its styling
        var data1Tab = document.getElementById('data1-tab');
        data1Tab.disabled = false;
        data1Tab.classList.add('active');

        // Enable the "Data 2" button and update its styling
        var data2Tab = document.getElementById('data2-tab');
        data2Tab.disabled = false;

        // Enable the "Data 3" button and update its styling
        var data3Tab = document.getElementById('data3-tab');
        data3Tab.disabled = false;

        // Enable the "Data 4" button and update its styling
        var data4Tab = document.getElementById('data4-tab');
        data4Tab.disabled = false;

        // Enable the "Data 5" button and update its styling
        var data5Tab = document.getElementById('data5-tab');
        data5Tab.disabled = false;

        // Enable the "Preview" button and update its styling
        var previewTab = document.getElementById('preview-tab');
        previewTab.disabled = false;

        // Disable the "Home" button and update its styling
        var homeTab = document.getElementById('home-tab');
        homeTab.classList.remove('active');

        // Hide the current tab content and show the "Data 1" tab content
        var tabPanes = document.getElementsByClassName('tab-pane');
        for (var i = 0; i < tabPanes.length; i++) {
            tabPanes[i].classList.remove('show', 'active');
        }
        var data1TabPane = document.getElementById('data1-tab-pane');
        data1TabPane.classList.add('show', 'active');

        // Switch to the "Data 1" tab header
        var tabList = document.getElementById('myTab');
        var tabListItems = tabList.getElementsByTagName('li');
        for (var j = 0; j < tabListItems.length; j++) {
            if (tabListItems[j].id === 'data1-tab') {
                tabListItems[j].classList.add('active');
            } else {
                tabListItems[j].classList.remove('active'); // Remove active class from other tabs
            }
        }

        // Scroll to the top of the "Data 1" tab content
        var data1TabPaneOffset = data1TabPane.offsetTop;
        window.scrollTo(0, data1TabPaneOffset);
    });

    // Event listener for the "Home" tab
    document.getElementById('home-tab').addEventListener('click', function() {
        // Enable the "Data 1" tab and update its styling
        var data1Tab = document.getElementById('data1-tab');
        data1Tab.disabled = false;

        // Enable the "Data 2" tab and update its styling
        var data2Tab = document.getElementById('data2-tab');
        data2Tab.disabled = false;

        // Enable the "Data 3" tab and update its styling
        var data3Tab = document.getElementById('data3-tab');
        data3Tab.disabled = false;

        // Enable the "Data 4" tab and update its styling
        var data4Tab = document.getElementById('data4-tab');
        data4Tab.disabled = false;

        // Enable the "Data 5" tab and update its styling
        var data5Tab = document.getElementById('data5-tab');
        data5Tab.disabled = false;

        // Enable the "Preview" tab and update its styling
        var previewTab = document.getElementById('preview-tab');
        previewTab.disabled = false;

        // Hide the current tab content and show the "Home" tab content
        var tabPanes = document.getElementsByClassName('tab-pane');
        for (var i = 0; i < tabPanes.length; i++) {
            tabPanes[i].classList.remove('show', 'active');
        }
        var homeTabPane = document.getElementById('home-tab-pane');
        homeTabPane.classList.add('show', 'active');

        // Switch to the "Home" tab header
        var tabList = document.getElementById('myTab');
        var tabListItems = tabList.getElementsByTagName('li');
        for (var j = 0; j < tabListItems.length; j++) {
            if (tabListItems[j].id === 'home-tab') {
                tabListItems[j].classList.add('active');
            } else {
                tabListItems[j].classList.remove('active'); // Remove active class from other tabs
            }
        }

        // Scroll to the top of the "Home" tab content
        var homeTabPaneOffset = homeTabPane.offsetTop;
        window.scrollTo(0, homeTabPaneOffset);
    });



    function addVendor(event) {
        var addButton = event.target;
        var parentDiv = addButton.closest('.tablein');

        // Buat elemen untuk data deskripsi baru
        var divDescription = document.createElement('div');
        divDescription.classList.add('mb-3');
        divDescription.innerHTML = `
        <hr class='dotted' />
        <div style="margin-top: -12px; margin-bottom: -12px;">
            <div class="delete-button" style="margin-bottom:-12px; text-align: right;">
        <button type="button" class="delete-button" onclick="deleteSesi(event)" style="background: none; border: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <g clip-path="url(#clip0_389_307)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 13.414L17.6568 19.071C17.8454 19.2532 18.098 19.354 18.3602 19.3517C18.6224 19.3494 18.8732 19.2443 19.0586 19.0588C19.2441 18.8734 19.3492 18.6226 19.3515 18.3604C19.3538 18.0982 19.253 17.8456 19.0708 17.657L13.4138 12L19.0708 6.34303C19.253 6.15443 19.3538 5.90182 19.3515 5.63963C19.3492 5.37743 19.2441 5.12662 19.0586 4.94121C18.8732 4.7558 18.6224 4.65063 18.3602 4.64835C18.098 4.64607 17.8454 4.74687 17.6568 4.92903L11.9998 10.586L6.34282 4.92903C6.15337 4.75137 5.90224 4.65439 5.64255 4.65861C5.38287 4.66283 5.13502 4.76791 4.95143 4.95162C4.76785 5.13533 4.66294 5.38326 4.65891 5.64295C4.65488 5.90263 4.75203 6.1537 4.92982 6.34303L10.5858 12L4.92882 17.657C4.83331 17.7493 4.75713 17.8596 4.70472 17.9816C4.65231 18.1036 4.62473 18.2348 4.62357 18.3676C4.62242 18.5004 4.64772 18.6321 4.698 18.755C4.74828 18.8779 4.82254 18.9895 4.91643 19.0834C5.01032 19.1773 5.12197 19.2516 5.24487 19.3018C5.36777 19.3521 5.49944 19.3774 5.63222 19.3763C5.765 19.3751 5.89622 19.3475 6.01823 19.2951C6.14023 19.2427 6.25058 19.1665 6.34282 19.071L11.9998 13.414Z" fill="#252525"/>
                </g>
                <defs>
                    <clipPath id="clip0_389_307">
                        <rect width="24" height="24" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
        </button>
    </div>
    <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <!-- Input nama berbentuk select jika REP dipilih sebagai NCS -->
            <div id="nameInputContainer">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
            </div>
        </div>
        <div class="mb-3">
            <label for="Select" class="form-label">REP</label>
            <select id="repSelect" class="form-select" onchange="toggleNameInput()">
                <option value="in">Choose</option>
                <option value="out">Out</option>
                <option value="ncs">NCS</option>
            </select>
        </div>
    </div>

    <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr 1fr">
        <div class="mb-3">
            <label for="name" class="day form-label">DAY</label>
            <input type="number" class="form-control" id="day" aria-describedby="emailHelp" />
        </div>
        <div class="mb-3">
            <label for="name" class="qty form-label">QTY</label>
            <input type="number" class="form-control" id="qty" aria-describedby="emailHelp" />
        </div>
        <div class="mb-3">
            <label for="name" class="freq form-label">FREQ</label>
            <input type="number" class="form-control" id="freq" aria-describedby="emailHelp" />
        </div>
    </div>
        <div class="mb-3">
            <label for="name" class="form-label"  style="margin-bottom: 12px">COST</label>
            <input type="text" class="form-control" id="costdirect" aria-describedby="emailHelp" />
        </div>
        <div class="form-group mb-3">
            <label for="content" style="margin-bottom: 12px">Notes</label>
            <textarea class="form-control" id="content" rows="5" placeholder="Notes"></textarea>
        </div>
        <fieldset disabled>
        <div class="mb-3">
            <label for="name" class="form-label" style="margin-bottom: 12px">TOTAL COST</label>
            <input type="text" class="form-control" id="totalcostdirect" aria-describedby="emailHelp" />
        </div>
    </fieldset>
`;

        // Cari elemen terakhir yang ditambahkan
        var lastDescription = parentDiv.querySelector('.garisbutton');

        // Sisipkan form deskripsi baru sebelum elemen terakhir
        parentDiv.insertBefore(divDescription, lastDescription);
    }


    function toggleNameInput() {
        const repSelect = document.getElementById('repSelect');
        const nameInputContainer = document.getElementById('nameInputContainer');

        // Reset the name input container
        nameInputContainer.innerHTML = '';

        if (repSelect.value === 'ncs') {
            // Create a new select element
            const nameSelect = document.createElement('select');
            nameSelect.classList.add('form-select');
            nameSelect.id = 'nameSelect';

            // Add options to the select element
            const optionChooseOne = document.createElement('option');
            optionChooseOne.textContent = 'Choose One';
            const optionNajwaShihab = document.createElement('option');
            optionNajwaShihab.textContent = 'Najwa Shihab';

            // Add the options to the select element
            nameSelect.appendChild(optionChooseOne);
            nameSelect.appendChild(optionNajwaShihab);

            // Add the select element to the name input container
            nameInputContainer.appendChild(nameSelect);
        } else {
            // Create a new text input
            const nameInput = document.createElement('input');
            nameInput.type = 'text';
            nameInput.classList.add('form-control');
            nameInput.id = 'exampleInputEmail1';

            // Add the text input to the name input container
            nameInputContainer.appendChild(nameInput);
        }
    }
    function deleteSesi(event) {
        var target = event.target;
        var parentDiv = target.closest('.tablein');
        if (parentDiv) {
            parentDiv.remove();
        }
    }

    function deleteDescription(event) {
        var deleteButton = event.target;
        var descriptionDiv = deleteButton.closest('.mb-3');
        descriptionDiv.remove();
    }
</script>
@endsection
