@extends('layout.index')

@section('title')
    Detail Approval - Budgeting System
@endsection
@section('costum-css')

<style>
/* CSS for responsive table */
@media (max-width: 768px) {
    .d-md-none {
        display: block !important; /* Show elements on mobile */
    }
    .d-md-table-cell {
        display: none !important; /* Hide elements on mobile */
    }
}
</style>
    
@endsection


@section('content')
    <a class="navback" href="{{ route('approval-budget-department.advance.index') }}"  style="text-decoration: none">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
            <path
                d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
        7.2501 0 7.6501 0 8.0501Z "
                fill="#4A25AA "
            />
            </svg>
            Back to Approval
    </a>

    <div class="tablenih">
        <div class="table-responsive p-3">
            <div style="justify-content: space-between; display: block;  margin-top: 12px;  margin-bottom: 24px;">
               <div class="row d-flex" style="justify-content: space-between;width:100%; align-self: stretch;">
                        <div class="col">
                            <p style="font: 400 16px Narasi Sans, sans-serif; color: #4A25AA; margin-left: 2px;">Request Number</p>
                            <div class="judulhalaman" style="text-align: start; margin-top: -16px;; margin-left:-1px">NRS129/2024</div>
                        </div>
                        <div class="col text-end mb-3" style="margin-right: -26px">
                            <div class="mb-2">
                                <form action="#">
                                <button type="submit" class="btn btn-success text-end" style="color: white; padding: 12px 24px; margin-right:2px">Approv</button>
                                <a href="{{ route('approval-budget-department.advance.reject') }}">
                                    <button type="button" class="btn btn-danger text-end" style="color: white; padding: 12px 24px;">Reject</button>
                                </a>
                                </form>

                            </div>

                            <div class="d-flex gap-2">
                                <div class="col">
                                    <a href="/viewpdf" target="_blank">
                                        <button type="preview" class="btn btn-secondary" style="border-radius: 8px; padding-bottom: 9px; padding-top: 9px; background-color:#ffff; border: 1px solid#4A25AA" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Preview" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                                <path d="M16.5 2C13.7311 2 11.0243 2.82109 8.72202 4.35943C6.41973 5.89777 4.62532 8.08427 3.56569 10.6424C2.50607 13.2006 2.22882 16.0155 2.76901 18.7313C3.30921 21.447 4.64258 23.9416 6.60051 25.8995C8.55845 27.8574 11.053 29.1908 13.7687 29.731C16.4845 30.2712 19.2994 29.9939 21.8576 28.9343C24.4157 27.8747 26.6022 26.0803 28.1406 23.778C29.6789 21.4757 30.5 18.7689 30.5 16C30.5 12.287 29.025 8.72601 26.3995 6.1005C23.774 3.475 20.213 2 16.5 2ZM23.947 16.895L11.947 22.895C11.7945 22.9712 11.6251 23.0072 11.4548 22.9994C11.2845 22.9917 11.119 22.9406 10.974 22.8509C10.829 22.7613 10.7093 22.636 10.6264 22.4871C10.5434 22.3381 10.4999 22.1705 10.5 22V10C10.5001 9.82961 10.5437 9.66207 10.6268 9.51327C10.7098 9.36448 10.8294 9.23936 10.9744 9.14981C11.1194 9.06025 11.2848 9.00921 11.455 9.00155C11.6252 8.99388 11.7946 9.02984 11.947 9.106L23.947 15.106C24.1129 15.1891 24.2524 15.3168 24.3498 15.4747C24.4473 15.6326 24.4989 15.8145 24.4989 16C24.4989 16.1856 24.4473 16.3674 24.3498 16.5253C24.2524 16.6832 24.1129 16.8109 23.947 16.894" fill="#4A25AA"/>
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                                <div class="col-auto">
                                        <a href="/downloadpdf"><button type="download" class="button-export" style="color: white">Export PDF</button></a>
                                </div>
                            </div>


                        </div>
                    </div>

                <div style="display: flex">


                    <div class="arips">
                        <div style="font: 400 16px Narasi Sans, sans-serif; color: black ">
                            <table class="tablecoba ">
                                <tbody>
                                    <tr>
                                        <td>Budget Code</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>NRS/QIII/1231</td>
                                    </tr>
                                    <tr>
                                        <td>Producer Name</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>Julius</td>
                                    </tr>
                                    <tr>
                                        <td>Manager Name</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>Julius</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="font: 400 16px Narasi Sans, sans-serif; color: black;">
                            <table class="tablecoba ">
                                <tbody>
                                    <tr>
                                        <td>Program Name</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>Mata Najwa</td>

                                    </tr>
                                    <tr>
                                        <td>Project / Episode Name</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>Rekapitulasi Perhitungan KPU</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Production</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>28-10-2023</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div  style="font: 400 16px Narasi Sans, sans-serif; color: black;">
                            <table class="tablecoba ">
                                <tbody>
                                    <tr>
                                        <td>Date of Upload</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>28-10-2023</td>

                                    </tr>
                                    <tr>
                                        <td>Production Type</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>Live Streaming</td>
                                    </tr>
                                    <tr>
                                        <td>Location</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>Kantor Narasi</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>

            <div style="border-left: 1px solid #c4c4c4;border-right: 1px solid #c4c4c4;border-radius: 4px; margin-bottom: 24px;">
                <table class="table table-hover " style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center ">
                    <thead style="font-weight: 500 ">
                        <tr >
                            <th scope="col" style="background: #ccc7d8; letter-spacing: 0.5px;">TOTAL REQUEST BUDGET</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-size: 18px">
                                Rp100.000.000</td>
                        </tr>
                    </tbody>

                    <thead style="font-weight: 500 ">
                        <tr >
                            <th scope="col" style="background: #ccc7d8; letter-spacing: 0.5px;">REMAINING BUDGET</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-size: 18px">
                                Rp100.000.000</td>
                        </tr>
                    </tbody>

                    <thead style="font-weight: 500 ">
                        <tr >
                            <th scope="col" style="background: #ccc7d8; letter-spacing: 0.5px;">BUDGET APPROVE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-size: 18px">
                                Rp100.000.000</td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <div style="border: 1px solid #c4c4c4; border-radius: 4px; margin-bottom: 24px; border-bottom: none; width: auto;">
                <table class="table table-hover table-responsive" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-bottom: 12px; text-align: center;">
                    <thead style="font-weight: 500">
                        <tr class="dicobain">
                            <th scope="col" class="d-none d-md-table-cell">No</th> <!-- Hide on mobile, show on desktop -->
                            <th scope="col" class="d-none d-md-table-cell" style="text-align: start">Description</th>
                            <th scope="col"class="d-md-none" style="text-align: center">Description</th>
                            <th scope="col" class="d-none d-md-table-cell">Total</th> <!-- Hide on mobile, show on desktop -->
                        </tr>
                    </thead>
                    <tbody style="text-transform: uppercase">
                        <tr style="vertical-align: middle;">
                            <th scope="row" class="d-none d-md-table-cell">1</th> <!-- Hide on mobile, show on desktop -->
                            <td style="text-align: start; vertical-align: middle;">
                                Performer/Host/Guest
                                <div style="display: flex; width: 100%; justify-content: space-between; ">
                                    <span class="total-price d-md-none" style="font-weight: 300; padding-top: 12px;">Total:</span>
                                    <span class="total-price d-md-none" style="font-weight: 300; padding-top: 12px; font-weight: bold;">$20</span>
                                </div> <!-- Show on mobile, hide on desktop -->
                            </td>
                            <td class="total-price d-none d-md-table-cell" style="font-weight: 300; vertical-align; middle;">$20</td> <!-- Hide on mobile, show on desktop -->
                        </tr>
                        
                        <tr>
                            <th scope="row" class="d-none d-md-table-cell">2</th> <!-- Hide on mobile, show on desktop -->
                            <td style="text-align: start; vertical-align: middle;">
                                Production Crews
                                <div style="display: flex; width: 100%; justify-content: space-between; ">
                                    <span class="total-price d-md-none" style="font-weight: 300; padding-top: 12px;">Total:</span>
                                    <span class="total-price d-md-none" style="font-weight: 300; padding-top: 12px; font-weight: bold;">$20</span>
                                </div> <!-- Show on mobile, hide on desktop -->                            </td>
                            <td class="total-price d-none d-md-table-cell" style="font-weight: 300; vertical-align: middle">$20</td> <!-- Hide on mobile, show on desktop -->
                        </tr>
                        <tr>
                            <th scope="row" class="d-none d-md-table-cell">3</th> <!-- Hide on mobile, show on desktop -->
                            <td style="text-align: start; vertical-align: middle;">
                                Production Tools
                                <div style="display: flex; width: 100%; justify-content: space-between; ">
                                    <span class="total-price d-md-none" style="font-weight: 300; padding-top: 12px;">Total:</span>
                                    <span class="total-price d-md-none" style="font-weight: 300; padding-top: 12px; font-weight: bold;">$20</span>
                                </div> <!-- Show on mobile, hide on desktop -->                            </td>
                            <td class="total-price d-none d-md-table-cell" style="font-weight: 300; vertical-align: middle">$20</td> <!-- Hide on mobile, show on desktop -->
                        </tr>
                        <tr>
                            <th scope="row" class="d-none d-md-table-cell">4</th> <!-- Hide on mobile, show on desktop -->
                            <td style="text-align: start; vertical-align: middle;">
                                Operational
                                <div style="display: flex; width: 100%; justify-content: space-between; ">
                                    <span class="total-price d-md-none" style="font-weight: 300; padding-top: 12px;">Total:</span>
                                    <span class="total-price d-md-none" style="font-weight: 300; padding-top: 12px; font-weight: bold;">$20</span>
                                </div> <!-- Show on mobile, hide on desktop -->                            </td>
                            <td class="total-price d-none d-md-table-cell" style="font-weight: 300; vertical-align: middle">$20</td> <!-- Hide on mobile, show on desktop -->
                        </tr>
                        <tr>
                            <th scope="row" class="d-none d-md-table-cell">5</th> <!-- Hide on mobile, show on desktop -->
                            <td style="text-align: start; vertical-align: middle;">
                                Location
                                <div style="display: flex; width: 100%; justify-content: space-between; ">
                                    <span class="total-price d-md-none" style="font-weight: 300; padding-top: 12px;">Total:</span>
                                    <span class="total-price d-md-none" style="font-weight: 300; padding-top: 12px; font-weight: bold;">$20</span>
                                </div> <!-- Show on mobile, hide on desktop -->                            </td>
                            <td class="total-price d-none d-md-table-cell" style="font-weight: 300; vertical-align: middle">$20</td> <!-- Hide on mobile, show on desktop -->
                        </tr>
                        <!-- Total row hidden on mobile -->
                        <tr>
                            <td colspan="2" class="text-right d-none d-md-table-cell" style="font-weight: 500; background-color: #dbdee8;">Total</td> <!-- Hide on mobile, show on desktop -->
                            <td class="total-price text-center d-none d-md-table-cell" style="vertical-align: middle">$80</td> <!-- Hide on mobile, show on desktop -->
                            <td  class="d-md-none" style="font-weight: 500; text-align: center; padding-left: 15px; background-color: #dbdee8;"> <!-- Show on mobile, hide on desktop -->
                                Total
                            </td>
                            <td  class="d-md-none text-center" style="font-weight: 500; text-align: start;  "> <!-- Show on mobile, hide on desktop -->
                                $80
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>



            {{-- <div style="border: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; border-bottom: none;">
                <table class="table table-hover " style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                    <thead style="font-weight: 500; ">
                        <tr class="dicobain ">
                            <th scope="col ">User Submit</th>
                            <th scope="col ">Review</th>
                            <th scope="col ">Approval 1</th>
                            <th scope="col ">Approval 2</th>
                            <th scope="col ">Approval 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><svg xmlns="http://www.w3.org/2000/svg " width="24 " height="24 " viewBox="0 0 24 24 " fill="none ">
                            <circle cx="12 " cy="12 " r="12 " fill="#E73638 "/>
                        </svg></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Procurement</td>
                            <td>Manager</td>
                            <td>Mak Lia</td>
                            <td>Mba Mel</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}



            <div class="container my-3">
                <h5 class="text-center mb-2">Progress Approval</h5>
                <p class="text-center mb-">Requested by: Julius Ardhiansyah</p>
                <div class="step-bar">
                    <div class="step approved" data-bs-toggle="tooltip" data-bs-placement="top" title="Manager">
                        <div class="circle">1</div>
                        <div class="label">Manager</div>
                    </div>
                    <div class="step approved" data-bs-toggle="tooltip" data-bs-placement="top" title="Review Procurement">
                        <div class="circle">2</div>
                        <div class="label">Procurement</div>
                    </div>
                    <div class="step approved" data-bs-toggle="tooltip" data-bs-placement="top" title="HC">
                        <div class="circle">3</div>
                        <div class="label">HC</div>
                    </div>
                    <div class="step approved" data-bs-toggle="tooltip" data-bs-placement="top" title="Finance 1">
                        <div class="circle">4</div>
                        <div class="label">Finance 1</div>
                    </div>
                    <div class="step waiting" data-bs-toggle="tooltip" data-bs-placement="top" title="Finance 2">
                        <div class="circle">5</div>
                        <div class="label">Finance 2</div>
                    </div>
                    <div class="step rejected" data-bs-toggle="tooltip" data-bs-placement="top" title="BOD">
                        <div class="circle">6</div>
                        <div class="label">BOD</div>
                    </div>
                </div>
                <div class="text-center mt-2 ">
                    <div class="keteranganbudget">
                        <div class="tunggu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="12" fill="#FFE900"/>
                        </svg><span class="text-center">waiting for approval</span>
                        </div>
                        <div class="tolak" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="12" fill="#E73638"/>
                        </svg><span class="text-center">approval rejected</span>
                        </div>
                        <div class="diterima">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="12" fill="#009579"/>
                        </svg><span class="text-center">approval approved</span>
                        </div>
                    </div>

                </div>

            </div>



        </div>

    </div>

@endsection


@section('custom-js')
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>

{{-- <script>
    $(function () {

        // Update circle colors based on status
        $('.step').each(function() {
            var status = $(this).data('status');
            if (status === 'approved') {
                $(this).addClass('approved');
            } else if (status === 'rejected') {
                $(this).addClass('rejected');
            }
        });
    });
</script> --}}
@endsection
