@extends('company_document.layout.app')

@section('title')
    Edit Department - Budgeting System
@endsection

@section('content')
    <div style="margin-top: 12px;">
        <a href="{{route('company-document.detail', $docCategory->slug)}}" class="text-decoration-none text-end">
            <button class="navback">
                <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
                    <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                        7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
                </svg>
                Back
            </button>
        </a>
    </div>
    <div style="margin-top: 24px"></div>
    <form action="{{ route('company-document.storeUpload', $docCategory->slug) }}" method="POST" enctype="multipart/form-data" class="modal-form-check" id="mainForm" style="font: 500 14px Narasi Sans, sans-serif">
        @csrf
        <input type="hidden" class="form-control" name="document_category_id" value="{{ $docCategory->id }}">
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" id="category" placeholder="category" value="{{ old('category') ?? $docCategory->category }}" disabled>
            @error('category')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="doc_number" class="form-label">Document Number</label>
            <input type="text" name="doc_number" class="form-control @error('doc_number') is-invalid @enderror" id="doc_number" placeholder="Code Files" value="{{ old('doc_number')}}" required>
            @error('doc_number')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">File Name</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" value="{{ old('title')}}" required>
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" value="{{ old('description')}}" required>
            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload File (PDF, Max 2MB)</label>
            <input type="file" name="file_document" class="form-control @error('file_document') is-invalid @enderror" id="file_document" value="{{ old('file_document') }}" accept=".pdf" required>
            @error('file_document')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <input class="form-check-input" type="checkbox" name="enable_download" id="flexCheckDefault" value="1">
            <label style="padding-top: 3px; font: 350 14px Narasi Sans, sans-serif; letter-spacing: 0.5px;" class="form-check-label" for="flexCheckDefault">
                Download
            </label>
        </div>
        <div class="mb-3">
            <label for="posisi" class="form-label">Add Supporting Document</label>
            <div id="supportingdoc_inputs">
                <!-- Dynamic inputs will be generated here -->
            </div>

        <!-- Add Position Button -->
        <div class="garisbutton"><button type="button" onclick="addSupportingDoc()">Add File</button></div>
    </div>

        <!-- Submit Button -->
        <button type="submit" class="button-general">Submit</button>
    </form>
@endsection

@section('custom-js')
    <script>
        function addSupportingDoc() {
            const supportingdocInput = document.getElementById('supportingdoc_inputs');
            const index = supportingdocInput.childElementCount;

            const inputGroup = document.createElement('div');
            inputGroup.classList.add('position-input-group');

            const inputWrapper = document.createElement('div');
            inputWrapper.classList.add('input-group');

            const fileNameInput = document.createElement('input');
            fileNameInput.type = 'text';
            fileNameInput.name = `file_name[${index}]`;
            fileNameInput.placeholder = 'File Name';
            fileNameInput.classList.add('form-control');

            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.name = `file_supporting_doc[${index}]`;
            fileInput.classList.add('form-control');
            fileInput.accept = '.pdf';

            const deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3.5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>`;
            deleteButton.classList.add('button', 'delete-button');
            deleteButton.style.background = 'none';
            deleteButton.style.border = 'none';
            deleteButton.addEventListener('click', function() {
                supportingdocInput.removeChild(inputGroup);
            });

            inputWrapper.appendChild(fileNameInput);
            inputWrapper.appendChild(fileInput);

            const span = document.createElement('span');
            span.classList.add('input-group-text', 'py-0');
            span.appendChild(deleteButton);
            inputWrapper.appendChild(span);

            inputGroup.appendChild(inputWrapper);

            const checkboxDiv = document.createElement('div');
            checkboxDiv.classList.add('mt-2');

            const checkboxInput = document.createElement('input');
            checkboxInput.type = 'checkbox';
            checkboxInput.name = `supporting_doc_status[${index}]`;
            checkboxInput.id = `flexCheckDefault_${index}`;
            checkboxInput.value = '1';
            checkboxInput.classList.add('form-check-input');

            const checkboxLabel = document.createElement('label');
            checkboxLabel.htmlFor = checkboxInput.id;
            checkboxLabel.textContent = 'Download';
            checkboxLabel.classList.add('form-check-label', 'mb-3', 'ms-1');
            checkboxLabel.style.paddingTop = '3px';
            checkboxLabel.style.font = '350 14px Narasi Sans, sans-serif';
            checkboxLabel.style.letterSpacing = '0.5px';

            checkboxDiv.appendChild(checkboxInput);
            checkboxDiv.appendChild(checkboxLabel);

            inputGroup.appendChild(checkboxDiv);

            supportingdocInput.appendChild(inputGroup);
        }
    </script>
@endsection
