@extends('layout.index')

@section('title')
    Add Barang - Vendor
@endsection

@section('content')
    <a href="/item" class="text-decoration-none text-end">
        <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                      7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back to Vendor
        </button>
    </a>
    <div style="margin-top: 24px"></div>
    <form onsubmit="addPosisi(event)" action="" class="formrequest">
            <div class="mb-3">
                <label for="Vendor" class="form-label">Nama Departemen</label>
                <select type="text " id="disabledTextInput " class="form-select" placeholder="Rp10.000.000 ">
                <option value="">1</option>
                <option value="">2</option>

                <option value="">3</option>
            </select>

            </div>

        <label for="barang" class="form-label">Barang</label>
        <div id="barang_inputs">

        </div>


        <!-- Add Barang Button -->

        <div class="garisbutton"><button type="button" onclick="addBarangInput()">Add Position</button></div>

        <!-- Submit Button -->
        <button type="submit" class="button-general">Submit</button>
    </form>
@endsection

@section('custom-js')
    <script>
function addBarangInput() {
    const barangInputs = document.getElementById('barang_inputs');
    const index = barangInputs.childElementCount;

    // Membuat div untuk mengelompokkan input dan tombol delete
    const inputGroup = document.createElement('div');
    inputGroup.classList.add('barang-input-group', 'mb-3');

    // Membuat wrapper untuk input dan tombol delete
    const inputWrapper = document.createElement('div');
    inputWrapper.classList.add('input-group');

    // Membuat input untuk nama barang
    const barangNameInput = document.createElement('input');
    barangNameInput.type = 'text';
    barangNameInput.name = 'barang[]';
    barangNameInput.placeholder = 'Nama Barang';
    barangNameInput.classList.add('form-control');

    // Membuat input untuk deskripsi barang
    const barangDescriptionInput = document.createElement('input');
    barangDescriptionInput.type = 'text';
    barangDescriptionInput.name = 'descriptions[]';
    barangDescriptionInput.placeholder = 'Deskripsi Barang';
    barangDescriptionInput.classList.add('form-control');

    // Membuat input untuk harga barang
    const barangPriceInput = document.createElement('input');
    barangPriceInput.type = 'number';
    barangPriceInput.name = 'harga[]';
    barangPriceInput.placeholder = 'Harga Barang';
    barangPriceInput.classList.add('form-control');

    // Membuat tombol delete
    const deleteButton = document.createElement('button');
    deleteButton.type = 'button';
    deleteButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1.5-.5m2.5 0a.5.5 0 0 1.5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1.5-.5m3.5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>`;
    deleteButton.classList.add('button', 'delete-button');
    deleteButton.style.background = 'none';
    deleteButton.style.border = 'none';
    deleteButton.addEventListener('click', function() {
        barangInputs.removeChild(inputGroup);
    });

    // Menambahkan input untuk nama barang, deskripsi barang, dan harga barang ke dalam wrapper
    inputWrapper.appendChild(barangNameInput);
    inputWrapper.appendChild(barangDescriptionInput);
    inputWrapper.appendChild(barangPriceInput);

    // Membuat elemen span untuk membungkus tombol delete
    const span = document.createElement('span');
    span.classList.add('input-group-text');
    span.appendChild(deleteButton);
    inputWrapper.appendChild(span);

    // Menambahkan wrapper ke dalam div pengelompokan
    inputGroup.appendChild(inputWrapper);

    // Menambahkan div pengelompokan ke dalam kontainer input barang
    barangInputs.appendChild(inputGroup);
}

    </script>
@endsection
