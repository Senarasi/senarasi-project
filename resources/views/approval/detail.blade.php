@extends('layout.index')
@section('title')
    Approval
@endsection
@section('content')
    <button class="navback">
        <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
            <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
      7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
        </svg>
        Back to Approval
    </button>

    <form action="#">
        <div class="tablenih">
            <div
                style="justify-content: space-between; display: flex; margin-left: 12px; margin-right: 12px; margin-top: 12px;  margin-bottom: 24px;">
                <div>
                    <div>
                        <p style="font: 400 16px Narasi Sans, sans-serif; color: #4A25AA; margin-left: 2px;">Request Number
                        </p>
                        <div class="judulhalaman " style="text-align: start; margin-top: -16px; ">NRS129/2024</div>
                    </div>
                    <div class="cobainnih">
                        <div class="keteranganbudget">
                            <div class="tunggu">
                                <span style="font: 500 16px Narasi Sans, sans-serif;" class="text-center">REGULAR</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="button-approv " style="margin-top: -px;">
                        <button type="approv" class="btn btn-success "
                            style="color: white; padding: 12px 24px; margin-right: 8px ">Approv</button>
                        <button type="reject" class="btn btn-danger "
                            style="color: white; padding: 12px 24px ">Reject</button>
                    </div>
                    <div style="margin-top: -24px; ">
                        <button type="download" class="button-export" style="color: white;">Export to PDF</button>
                    </div>

                </div>

            </div>

            <div
                style="justify-content: space-between; display: flex; margin-left: 12px; margin-right: 12px; margin-bottom: 12px; ">
                <div style="font: 400 16px Narasi Sans, sans-serif; color: black ">
                    <table class="tablecoba ">
                        <tbody>
                            <tr>
                                <td>Nama Submit</td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td>Bang Johnes</td>
                            </tr>
                            <tr>
                                <td>Nama Produser</td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td>Julius</td>
                            </tr>
                            <tr>
                                <td>Nama Manager</td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td>Julius</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cobalagi" style="font: 400 16px Narasi Sans, sans-serif; color: black;">
                    <table class="tablecoba ">
                        <tbody>
                            <tr>
                                <td>Nama Program</td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td>Mata Najwa</td>

                            </tr>
                            <tr>
                                <td>Tanggal Mulai</td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td>28-10-2023</td>
                            </tr>
                            <tr>
                                <td>Tanggal Selesai</td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td>28-10-2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div
                style="border-left: 1px solid #c4c4c4;border-right: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; margin-bottom: 24px;">
                <table class="table table-hover "
                    style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center ">
                    <thead style="font-weight: 500 ">
                        <tr class="dicobain ">
                            <th scope="col" style="background: #ccc7d8;">BUDGET TAHUNAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                SUB TOTAL PRODUCTION CREWS</td>
                        </tr>
                    </tbody>

                    <thead style="font-weight: 500 ">
                        <tr class="dicobain ">
                            <th scope="col" style="background: #ccc7d8;">BUDGET QUARTER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                SUB TOTAL PRODUCTION CREWS</td>
                        </tr>
                    </tbody>

                    <thead style="font-weight: 500 ">
                        <tr class="dicobain ">
                            <th scope="col" style="background: #ccc7d8;">BUDGET BULANAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                SUB TOTAL PRODUCTION CREWS</td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <div style="border: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; margin-bottom: 24px;">
                <table class="table table-hover "
                    style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center ">
                    <thead style="font-weight: 500 ">
                        <tr class="dicobain ">
                            <th scope="col ">NO</th>
                            <th scope="col ">Nama Barang</th>
                            <th scope="col ">Quatity</th>
                            <th scope="col ">Unit Price</th>
                            <th scope="col ">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row ">1</th>
                            <td>laptop</td>
                            <td>2</td>
                            <td></td>
                            <td class="total-price " style="font-weight: 300 ">$20</td>
                        </tr>
                        <tr>
                            <th scope=" row ">2</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="total-price " style="font-weight: 300 ">$20</td>
                        </tr>
                        <tr>
                            <th scope="row ">3</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="total-price " style="font-weight: 300 ">$20</td>
                        </tr>
                        <tr>
                            <td colspan="4 " class="text-right " style="font-weight: 500; background-color: #dbdee8 ">
                                Total</td>
                            <td class="total-price ">$80</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="keteranganbudget" style="margin-left: 12px;">
                <div class="tunggu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <circle cx="12" cy="12" r="12" fill="#FFE900" />
                    </svg><span class="text-center">menunggu approval</span>
                </div>
                <div class="tolak">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <circle cx="12" cy="12" r="12" fill="#E73638" />
                    </svg><span class="text-center">approval ditolak</span>
                </div>
                <div class="diterima">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <circle cx="12" cy="12" r="12" fill="#4A25AA" />
                    </svg><span class="text-center">approval disetujui</span>
                </div>
            </div>

            <div style="border: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; ">
                <table class="table table-hover "
                    style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                    <thead style="font-weight: 500; ">
                        <tr class="dicobain ">
                            <th scope="col ">Approval 1</th>
                            <th scope="col ">Approval 2</th>
                            <th scope="col ">Approval 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><svg xmlns="http://www.w3.org/2000/svg " width="24 " height="24 "
                                    viewBox="0 0 24 24 " fill="none ">
                                    <circle cx="12 " cy="12 " r="12 " fill="#E73638 " />
                                </svg></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </form>
@endsection
