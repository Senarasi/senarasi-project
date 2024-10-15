<!DOCTYPE html>
<html>

    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
            }

            .email-container {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                margin: auto;
                text-align: left;
            }

            .logo {
                text-align: left;
                margin-top: -24px;
                margin-bottom: 20px;

            }

            .logo img {
                max-width: 220px;
            }

            h3 {
                color: #333;
                /* text-align: center; */
            }

            p,
            ul {
                color: #555;
            }

            ul {
                padding-left: 20px;
                margin: 0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            td {
                padding: 8px 0;
                vertical-align: top;
                font-size: 16px;
            }

            .label {
                width: 30%;
                font-weight: bold;
            }

            .value {
                width: 70%;
            }

            .alert {
                position: relative;
                padding: 5px 5px;
                margin-bottom: 1px;
                border: 1px solid transparent;
                border-radius: 0.20rem;
                font-size: 12px !important;

            }

            .alert-primary {
                color: #084298;
                background-color: #cfe2ff;
                border-color: #084298;
            }

            .alert-secondary {
                color: #41464b;
                background-color: #e2e3e5;
                border-color: #41464b;
            }

            .alert-success {
                color: #0f5132;
                background-color: #d1e7dd;
                border-color: #0f5132;
            }

            .alert-danger {
                color: #842029;
                background-color: #f8d7da;
                border-color: #842029;
            }

            .alert-warning {
                color: #664d03;
                background-color: #fff3cd;
                border-color: #664d03;
            }

            .alert-info {
                color: #055160;
                background-color: #cff4fc;
                border-color: #055160;
            }

            .alert-light {
                color: #636464;
                background-color: #fefefe;
                border-color: #636464;
            }

            .alert-dark {
                color: #141619;
                background-color: #d3d3d4;
                border-color: #141619;
            }

            .button-report {
                right: 0;
                color: #ffff !important;
                border-radius: 6px;
                background-color: #4a25aa;
                border: none;
                text-align: center;
                text-decoration: none;
                font: 400 16px Narasi Sans, sans-serif;
                align-self: center;
                padding: 10px 14px;
                margin-top: 12px;
                display: block;
            }
        </style>
    </head>

    <body>
        <div style="background-color: #f9f9f9; padding-top: 64px; padding-bottom: 64px;">
            <div class="logo container" style="text-align: center">
                <img src="https://imgur.com/GYooEjc.png" alt="Company Logo" style="display: inline-block;">
            </div>
            <div class="email-container">
                <h3>Dear {{ strtoupper($departmentRequestPayment->user->full_name) }}, </h3>
                <p>Unfortunately, Your payment request has been rejected by {{ strtoupper($approverName) }}.</p>
                <p>With Notes: {{ strip_tags($rejectNotes) }}.</p>

                <h4>Request Payment detail:</h4>
                <table>
                    <tr>
                        <td class="label">Status</td>
                        {{-- <td>: <span class="alert alert-success">{{ strtoupper($currentStage) }}</span></td> --}}
                        <td>: <span class="alert alert-danger">REJECTED</span></td>
                    </tr>

                    <tr>
                        <td class="label">User</td>
                        <td>: {{ $departmentRequestPayment->user->full_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Department</td>
                        <td>: {{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->department->department_name}}</td>
                    </tr>
                    <tr>
                        <td class="label">Budget Code</td>
                        <td>: {{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->budget_code}}</td>
                    </tr>
                    <tr>
                        <td class="label">Budget Name</td>
                        <td>: {{ $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget->budget_name}}</td>
                    </tr>
                    <tr>
                        <td class="label">Date</td>
                        <td>: {{ \Carbon\Carbon::parse($departmentRequestPayment->date)->translatedFormat('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td class="label">Paid To</td>
                        <td>: {{ $departmentRequestPayment->paid_to}}</td>
                    </tr>
                    <tr>
                        <td class="label">Paid Via</td>
                        <td>: {{ $departmentRequestPayment->paid_via}}</td>
                    </tr>
                    <tr>
                        <td class="label">Bank</td>
                        <td>: {{ $departmentRequestPayment->bank_name}}</td>
                    </tr>
                    <tr>
                        <td class="label">Bank Account Name</td>
                        <td>: {{ $departmentRequestPayment->account_name}}</td>
                    </tr>
                    <tr>
                        <td  class="label">
                            @if ($departmentRequestPayment->paid_via == "Virtual Account")
                                Virtual Number
                            @elseif ($departmentRequestPayment->paid_via == "transfer")
                                Account Number
                            @endif </td>
                        <td>: {{ $departmentRequestPayment->account_number}}</td>
                    </tr>
                    <tr>
                        <td class="label">No. Doc / No. Invoice </td>
                        <td>:
                            {{ $departmentRequestPayment->document_number}}
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Total Budget</td>
                        <td>: Rp. {{ number_format($departmentRequestPayment->total_cost, 0, ',', '.') }}</td>
                    </tr>
                    @if ($departmentRequestPayment->note != null )
                    <tr>
                        <td class="label">Notes</td>
                        <td>:  {{ $departmentRequestPayment->note}}</td>
                    </tr>
                    @endif
                </table>
                </div>
            </div>
        </div>

    </body>

</html>
