// Event listener for the "Next" button
document.getElementById("nextButton").addEventListener("click", function () {
    // Enable the "Data 1" button and update its styling
    var data1Tab = document.getElementById("data1-tab");
    data1Tab.disabled = false;
    data1Tab.classList.add("active");

    // Enable the "Data 2" button and update its styling
    var data2Tab = document.getElementById("data2-tab");
    data2Tab.disabled = false;

    // Enable the "Data 3" button and update its styling
    var data3Tab = document.getElementById("data3-tab");
    data3Tab.disabled = false;

    // Enable the "Data 4" button and update its styling
    var data4Tab = document.getElementById("data4-tab");
    data4Tab.disabled = false;

    // Enable the "Data 5" button and update its styling
    var data5Tab = document.getElementById("data5-tab");
    data5Tab.disabled = false;

    // Enable the "Preview" button and update its styling
    var previewTab = document.getElementById("preview-tab");
    previewTab.disabled = false;

    // Disable the "Home" button and update its styling
    var homeTab = document.getElementById("home-tab");
    homeTab.classList.remove("active");

    // Hide the current tab content and show the "Data 1" tab content
    var tabPanes = document.getElementsByClassName("tab-pane");
    for (var i = 0; i < tabPanes.length; i++) {
        tabPanes[i].classList.remove("show", "active");
    }
    var data1TabPane = document.getElementById("data1-tab-pane");
    data1TabPane.classList.add("show", "active");

    // Switch to the "Data 1" tab header
    var tabList = document.getElementById("myTab");
    var tabListItems = tabList.getElementsByTagName("li");
    for (var j = 0; j < tabListItems.length; j++) {
        if (tabListItems[j].id === "data1-tab") {
            tabListItems[j].classList.add("active");
        } else {
            tabListItems[j].classList.remove("active"); // Remove active class from other tabs
        }
    }

    // Scroll to the top of the "Data 1" tab content
    var data1TabPaneOffset = data1TabPane.offsetTop;
    window.scrollTo(0, data1TabPaneOffset);
});

// Event listener for the "Home" tab
document.getElementById("home-tab").addEventListener("click", function () {
    // Enable the "Data 1" tab and update its styling
    var data1Tab = document.getElementById("data1-tab");
    data1Tab.disabled = false;

    // Enable the "Data 2" tab and update its styling
    var data2Tab = document.getElementById("data2-tab");
    data2Tab.disabled = false;

    // Enable the "Data 3" tab and update its styling
    var data3Tab = document.getElementById("data3-tab");
    data3Tab.disabled = false;

    // Enable the "Data 4" tab and update its styling
    var data4Tab = document.getElementById("data4-tab");
    data4Tab.disabled = false;

    // Enable the "Data 5" tab and update its styling
    var data5Tab = document.getElementById("data5-tab");
    data5Tab.disabled = false;

    // Enable the "Preview" tab and update its styling
    var previewTab = document.getElementById("preview-tab");
    previewTab.disabled = false;

    // Hide the current tab content and show the "Home" tab content
    var tabPanes = document.getElementsByClassName("tab-pane");
    for (var i = 0; i < tabPanes.length; i++) {
        tabPanes[i].classList.remove("show", "active");
    }
    var homeTabPane = document.getElementById("home-tab-pane");
    homeTabPane.classList.add("show", "active");

    // Switch to the "Home" tab header
    var tabList = document.getElementById("myTab");
    var tabListItems = tabList.getElementsByTagName("li");
    for (var j = 0; j < tabListItems.length; j++) {
        if (tabListItems[j].id === "home-tab") {
            tabListItems[j].classList.add("active");
        } else {
            tabListItems[j].classList.remove("active"); // Remove active class from other tabs
        }
    }

    // Scroll to the top of the "Home" tab content
    var homeTabPaneOffset = homeTabPane.offsetTop;
    window.scrollTo(0, homeTabPaneOffset);
});

function addItem() {
    // Buat elemen-elemen untuk data yang akan ditambahkan
    var divContainer = document.createElement("div");
    divContainer.classList.add("tablein");
    divContainer.style.padding = "24px";
    divContainer.innerHTML = `
            <div class="delete-button" style="margin-bottom:12px; text-align: right;">
                <button type="button" class="btn" style="background-color: #4A25AA;color: white; padding: 8px 24px; margin-right: 8px ">Save</button>
                <button type="button" class="delete-button" onclick="deleteForm(event)" style="background: none; border: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_389_307)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 13.414L17.6568 19.071C17.8454 19.2532 18.098 19.354 18.3602 19.3517C18.6224 19.3494 18.8732 19.2443 19.0586 19.0588C19.2441 18.8734 19.3492 18.6226 19.3515 18.3604C19.3538 18.0982 19.253 17.8456 19.0708 17.657L13.4138 12L19.0708 6.34303C19.253 6.15443 19.3538 5.90182 19.3515 5.63963C19.3492 5.37743 19.2441 5.12662 19.0586 4.94121C18.8732 4.7558 18.6224 4.65063 18.3602 4.64835C18.098 4.64607 17.8454 4.74687 17.6568 4.92903L11.9998 10.586L6.34282 4.92903C6.15337 4.75137 5.90224 4.65439 5.64255 4.65861C5.38287 4.66283 5.13502 4.76791 4.95143 4.95162C4.76785 5.13533 4.66294 5.38326 4.65891 5.64295C4.65488 5.90263 4.75203 6.1537 4.92982 6.34303L10.5858 12L4.92882 17.657C4.83331 17.7493 4.75713 17.8596 4.70472 17.9816C4.65231 18.1036 4.62473 18.2348 4.62357 18.3676C4.62242 18.5004 4.64772 18.6321 4.698 18.755C4.74828 18.8779 4.82254 18.9895 4.91643 19.0834C5.01032 19.1773 5.12197 19.2516 5.24487 19.3018C5.36777 19.3521 5.49944 19.3774 5.63222 19.3763C5.765 19.3751 5.89622 19.3475 6.01823 19.2951C6.14023 19.2427 6.25058 19.1665 6.34282 19.071L11.9998 13.414Z" fill="#252525"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_389_307">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>

            <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                    <thead style="font-weight: 500">
                        <tr class="dicobain">
                            <th scope="col">Sub Description</th>
                            <th scope="col">Usage</th>
                            <th scope="col">REP</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width: 80px; text-align: center">Day</th>
                            <th scope="col" style="width: 80px; text-align: center">QTY</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Forwarded To</th>

                            <th scope="col">Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: start">
                                <select class="form-select request-form">
                                    <option>Choose One</option>
                                    <option>Production Crews</option>
                                </select>
                            </td>
                            <td style="text-align: start">
                                <select class="form-select utilitySelect request-form">
                                    <option>Choose One</option>
                                    <option>Man Power</option>
                                    <option>Tools</option>
                                </select>
                            </td>
                            <td style="text-align: start">
                                <select class="form-select freqSelect request-form">
                                    <option>Choose One</option>
                                    <option>NCS</option>
                                    <option>Out</option>
                                </select>
                            </td>
                            <td class="nameCell" style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>

                            <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start">
                            <select class="form-select request-form">
                                <option>Choose One</option>
                                <option>HC</option>
                                <option>Finance</option>
                                <option>Procurement</option>
                            </select>
                        </td>
                            <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                        </tr>
                    </tbody>
                </table>
            `;

    // Dapatkan referensi ke tab yang sedang aktif saat tombol "Add Item" diklik
    var activeTab = document.querySelector(".tab-pane.fade.show.active");

    // Cari container di dalam tab yang sedang aktif tersebut
    var tableContainer = activeTab.querySelector("#tableContainer");

    // Tambahkan container baru ke dalam tab yang sedang aktif
    tableContainer.appendChild(divContainer);

    // Tambahkan event listener untuk select Utility dan REP
    var utilitySelect = divContainer.querySelector(".utilitySelect");
    var freqSelect = divContainer.querySelector(".freqSelect");
    var subjectCell = divContainer.querySelector(".nameCell");

    function updateSubject() {
        if (utilitySelect.value === "Tools" || freqSelect.value === "NCS") {
            convertToDropdown(subjectCell);
        } else {
            convertToInput(subjectCell);
        }
    }

    utilitySelect.addEventListener("change", updateSubject);
    freqSelect.addEventListener("change", updateSubject);
}

function addBundleItems() {
    // Dapatkan referensi ke tab yang sedang aktif saat tombol "Add Item" diklik
    var activeTab = document.querySelector(".tab-pane.fade.show.active");

    // Cari container di dalam tab yang sedang aktif tersebut
    var tableContainer = activeTab.querySelector("#tableContainer");

    var divContainer = document.createElement("div");
    divContainer.classList.add("tablein");
    divContainer.style.padding = "24px";
    divContainer.innerHTML = `
        <div class="delete-button" style="margin-bottom: 12px; text-align: right;">
            <button type="button" class="btn" style="background-color: #4A25AA;color: white; padding: 8px 24px; margin-right: 8px ">Save</button>
            <button type="button" class="delete-button" onclick="deleteForm(event)" style="background: none; border: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_389_307)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 13.414L17.6568 19.071C17.8454 19.2532 18.098 19.354 18.3602 19.3517C18.6224 19.3494 18.8732 19.2443 19.0586 19.0588C19.2441 18.8734 19.3492 18.6226 19.3515 18.3604C19.3538 18.0982 19.253 17.8456 19.0708 17.657L13.4138 12L19.0708 6.34303C19.253 6.15443 19.3538 5.90182 19.3515 5.63963C19.3492 5.37743 19.2441 5.12662 19.0586 4.94121C18.8732 4.7558 18.6224 4.65063 18.3602 4.64835C18.098 4.64607 17.8454 4.74687 17.6568 4.92903L11.9998 10.586L6.34282 4.92903C6.15337 4.75137 5.90224 4.65439 5.64255 4.65861C5.38287 4.66283 5.13502 4.76791 4.95143 4.95162C4.76785 5.13533 4.66294 5.38326 4.65891 5.64295C4.65488 5.90263 4.75203 6.1537 4.92982 6.34303L10.5858 12L4.92882 17.657C4.83331 17.7493 4.75713 17.8596 4.70472 17.9816C4.65231 18.1036 4.62473 18.2348 4.62357 18.3676C4.62242 18.5004 4.64772 18.6321 4.698 18.755C4.74828 18.8779 4.82254 18.9895 4.91643 19.0834C5.01032 19.1773 5.12197 19.2516 5.24487 19.3018C5.36777 19.3521 5.49944 19.3774 5.63222 19.3763C5.765 19.3751 5.89622 19.3475 6.01823 19.2951C6.14023 19.2427 6.25058 19.1665 6.34282 19.071L11.9998 13.414Z" fill="#252525"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_389_307">
                            <rect width="24" height="24" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </button>
        </div>
        <div class="mb-3  fw-bold">
            <label for="name" class="form-label">TOTAL COST BUNDLE </label>
            <input type="text" class="form-control " id="costdirect" aria-describedby="emailHelp" />
        </div>
        <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
            <thead style="font-weight: 500">
                <tr class="dicobain">
                    <th scope="col">No</th>
                    <th scope="col">Sub Description</th>
                    <th scope="col">Usage</th>
                    <th scope="col">REP</th>
                    <th scope="col">Name</th>
                    <th scope="col" style="width: 80px; text-align: center">Day</th>
                    <th scope="col" style="width: 80px; text-align: center">QTY</th>
                    <th scope="col">Forwarded To</th>
                    <th scope="col">Note</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="tableBody">
                <tr>
                    <th scope="row" class="autonumber" style="padding-top: 16px">1</th>
                    <td style="text-align: start">
                        <select class="form-select request-form" >
                            <option>Choose One</option>
                            <option>Production Crews</option>
                        </select>
                    </td>
                    <td style="text-align: start">
                        <select class="form-select utilitySelect request-form">
                            <option>Choose One</option>
                            <option>Man Power</option>
                            <option>Tools</option>
                        </select>
                    </td>
                    <td style="text-align: start">
                        <select class="form-select freqSelect request-form" >
                            <option>Choose One</option>
                            <option>NCS</option>
                            <option>Out</option>
                        </select>
                    </td>
                    <td class="nameCell" style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                    <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
                    <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
                    <td style="text-align: start">
                    <select class="form-select request-form" >
                        <option>Choose One</option>
                        <option>HC</option>
                        <option>Finance</option>
                        <option>Procurement</option>
                    </select>
                </td>
                <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>

                    <td style="text-align: start">
                        <button type="button" class="delete-button mt-1" data-bs-toggle="tooltip" onclick="deleteItem(event)" style="background: none; border: none;" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 1 .5-.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4H2.5a1 1 0 0 1 0-2h3a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1h3a1 1 0 0 1 1 1zM4.118 4l.447 8.941A1 1 0 0 0 5.563 14h4.874a1 1 0 0 0 .998-.941L11.882 4H4.118z"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <button type="button" class="button-departemen" onclick="addSubDescription(this)" style="font-size: 14px">Add Sub Description <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
        <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
            fill="white"
        />
        </svg></button>
    `;

    // Tambahkan container baru ke dalam tab yang sedang aktif
    tableContainer.appendChild(divContainer);

    // Tambahkan event listener untuk select Utility dan REP
    var utilitySelect = divContainer.querySelector(".utilitySelect");
    var freqSelect = divContainer.querySelector(".freqSelect");
    var subjectCell = divContainer.querySelector(".nameCell");

    function updateSubject() {
        if (utilitySelect.value === "Tools" || freqSelect.value === "NCS") {
            convertToDropdown(subjectCell);
        } else {
            convertToInput(subjectCell);
        }
    }

    utilitySelect.addEventListener("change", updateSubject);
    freqSelect.addEventListener("change", updateSubject);

    updateNumbering();
}

function addItemCrews() {
    // Buat elemen-elemen untuk data yang akan ditambahkan
    var divContainer = document.createElement("div");
    divContainer.classList.add("tablein");
    divContainer.style.padding = "24px";
    divContainer.innerHTML = `
            <div class="delete-button" style="margin-bottom:12px; text-align: right;">
                <button type="button" class="btn" style="background-color: #4A25AA;color: white; padding: 8px 24px; margin-right: 8px ">Save</button>
                <button type="button" class="delete-button" onclick="deleteForm(event)" style="background: none; border: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_389_307)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 13.414L17.6568 19.071C17.8454 19.2532 18.098 19.354 18.3602 19.3517C18.6224 19.3494 18.8732 19.2443 19.0586 19.0588C19.2441 18.8734 19.3492 18.6226 19.3515 18.3604C19.3538 18.0982 19.253 17.8456 19.0708 17.657L13.4138 12L19.0708 6.34303C19.253 6.15443 19.3538 5.90182 19.3515 5.63963C19.3492 5.37743 19.2441 5.12662 19.0586 4.94121C18.8732 4.7558 18.6224 4.65063 18.3602 4.64835C18.098 4.64607 17.8454 4.74687 17.6568 4.92903L11.9998 10.586L6.34282 4.92903C6.15337 4.75137 5.90224 4.65439 5.64255 4.65861C5.38287 4.66283 5.13502 4.76791 4.95143 4.95162C4.76785 5.13533 4.66294 5.38326 4.65891 5.64295C4.65488 5.90263 4.75203 6.1537 4.92982 6.34303L10.5858 12L4.92882 17.657C4.83331 17.7493 4.75713 17.8596 4.70472 17.9816C4.65231 18.1036 4.62473 18.2348 4.62357 18.3676C4.62242 18.5004 4.64772 18.6321 4.698 18.755C4.74828 18.8779 4.82254 18.9895 4.91643 19.0834C5.01032 19.1773 5.12197 19.2516 5.24487 19.3018C5.36777 19.3521 5.49944 19.3774 5.63222 19.3763C5.765 19.3751 5.89622 19.3475 6.01823 19.2951C6.14023 19.2427 6.25058 19.1665 6.34282 19.071L11.9998 13.414Z" fill="#252525"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_389_307">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>

            <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                    <thead style="font-weight: 500">
                        <tr class="dicobain">
                            <th scope="col">Sub Description</th>
                            <th scope="col">Usage</th>
                            <th scope="col">REP</th>
                            <th scope="col">Name</th>
                            <th scope="col">Position</th>
                            <th scope="col" style="width: 80px; text-align: center">Day</th>
                            <th scope="col" style="width: 80px; text-align: center">QTY</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Forwarded To</th>

                            <th scope="col">Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: start">
                                <select class="form-select request-form">
                                    <option>Choose One</option>
                                    <option>Production Crews</option>
                                </select>
                            </td>
                            <td style="text-align: start">
                                <select class="form-select utilitySelect request-form">
                                    <option>Choose One</option>
                                    <option>Man Power</option>
                                    <option>Tools</option>
                                </select>
                            </td>
                            <td style="text-align: start">
                                <select class="form-select freqSelect request-form">
                                    <option>Choose One</option>
                                    <option>NCS</option>
                                    <option>Out</option>
                                </select>
                            </td>
                            <td class="nameCell" style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start">
                                <select class="form-select request-form">
                                    <option>Choose One</option>
                                    <option>1.</option>
                                    <option>2.</option>
                                </select>
                            </td>
                            <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>

                            <td style="text-align: center"><fieldset disabled><input type="text" class="tablecoba text-center form-control request-form" placeholder="0"/></fieldset></td>
                            <td style="text-align: start">
                            <select class="form-select request-form">
                                <option>Choose One</option>
                                <option>HC</option>
                                <option>Finance</option>
                                <option>Procurement</option>
                            </select>
                        </td>
                            <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                        </tr>
                    </tbody>
                </table>
            `;

    // Dapatkan referensi ke tab yang sedang aktif saat tombol "Add Item" diklik
    var activeTab = document.querySelector(".tab-pane.fade.show.active");

    // Cari container di dalam tab yang sedang aktif tersebut
    var tableContainer = activeTab.querySelector("#tableContainer");

    // Tambahkan container baru ke dalam tab yang sedang aktif
    tableContainer.appendChild(divContainer);

    // Tambahkan event listener untuk select Utility dan REP
    var utilitySelect = divContainer.querySelector(".utilitySelect");
    var freqSelect = divContainer.querySelector(".freqSelect");
    var subjectCell = divContainer.querySelector(".nameCell");

    function updateSubject() {
        if (utilitySelect.value === "Tools" || freqSelect.value === "NCS") {
            convertToDropdown(subjectCell);
        } else {
            convertToInput(subjectCell);
        }
    }

    utilitySelect.addEventListener("change", updateSubject);
    freqSelect.addEventListener("change", updateSubject);
}

function addBundleItemCrews() {
    // Dapatkan referensi ke tab yang sedang aktif saat tombol "Add Item" diklik
    var activeTab = document.querySelector(".tab-pane.fade.show.active");

    // Cari container di dalam tab yang sedang aktif tersebut
    var tableContainer = activeTab.querySelector("#tableContainer");

    var divContainer = document.createElement("div");
    divContainer.classList.add("tablein");
    divContainer.style.padding = "24px";
    divContainer.innerHTML = `
        <div class="delete-button" style="margin-bottom: 12px; text-align: right;">
            <button type="button" class="btn" style="background-color: #4A25AA;color: white; padding: 8px 24px; margin-right: 8px ">Save</button>
            <button type="button" class="delete-button" onclick="deleteForm(event)" style="background: none; border: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_389_307)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 13.414L17.6568 19.071C17.8454 19.2532 18.098 19.354 18.3602 19.3517C18.6224 19.3494 18.8732 19.2443 19.0586 19.0588C19.2441 18.8734 19.3492 18.6226 19.3515 18.3604C19.3538 18.0982 19.253 17.8456 19.0708 17.657L13.4138 12L19.0708 6.34303C19.253 6.15443 19.3538 5.90182 19.3515 5.63963C19.3492 5.37743 19.2441 5.12662 19.0586 4.94121C18.8732 4.7558 18.6224 4.65063 18.3602 4.64835C18.098 4.64607 17.8454 4.74687 17.6568 4.92903L11.9998 10.586L6.34282 4.92903C6.15337 4.75137 5.90224 4.65439 5.64255 4.65861C5.38287 4.66283 5.13502 4.76791 4.95143 4.95162C4.76785 5.13533 4.66294 5.38326 4.65891 5.64295C4.65488 5.90263 4.75203 6.1537 4.92982 6.34303L10.5858 12L4.92882 17.657C4.83331 17.7493 4.75713 17.8596 4.70472 17.9816C4.65231 18.1036 4.62473 18.2348 4.62357 18.3676C4.62242 18.5004 4.64772 18.6321 4.698 18.755C4.74828 18.8779 4.82254 18.9895 4.91643 19.0834C5.01032 19.1773 5.12197 19.2516 5.24487 19.3018C5.36777 19.3521 5.49944 19.3774 5.63222 19.3763C5.765 19.3751 5.89622 19.3475 6.01823 19.2951C6.14023 19.2427 6.25058 19.1665 6.34282 19.071L11.9998 13.414Z" fill="#252525"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_389_307">
                            <rect width="24" height="24" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </button>
        </div>
        <div class="mb-3  fw-bold">
            <label for="name" class="form-label">TOTAL COST BUNDLE </label>
            <input type="text" class="form-control " id="costdirect" aria-describedby="emailHelp" />
        </div>
        <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
            <thead style="font-weight: 500">
                <tr class="dicobain">
                    <th scope="col">No</th>
                    <th scope="col">Sub Description</th>
                    <th scope="col">Usage</th>
                    <th scope="col">REP</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col" style="width: 80px; text-align: center">Day</th>
                    <th scope="col" style="width: 80px; text-align: center">QTY</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Forwarded To</th>
                    <th scope="col">Note</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="tableBody">
                <tr>
                    <th scope="row" class="autonumber" style="padding-top: 16px">1</th>
                    <td style="text-align: start">
                        <select class="form-select request-form" >
                            <option>Choose One</option>
                            <option>Production Crews</option>
                        </select>
                    </td>
                    <td style="text-align: start">
                        <select class="form-select utilitySelect request-form">
                            <option>Choose One</option>
                            <option>Man Power</option>
                            <option>Tools</option>
                        </select>
                    </td>
                    <td style="text-align: start">
                        <select class="form-select freqSelect request-form" >
                            <option>Choose One</option>
                            <option>NCS</option>
                            <option>Out</option>
                        </select>
                    </td>
                    <td class="nameCell" style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                    <td style="text-align: start">
                                <select class="form-select request-form">
                                    <option>Choose One</option>
                                    <option>1.</option>
                                    <option>2.</option>
                                </select>
                            </td>
                    <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
                    <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
                    <td style="text-align: center"><fieldset disabled><input type="text" class="tablecoba text-center form-control request-form" placeholder="0"/></fieldset></td>

                    <td style="text-align: start">
                    <select class="form-select request-form" >
                        <option>Choose One</option>
                        <option>HC</option>
                        <option>Finance</option>
                        <option>Procurement</option>
                    </select>
                </td>
                <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>

                    <td style="text-align: start">
                        <button type="button" class="delete-button mt-1" data-bs-toggle="tooltip" onclick="deleteItem(event)" style="background: none; border: none;" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 1 .5-.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4H2.5a1 1 0 0 1 0-2h3a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1h3a1 1 0 0 1 1 1zM4.118 4l.447 8.941A1 1 0 0 0 5.563 14h4.874a1 1 0 0 0 .998-.941L11.882 4H4.118z"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <button type="button" class="button-departemen" onclick="addSubDescriptionCrews(this)" style="font-size: 14px">Add Sub Description <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
        <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
            fill="white"
        />
        </svg></button>
    `;

    // Tambahkan container baru ke dalam tab yang sedang aktif
    tableContainer.appendChild(divContainer);

    // Tambahkan event listener untuk select Utility dan REP
    var utilitySelect = divContainer.querySelector(".utilitySelect");
    var freqSelect = divContainer.querySelector(".freqSelect");
    var subjectCell = divContainer.querySelector(".nameCell");

    function updateSubject() {
        if (utilitySelect.value === "Tools" || freqSelect.value === "NCS") {
            convertToDropdown(subjectCell);
        } else {
            convertToInput(subjectCell);
        }
    }

    utilitySelect.addEventListener("change", updateSubject);
    freqSelect.addEventListener("change", updateSubject);

    updateNumbering();
}

function addItemTools() {
    // Buat elemen-elemen untuk data yang akan ditambahkan
    var divContainer = document.createElement("div");
    divContainer.classList.add("tablein");
    divContainer.style.padding = "24px";
    divContainer.innerHTML = `
            <div class="delete-button" style="margin-bottom:12px; text-align: right;">
                <button type="button" class="btn" style="background-color: #4A25AA;color: white; padding: 8px 24px; margin-right: 8px ">Save</button>
                <button type="button" class="delete-button" onclick="deleteForm(event)" style="background: none; border: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_389_307)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 13.414L17.6568 19.071C17.8454 19.2532 18.098 19.354 18.3602 19.3517C18.6224 19.3494 18.8732 19.2443 19.0586 19.0588C19.2441 18.8734 19.3492 18.6226 19.3515 18.3604C19.3538 18.0982 19.253 17.8456 19.0708 17.657L13.4138 12L19.0708 6.34303C19.253 6.15443 19.3538 5.90182 19.3515 5.63963C19.3492 5.37743 19.2441 5.12662 19.0586 4.94121C18.8732 4.7558 18.6224 4.65063 18.3602 4.64835C18.098 4.64607 17.8454 4.74687 17.6568 4.92903L11.9998 10.586L6.34282 4.92903C6.15337 4.75137 5.90224 4.65439 5.64255 4.65861C5.38287 4.66283 5.13502 4.76791 4.95143 4.95162C4.76785 5.13533 4.66294 5.38326 4.65891 5.64295C4.65488 5.90263 4.75203 6.1537 4.92982 6.34303L10.5858 12L4.92882 17.657C4.83331 17.7493 4.75713 17.8596 4.70472 17.9816C4.65231 18.1036 4.62473 18.2348 4.62357 18.3676C4.62242 18.5004 4.64772 18.6321 4.698 18.755C4.74828 18.8779 4.82254 18.9895 4.91643 19.0834C5.01032 19.1773 5.12197 19.2516 5.24487 19.3018C5.36777 19.3521 5.49944 19.3774 5.63222 19.3763C5.765 19.3751 5.89622 19.3475 6.01823 19.2951C6.14023 19.2427 6.25058 19.1665 6.34282 19.071L11.9998 13.414Z" fill="#252525"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_389_307">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>

            <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                    <thead style="font-weight: 500">
                        <tr class="dicobain">
                            <th scope="col">Sub Description</th>
                            <th scope="col">Usage</th>
                            <th scope="col">REP</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width: 80px; text-align: center">Day</th>
                            <th scope="col" style="width: 80px; text-align: center">QTY</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Forwarded To</th>

                            <th scope="col">Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: start">
                                <select class="form-select request-form">
                                    <option>Choose One</option>
                                    <option>Production Crews</option>
                                </select>
                            </td>
                            <td style="text-align: start">
                                <select class="form-select utilitySelect request-form">
                                    <option>Choose One</option>
                                    <option>Man Power</option>
                                    <option>Tools</option>
                                </select>
                            </td>
                            <td style="text-align: start">
                                <select class="form-select freqSelect request-form">
                                    <option>Choose One</option>
                                    <option>NCS</option>
                                    <option>Out</option>
                                </select>
                            </td>
                            <td class="nameCell" style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>

                            <td style="text-align: center"><fieldset disabled><input type="text" class="tablecoba text-center form-control request-form" placeholder="0"/></fieldset></td>
                            <td style="text-align: start">
                            <select class="form-select request-form">
                                <option>Choose One</option>
                                <option>HC</option>
                                <option>Finance</option>
                                <option>Procurement</option>
                            </select>
                        </td>
                            <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                        </tr>
                    </tbody>
                </table>
            `;

    // Dapatkan referensi ke tab yang sedang aktif saat tombol "Add Item" diklik
    var activeTab = document.querySelector(".tab-pane.fade.show.active");

    // Cari container di dalam tab yang sedang aktif tersebut
    var tableContainer = activeTab.querySelector("#tableContainer");

    // Tambahkan container baru ke dalam tab yang sedang aktif
    tableContainer.appendChild(divContainer);

    // Tambahkan event listener untuk select Utility dan REP
    var utilitySelect = divContainer.querySelector(".utilitySelect");
    var freqSelect = divContainer.querySelector(".freqSelect");
    var subjectCell = divContainer.querySelector(".nameCell");

    function updateSubject() {
        if (utilitySelect.value === "Tools" || freqSelect.value === "NCS") {
            convertToDropdown(subjectCell);
        } else {
            convertToInput(subjectCell);
        }
    }

    utilitySelect.addEventListener("change", updateSubject);
    freqSelect.addEventListener("change", updateSubject);
}

function addBundleItemTools() {
    // Dapatkan referensi ke tab yang sedang aktif saat tombol "Add Item" diklik
    var activeTab = document.querySelector(".tab-pane.fade.show.active");

    // Cari container di dalam tab yang sedang aktif tersebut
    var tableContainer = activeTab.querySelector("#tableContainer");

    var divContainer = document.createElement("div");
    divContainer.classList.add("tablein");
    divContainer.style.padding = "24px";
    divContainer.innerHTML = `
        <div class="delete-button" style="margin-bottom: 12px; text-align: right;">
            <button type="button" class="btn" style="background-color: #4A25AA;color: white; padding: 8px 24px; margin-right: 8px ">Save</button>
            <button type="button" class="delete-button" onclick="deleteForm(event)" style="background: none; border: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_389_307)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 13.414L17.6568 19.071C17.8454 19.2532 18.098 19.354 18.3602 19.3517C18.6224 19.3494 18.8732 19.2443 19.0586 19.0588C19.2441 18.8734 19.3492 18.6226 19.3515 18.3604C19.3538 18.0982 19.253 17.8456 19.0708 17.657L13.4138 12L19.0708 6.34303C19.253 6.15443 19.3538 5.90182 19.3515 5.63963C19.3492 5.37743 19.2441 5.12662 19.0586 4.94121C18.8732 4.7558 18.6224 4.65063 18.3602 4.64835C18.098 4.64607 17.8454 4.74687 17.6568 4.92903L11.9998 10.586L6.34282 4.92903C6.15337 4.75137 5.90224 4.65439 5.64255 4.65861C5.38287 4.66283 5.13502 4.76791 4.95143 4.95162C4.76785 5.13533 4.66294 5.38326 4.65891 5.64295C4.65488 5.90263 4.75203 6.1537 4.92982 6.34303L10.5858 12L4.92882 17.657C4.83331 17.7493 4.75713 17.8596 4.70472 17.9816C4.65231 18.1036 4.62473 18.2348 4.62357 18.3676C4.62242 18.5004 4.64772 18.6321 4.698 18.755C4.74828 18.8779 4.82254 18.9895 4.91643 19.0834C5.01032 19.1773 5.12197 19.2516 5.24487 19.3018C5.36777 19.3521 5.49944 19.3774 5.63222 19.3763C5.765 19.3751 5.89622 19.3475 6.01823 19.2951C6.14023 19.2427 6.25058 19.1665 6.34282 19.071L11.9998 13.414Z" fill="#252525"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_389_307">
                            <rect width="24" height="24" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </button>
        </div>
        <div class="mb-3  fw-bold">
            <label for="name" class="form-label">TOTAL COST BUNDLE </label>
            <input type="text" class="form-control " id="costdirect" aria-describedby="emailHelp" />
        </div>
        <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
            <thead style="font-weight: 500">
                <tr class="dicobain">
                    <th scope="col">No</th>
                    <th scope="col">Sub Description</th>
                    <th scope="col">Usage</th>
                    <th scope="col">REP</th>
                    <th scope="col">Name</th>
                    <th scope="col" style="width: 80px; text-align: center">Day</th>
                    <th scope="col" style="width: 80px; text-align: center">QTY</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Forwarded To</th>
                    <th scope="col">Note</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="tableBody">
                <tr>
                    <th scope="row" class="autonumber" style="padding-top: 16px">1</th>
                    <td style="text-align: start">
                        <select class="form-select request-form" >
                            <option>Choose One</option>
                            <option>Production Crews</option>
                        </select>
                    </td>
                    <td style="text-align: start">
                        <select class="form-select utilitySelect request-form">
                            <option>Choose One</option>
                            <option>Man Power</option>
                            <option>Tools</option>
                        </select>
                    </td>
                    <td style="text-align: start">
                        <select class="form-select freqSelect request-form" >
                            <option>Choose One</option>
                            <option>NCS</option>
                            <option>Out</option>
                        </select>
                    </td>
                    <td class="nameCell" style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                    <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
                    <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
                    <td style="text-align: center"><fieldset disabled><input type="text" class="tablecoba text-center form-control request-form" placeholder="0"/></fieldset></td>

                    <td style="text-align: start">
                    <select class="form-select request-form" >
                        <option>Choose One</option>
                        <option>HC</option>
                        <option>Finance</option>
                        <option>Procurement</option>
                    </select>
                </td>
                <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>

                    <td style="text-align: start">
                        <button type="button" class="delete-button mt-1" data-bs-toggle="tooltip" onclick="deleteItem(event)" style="background: none; border: none;" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 1 .5-.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4H2.5a1 1 0 0 1 0-2h3a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1h3a1 1 0 0 1 1 1zM4.118 4l.447 8.941A1 1 0 0 0 5.563 14h4.874a1 1 0 0 0 .998-.941L11.882 4H4.118z"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <button type="button" class="button-departemen" onclick="addSubDescriptionTools(this)" style="font-size: 14px">Add Sub Description <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
        <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
            fill="white"
        />
        </svg></button>
    `;

    // Tambahkan container baru ke dalam tab yang sedang aktif
    tableContainer.appendChild(divContainer);

    // Tambahkan event listener untuk select Utility dan REP
    var utilitySelect = divContainer.querySelector(".utilitySelect");
    var freqSelect = divContainer.querySelector(".freqSelect");
    var subjectCell = divContainer.querySelector(".nameCell");

    function updateSubject() {
        if (utilitySelect.value === "Tools" || freqSelect.value === "NCS") {
            convertToDropdown(subjectCell);
        } else {
            convertToInput(subjectCell);
        }
    }

    utilitySelect.addEventListener("change", updateSubject);
    freqSelect.addEventListener("change", updateSubject);

    updateNumbering();
}

function addItemOpsLoc() {
    // Buat elemen-elemen untuk data yang akan ditambahkan
    var divContainer = document.createElement("div");
    divContainer.classList.add("tablein");
    divContainer.style.padding = "24px";
    divContainer.innerHTML = `
            <div class="delete-button" style="margin-bottom:12px; text-align: right;">
                <button type="button" class="btn" style="background-color: #4A25AA;color: white; padding: 8px 24px; margin-right: 8px ">Save</button>
                <button type="button" class="delete-button" onclick="deleteForm(event)" style="background: none; border: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_389_307)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 13.414L17.6568 19.071C17.8454 19.2532 18.098 19.354 18.3602 19.3517C18.6224 19.3494 18.8732 19.2443 19.0586 19.0588C19.2441 18.8734 19.3492 18.6226 19.3515 18.3604C19.3538 18.0982 19.253 17.8456 19.0708 17.657L13.4138 12L19.0708 6.34303C19.253 6.15443 19.3538 5.90182 19.3515 5.63963C19.3492 5.37743 19.2441 5.12662 19.0586 4.94121C18.8732 4.7558 18.6224 4.65063 18.3602 4.64835C18.098 4.64607 17.8454 4.74687 17.6568 4.92903L11.9998 10.586L6.34282 4.92903C6.15337 4.75137 5.90224 4.65439 5.64255 4.65861C5.38287 4.66283 5.13502 4.76791 4.95143 4.95162C4.76785 5.13533 4.66294 5.38326 4.65891 5.64295C4.65488 5.90263 4.75203 6.1537 4.92982 6.34303L10.5858 12L4.92882 17.657C4.83331 17.7493 4.75713 17.8596 4.70472 17.9816C4.65231 18.1036 4.62473 18.2348 4.62357 18.3676C4.62242 18.5004 4.64772 18.6321 4.698 18.755C4.74828 18.8779 4.82254 18.9895 4.91643 19.0834C5.01032 19.1773 5.12197 19.2516 5.24487 19.3018C5.36777 19.3521 5.49944 19.3774 5.63222 19.3763C5.765 19.3751 5.89622 19.3475 6.01823 19.2951C6.14023 19.2427 6.25058 19.1665 6.34282 19.071L11.9998 13.414Z" fill="#252525"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_389_307">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>

            <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                    <thead style="font-weight: 500">
                        <tr class="dicobain">
                            <th scope="col">Sub Description</th>
                            <th scope="col">Usage</th>
                            <th scope="col">REP</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width: 80px; text-align: center">Day</th>
                            <th scope="col" style="width: 80px; text-align: center">QTY</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Forwarded To</th>

                            <th scope="col">Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: start">
                                <select class="form-select request-form">
                                    <option>Choose One</option>
                                    <option>Production Crews</option>
                                </select>
                            </td>
                            <td style="text-align: start">
                                <select class="form-select utilitySelect request-form">
                                    <option>Choose One</option>
                                    <option>Man Power</option>
                                    <option>Tools</option>
                                </select>
                            </td>
                            <td style="text-align: start">
                                <select class="form-select freqSelect request-form">
                                    <option>Choose One</option>
                                    <option>NCS</option>
                                    <option>Out</option>
                                </select>
                            </td>
                            <td class="nameCell" style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>

                            <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start">
                            <select class="form-select request-form">
                                <option>Choose One</option>
                                <option>HC</option>
                                <option>Finance</option>
                                <option>Procurement</option>
                            </select>
                        </td>
                            <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                        </tr>
                    </tbody>
                </table>
            `;

    // Dapatkan referensi ke tab yang sedang aktif saat tombol "Add Item" diklik
    var activeTab = document.querySelector(".tab-pane.fade.show.active");

    // Cari container di dalam tab yang sedang aktif tersebut
    var tableContainer = activeTab.querySelector("#tableContainer");

    // Tambahkan container baru ke dalam tab yang sedang aktif
    tableContainer.appendChild(divContainer);

    // Tambahkan event listener untuk select Utility dan REP
    var freqSelect = divContainer.querySelector(".freqSelect");
    var subjectCell = divContainer.querySelector(".nameCell");

    function updateSubject() {
        if (freqSelect.value === "NCS") {
            convertToDropdown(subjectCell);
        } else {
            convertToInput(subjectCell);
        }
    }

    freqSelect.addEventListener("change", updateSubject);
}

function addBundleItemOpsLoc() {
    // Dapatkan referensi ke tab yang sedang aktif saat tombol "Add Item" diklik
    var activeTab = document.querySelector(".tab-pane.fade.show.active");

    // Cari container di dalam tab yang sedang aktif tersebut
    var tableContainer = activeTab.querySelector("#tableContainer");
    // Buat elemen-elemen untuk data yang akan ditambahkan
    var divContainer = document.createElement("div");
    divContainer.classList.add("tablein");
    divContainer.style.padding = "24px";
    divContainer.innerHTML = `
            <div class="delete-button" style="margin-bottom: 12px; text-align: right;">
                <button type="button" class="btn" style="background-color: #4A25AA;color: white; padding: 8px 24px; margin-right: 8px ">Save</button>
                <button type="button" class="delete-button" onclick="deleteForm(event)" style="background: none; border: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_389_307)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 13.414L17.6568 19.071C17.8454 19.2532 18.098 19.354 18.3602 19.3517C18.6224 19.3494 18.8732 19.2443 19.0586 19.0588C19.2441 18.8734 19.3492 18.6226 19.3515 18.3604C19.3538 18.0982 19.253 17.8456 19.0708 17.657L13.4138 12L19.0708 6.34303C19.253 6.15443 19.3538 5.90182 19.3515 5.63963C19.3492 5.37743 19.2441 5.12662 19.0586 4.94121C18.8732 4.7558 18.6224 4.65063 18.3602 4.64835C18.098 4.64607 17.8454 4.74687 17.6568 4.92903L11.9998 10.586L6.34282 4.92903C6.15337 4.75137 5.90224 4.65439 5.64255 4.65861C5.38287 4.66283 5.13502 4.76791 4.95143 4.95162C4.76785 5.13533 4.66294 5.38326 4.65891 5.64295C4.65488 5.90263 4.75203 6.1537 4.92982 6.34303L10.5858 12L4.92882 17.657C4.83331 17.7493 4.75713 17.8596 4.70472 17.9816C4.65231 18.1036 4.62473 18.2348 4.62357 18.3676C4.62242 18.5004 4.64772 18.6321 4.698 18.755C4.74828 18.8779 4.82254 18.9895 4.91643 19.0834C5.01032 19.1773 5.12197 19.2516 5.24487 19.3018C5.36777 19.3521 5.49944 19.3774 5.63222 19.3763C5.765 19.3751 5.89622 19.3475 6.01823 19.2951C6.14023 19.2427 6.25058 19.1665 6.34282 19.071L11.9998 13.414Z" fill="#252525"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_389_307">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>
            <div class="mb-3  fw-bold">
                    <label for="name" class="form-label">TOTAL COST BUNDLE </label>
                    <input type="text" class="form-control " id="costdirect" aria-describedby="emailHelp" />
            </div>
                <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                    <thead style="font-weight: 500">
                        <tr class="dicobain">
                            <th scope="col">No</th>
                            <th scope="col">Sub Description</th>
                            <th scope="col">Usage</th>
                            <th scope="col">REP</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width: 80px; text-align: center">Day</th>
                            <th scope="col" style="width: 80px; text-align: center">QTY</th>
                            <th scope="col">Forwarded To</th>
                            <th scope="col">Note</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <tr>
                            <th scope="row" class="autonumber" style="padding-top: 16px">1</th>
                            <td style="text-align: start">
                                <select class="form-select request-form" >
                                    <option>Choose One</option>
                                    <option>Production Crews</option>
                                </select>
                            </td>
                            <td style="text-align: start">
                                <select class="form-select utilitySelect request-form">
                                    <option>Choose One</option>
                                    <option>Man Power</option>
                                    <option>Tools</option>
                                </select>
                            </td>
                            <td style="text-align: start">
                                <select class="form-select freqSelect request-form" >
                                    <option>Choose One</option>
                                    <option>NCS</option>
                                    <option>Out</option>
                                </select>
                            </td>
                            <td class="nameCell" style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
                            <td style="text-align: start">
                            <select class="form-select request-form" >
                                <option>Choose One</option>
                                <option>HC</option>
                                <option>Finance</option>
                                <option>Procurement</option>
    
                            </select>
                        </td>
                        <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>

                            <td style="text-align: start">
                                <button type="button" class="delete-button mt-1" data-bs-toggle="tooltip" onclick="deleteItem21(event)" style="background: none; border: none;" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="button-departemen" onclick="addSubDescOpsLoc(this)" style="font-size: 14px">Add Sub Description <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
        <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
            fill="white"
        />
        </svg></button>
            `;

    // Tambahkan container baru ke dalam tab yang sedang aktif
    tableContainer.appendChild(divContainer);

    // Tambahkan event listener untuk select Utility dan REP
    var freqSelect = divContainer.querySelector(".freqSelect");
    var subjectCell = divContainer.querySelector(".nameCell");

    function updateSubject() {
        if (freqSelect.value === "NCS") {
            convertToDropdown(subjectCell);
        } else {
            convertToInput(subjectCell);
        }
    }

    freqSelect.addEventListener("change", updateSubject);

    updateNumbering21(tableBody);
}

function convertToDropdown(cell) {
    cell.innerHTML = `
        <select class="form-select request-form">
            <option>Option 1</option>
            <option>Option 2</option>
            <option>Option 3</option>
        </select>
    `;
}

function convertToInput(cell) {
    cell.innerHTML = `<input type="text" class="tablecoba form-control request-form" />`;
}

function deleteForm(event) {
    var target = event.target;
    var parentDiv = target.closest(".tablein");
    if (parentDiv) {
        parentDiv.remove();
    }
}

function addSubDescription(button) {
    var tableBody = button.closest(".tablein").querySelector(".tableBody");
    var newRow = document.createElement("tr");
    newRow.innerHTML = `
        <th scope="row" class="autonumber" style="padding-top: 16px"></th>
        <td style="text-align: start">
            <select class="form-select request-form">
                <option>Choose One</option>
                <option>Production Crews</option>
            </select>
        </td>
        <td style="text-align: start">
            <select class="form-select utilitySelect request-form">
                <option>Choose One</option>
                <option>Man Power</option>
                <option>Tools</option>
            </select>
        </td>
        <td style="text-align: start">
            <select class="form-select freqSelect request-form">
                <option>Choose One</option>
                <option>NCS</option>
                <option>Out</option>
            </select>
        </td>
        <td class="nameCell" style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start">
            <select class="form-select request-form">
                <option>Choose One</option>
                <option>HC</option>
                <option>Finance</option>
                <option>Procurement</option>
            </select>
        </td>
        <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start">
            <button type="button" class="delete-button mt-1" data-bs-toggle="tooltip" onclick="deleteItem(event)" style="background: none; border: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 1 .5-.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4H2.5a1 1 0 0 1 0-2h3a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1h3a1 1 0 0 1 1 1zM4.118 4l.447 8.941A1 1 0 0 0 5.563 14h4.874a1 1 0 0 0 .998-.941L11.882 4H4.118z"/>
                </svg>
            </button>
        </td>
    `;
    tableBody.appendChild(newRow);

    // Dapatkan referensi ke elemen utilitySelect dan freqSelect yang baru dibuat
    var utilitySelect = newRow.querySelector(".utilitySelect");
    var freqSelect = newRow.querySelector(".freqSelect");
    var subjectCell = newRow.querySelector(".nameCell");

    function updateSubject() {
        if (utilitySelect.value === "Tools" || freqSelect.value === "NCS") {
            convertToDropdown(subjectCell);
        } else {
            convertToInput(subjectCell);
        }
    }

    utilitySelect.addEventListener("change", updateSubject);
    freqSelect.addEventListener("change", updateSubject);

    updateNumbering();
}

function addSubDescriptionCrews(button) {
    var tableBody = button.closest(".tablein").querySelector(".tableBody");
    var newRow = document.createElement("tr");
    newRow.innerHTML = `
        <th scope="row" class="autonumber" style="padding-top: 16px"></th>
        <td style="text-align: start">
            <select class="form-select request-form">
                <option>Choose One</option>
                <option>Production Crews</option>
            </select>
        </td>
        <td style="text-align: start">
            <select class="form-select utilitySelect request-form">
                <option>Choose One</option>
                <option>Man Power</option>
                <option>Tools</option>
            </select>
        </td>
        <td style="text-align: start">
            <select class="form-select freqSelect request-form">
                <option>Choose One</option>
                <option>NCS</option>
                <option>Out</option>
            </select>
        </td>
        <td class="nameCell" style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start">
        <select class="form-select request-form">
        <option>Choose One</option>
        <option>1.</option>
        <option>2.</option>
        </select>
        </td>
        <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
        <td style="text-align: center"><fieldset disabled><input type="text" class="tablecoba text-center form-control request-form" placeholder="0"/></fieldset></td>

        <td style="text-align: start">
            <select class="form-select request-form">
                <option>Choose One</option>
                <option>HC</option>
                <option>Finance</option>
                <option>Procurement</option>
            </select>
        </td>
        <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start">
            <button type="button" class="delete-button mt-1" data-bs-toggle="tooltip" onclick="deleteItem(event)" style="background: none; border: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 1 .5-.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4H2.5a1 1 0 0 1 0-2h3a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1h3a1 1 0 0 1 1 1zM4.118 4l.447 8.941A1 1 0 0 0 5.563 14h4.874a1 1 0 0 0 .998-.941L11.882 4H4.118z"/>
                </svg>
            </button>
        </td>
    `;
    tableBody.appendChild(newRow);

    // Dapatkan referensi ke elemen utilitySelect dan freqSelect yang baru dibuat
    var utilitySelect = newRow.querySelector(".utilitySelect");
    var freqSelect = newRow.querySelector(".freqSelect");
    var subjectCell = newRow.querySelector(".nameCell");

    function updateSubject() {
        if (utilitySelect.value === "Tools" || freqSelect.value === "NCS") {
            convertToDropdown(subjectCell);
        } else {
            convertToInput(subjectCell);
        }
    }

    utilitySelect.addEventListener("change", updateSubject);
    freqSelect.addEventListener("change", updateSubject);

    updateNumbering();
}

function addSubDescriptionTools(button) {
    var tableBody = button.closest(".tablein").querySelector(".tableBody");
    var newRow = document.createElement("tr");
    newRow.innerHTML = `
        <th scope="row" class="autonumber" style="padding-top: 16px"></th>
        <td style="text-align: start">
            <select class="form-select request-form">
                <option>Choose One</option>
                <option>Production Crews</option>
            </select>
        </td>
        <td style="text-align: start">
            <select class="form-select utilitySelect request-form">
                <option>Choose One</option>
                <option>Man Power</option>
                <option>Tools</option>
            </select>
        </td>
        <td style="text-align: start">
            <select class="form-select freqSelect request-form">
                <option>Choose One</option>
                <option>NCS</option>
                <option>Out</option>
            </select>
        </td>
        <td class="nameCell" style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
        <td style="text-align: center"><fieldset disabled><input type="text" class="tablecoba text-center form-control request-form" placeholder="0"/></fieldset></td>

        <td style="text-align: start">
            <select class="form-select request-form">
                <option>Choose One</option>
                <option>HC</option>
                <option>Finance</option>
                <option>Procurement</option>
            </select>
        </td>
        <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start">
            <button type="button" class="delete-button mt-1" data-bs-toggle="tooltip" onclick="deleteItem(event)" style="background: none; border: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 1 .5-.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4H2.5a1 1 0 0 1 0-2h3a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1h3a1 1 0 0 1 1 1zM4.118 4l.447 8.941A1 1 0 0 0 5.563 14h4.874a1 1 0 0 0 .998-.941L11.882 4H4.118z"/>
                </svg>
            </button>
        </td>
    `;
    tableBody.appendChild(newRow);

    // Dapatkan referensi ke elemen utilitySelect dan freqSelect yang baru dibuat
    var utilitySelect = newRow.querySelector(".utilitySelect");
    var freqSelect = newRow.querySelector(".freqSelect");
    var subjectCell = newRow.querySelector(".nameCell");

    function updateSubject() {
        if (utilitySelect.value === "Tools" || freqSelect.value === "NCS") {
            convertToDropdown(subjectCell);
        } else {
            convertToInput(subjectCell);
        }
    }

    utilitySelect.addEventListener("change", updateSubject);
    freqSelect.addEventListener("change", updateSubject);

    updateNumbering();
}

function addSubDescOpsLoc(button) {
    var tableBody = button.closest(".tablein").querySelector("#tableBody");
    var newRow = document.createElement("tr");
    newRow.innerHTML = `
        <th scope="row" class="autonumber" style="padding-top: 16px"></th>
        <td style="text-align: start">
            <select class="form-select request-form">
                <option>Choose One</option>
                <option>Production Crews</option>
            </select>
        </td>
        <td style="text-align: start">
            <select class="form-select utilitySelect request-form">
                <option>Choose One</option>
                <option>Man Power</option>
                <option>Tools</option>
            </select>
        </td>
        <td style="text-align: start">
            <select class="form-select freqSelect request-form">
                <option>Choose One</option>
                <option>NCS</option>
                <option>Out</option>
            </select>
        </td>
        <td class="nameCell" style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start"><input type="number" class="tablecoba form-control request-form" /></td>

        <td style="text-align: start">
            <select class="form-select request-form">
                <option>Choose One</option>
                <option>HC</option>
                <option>Finance</option>
                <option>Procurement</option>
            </select>
        </td>
        <td style="text-align: start"><input type="text" class="tablecoba form-control request-form" /></td>
        <td style="text-align: start">
            <button type="button" class="delete-button mt-1" data-bs-toggle="tooltip" onclick="deleteItem21(event)" style="background: none; border: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 1 .5-.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4H2.5a1 1 0 0 1 0-2h3a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1h3a1 1 0 0 1 1 1zM4.118 4l.447 8.941A1 1 0 0 0 5.563 14h4.874a1 1 0 0 0 .998-.941L11.882 4H4.118z"/>
                </svg>
            </button>
        </td>
    `;
    tableBody.appendChild(newRow);

    // Dapatkan referensi ke elemen utilitySelect dan freqSelect yang baru dibuat
    var freqSelect = newRow.querySelector(".freqSelect");
    var subjectCell = newRow.querySelector(".nameCell");

    function updateSubject() {
        if (freqSelect.value === "NCS") {
            convertToDropdown(subjectCell);
        } else {
            convertToInput(subjectCell);
        }
    }

    freqSelect.addEventListener("change", updateSubject);

    updateNumbering21(tableBody);
}

function updateNumbering21(tableBody) {
    let rowIndex = 1;
    tableBody.querySelectorAll(".autonumber").forEach((autonumberCell) => {
        autonumberCell.textContent = rowIndex++;
    });
}

function updateNumbering() {
    document.querySelectorAll(".tableBody").forEach((tableBody) => {
        let rowIndex = 1;
        tableBody.querySelectorAll(".autonumber").forEach((autonumberCell) => {
            autonumberCell.textContent = rowIndex++;
        });
    });
}

function deleteForm(event) {
    event.target.closest(".tablein").remove();
}

function deleteItem(event) {
    var row = event.target.closest("tr");
    row.remove();
    updateNumbering();
}

function deleteItem21(event) {
    var tableBody = event.target.closest("#tableBody");
    event.target.closest("tr").remove();
    updateNumbering21(tableBody);
}
