@extends('layout.index')
@section('title')
    Budget Dashboard
@endsection
@section('content')
    <a href="/department" class="text-decoration-none text-end">
        <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                                          7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back to Departemen
        </button>
    </a>
    <div style="margin-top: 24px"></div>
    {{-- start new code --}}
    <form action="{{ route('department.update', $department->department_id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Department Name -->
        <div class="mb-3">
            <label for="department_name" class="form-label">Department Name</label>
            <input type="text" class="form-control" id="department_name" name="department_name"
                value="{{ $department->department_name }}" required>
        </div>

        <!-- Position Inputs -->
        <div id="position_inputs">
            <!-- Dynamic inputs will be generated here -->
        </div>

        <!-- Add Position Button -->
        <div class="garisbutton"><button type="button" onclick="addPositionInput()">Add Position</button></div>

        <!-- Submit Button -->
        <button type="submit">Submit</button>
    </form>
    {{-- end new code --}}
@endsection
@section('custom-js')
    {{-- start code diaz --}}
    {{-- <script>
        const array = [{
            posisi: '',
        }, ];
        const generatePosisi = () => {
            document.getElementById('inputposisi').innerHTML = array
                .map((item, index) => {
                    return `
                <input style="${index === 0 ? '' : 'margin-top: 12px;'}" value="${array[index].posisi}" type="text" class="form-control" id="posisi-${index}" onchange="handleChange(event, ${index})" />
                `;
                })
                .join('');
        };
        const addPosisi = (e) => {
            e.preventDefault();
            console.log(e);
            array.push({
                posisi: '',
            });
            generatePosisi();
        };

        const handleChange = (e, index) => {
            array[index].posisi = e.target.value;
            document.getElementById(`posisi-${index}`).value = e.target.value;
            console.log(array);
        };

        generatePosisi();
    </script> --}}
    {{-- end code diaz --}}

    <script>
        function addPositionInput() {
            const positionInputs = document.getElementById('position_inputs');
            const index = positionInputs.childElementCount;

            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'positions[]';
            input.placeholder = 'Position Name';
            input.classList.add('form-control');

            positionInputs.appendChild(input);
        }
    </script>
@endsection
