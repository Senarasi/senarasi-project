@extends('company_document.layout.app')

@section('title')
    Company File Documents - Senarasi
@endsection

@section('content')
    <!--Badan Isi-->
    <div style="margin-top: -12px; margin-left: 24px">
        <div class="judulhalaman" style=" display: flex; align-items: center; ">Company File Documents</div>
            <div style="display: inline-flex; gap: 12px; margin-left:4px;">
                <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#modal-addcategory"> Add Category
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                            fill="white" />
                    </svg>
                </button>
            </div>

            @if (session('status'))
            <div class="alert alert-success ms-2 mt-2" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger  ms-2 mt-2" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="tablenih" style="padding-top: -24px;">
                <div class="table-responsive p-3">
                    <table id="datatable" class="table table-hover"
                    style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; display: 100%; width: 100% ;  color: #4A25AA; ">
                        <thead style="font-weight: 500; text-align: center">
                            <tr class="dicobain">
                                <th scope="col" class="col-1">No </th>
                                <th scope="col" class="col-2">Category </th>
                                <th scope="col"  class="col-2">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col" style="width: 120px">Action</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle;">
                            @foreach ($docCategories as $docCategory)
                            <tr>
                                <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                <td>{{ $docCategory->category }}</td>
                                <td>{{ $docCategory->title }}</td>
                                <td>{{ $docCategory->description}}</td>
                                <td class="text-center">
                                    <span style="display: flex; gap: 8px; justify-content: center">
                                        <a href="{{route('company-document.detail', $docCategory->slug)}}" class="uwuq">Detail</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('company-document.destroy', $docCategory->slug) }}" method="POST">
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
    <div class="modal justify-content-center fade" id="modal-addcategory"  data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{route('company-document.store')}}" method="POST" class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif">
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select id="category_option" name="category" class="form-select" style="font: 300 12">
                                <option style="color: rgb(189, 189, 189);" disabled selected>Choose Category</option>
                                <option value="FINANCE" {{ old('category') == 'FINANCE' ? 'selected' : '' }}>FINANCE</option>
                                <option value="PEOPLE" {{ old('category') == 'PEOPLE' ? 'selected' : '' }}>PEOPLE</option>
                                <option value="ASSET" {{ old('category') == 'ASSET' ? 'selected' : '' }}>ASSET</option>
                                <option value="LEGAL" {{ old('category') == 'LEGAL' ? 'selected' : '' }}>LEGAL</option>
                                <option value="PRODUCTION" {{ old('category') == 'PRODUCTION' ? 'selected' : '' }}>PRODUCTION</option>
                                <option value="EKSTERNAL RELATION" {{ old('category') == 'EKSTERNAL RELATION' ? 'selected' : '' }}>EKSTERNAL RELATION</option>
                            </select>
                            @error('category')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" placeholder="Title" value="{{old('title')}}" required>
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                                id="description" placeholder="Description" value="{{old('description')}}" required>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
            </div>
        </div>
    </div>
@endsection
