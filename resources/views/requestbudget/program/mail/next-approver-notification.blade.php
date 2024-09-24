<!DOCTYPE html>
<html>
<head>
    <title>Budget Request Approval Needed</title>
</head>
<body>
    <h1>Budget Request Approval Needed</h1>
    <p>Dear {{ $nextApprover->full_name }},</p>
    <p>A budget request has been submitted, and your approval is required.</p>
    <p><strong>Request ID:</strong> {{ $requestBudget->request_budget_id }}</p>
    <p><strong>Budget:</strong> {{ $requestBudget->budget }}</p>
    <p><strong>Total Cost:</strong> {{ $totalAll }}</p>
    <p><strong>Current Stage:</strong> {{ $currentStage }}</p>

    <p>Please review the request at your earliest convenience. A detailed report is attached.</p>
    <p>Thank you.</p>
</body>
</html>