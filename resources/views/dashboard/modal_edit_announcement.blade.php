<div class="modal justify-content-center fade" id="modal-edit-announcement-{{ $announcement->id}}"  data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form action="{{ route('announcement.update', $announcement->id) }}" method="POST" enctype="multipart/form-data" class="" id="mainForm" style="font:Narasi Sans, sans-serif">
                        @csrf
                        @method('PATCH')
                        <div class=" mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="announcement_category_id">
                                @foreach ($categories as $category)
                                @if ($category->id == $announcement->announcement_category_id)
                                <option value=" {{ $category->id}}" selected="selected">{{ $category->category_name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endif
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
                            <input id="title" type="title"
                                class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title') ?? $announcement->title }}" required autocomplete="title">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class=" mb-3">
                            <label for="content-edit-{{ $announcement->id }}" class="form-label">Content</label>
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content-edit-{{ $announcement->id }}" style="" required>
                                {{ old('content') ?? $announcement->content}}
                            </textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="attachment" class="form-label">Attachment</label>
                            @if ($announcement->attachment) <!-- Pastikan $announcement adalah data yang dikirim ke form -->
                            <div class="mb-2">
                                <div>
                                    @if (in_array(pathinfo($announcement->attachment, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                                        <img src="{{ $announcement->attachment() }}" class="img-fluid" alt="Attachment" style="max-width: 100px;">
                                    @else
                                        <a href="{{ $announcement->attachment() }}" target="_blank">View Current Attachment</a>
                                    @endif
                                </div>
                            </div>
                        @endif
                            <input id="attachment" type="file" class="form-control @error('attachment') is-invalid @enderror" name="attachment">

                            @error('attachment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="button-submit">Update</button>
                        </div>


                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
            </div>
        </div>
    </div>
