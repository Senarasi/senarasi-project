<div class="modal justify-content-center fade" id="modal-edit-announcement" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body bg-white">
                <form method="POST" enctype="multipart/form-data" id="mainForm" style="font:Narasi Sans, sans-serif">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="announcement_category_id">
                            <!-- Static options for categories -->
                            <option value="1" selected="selected">Category 1</option>
                            <option value="2">Category 2</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" class="form-control" name="title" value="Announcement Title" required autocomplete="title">
                    </div>
                    
                    <div class="mb-3">
                        <label for="content-edit" class="form-label">Content</label>
                        <textarea name="content" class="form-control" id="content-edit" required>Announcement content goes here.</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="attachment" class="form-label">Attachment</label>
                        <div class="row row-cols-auto">
                            <!-- Static example attachments -->
                            <div class="col mb-2">
                                <img src="path/to/image.jpg" class="img-fluid" alt="Attachment" style="max-width: 100px;">
                            </div>
                            <div class="col mb-2">
                                <a href="path/to/document.pdf" target="_blank" style="text-decoration: none;">Document.pdf</a>
                            </div>
                        </div>
                        <input id="attachment" type="file" class="form-control" name="attachment[]" multiple>
                    </div>

                    <div class="text-end">
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="button-submit">Update</button>
                    </div>
                </form>
            </div>
            <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')}} " alt=" " />
        </div>
    </div>
</div>
