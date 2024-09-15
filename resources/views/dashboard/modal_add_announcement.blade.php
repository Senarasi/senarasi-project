<div class="modal justify-content-center fade" id="modal-create-announcement"  data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body bg-white">
                <form action="{{ route('announcement.store') }}" method="POST" enctype="multipart/form-data" class=" " id="mainForm" style="font:Narasi Sans, sans-serif">
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
                        <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class=" mb-3">
                        <label for="title" class="form-label">Content</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" style="" required></textarea>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="attachment" class="form-label">Attachment</label>
                        <input id="attachment" type="file" class="form-control @error('attachment') is-invalid @enderror" name="attachment" value="{{ old('attachment') }}" required autofocus>

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
            <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
        </div>
    </div>
</div>
