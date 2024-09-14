@extends('layout.index')

@section('title')
    Reject - Budgeting System
@endsection

@section('content')
    <a class="navback" href="{{ route('approval.show', $id) }}" class="text-decoration-none text-end">
        <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
            <path
                d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                                                                                                                                                                                                                                                                              7.2501 0 7.6501 0 8.0501Z "
                fill="#4A25AA " />
        </svg>
        Back to Approval Page
    </a>
    <div style="margin-top: 24px"></div>

    <table class="table table-hover table-bordered"
        style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; margin-bottom: 32px; text-align: center; vertical-align: middle; width: 100%; align-self: center; ">
        <form action="{{ route('approval.submitReject', $id) }}" method="POST">
            @csrf
            <table class="table table-hover table-bordered"
                style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; margin-bottom: 32px; text-align: center; vertical-align: middle; width: 100%; align-self: center; ">
                <thead style="font-weight: 500">
                    <tr class="dicobain">
                        <th scope="col" style="width: 80px">No</th>
                        <th scope="col">Description</th>
                        <th scope="col">Total</th>
                        <th style="width: 160px"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td class="judulreject" style="text-align: start">Performer/Host/Guest</td>
                        <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp.
                            {{ number_format($totalperformer) }}</td>
                        <td>
                            <textarea id="notes-1" name="notes[1][content]" rows="4" cols="50"
                                placeholder="Enter your note for Performer/Host/Guest..."></textarea>
                            <input type="hidden" name="notes[1][title]" value="Performer/Host/Guest">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td class="judulreject" style="text-align: start">Production Crews</td>
                        <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp.
                            {{ number_format($totalproductioncrew) }}</td>
                        <td>
                            <textarea id="notes-2" name="notes[2][content]" rows="4" cols="50"
                                placeholder="Enter your note for Production Crews..."></textarea>
                            <input type="hidden" name="notes[2][title]" value="Production Crews">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td class="judulreject" style="text-align: start">Production Tools</td>
                        <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp.
                            {{ number_format($totalproductiontool) }}</td>
                        <td>
                            <textarea id="notes-3" name="notes[3][content]" rows="4" cols="50"
                                placeholder="Enter your note for Production Tools..."></textarea>
                            <input type="hidden" name="notes[3][title]" value="Production Tools">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td class="judulreject" style="text-align: start">Operational</td>
                        <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp.
                            {{ number_format($totaloperational) }}</td>
                        <td>
                            <textarea id="notes-4" name="notes[4][content]" rows="4" cols="50"
                                placeholder="Enter your note for Operational..."></textarea>
                            <input type="hidden" name="notes[4][title]" value="Operational">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td class="judulreject" style="text-align: start">Location</td>
                        <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp.
                            {{ number_format($totallocation) }}</td>
                        <td>
                            <textarea id="notes-5" name="notes[5][content]" rows="4" cols="50"
                                placeholder="Enter your note for Location..."></textarea>
                            <input type="hidden" name="notes[5][title]" value="Location">
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #c4c4c4;">
                        <td colspan="2" class="text-center" style="font-weight: 500; background-color: #dbdee8;">Total
                        </td>
                        <td class="total-price">Rp. {{ number_format($totalAll) }} / <span style="color: red">Rp.
                                {{ number_format($requestBudgets->budget) }}</span></td>
                        <td>
                            <a href="/viewpdf" target="_blank">
                                <button type="button" class="previewbtn btn-secondary" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-title="Preview">Preview PDF</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <button type="submit" class="btn btn-danger" style="margin-top: 20px;">Submit Rejection</button>
            </table>
        </form>
    @endsection

    @section('custom-js')
        <script>
            function logFormData(form) {
                const formData = new FormData(form);
                for (let [key, value] of formData.entries()) {
                    console.log(key, value);
                }
                return true; // or false to prevent submission for testing
            }
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const notesContainer = document.getElementById('notes-container');
                const addNoteButtons = document.querySelectorAll('.btn-add-note');
                let noteIndex = 0;

                addNoteButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        noteIndex++;
                        const title = button.getAttribute('data-title');

                        // Create note container
                        const noteContainer = document.createElement('div');
                        noteContainer.className = 'note-container';
                        noteContainer.setAttribute('data-title', title);
                        noteContainer.style.marginBottom = '20px';

                        // Create label
                        const titleLabel = document.createElement('label');
                        titleLabel.textContent = `${title} Note:`;
                        titleLabel.style.display = 'block';
                        titleLabel.style.fontWeight = 'bold';
                        titleLabel.style.marginBottom = '5px';

                        // Create textarea for note content
                        const textarea = document.createElement('textarea');
                        textarea.name = `notes[${noteIndex}][content]`;
                        textarea.placeholder = `Enter your note for ${title}...`;
                        textarea.rows = 4;
                        textarea.cols = 50;
                        textarea.required = true;

                        // Create hidden input for note title
                        const titleInput = document.createElement('input');
                        titleInput.type = 'hidden';
                        titleInput.name = `notes[${noteIndex}][title]`;
                        titleInput.value = title;

                        // Create cancel button
                        const cancelButton = document.createElement('button');
                        cancelButton.type = 'button';
                        cancelButton.textContent = 'Remove Note';
                        cancelButton.className = 'btn btn-danger btn-sm';
                        cancelButton.style.marginTop = '5px';

                        // Append elements to note container
                        noteContainer.appendChild(titleLabel);
                        noteContainer.appendChild(textarea);
                        noteContainer.appendChild(titleInput);
                        noteContainer.appendChild(cancelButton);
                        notesContainer.appendChild(noteContainer);

                        // Disable the "Add Note" button to prevent duplicate notes for the same section
                        button.disabled = true;
                        button.textContent = 'Note Added';

                        // Cancel button functionality
                        cancelButton.addEventListener('click', function() {
                            notesContainer.removeChild(noteContainer);
                            button.disabled = false;
                            button.textContent = 'Add Note';
                        });

                        console.log(`Textarea added with name: notes[${noteIndex}][content]`);
                        console.log(`Added note for ${title} with index ${noteIndex}`);
                    });
                });
            });
        </script>
    @endsection
