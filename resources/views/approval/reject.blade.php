@extends('layout.index')

@section('title')
    Reject - Budgeting System
@endsection

@section('content')
    <a class="navback" href="/approval-detail" class="text-decoration-none text-end">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                      7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back to Approval Page
    </a>
    <div style="margin-top: 24px"></div>
    <table class="table table-hover table-bordered"
        style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; margin-bottom: 32px; text-align: center; vertical-align: middle; width: 100%; align-self: center; ">
        <thead style="font-weight: 500">
            <tr class="dicobain">
                <th scope="col" style="width: 80px">No</th>
                <th scope="col" >Description</th>
                <th scope="col">Total</th>
                <th style="width: 160px"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td class="judulreject" style="text-align: start">Performer/Host/Guest</td>
                <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp. 0</td>
                <td>
                    <button id="btn-add-note-1" class="btn btn-secondary btn-add-note" style="font-weight: 300">Add Note</button>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td class="judulreject" style="text-align: start">Production Crews</td>
                <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp. 0</td>
                <td>
                    <button id="btn-add-note-2" class="btn btn-secondary btn-add-note" style="font-weight: 300">Add Note</button>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td class="judulreject" style="text-align: start">Production Tools</td>
                <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp. 0</td>
                <td>
                    <button id="btn-add-note-3" class="btn btn-secondary btn-add-note" style="font-weight: 300">Add Note</button>
                </td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td class="judulreject" style="text-align: start">Operational</td>
                <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp. 0</td>
                <td>
                    <button id="btn-add-note-4" class="btn btn-secondary btn-add-note" style="font-weight: 300">Add Note</button>
                </td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td class="judulreject" style="text-align: start">Location</td>
                <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp. 0</td>
                <td>
                    <button id="btn-add-note-5" class="btn btn-secondary btn-add-note" style="font-weight: 300">Add Note</button>
                </td>
            </tr>
            <tr style="border-bottom: 1px solid #c4c4c4;">
                <td colspan="2" class="text-center" style="font-weight: 500; background-color: #dbdee8; ">Total</td>
                <td class="total-price">Rp. 10.000.000.000 / <span style="color: red">Rp. 10.000.000.000</span></td>
                <td>
                    <a href="/viewpdf" target="_blank">
                        <button type="button" class="previewbtn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Preview">Preview PDF</button>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>


    <div class="tablenih" style="display: none;">
        <!-- Editor containers will be inserted here -->
    </div>


@endsection

@section('custom-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-add-note').forEach(function(button, index) {
        button.addEventListener('click', function() {
            // Ensure the table is displayed
            const tablenih = document.querySelector('.tablenih');
            if (tablenih.style.display === 'none') {
                tablenih.style.display = 'block';
            }

            // Get the description from the corresponding row
            const row = button.closest('tr');
            const description = row.querySelector('.judulreject').textContent;

            // Create a unique editor container with a title
            const editorContainer = document.createElement('div');
            editorContainer.className = 'editor-container';

            const title = document.createElement('h3');
            title.textContent = description;
            title.className = 'judulreject';

            // Create the editor div with unique id and name
            const editorId = 'editor-' + index; // Gunakan indeks untuk membuat ID unik
            const editorDiv = document.createElement('div');
            editorDiv.id = editorId;
            editorDiv.name = 'isireject'; // Memberikan nama 'isireject' pada editor
            editorDiv.className = 'editor';

            // Create a separate Save button for each editor
            const saveButton = document.createElement('button');
            saveButton.textContent = 'Save';
            saveButton.className = 'btn-save';
            saveButton.style = 'margin-bottom: 12px; margin-top: 8px; border-radius: 4px; background-color: #4a25aa; border: none; color:#ffe900; padding: 4px 8px';
            saveButton.dataset.editorId = editorId; // Store the editor ID in the button's dataset

            editorContainer.appendChild(title);
            editorContainer.appendChild(editorDiv);
            editorContainer.appendChild(saveButton);
            tablenih.appendChild(editorContainer);

            // Initialize CKEditor in the new container
            CKEDITOR.replace(editorDiv, {
                toolbar: [
                    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike' ] },
                    { name: 'styles', items: [ 'Subscript', 'Superscript' ] },
                    { name: 'lists', items: [ 'NumberedList', 'BulletedList' ] },
                    { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                    { name: 'paragraph', items: [ 'Paragraph' ] }
                ]
            });

            // Add event listener to the Save button
            saveButton.addEventListener('click', function() {
                const editorId = this.dataset.editorId;
                const editor = CKEDITOR.instances[editorId];
                const content = editor.getData();
                saveContent(content, editorId);
            });

            // Disable the add note button to prevent multiple clicks
            button.disabled = true;
        });
    });
});

function saveContent(content, editorId) {
    // Lakukan logika untuk menyimpan konten ke server di sini
    console.log("Content to save:", content, "Editor ID:", editorId);
}
</script>


{{-- JavaScript (AJAX) untuk Mengirim Data ke Server: --}}
{{-- <script>
     function sendContentToServer() {
    // Mengumpulkan konten dari setiap editor
    const editorContents = [];
    document.querySelectorAll('.editor').forEach(function(editor) {
        editorContents.push(CKEDITOR.instances[editor.id].getData());
    });

    // Mengirim data ke server menggunakan AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/save', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log('Konten berhasil disimpan di server');
        }
    };
    xhr.send(JSON.stringify({ editorContents: editorContents }));
}
</script> --}}
@endsection
