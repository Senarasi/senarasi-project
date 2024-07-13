@extends('company_document.layout.app')
@section('title')
    Company File Documents - Senarasi
@endsection

@section('content')
    <!--Badan Isi-->
    <div style="margin-top: -12px; margin-left: 24px">
        <a class="navback" href="{{ route('company-document.index') }}" style="text-decoration: none">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                                  7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back
        </a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="judulhalaman" style=" display: flex; align-items: center; ">{{ $docCategory->category }}</div>


        <div style="display: inline-flex; gap: 12px; margin-left:4px;">
            <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#modal-upload">
                Upload
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white" />
                </svg>
            </button>
        </div>
        <div class="tablenih" style="padding-top: -24px;">
            <div class="table-responsive p-3">
                <table id="datatable" class="table table-hover"
                    style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; display: 100%; width: 100% ;  color: #4A25AA; ">
                    <thead style="font-weight: 500; text-align: center">
                        <tr class="dicobain">
                            <th scope="col" class="col-1">No </th>
                            <th scope="col" class="col-2" style="text-align:start;">File Code</th>
                            <th scope="col" class="col-2" style="text-align:start;">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col" style="width: 120px">Action</th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                        @foreach ($docCategory->documents as $doc)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                <td>{{ $doc->file_code }}</td>
                                <td>{{ $doc->title }}</td>
                                <td>{{ $doc->description }}</td>
                                <td class="text-center">
                                    <span style="display: flex; gap: 8px; justify-content: center">
                                        <a href="{{ route('company-document.view', ['docCategory' => $docCategory->slug, 'doc' => $doc->slug]) }}"
                                            class="uwuq">View</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('company-document.destroyFile', ['docCategory' => $docCategory->slug, 'doc' => $doc->slug]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

@section('modal')
    <div class="modal justify-content-center fade" id="modal-upload" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{ route('company-document.storeUpload', $docCategory->slug) }}" method="POST"
                        enctype="multipart/form-data" class="modal-form-check" id="mainForm"
                        style="font: 500 14px Narasi Sans, sans-serif">
                        @csrf
                        <input type="hidden" class="form-control" name="document_category_id"
                            value="{{ $docCategory->document_category_id }}">
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" name="category"
                                class="form-control @error('category') is-invalid @enderror" id="category"
                                placeholder="category" value="{{ old('category') ?? $docCategory->category }}" disabled>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="file_code" class="form-label">File Code</label>
                            <input type="text" name="file_code"
                                class="form-control @error('file_code') is-invalid @enderror" id="file_code"
                                placeholder="File Code" value="{{ old('file_code') }}" required>
                            @error('file_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" placeholder="Title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description"
                                class="form-control @error('description') is-invalid @enderror" id="description"
                                placeholder="Description" value="{{ old('description') }}" required>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload File (PDF, Max 2MB)</label>
                            <input type="file" name="file_document"
                                class="form-control @error('file_document') is-invalid @enderror" id="file_document"
                                value="{{ old('file_document') }}" accept=".pdf" required>
                            @error('file_document')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input" type="checkbox" name="enable_download" id="flexCheckDefault"
                                value="1">
                            <label style="padding-top: 3px; font: 350 14px Narasi Sans,sans-serif; letter-spacing: 0.5px;"
                                class="form-check-label" for="flexCheckDefault">
                                Downloadable
                            </label>
                        </div>
                        <button type="submit" class="button-submit">Upload</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg') }}" alt=" " />
            </div>
        </div>
    </div>
@endsection
{{--
@section('custom-js')
    <script>
 document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('mainForm');
            const checkbox = document.getElementById('flexCheckDefault');

            checkbox.addEventListener('change', () => {
                localStorage.setItem('disableRightClick', checkbox.checked);
            });

            form.addEventListener('submit', (event) => {
                event.preventDefault();

                const formData = {
                    category: document.getElementById('category').value,
                    title: document.getElementById('title').value,
                    desc: document.getElementById('desc').value,
                    file: document.getElementById('formFile').value
                };

                localStorage.setItem('formData', JSON.stringify(formData));
                alert('Form data saved to local storage!');
            });
        });
    </script>
@endsection --}}
