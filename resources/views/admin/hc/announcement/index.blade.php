@extends('admin.layout.app')

@section('title')
    Admin - Announcement
@endsection

@section('content')
    <div class="judulhalaman" style="display: flex; text-align:start">Announcement Narasi</div>

    <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#modal-create-announcement"> Add
        Announcement
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                fill="white" />
        </svg>
    </button>

    <div class="tablenih" style="margin-top: 24px;">
        <div class="table-responsive p-2">
            <table id="datatable" class="table table-hover"
                style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; display: 100%; width: 100% ; ;  color: #4A25AA;">
                <thead class="table-light">
                    <tr class="dicobain">
                        {{-- <th scope="col" style="width: 5%; text-align:center">No</th> --}}
                        <th scope="col" style="width: 20%">Category</th>
                        <th class="blablabla" scope="col" style="text-align:start; width:45% ">Title</th>
                        {{-- <th scope="col" style="width: 20%">Files</th> --}}
                        <th scope="col" style="width:10%;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                        <tr>
                            {{-- <th scope="row" style="text-align:center">1</th> --}}
                            <td>{{ $announcement->announcementCategory->category_name }}</td>
                            <td>{{ $announcement->title }}</td>
                            <td>
                                <span style="display: flex; justify-content: center; gap: 8px;">
                                    <a href="{{ route('announcement.detail', $announcement->id) }}" class="uwuq"
                                        type="button">
                                        DETAIL
                                    </a>

                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('modal')
    @include('layout.alert')
    <div class="modal justify-content-center fade" id="modal-create-announcement" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{ route('announcement.store') }}" method="POST" enctype="multipart/form-data"
                        class=" " id="mainForm" style="font:Narasi Sans, sans-serif">
                        @csrf
                        <div class=" mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="announcement_category_id">
                                <option selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class=" mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input id="title" type="title" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title') }}" required autocomplete="title">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class=" mb-3">
                            <label for="title" class="form-label">Content</label>
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" style=""
                                required></textarea>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                        <label for="attachment" class="form-label">Attachment</label>
                        <input id="attachment" type="file" class="form-control @error('attachment') is-invalid @enderror" name="attachment" value="{{ old('attachment') }}">

                        @error('attachment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

                        <div class="mb-3">
                            <label for="attachment" class="form-label">Attachment</label>
                            <input id="attachment" type="file"
                                class="form-control @error('attachment') is-invalid @enderror" name="attachment[]" multiple>
                            @error('attachment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="button-submit">Submit</button>
                        </div>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg') }}" alt=" " />
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 300, // Atur tinggi editor
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview', 'help']]
                ]
            });
            //       $('[id^=content-edit-]').each(function() {
            //       $(this).summernote({
            //           height: 250, // Set editor height
            //           toolbar: [
            //               ['style', ['style']],
            //               ['font', ['bold', 'italic', 'underline', 'clear']],
            //               ['fontname', ['fontname']],
            //               ['color', ['color']],
            //               ['para', ['ul', 'ol', 'paragraph']],
            //               ['height', ['height']],
            //               ['table', ['table']],
            //               ['insert', ['link', 'picture', 'video']],
            //               ['view', ['codeview', 'help']]
            //           ]
            //       });
            //   });
        });
    </script>
@endsection

@section('alert')
    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#successModal').modal('show');
                setTimeout(function() {
                    $('#successModal').modal('hide');
                }, 3000);
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#errorModal').modal('show');
            });
        </script>
    @endif
@endsection
