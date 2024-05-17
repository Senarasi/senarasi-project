<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Production Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-large { max-width: 90%; }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Event Production Details</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#entryModal">
        Add Details
    </button>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Category</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Cost</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody id="detailsTable">
            <!-- Data will be inserted here dynamically -->
        </tbody>
    </table>
</div>

<!-- Modal for Adding Details -->
<div class="modal fade" id="entryModal" tabindex="-1" aria-labelledby="entryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="entryModalLabel">Add Production Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="detailsForm">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select id="category" class="form-select" required>
                            <option value="">Select Category</option>
                            <option value="Host/Performer/Guest">Host/Performer/Guest</option>
                            <option value="Production Crews">Production Crews</option>
                            <option value="Operational">Operational</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="personName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="personName" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Cost</label>
                        <input type="number" class="form-control" id="cost" required>
                    </div>
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <input type="text" class="form-control" id="remarks">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addDetails()">Add to Table</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function addDetails() {
        const category = document.getElementById('category').value;
        const name = document.getElementById('personName').value;
        const quantity = document.getElementById('quantity').value;
        const cost = document.getElementById('cost').value;
        const remarks = document.getElementById('remarks').value;

        const table = document.getElementById('detailsTable');
        const row = table.insertRow();
        const cell1 = row.insertCell(0);
        const cell2 = row.insertCell(1);
        const cell3 = row.insertCell(2);
        const cell4 = row.insertCell(3);
        const cell5 = row.insertCell(4);

        cell1.innerHTML = category;
        cell2.innerHTML = name;
        cell3.innerHTML = quantity;
        cell4.innerHTML = cost;
        cell5.innerHTML = remarks;

        // Clear input fields after insertion
        document.getElementById('category').value = '';
        document.getElementById('personName').value = '';
        document.getElementById('quantity').value = '';
        document.getElementById('cost').value = '';
        document.getElementById('remarks').value = '';

        // Hide modal
        const entryModal = bootstrap.Modal.getInstance(document.getElementById('entryModal'));
        entryModal.hide();
    }
</script>
</body>
</html>
