@extends('layout.index')
@section('title')
    Budget Dashboard
@endsection
@section('content')
    {{-- <div class="judulhalaman">Budgeting System Narasi</div>
    <div class="button-dashboard">
        <button type="button" class="button-ini" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            INPUT
            <span style="color: #ffe900">BUDGET</span>
        </button>
        <a href="/create-budget" class="text-decoration-none text-end">
            <button class="button-ini">REQUEST <span style="color: #ffe900">BUDGET</span></button>
        </a>
    </div>

    <div class="tablenih" style="margin-top: 110px; margin-left: 42px">
        <table class="table table-hover"
            style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
            <thead style="font-weight: 500">
                <tr class="dicobain">
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
                    <td>Mata Najwa</td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <circle cx="12" cy="12" r="12" fill="#E73638" />
                        </svg>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="gap: 8px; display: flex; justify-content: center">
                        <a href="#" class="text-decoration-none text-end"><button type="button "
                                class="button-general" style="width: fit-content">DETAIL</button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope=" row ">2</th>
                    <td></td>
                    <td></td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <circle cx="12" cy="12" r="12" fill="#E73638" />
                        </svg>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="gap: 8px; display: flex; justify-content: center"><button type="button "
                            class="button-general" style="width: fit-content">DETAIL</button></td>
                </tr>
                <tr>
                    <th scope="row ">3</th>
                    <td></td>
                    <td></td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <circle cx="12" cy="12" r="12" fill="#E73638" />
                        </svg>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="gap: 8px; display: flex; justify-content: center"><button type="button "
                            class="button-general" style="width: fit-content">DETAIL</button></td>
                </tr>
            </tbody>
        </table>
    </div> --}}
    <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card-budget">
                    <div class="text-body-tertiary">Remaining Budget</div>
                    <div class="d-flex align-items-center">
                        <div class="text-sisa"> Rp. {{ number_format($totalRemainingBudget, 2) }}</div>
                        {{-- <span class="badge text-bg-warning rounded-pill ms-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="10" viewBox="0 0 384 512">
                                <path
                                    d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
                            </svg>
                            10%
                        </span> --}}
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="text-body-tertiary me-1"> From total </div>
                        <div class="text-success ">Rp. {{ number_format($totalBudget, 2) }}</div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card-budget">
                    <div class="text-body-tertiary">Spending Budget</div>
                    <div class="d-flex align-items-center">
                        <div class="text-sisa"> Rp. {{ number_format($totalSpendingBudget, 2) }}</div>
                        {{-- <span class="badge text-bg-danger rounded-pill ms-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="10" viewBox="0 0 384 512"
                                fill="white">
                                <path
                                    d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                            </svg>
                            10%
                        </span> --}}
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="text-body-tertiary me-1"> From total </div>
                        <div class="text-success ">Rp. {{ number_format($totalBudget, 2) }}</div>
                    </div>
                </div>
            </div>
        <div class="col-lg-4 col-sm-12">
            <div class="button-dashboard">
                <button class="button-ini mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    INPUT
                    <span style="color: #ffe900">BUDGET</span>
                </button>
                <a href="{{route('requestbudget.create')}}" class="text-decoration-none text-end">
                    <button class="button-ini">REQUEST <span style="color: #ffe900">BUDGET</span></button>
                </a>
            </div>
        </div>
    </div>

    <div class="tablenih mb-4" style="border: none; box-shadow: 0px 1px 8px -1px rgba(76, 37, 176, 0.505);">
        <div class="row p-3">
            <div class="col-lg-8 col-sm-12">
                <div id="columnchart_material" style="height: 600px; "></div>
            </div>
            <div class="col-lg-4 col-sm-12" style="margin-right:0px;">
                <div style="font: 350 Narasi sans, sans-serif; ">
                    <label for="chartType" class="form-label">Choose Chart Type for drawChart2: </label>
                    <select id="chartType" class="form-select" onchange="changeChartType()">
                        <option value="pie">Pie Chart</option>
                        <option value="column">Bar Chart</option>
                    </select>
                </div>
                <div id="donutchart" style=" height: 500px;"></div>
            </div>
        </div>
    </div>

    <div class="tablenih" style="border: none; box-shadow: 0px 1px 8px -1px rgba(76, 37, 176, 0.505);">
        <table class="table table-hover"
            style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
            <thead style="font-weight: 500">
                <tr class="dicobain">
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
                    <td>Mata Najwa</td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <circle cx="12" cy="12" r="12" fill="#E73638" />
                        </svg>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="gap: 8px; display: flex; justify-content: center">
                        <a href="/detail-request" class="text-decoration-none text-end"><button type="button "
                                class="button-general" style="width: fit-content">DETAIL</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('modal')
    {{-- <div class="modal justify-content-center fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{ route('budget.store') }}" method="POST" class="modal-form-check"
                        style="font: 500 14px Narasi Sans, sans-serif">
                        @csrf
                        <!-- <fieldset disabled> -->
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">User</label>
                            <input type="text" id="employee_id" class="form-control" name="employee_id"
                                value="{{ Auth::user()->full_name }}" placeholder="{{ Auth::user()->full_name }}" />
                        </div>
                        <!-- </fieldset> -->
                        <div class="mb-3">
                            <label for="program_name" class="form-label">Nama Program</label>
                            <input type="text" class="form-control" id="program_name" name="program_name" required />
                        </div>
                        <div class="mb-3">
                            <label for="budget" class="form-label">Budget Tahunan</label>
                            <input type="text" class="form-control" id="budget" name="budget" required />
                            <!-- Input field for entering the budget value -->
                            <input type="hidden" id="raw_budget" name="raw_budget" />
                            <!-- Hidden input field for storing the raw numeric value -->

                        </div>
                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{asset("image/Narasi_Logo.svg")}}" alt=" " />
            </div>
        </div>
    </div> --}}
    <div class="modal justify-content-center fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{ route('budget.store') }}" method="POST" class="modal-form-check"
                        style="font: 500 14px Narasi Sans, sans-serif">
                        @csrf
                        {{-- <fieldset disabled> --}}
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">User</label>
                            <input type="text" id="display_name" class="form-control" name="display_name"
                                value="{{ Auth::user()->full_name }}" placeholder="{{ Auth::user()->full_name }}" />
                            <input type="hidden" id="employee_id" name="employee_id"
                                value="{{ Auth::user()->employee_id }}" />
                        </div>
                        {{-- </fieldset> --}}
                        <div class="mb-3">
                            <label for="program_name" class="form-label">Nama Program</label>
                            {{-- <input type="text " class="form-control" id="namaprogram " /> --}}
                            <select name="program_id" id="program_option" class="form-select ">
                                @forelse ($program as $program_id => $program_name)
                                    <option value="{{ $program_id }}">{{ $program_name }}</option>
                                @empty
                                    <option disabled selected>Data not found</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="quarter" class="form-label">Quarter</label>
                                {{-- <input type="text " class="form-control" id="quarter" /> --}}
                                <select name="quarter" id="quarter" class="form-select ">
                                    <option style="color: rgb(189, 189, 189) ">Choose One</option>
                                    <option value="1">Q1</option>
                                    <option value="2">Q2</option>
                                    <option value="3">Q3</option>
                                    <option value="4">Q4</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="budget_code" class="form-label">Kode Budget</label>
                                <input type="text " class="form-control p-2" name="budget_code" id="budget_code" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="quarter_budget" class="form-label">Budget Quarter</label>
                            <input type="text" class="form-control" name="quarter_budget" id="quarter_budget" name="budget" required />
                            <!-- Input field for entering the budget value -->
                            {{-- <input type="hidden" id="raw_budget" name="raw_budget" /> --}}
                            <!-- Hidden input field for storing the raw numeric value -->

                        </div>
                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('image/Narasi_Logo.svg') }}" alt=" " />
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar', 'corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            drawChart1();
            drawChart2(); // By default, draw the pie chart
        }

        function drawChart1() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Mata Najwa', 'Musyawarah', 'Mata Najwa', 'Musyawarah', 'Mata Najwa'],
                ['Jan', 1000, 400, 200, 500, 300],
                ['Feb', 1170, 460, 250, 460, 500],
                ['March', 660, 1120, 300, 400, 200],
                ['Apr', 1030, 540, 350, 550, 750],
                ['May', 1000, 400, 200, 500, 300],
                ['Jun', 1170, 460, 250, 460, 500],
                ['Jul', 660, 1120, 300, 400, 200],
                ['Aug', 1030, 540, 350, 550, 750],
                ['Sept', 1000, 400, 200, 500, 300],
                ['Okt', 1170, 460, 250, 460, 500],
                ['Nov', 660, 1120, 300, 400, 200],
                ['Des', 1030, 540, 350, 550, 750]
            ]);

            var options = {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    backgroundColor: 'transparent',
                    chartArea: {
                        width: '200px',
                        height: '100%',
                        left: 60,
                        top: 50
                    },
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        function drawChart2() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 11],
                ['Eat', 2],
                ['Commute', 2],
                ['Watch TV', 2],
                ['Sleep', 7]
            ]);

            var options = {
                // title: 'Mata Najwa',
                pieHole: 0.4,
                backgroundColor: 'transparent',
                chartArea: {
                    width: '100%',
                    height: '100%',
                    left: 60,
                    top: 50,
                }, // Mengatur chartArea tanpa margin/padding
                // width: auto, // Ubah lebar chart menjadi 400 piksel
                // height: auto // Ubah tinggi chart menjadi 300 piksel
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }

        function drawChart3() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Bong', 11],
                ['Sleep', 7]
            ]);

            var options = {
                // title: 'My Daily Activities',
                pieHole: 0.4,
                backgroundColor: 'transparent',
                chartArea: {
                    width: '100%',
                    height: '100%',
                    left: 60,
                    top: 50
                }, // Mengatur chartArea tanpa margin/padding
                // width: auto, // Ubah lebar chart menjadi 400 piksel
                // height: auto, // Ubah tinggi chart menjadi 300 piksel

            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }



        function drawChart1() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Mata Najwa', 'Musyawarah', 'Mata Najwa', 'Musyawarah', 'Mata Najwa'],
                ['Jan', 1000, 400, 200, 500, 300],
                ['Feb', 1170, 460, 250, 460, 500],
                ['March', 660, 1120, 300, 400, 200],
                ['Apr', 1030, 540, 350, 550, 750],
                ['May', 1000, 400, 200, 500, 300],
                ['Jun', 1170, 460, 250, 460, 500],
                ['Jul', 660, 1120, 300, 400, 200],
                ['Aug', 1030, 540, 350, 550, 750],
                ['Sept', 1000, 400, 200, 500, 300],
                ['Okt', 1170, 460, 250, 460, 500],
                ['Nov', 660, 1120, 300, 400, 200],
                ['Des', 1030, 540, 350, 550, 750]
            ]);

            var options = {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    backgroundColor: 'transparent',
                    chartArea: {
                        width: '200px',
                        height: '100%',
                        left: 60,
                        top: 50
                    },
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        function changeChartType() {
            var selectedChart = document.getElementById("chartType").value;
            if (selectedChart === "pie") {
                drawChart2(); // Draw pie chart
            } else if (selectedChart === "column") {
                drawChart3(); // Draw column chart
            }
        }
    </script>
    <script>
        var budgetInput = document.getElementById('budget');
        var rawBudgetInput = document.getElementById('raw_budget');

        budgetInput.addEventListener('keyup', function(e) {
            var formattedBudget = formatRupiah(this.value, 'Rp');
            budgetInput.value = formattedBudget; // Update the budget input field with the formatted value
            var rawValue = parseRawBudget(formattedBudget); // Parse the raw numeric value
            rawBudgetInput.value = rawValue; // Store the raw numeric value in the hidden input field
        });

        /* Dengan Rupiah */
        var budgettahunan = document.getElementById('budget');
        budgettahunan.addEventListener('keyup', function(e) {
            budgettahunan.value = formatRupiah(this.value, 'Rp');
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? 'Rp ' + rupiah : '';
        }

        function parseRawBudget(formattedBudget) {
            // Remove any non-numeric characters from the formatted budget value
            var rawValue = formattedBudget.replace(/[^\d]/g, '');
            return rawValue;
        }
    </script>
@endsection
