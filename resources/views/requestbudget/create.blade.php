@extends('layout.index')

@section('title')
    Create Request Budget - Budgeting System
@endsection

@section('content')
    <a href="{{ url()->previous() }}" style="text-decoration: none;"> <button class="navback">
        <svg xmlns="http://www.w3.org/2000/svg " width="10 " height="17 " viewBox="0 0 10 17 " fill="none ">
            <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
          7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
        </svg>
        Back
        </button>
    </a>


    <!--blablabla -->
    <div class="judulhalaman" style="text-align: start">Request Budget</div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active tablinks" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Header</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data1-tab"  data-bs-toggle="tab" data-bs-target="#data1-tab-pane" type="button" role="tab" aria-controls="data1-tab-pane" aria-selected="false" disabled>PERFORMER</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data2-tab" data-bs-toggle="tab" data-bs-target="#data2-tab-pane" type="button" role="tab" aria-controls="data2-tab-pane" aria-selected="false" disabled>PRODUCTION CREWS</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data3-tab" data-bs-toggle="tab" data-bs-target="#data3-tab-pane" type="button" role="tab" aria-controls="data3-tab-pane" aria-selected="false" disabled>ALAT PRODUKSI</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data4-tab" data-bs-toggle="tab" data-bs-target="#data4-tab-pane" type="button" role="tab" aria-controls="data4-tab-pane" aria-selected="false" disabled>OPERASIONAL</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="data5-tab" data-bs-toggle="tab" data-bs-target="#data5-tab-pane" type="button" role="tab" aria-controls="data1-tab-pane" aria-selected="false" disabled>SEWA LOKASI</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link tablinks" id="preview-tab" data-bs-toggle="tab" data-bs-target="#preview-tab-pane" type="button" role="tab" aria-controls="preview-tab-pane" aria-selected="false" disabled>Preview</button>
        </li>
        <li class="nav-item" role="presentation">
        </li>
    </ul>


    <div class="tab-content" id="myTabContent" style="margin-top: 24px">
        <!-- home -->
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <form class="formrequest">
                <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                    <div class="mb-3">
                        <label for="Select " class="form-label">Pilih Program</label>
                        <select id="program_name" class="form-select ">
                            @forelse ($program as $program_id => $program_name)
                                <option value="{{ $program_id }}">{{ $program_name }}</option>
                            @empty
                                <option disabled selected>Data not found</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Select" class="form-label">Pilih Bulan</label>
                        <select id="month" class="form-select">
                            <option>Choose One</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                    </div>

                </div>

                <fieldset disabled>
                    <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                        <div class="mb-3"><label for="disabledTextInput" class="form-label">Kode Budget</label>
                            <input type="text " id="kodeBudget" class="form-control" placeholder=" " />
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput " class="form-label">Remaining Budget</label>
                            <input type="text " id="remainingBudget" class="form-control" placeholder="" />
                        </div>
                    </div>
                </fieldset>

                <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                    <div class="mb-3">
                        <label for="disabledTextInput " class="form-label">Nama Episode</label>
                        <input type="text " id="disabledTextInput " class="form-control" placeholder=" " />
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput " class="form-label">Location</label>
                        <input type="text " id="disabledTextInput " class="form-control" placeholder="" />
                    </div>
                </div>

                <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                    <div class="mb-3">
                        <label for="managerform" class="form-label">Tanggal Mulai</label>
                        <input type="date" id="disabledTextInput " class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="managerform" class="form-label">Tanggal Selesai</label>
                        <input type="date" id="disabledTextInput " class="form-control"  />
                    </div>
                </div>
            </form>
            <button type="button" class="button-departemen" style="justify-content: center; align-items: center; display: inline-flex" id="nextButton">Next
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                    <path d="M17 10L10.1429 4M17 10L10.1429 16M17 10H1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>

        <!-- PERFORMER -->
        <div class="tab-pane fade" id="data1-tab-pane" role="tabpanel" aria-labelledby="data1e-tab" tabindex="0">
            <form id="mainForm" action=""></form>
            <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px">
                <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
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
                            <td colspan="2" class="text-right" style="font-weight: 500; background-color: #dbdee8">Total</td>
                            <td class="total-price">$80</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex">
                <button type="button"  class="button-departemen me-3" onclick="addItem()" data-bs-target="#data1-tab-pane">Add Item<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z" fill="white"/>
                </svg>
                </button>
                <button type="button" class="button-departemen" onclick="addBundleItems()">Add Bundle Items<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z" fill="white"/>
                </svg>
                </button>
            </div>

            <div id="tableContainer"></div>
        </div>

        <!-- PRODUCTION CREWS-->
        <div class="tab-pane fade" id="data2-tab-pane" role="tabpanel" aria-labelledby="data2e-tab" tabindex="0">
            <form id="mainForm" action=""></form>
            <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px">
                <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
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
                            <td colspan="2" class="text-right" style="font-weight: 500; background-color: #dbdee8">Total</td>
                            <td class="total-price">$80</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex">
                <button type="button" class="button-departemen me-3" onclick="addItem()">Add Item<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z" fill="white"/>
                </svg>
                </button>
                <button type="button" class="button-departemen" onclick="addBundleItems()">Add Bundle Items<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z" fill="white"/>
                </svg>
                </button>
            </div>

            <div id="tableContainer"></div>
        </div>

        <!-- ALAT PRODUKSI -->
        <div class="tab-pane fade" id="data3-tab-pane" role="tabpanel" aria-labelledby="data3e-tab" tabindex="0">
            <form id="mainForm" action=""></form>
            <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px">
                <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
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
                            <td colspan="2" class="text-right" style="font-weight: 500; background-color: #dbdee8">Total</td>
                            <td class="total-price">$80</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex">
                <button type="button" class="button-departemen me-3" onclick="addItem()">Add Item<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z" fill="white"/>
                </svg>
                </button>
                <button type="button" class="button-departemen" onclick="addBundleItems()">Add Bundle Items<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z" fill="white"/>
                </svg>
                </button>
            </div>

            <div id="tableContainer"></div>
        </div>

        <!-- OPERASIONAL -->
        <div class="tab-pane fade" id="data4-tab-pane" role="tabpanel" aria-labelledby="data4e-tab" tabindex="0">
            <form id="mainForm" action=""></form>
            <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px">
                <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
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
                            <td colspan="2" class="text-right" style="font-weight: 500; background-color: #dbdee8">Total</td>
                            <td class="total-price">$80</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex">
                <button type="button" class="button-departemen me-3" onclick="addItem()">Add Item<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z" fill="white"/>
                </svg>
                </button>
                <button type="button" class="button-departemen" onclick="addBundleItems()">Add Bundle Items<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z" fill="white"/>
                </svg>
                </button>
            </div>

            <div id="tableContainer"></div>
        </div>

        <!-- SEWA LOKASI -->
        <div class="tab-pane fade" id="data5-tab-pane" role="tabpanel" aria-labelledby="data5e-tab" tabindex="0">
            <form id="mainForm" action=""></form>
            <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px">
                <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
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
                            <td colspan="2" class="text-right" style="font-weight: 500; background-color: #dbdee8">Total</td>
                            <td class="total-price">$80</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex">
                <button type="button" class="button-departemen me-3" onclick="addItem()">Add Item<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z" fill="white"/>
                </svg>
                </button>
                <button type="button" class="button-departemen" onclick="addBundleItems()">Add Bundle Items<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z" fill="white"/>
                </svg>
                </button>
            </div>

            <div id="tableContainer"></div>
        </div>
    </div>

{{-- PREVIEW --}}
    <div class="tab-pane fade" id="preview-tab-pane" role="tabpanel" aria-labelledby="preview-tab" tabindex="0">
        <button type="button" class="button-permintaan"><svg  xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path d="M16 2C13.2311 2 10.5243 2.82109 8.22202 4.35943C5.91973 5.89777 4.12532 8.08427 3.06569 10.6424C2.00607 13.2006 1.72882 16.0155 2.26901 18.7313C2.80921 21.447 4.14258 23.9416 6.10051 25.8995C8.05845 27.8574 10.553 29.1908 13.2687 29.731C15.9845 30.2712 18.7994 29.9939 21.3576 28.9343C23.9157 27.8747 26.1022 26.0803 27.6406 23.778C29.1789 21.4757 30 18.7689 30 16C30 12.287 28.525 8.72601 25.8995 6.1005C23.274 3.475 19.713 2 16 2ZM23.447 16.895L11.447 22.895C11.2945 22.9712 11.1251 23.0072 10.9548 22.9994C10.7845 22.9917 10.619 22.9406 10.474 22.8509C10.329 22.7613 10.2093 22.636 10.1264 22.4871C10.0434 22.3381 9.99993 22.1705 10 22V10C10.0001 9.82961 10.0437 9.66207 10.1268 9.51327C10.2098 9.36448 10.3294 9.23936 10.4744 9.14981C10.6194 9.06025 10.7848 9.00921 10.955 9.00155C11.1252 8.99388 11.2946 9.02984 11.447 9.106L23.447 15.106C23.6129 15.1891 23.7524 15.3168 23.8498 15.4747C23.9473 15.6326 23.9989 15.8145 23.9989 16C23.9989 16.1855 23.9473 16.3674 23.8498 16.5253C23.7524 16.6832 23.6129 16.8109 23.447 16.894" fill="white"/>
        </svg>Preview</button>
        <button type="button" class="button-departemen">Submit
        </button>
    </div>


@endsection

@section('custom-js')
    <script src="{{ asset('js/formrequest.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const programSelect = document.getElementById('namaprogram');
            const monthSelect = document.getElementById('month');
            const kodeBudgetInput = document.getElementById('kodeBudget');
            const remainingBudgetInput = document.getElementById('remainingBudget');

            const budgetData = {
                // Example data structure for budget
                // program_id: {quarter: {kodeBudget: '', remainingBudget: ''}}
                1: {
                    Q1: { kodeBudget: '101-Q1', remainingBudget: '1000' },
                    Q2: { kodeBudget: '101-Q2', remainingBudget: '2000' },
                    Q3: { kodeBudget: '101-Q3', remainingBudget: '3000' },
                    Q4: { kodeBudget: '101-Q4', remainingBudget: '4000' }
                },
                2: {
                    Q1: { kodeBudget: '102-Q1', remainingBudget: '1500' },
                    Q2: { kodeBudget: '102-Q2', remainingBudget: '2500' },
                    Q3: { kodeBudget: '102-Q3', remainingBudget: '3500' },
                    Q4: { kodeBudget: '102-Q4', remainingBudget: '4500' }
                }
            };

            function getQuarter(month) {
                switch (month) {
                    case 'January':
                    case 'February':
                    case 'March':
                        return 'Q1';
                    case 'April':
                    case 'May':
                    case 'June':
                        return 'Q2';
                    case 'July':
                    case 'August':
                    case 'September':
                        return 'Q3';
                    case 'October':
                    case 'November':
                    case 'December':
                        return 'Q4';
                    default:
                        return null;
                }
            }

            function updateInputs() {
                const selectedProgram = programSelect.value;
                const selectedMonth = monthSelect.value;
                const selectedQuarter = getQuarter(selectedMonth);

                if (selectedProgram && selectedQuarter && budgetData[selectedProgram] && budgetData[selectedProgram][selectedQuarter]) {
                    const budgetInfo = budgetData[selectedProgram][selectedQuarter];
                    kodeBudgetInput.value = budgetInfo.kodeBudget;
                    remainingBudgetInput.value = budgetInfo.remainingBudget;
                } else {
                    kodeBudgetInput.value = '';
                    remainingBudgetInput.value = '';
                }
            }

            programSelect.addEventListener('change', updateInputs);
            monthSelect.addEventListener('change', updateInputs);
        });
        </script>

@endsection
