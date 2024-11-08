@extends('layout.index')

@section('title')
    Reject - Budgeting System
@endsection
@section('costum-css')
    <style>
        th {
            padding-top: 0.5rem !important;
        }

        .bordered-table,
        .bordered-table th,
        .bordered-table td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .detaillink {
            color: rgb(177, 177, 177);
            cursor: pointer;
            text-decoration: underline;
            margin-top: 5px;

        }

        .detaillink:hover {
            color: #4a25aa;
        }
    </style>
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

    <form action="{{ route('approval.submitReject', $id) }}" method="POST">
        @csrf
        <table class="table table-hover table-bordered"
            style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; margin-bottom: 32px; text-align: center; vertical-align: middle; width: 100%; align-self: center;">
            <thead style="font-weight: 500; ">
                <tr class="dicobain" style="vertical-align: middle; ">
                    <th scope="col" style="width:5%; padding-top: 1rem !important">No</th>
                    <th scope="col" style="width: 55%; padding-top: 1rem !important">Description</th>
                    <th scope="col" style="width: 20%; padding-top: 1rem !important">Total</th>
                    <th style="width: 20%; padding-top: 1rem !important">
                        <a href="/viewpdf" target="_blank">
                            <button type="button" class="previewbtn btn-secondary" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Preview">Preview PDF</button>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody style="vertical-align: top">
                <tr>
                    <th scope="row">1</th>
                    <td class="judulreject" style="text-align: start;">
                        <div>Performer / Host / Guest</div>
                        <div onclick="toggleDetails(this)"class="detaillink">Detail</div>

                        <div class="secondary hidden"
                            style="clear: both; font-size: 16px; text-transform: capitalize; margin-left: 6px; display: none; padding-top: 12px">
                            <table class="bordered-table" style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="vertical-align: top; text-align: center;">
                                        {{-- <th style="width: 5%;">No</th> --}}
                                        <th style="width: 65%;">Description</th>
                                        <th style="width: 5%;">Day</th>
                                        <th style="width: 5%;">Qty</th>
                                        <th style="width: 20%;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($performer as $key => $datas)
                                        @forelse ($datas as $data)
                                            <tr style="vertical-align: top; text-align: center;">
                                                {{-- <td style="padding: 4px 8px">1</td> --}}
                                                <td style="text-align: start; padding: 4px 8px">
                                                    <span style="" class="kodo" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        {{ $data->name }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px">
                                                    <span class="kodo" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Supporting Document">
                                                        {{ $data->day }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px">
                                                    <span class="kodo text-center" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        {{ $data->qty }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px" class="text-end">
                                                    <span class="kodo text-center" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        Rp. {{ number_format($data->total_cost) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr style="vertical-align: top; text-align: center;">
                                                {{-- <td style="padding: 4px 8px">1</td> --}}
                                                <td style="text-align: start; padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                            </tr>
                                        @endforelse

                                    @empty
                                        <tr style="vertical-align: top; text-align: center;">
                                            {{-- <td style="padding: 4px 8px">1</td> --}}
                                            <td style="text-align: start; padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>
                    </td>
                    <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp.
                        {{ number_format($totalperformer) }}</td>
                    <td style="height: 100px; vertical-align: top;">
                        <textarea id="notes-1" name="notes[1][content]" style="height: 100%; width: 100%;"
                            placeholder="Enter your note for Performer/Host/Guest..."></textarea>
                        <input type="hidden" name="notes[1][title]" value="Performer/Host/Guest">
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td class="judulreject" style="text-align: start;">
                        <div>Production Crews</div>
                        <div onclick="toggleDetails(this)"class="detaillink">Detail</div>

                        <div class="secondary hidden"
                            style="clear: both; font-size: 16px; text-transform: capitalize; margin-left: 6px; display: none; padding-top: 12px">
                            <table class="bordered-table" style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="vertical-align: top; text-align: center;">
                                        {{-- <th style="width: 5%;">No</th> --}}
                                        <th style="width: 65%;">Description</th>
                                        <th style="width: 5%;">Day</th>
                                        <th style="width: 5%;">Qty</th>
                                        <th style="width: 20%;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($productioncrew as $key => $datas)
                                        @forelse ($datas as $data)
                                            <tr style="vertical-align: top; text-align: center;">
                                                {{-- <td style="padding: 4px 8px">1</td> --}}
                                                <td style="text-align: start; padding: 4px 8px">
                                                    <span style="" class="kodo" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        {{ $data->name }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px">
                                                    <span class="kodo" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Supporting Document">
                                                        {{ $data->day }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px">
                                                    <span class="kodo text-center" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        {{ $data->qty }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px" class="text-end">
                                                    <span class="kodo text-center" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        Rp. {{ number_format($data->total_cost) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr style="vertical-align: top; text-align: center;">
                                                {{-- <td style="padding: 4px 8px">1</td> --}}
                                                <td style="text-align: start; padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                            </tr>
                                        @endforelse

                                    @empty
                                        <tr style="vertical-align: top; text-align: center;">
                                            {{-- <td style="padding: 4px 8px">1</td> --}}
                                            <td style="text-align: start; padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>
                    </td>



                    <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp.
                        {{ number_format($totalproductioncrew) }}</td>
                    <td style="height: 100px; vertical-align: top;">
                        <textarea id="notes-2" name="notes[2][content]" style="height: 100%; width: 100%;"
                            placeholder="Enter your note for Production Crews..."></textarea>
                        <input type="hidden" name="notes[2][title]" value="Production Crews">
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td class="judulreject" style="text-align: start;">
                        <div>Production Tools</div>
                        <div onclick="toggleDetails(this)"class="detaillink">Detail</div>

                        <div class="secondary hidden"
                            style="clear: both; font-size: 16px; text-transform: capitalize; margin-left: 6px; display: none; padding-top: 12px">
                            <table class="bordered-table" style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="vertical-align: top; text-align: center;">
                                        {{-- <th style="width: 5%;">No</th> --}}
                                        <th style="width: 65%;">Description</th>
                                        <th style="width: 5%;">Day</th>
                                        <th style="width: 5%;">Qty</th>
                                        <th style="width: 20%;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($productiontool as $key => $datas)
                                        @forelse ($datas as $data)
                                            <tr style="vertical-align: top; text-align: center;">
                                                {{-- <td style="padding: 4px 8px">1</td> --}}
                                                <td style="text-align: start; padding: 4px 8px">
                                                    <span style="" class="kodo" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        {{ $data->tool_name }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px">
                                                    <span class="kodo" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Supporting Document">
                                                        {{ $data->day }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px">
                                                    <span class="kodo text-center" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        {{ $data->qty }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px" class="text-end">
                                                    <span class="kodo text-center" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        Rp. {{ number_format($data->total_cost) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr style="vertical-align: top; text-align: center;">
                                                {{-- <td style="padding: 4px 8px">1</td> --}}
                                                <td style="text-align: start; padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                            </tr>
                                        @endforelse

                                    @empty
                                        <tr style="vertical-align: top; text-align: center;">
                                            {{-- <td style="padding: 4px 8px">1</td> --}}
                                            <td style="text-align: start; padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>
                    </td>

                    <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp.
                        {{ number_format($totalproductiontool) }}</td>
                    <td style="height: 100px; vertical-align: top;">
                        <textarea id="notes-3" name="notes[3][content]" style="height: 100%; width: 100%;"
                            placeholder="Enter your note for Production Tools..."></textarea>
                        <input type="hidden" name="notes[3][title]" value="Production Tools">
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td class="judulreject" style="text-align: start;">
                        <div>Operational</div>
                        <div onclick="toggleDetails(this)"class="detaillink">Detail</div>

                        <div class="secondary hidden"
                            style="clear: both; font-size: 16px; text-transform: capitalize; margin-left: 6px; display: none; padding-top: 12px">
                            <table class="bordered-table" style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="vertical-align: top; text-align: center;">
                                        {{-- <th style="width: 5%;">No</th> --}}
                                        <th style="width: 65%;">Description</th>
                                        <th style="width: 5%;">Day</th>
                                        <th style="width: 5%;">Qty</th>
                                        <th style="width: 20%;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($operational as $key => $datas)
                                        @forelse ($datas as $data)
                                            <tr style="vertical-align: top; text-align: center;">
                                                {{-- <td style="padding: 4px 8px">1</td> --}}
                                                <td style="text-align: start; padding: 4px 8px">
                                                    <span style="" class="kodo" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        {{ $data->name }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px">
                                                    <span class="kodo" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Supporting Document">
                                                        {{ $data->day }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px">
                                                    <span class="kodo text-center" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        {{ $data->qty }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px" class="text-end">
                                                    <span class="kodo text-center" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        Rp. {{ number_format($data->total_cost) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr style="vertical-align: top; text-align: center;">
                                                {{-- <td style="padding: 4px 8px">1</td> --}}
                                                <td style="text-align: start; padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                            </tr>
                                        @endforelse

                                    @empty
                                        <tr style="vertical-align: top; text-align: center;">
                                            {{-- <td style="padding: 4px 8px">1</td> --}}
                                            <td style="text-align: start; padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>
                    </td>
                    <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp.
                        {{ number_format($totaloperational) }}</td>
                    <td style="height: 100px; vertical-align: top;">
                        <textarea id="notes-4" name="notes[4][content]" style="height: 100%; width: 100%;"
                            placeholder="Enter your note for Operational..."></textarea>
                        <input type="hidden" name="notes[4][title]" value="Operational">
                    </td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td class="judulreject" style="text-align: start;">
                        <div>Location</div>
                        <div onclick="toggleDetails(this)"class="detaillink">Detail</div>

                        <div class="secondary hidden"
                            style="clear: both; font-size: 16px; text-transform: capitalize; margin-left: 6px; display: none; padding-top: 12px">
                            <table class="bordered-table" style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="vertical-align: top; text-align: center;">
                                        {{-- <th style="width: 5%;">No</th> --}}
                                        <th style="width: 65%;">Description</th>
                                        <th style="width: 5%;">Day</th>
                                        <th style="width: 5%;">Qty</th>
                                        <th style="width: 20%;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($location as $key => $datas)
                                        @forelse ($datas as $data)
                                            <tr style="vertical-align: top; text-align: center;">
                                                {{-- <td style="padding: 4px 8px">1</td> --}}
                                                <td style="text-align: start; padding: 4px 8px">
                                                    <span style="" class="kodo" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        {{ $data->name }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px">
                                                    <span class="kodo" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Supporting Document">
                                                        {{ $data->day }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px">
                                                    <span class="kodo text-center" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        {{ $data->qty }}
                                                    </span>
                                                </td>
                                                <td style="padding: 4px 8px" class="text-end">
                                                    <span class="kodo text-center" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Supporting Document">
                                                        Rp. {{ number_format($data->total_cost) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr style="vertical-align: top; text-align: center;">
                                                {{-- <td style="padding: 4px 8px">1</td> --}}
                                                <td style="text-align: start; padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                                <td style="padding: 4px 8px">
                                                </td>
                                            </tr>
                                        @endforelse

                                    @empty
                                        <tr style="vertical-align: top; text-align: center;">
                                            {{-- <td style="padding: 4px 8px">1</td> --}}
                                            <td style="text-align: start; padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                            <td style="padding: 4px 8px">
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>
                    </td>
                    <td class="total-price" style="font-weight: 300; text-align: end; padding-left: 24px;">Rp.
                        {{ number_format($totallocation) }}</td>
                    <td style="height: 100px; vertical-align: top;">
                        <textarea id="notes-5" name="notes[5][content]" style="height: 100%; width: 100%;"
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
        function toggleDetails(element) {
            const details = element.nextElementSibling;
            details.style.display = details.style.display === 'none' ? 'block' : 'none';
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
