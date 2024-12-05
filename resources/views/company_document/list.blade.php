@extends('company_document.layout.app')

@section('title')
    Company File Documents - Senarasi
@endsection

@section('costum-css')
    <style>
        .icon-buttons {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hidden {
            display: none;
        }

        ul {
            padding-left: 0;
            list-style-type: none;
            /* margin: 10px 0 0 0;  */
        }

        td {
            vertical-align: top;
        }

        .secondary {
            margin-top: 10px;
            /* Berikan jarak antara primary dan secondary */
        }

        .secondary li {
            position: relative;
            padding: 4px 0;
        }

        .buttons {
            display: none;
            margin-top: 5px;
            font: 300 12px Narasi Sans, sans-serif;
            text-decoration: none;
        }

        .secondary li:hover .buttons {
            display: block;

        }

        .kodo {
            color: black;
            text-decoration: none;
            transition: color 0.3s ease;
            vertical-align: middle;
            letter-spacing: 0.75px;
        }

        .kodo:hover {
            color: #4a25aa;
            font-weight: 400;

        }

        .kodo:hover svg path {
            fill: #4a25aa;


        }

        .primary-toggle {
            color: rgb(185, 185, 185);
            /* Ubah warna agar terlihat seperti link */
            text-decoration: none;
            /* Tambahkan underline agar terlihat seperti link */
        }

        .action-buttons {
            display: flex;
            gap: 5px;
            justify-content: center;
        }

        .ayam {
            font: 300 14px Narasi Sans, sans-serif;
            text-decoration: none;
            color: rgb(134, 127, 127);
        }
    </style>
@endsection

@section('content')
    <!--Badan Isi-->
    <div>
        <a class="navback" href="{{ route('company-document.index') }}" style="text-decoration: none">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="17" viewBox="0 0 10 17" fill="none">
                <path
                    d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2 7.2501 0 7.6501 0 8.0501Z"
                    fill="#4A25AA" />
            </svg>
            Back
        </a>

        <div class="judulhalaman" style="display: flex; align-items: center; text-transform:uppercase">
            {{ $docCategory->category }}</div>

        <div style="display: inline-flex; gap: 12px; margin-left: 4px;">
            {{-- <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#modal-upload">Upload
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                        fill="white"/>
                </svg>
            </button> --}}
            @if (auth()->user()->hasRole(['admin', 'legal']))
                <a class="button-departemen" href="{{ route('company-document.create', $docCategory->slug) }}">Upload
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                            fill="white" />
                    </svg>
                </a>
            @endif
        </div>


        <div class="tablenih">
            <div class="table-responsive p-2">
                <table id="datatable" class="table table-hover"
                    style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px;">
                    <thead class="table-light">
                        <tr class="dicobain">
                            {{-- <th scope="col" class="col-1">No</th> --}}
                            <th scope="col" class="col-2">Document Numbers</th>
                            <th scope="col" class="col-3">File Name</th>
                            <th scope="col" class="col-4">Description</th>
                            <th scope="col" class="col-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($docCategory->documents as $doc)
                            <tr>
                                {{-- <td scope="row" class="text-center">{{$loop->iteration}}</td> --}}
                                <td style="vertical-align: top">{{ $doc->doc_number }}</td>
                                <td class="primary-toggle" style="cursor: pointer; vertical-align: top;">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="grey" stroke-dasharray="16" stroke-dashoffset="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                                                <path d="M5 12h14">
                                                    <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s"
                                                        values="16;0" />
                                                </path>
                                                <path d="M12 5v14">
                                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s"
                                                        dur="0.2s" values="16;0" />
                                                </path>
                                            </g>
                                        </svg>
                                    </span>
                                    <span style="vertical-align: middle">{{ $doc->title }}</span>


                                    <div class="secondary hidden"
                                        style="clear: both; font-size: 16px; text-transform:capitalize; margin-left: 6px;">
                                        <ul>
                                            @foreach ($doc->supportingDocuments as $supportingDoc)
                                                <li>
                                                    <a class="kodo" target="_blank"
                                                        href="{{ route('company-document.supporting-doc.view', ['docCategory' => $docCategory->slug, 'doc' => $doc->slug, 'supportingDoc' => $supportingDoc->supporting_doc_slug]) }}"
                                                        style="display: flex; align-items: center;" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" data-bs-title="Supporting Document">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" style="margin-right: 5px;">
                                                            <path fill="grey"
                                                                d="m18.29 15.71l-4.58 4.58c-.39.39-1.03.39-1.42 0s-.39-1.03 0-1.42L15.17 16H5c-.55 0-1-.45-1-1V5c0-.55.45-1 1-1s1 .45 1 1v9h9.17l-2.88-2.87c-.39-.39-.39-1.03 0-1.42s1.03-.39 1.42 0l4.58 4.58c.39.39.39 1.03 0 1.42" />
                                                        </svg>

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24"
                                                            style="margin-top: 3px; margin-right:2px">>
                                                            <path fill="grey"
                                                                d="M13 9V3.5L18.5 9M6 2c-1.11 0-2 .89-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z" />
                                                        </svg>

                                                        <span
                                                            style="margin-top: 6px;">{{ $supportingDoc->file_name }}</span>
                                                    </a>


                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>

                                <td style="vertical-align: top;">{{ $doc->description }}</td>
                                <td class="text-center align-top">
                                    <span class="action-buttons">
                                        <a href="{{ route('company-document.view', ['docCategory' => $docCategory->slug, 'doc' => $doc->slug]) }}"
                                            class="icon-buttons"
                                            style="
                            background: #b60f7f;
                            border-radius: 4px;
                            padding: 8px 12px"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10"
                                                viewBox="0 0 15 10" fill="none">
                                                <path
                                                    d="M7.085 2.89841C6.57253 2.89841 6.08105 3.10199 5.71868 3.46436C5.35631 3.82673 5.15273 4.31821 5.15273 4.83068C5.15273 5.34315 5.35631 5.83463 5.71868 6.19701C6.08105 6.55938 6.57253 6.76295 7.085 6.76295C7.59747 6.76295 8.08895 6.55938 8.45132 6.19701C8.81369 5.83463 9.01727 5.34315 9.01727 4.83068C9.01727 4.31821 8.81369 3.82673 8.45132 3.46436C8.08895 3.10199 7.59747 2.89841 7.085 2.89841ZM7.085 8.05114C6.23088 8.05114 5.41175 7.71184 4.80779 7.10789C4.20384 6.50393 3.86455 5.6848 3.86455 4.83068C3.86455 3.97656 4.20384 3.15743 4.80779 2.55348C5.41175 1.94952 6.23088 1.61023 7.085 1.61023C7.93912 1.61023 8.75825 1.94952 9.3622 2.55348C9.96616 3.15743 10.3055 3.97656 10.3055 4.83068C10.3055 5.6848 9.96616 6.50393 9.3622 7.10789C8.75825 7.71184 7.93912 8.05114 7.085 8.05114ZM7.085 0C3.86455 0 1.11428 2.00312 0 4.83068C1.11428 7.65824 3.86455 9.66136 7.085 9.66136C10.3055 9.66136 13.0557 7.65824 14.17 4.83068C13.0557 2.00312 10.3055 0 7.085 0Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                        @if (auth()->user()->hasRole(['admin', 'legal']))
                                            <a href="{{ route('company-document.edit', ['docCategory' => $docCategory->slug, 'doc' => $doc->slug]) }}"
                                                class="icon-buttons"
                                                style="
                            background: #4a25aa;
                            border-radius: 4px;
                            padding: 8px 12px;"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M3.5 4.33301H2.66667C2.22464 4.33301 1.80072 4.5086 1.48816 4.82116C1.17559 5.13372 1 5.55765 1 5.99967V13.4997C1 13.9417 1.17559 14.3656 1.48816 14.6782C1.80072 14.9907 2.22464 15.1663 2.66667 15.1663H10.1667C10.6087 15.1663 11.0326 14.9907 11.3452 14.6782C11.6577 14.3656 11.8333 13.9417 11.8333 13.4997V12.6663"
                                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M11 2.66676L13.5 5.16676M14.6541 3.98759C14.9823 3.65938 15.1667 3.21424 15.1667 2.75009C15.1667 2.28594 14.9823 1.84079 14.6541 1.51259C14.3259 1.18438 13.8808 1 13.4166 1C12.9525 1 12.5073 1.18438 12.1791 1.51259L5.16663 8.50009V11.0001H7.66663L14.6541 3.98759Z"
                                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('company-document.destroyFile', ['docCategory' => $docCategory->slug, 'doc' => $doc->slug]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="icon-buttons"
                                                    style="background: red;
                            border-radius: 4px;
                            border:none;
                            padding: 10px 12px"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="15"
                                                        viewBox="0 0 12 15" fill="none">
                                                        <path
                                                            d="M0.787222 12.5956C0.787222 13.4615 1.49572 14.17 2.36167 14.17H8.65944C9.52539 14.17 10.2339 13.4615 10.2339 12.5956V4.72333C10.2339 3.85739 9.52539 3.14889 8.65944 3.14889H2.36167C1.49572 3.14889 0.787222 3.85739 0.787222 4.72333V12.5956ZM10.2339 0.787222H8.26583L7.70691 0.228294C7.56521 0.0865944 7.36053 0 7.15585 0H3.86526C3.66058 0 3.45591 0.0865944 3.31421 0.228294L2.75528 0.787222H0.787222C0.35425 0.787222 0 1.14147 0 1.57444C0 2.00742 0.35425 2.36167 0.787222 2.36167H10.2339C10.6669 2.36167 11.0211 2.00742 11.0211 1.57444C11.0211 1.14147 10.6669 0.787222 10.2339 0.787222Z"
                                                            fill="white" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
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
    @include('layout.alert')
@endsection

@section('custom-js')
    {{-- <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.primary-toggle').on('click', function() {
                var $row = $(this).closest('tr');
                var $secondary = $row.find('.secondary');

                // Toggle visibility of secondary items
                $secondary.toggleClass('hidden');
            });
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
