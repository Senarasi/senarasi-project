@extends('admin.layout.app')

@section('title')
    Edit Department - Budgeting System
@endsection

@section('content')
    <a href="{{ route('department') }}" class="text-decoration-none text-end">
        <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                      7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back to Departemen
        </button>
    </a>
    <div style="margin-top: 24px"></div>
    <form onsubmit="addPosisi(event)" action="" class="formrequest">
        <fieldset disabled>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Department Name</label>
                <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
            </div>
        </fieldset>

        <label for="posisi" class="form-label">Positions</label>
        <div id="position_inputs">
            <!-- Dynamic inputs will be generated here -->
        </div>


        <!-- Add Position Button -->
        <div class="garisbutton"><button type="button" onclick="addPositionInput()">Add Positions</button></div>

        <!-- Submit Button -->
        <button type="submit" class="button-general">Submit</button>
    </form>
@endsection

@section('custom-js')
    <script>
        function addPositionInput() {
            const positionInputs = document.getElementById('position_inputs');
            const index = positionInputs.childElementCount;

            // Membuat div untuk mengelompokkan input dan tombol delete
            const inputGroup = document.createElement('div');
            inputGroup.classList.add('position-input-group', 'mb-3');

            // Membuat wrapper untuk input dan tombol delete
            const inputWrapper = document.createElement('div');
            inputWrapper.classList.add('input-group');

            // Membuat input untuk nama posisi
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'positions[]';
            input.placeholder = 'Position Name';
            input.classList.add('form-control');

            // Membuat tombol delete
            const deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1.5-.5m2.5 0a.5.5 0 0 1.5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1.5-.5m3.5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>`;
            deleteButton.classList.add('button', 'delete-button');
            deleteButton.style.background = 'none'; // Menambah gaya padding
            deleteButton.style.border = 'none'; // Menambah gaya border radius
            deleteButton.addEventListener('click', function() {
                positionInputs.removeChild(inputGroup);
            });

            // Menambahkan input dan tombol delete ke dalam wrapper
            inputWrapper.appendChild(input);
            const span = document.createElement('span');
            span.classList.add('input-group-text');
            span.appendChild(deleteButton);
            inputWrapper.appendChild(span);

            // Menambahkan wrapper ke dalam div pengelompokan
            inputGroup.appendChild(inputWrapper);

            // Menambahkan div pengelompokan ke dalam kontainer input posisi
            positionInputs.appendChild(inputGroup);
        }
    </script>
@endsection
