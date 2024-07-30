@extends('layout.index')

@section('title')
    Create Purchase Request- Budgeting System
@endsection
@section('costum-css')
<style>

</style>
@endsection
@section('content')
    <a href="/requestpurchase" class="navback" style="text-decoration: none;">
            <svg xmlns="http://www.w3.org/2000/svg " width="10 " height="17 " viewBox="0 0 10 17 " fill="none ">
                <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                                                  7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
            </svg>
            Back
    </a>
    <!--blablabla -->
    <div class="judulhalaman" style="text-align: start">Purchase Request</div>

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 24px; font: 600 18px Narasi Sans, sans-serif; ">

        <li class="nav-item" role="presentation"  style="flex: 1; text-align: center;">
            <button class="nav-link active tablinks" id="data5-tab" data-url="/requestpurchase-create"
                data-bs-toggle="tab" data-bs-target="#data5-tab-pane" type="button" role="tab"
                aria-controls="data1-tab-pane" aria-selected="false" style="width: 100%; letter-spacing: 0.5px;" >HEADER</button>
        </li>
        <li class="nav-item" role="presentation"  style="flex: 1; text-align: center;">
            <button class="nav-link tablinks" id="preview-tab" data-url="/requestpurchase-description"
                data-bs-toggle="tab" data-bs-target="#preview-tab-pane" type="button" role="tab"
                aria-controls="preview-tab-pane" aria-selected="true" style="width: 100%; color: #4a25aa; letter-spacing: 0.5px; font-weight: 300">Description</button>
        </li>
        <li class="nav-item" role="presentation">
        </li>
    </ul>


    <div class="tab-content" id="myTabContent" style="margin-top: 24px">
        <!-- home -->
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col mb-3">
                        <label for="department_id" class="form-label">Department</label>
                        <select id="department_id" name="department_id" class="selectize">
                            <option disabled selected>Choose One</option>
                            <option>IT</option>
                            <option>HC</option>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="program" class="form-label">Program / Episode</label>
                        <select id="program" name="program" class="selectize">
                            <option disabled selected>Choose One</option>
                            <option value="nonprogram">Non-Program</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="daterequest" class="form-label">Request Date</label>
                        <input type="date" class="form-control" id="daterequest" />
                    </div>
                    <div class="col mb-3">
                        <label for="dateuse" class="form-label">Date of Use</label>
                        <input type="date" class="form-control" id="dateuse" />
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="vendor" class="form-label">Requirement</label>
                        <select id="requirement" name="requirement" class="selectize">
                            <option disabled selected>Choose One</option>
                            <option>Internet & Telecomunication</option>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="budgetcode" class="form-label">Budget Code</label>
                        <input type="text" class="form-control" id="budgetcode" disabled/>
                    </div>
                </div>

            
                <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <textarea type="text"  class="form-control" id="note" name="note" cols="30" rows="2"></textarea>
                </div>

                <a href="/requestpurchase-description" class="button-departemen"
                    style="justify-content: center; align-items: center; display: flex; gap: 16px; text-decoration: none; width: fit-content; margin-top: 16px" id="nextButton">Next
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"
                        fill="none">
                        <path d="M17 10L10.1429 4M17 10L10.1429 16M17 10H1" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
        </div>
    </div>
@endsection

@section('custom-js')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tabButtons = document.querySelectorAll('.nav-link.tablinks');

        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetUrl = button.getAttribute('data-url');

                // Redirect to the URL specified in the data-url attribute
                window.location.href = targetUrl;
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.selectize').selectize({
            placeholder: "Type to search...",
            allowClear: true,
            create: false  // Enable creation of new items
        });
    });
</script>
@endsection
