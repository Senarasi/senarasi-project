{{-- @extends('layout.index')
@section('title')
    Budget Dashboard
@endsection
@section('content')
    <button class="navback">
        <svg xmlns="http://www.w3.org/2000/svg " width="10 " height="17 " viewBox="0 0 10 17 " fill="none ">
            <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                                7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
        </svg>
        Back to Main Dashboard
    </button>
    <div class="judulhalaman" style="text-align: start">Request Budget</div>
    <form class="formrequest">
        <div class="mb-3">
            <label for="Select " class="form-label">Pilih Request Budget</label>
            <select id="Select " class="form-select">
                @forelse ($budget as $budget_name_id => $name)
                    <option value="{{ $budget_name_id }}">{{ $name }}</option>
                @empty
                    <option disabled selected>Data not found</option>
                @endforelse
            </select>
        </div>
        <fieldset disabled>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Budget Tahunan</label>
                <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
            </div>
            <div class="mb-3">
                <label for="disabledTextInput " class="form-label">Budget Kuarter</label>
                <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Budget Perbulan</label>
                <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
            </div>
        </fieldset>
        <div class="mb-3">
            <label for="SelectProduser" class="form-label">Nama Produser</label>
            <select id="SelectProduser" class="form-select">
                <option>Choose One</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="SelectManager" class="form-label">Nama Manager</label>
            <select id="SelectManager" class="form-select">
                @forelse ($employee as $employee_id => $employee_name)
                    <option value="{{ $employee_id }}">{{ $employee_name }}</option>
                @empty
                    <option disabled selected>Data not found</option>
                @endforelse
            </select>
        </div>
        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
            <div class="mb-3">
                <label for="managerform" class="form-label">Tanggal Mulai</label>
                <input type="date" id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
            </div>
            <div class="mb-3">
                <label for="managerform" class="form-label">Tanggal Selesai</label>
                <input type="date" id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
            </div>
        </div>
        <a href="/create-budget-detail" class="text-decoration-none text-end">
            <button type="button" class="button-permintaan">Pilih Vendor dan Barang</button>
        </a>
    </form>

    <div class="button-request">
        <button type="submit" class="button" style="color: white">Request</button>
    </div>
@endsection --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Request</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <!--Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="header ms-3">
                <div class="logonavbar"><span style="color: #ffe900">se</span>narasi</div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <form class="d-flex has-search" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />

                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/2bfbf0aef31a2cc5791ba7283fd9129406fbb60e65f2a4985de422bb96951f3b?" class="img-3 me-4" />
                </form>
            </div>
        </div>
    </nav>
    <!---->

    <!--Sidebar-->
    <aside id="sidebar">
        <div class="div-9">
            <button class="div-10">
          <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M5.83333 17.3333H13.8333C14.187 17.3333 14.5261 17.1929 14.7761 16.9428C15.0262 16.6928 15.1667 16.3536 15.1667 16V5.33333C15.1667 4.97971 15.0262 4.64057 14.7761 4.39052C14.5261 4.14048 14.187 4 13.8333 4H5.83333C5.47971 4 5.14057 4.14048 4.89052 4.39052C4.64048 4.64057 4.5 4.97971 4.5 5.33333V16C4.5 16.3536 4.64048 16.6928 4.89052 16.9428C5.14057 17.1929 5.47971 17.3333 5.83333 17.3333ZM17.8333 26.6667C17.8333 27.0203 17.9738 27.3594 18.2239 27.6095C18.4739 27.8595 18.813 28 19.1667 28H27.1667C27.5203 28 27.8594 27.8595 28.1095 27.6095C28.3595 27.3594 28.5 27.0203 28.5 26.6667V17.3333C28.5 16.9797 28.3595 16.6406 28.1095 16.3905C27.8594 16.1405 27.5203 16 27.1667 16H19.1667C18.813 16 18.4739 16.1405 18.2239 16.3905C17.9738 16.6406 17.8333 16.9797 17.8333 17.3333V26.6667Z"
              fill="white"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M4.5 26.6667C4.5 27.0203 4.64048 27.3594 4.89052 27.6095C5.14057 27.8595 5.47971 28 5.83333 28H13.8333C14.187 28 14.5261 27.8595 14.7761 27.6095C15.0262 27.3594 15.1667 27.0203 15.1667 26.6667V21.3333C15.1667 20.9797 15.0262 20.6406 14.7761 20.3905C14.5261 20.1405 14.187 20 13.8333 20H5.83333C5.47971 20 5.14057 20.1405 4.89052 20.3905C4.64048 20.6406 4.5 20.9797 4.5 21.3333V26.6667ZM19.1667 13.3333H27.1667C27.5203 13.3333 27.8594 13.1929 28.1095 12.9428C28.3595 12.6928 28.5 12.3536 28.5 12V5.33333C28.5 4.97971 28.3595 4.64057 28.1095 4.39052C27.8594 4.14048 27.5203 4 27.1667 4H19.1667C18.813 4 18.4739 4.14048 18.2239 4.39052C17.9738 4.64057 17.8333 4.97971 17.8333 5.33333V12C17.8333 12.3536 17.9738 12.6928 18.2239 12.9428C18.4739 13.1929 18.813 13.3333 19.1667 13.3333Z"
              fill="#FFE900"
            />
          </svg>
          <div class="div-13 text-white">Dashboard</div>
        </button>
            <button class="div-12">
          <svg class="img-5" xmlns="http://www.w3.org/2000/svg " width="33 " height="32 " viewBox="0 0 33 32 " fill="none ">
            <g clip-path="url(#clip0_310_283) ">
              <g filter="url(#filter0_d_310_283) ">
                <path
                  d="M31.0537 16.4676L29.3329 13.7532L30.3536 10.7069C30.4209 10.5054 30.4165 10.2868 30.3412 10.0882C30.2658 9.88959 30.1241 9.72313 29.9401 9.61702L27.1554 8.01171L26.6434 4.83961C26.6089 4.62989 26.5032 4.43844 26.3442 4.2975C26.1851
  4.15657 25.9823 4.07476 25.7699 4.06585L22.5582 3.9401L20.6311 1.36843C20.5038 1.19825 20.3215 1.07747 20.1151 1.02665C19.9087 0.975835 19.6911 0.998132 19.4994 1.08974L16.598 2.46961L13.6956 1.08861C13.5035 0.997986 13.2861 0.976335 13.0799 1.02731C12.8738
  1.07828 12.6915 1.19875 12.5638 1.36843L10.6368 3.9401L7.425 4.06585C7.21282 4.07433 7.01009 4.15588 6.85112 4.29667C6.69215 4.43747 6.58672 4.62888 6.55268 4.83848L6.04061 8.01058L3.25596 9.61588C3.07172 9.72182 2.92979 9.8882 2.85422 10.0868C2.77865
  10.2855 2.77409 10.5041 2.84132 10.7057L3.86206 13.7521L2.14233 16.4676C2.02889 16.6474 1.98102 16.8608 2.00682 17.0718C2.03263 17.2827 2.13052 17.4783 2.28394 17.6254L4.60297 19.8493L4.34241 23.0508C4.32507 23.2627 4.38146 23.474 4.50202 23.6491C4.62258
  23.8241 4.79991 23.9522 5.00401 24.0115L8.09114 24.9009L9.34752 27.8588C9.43001 28.0549 9.57803 28.2162 9.76628 28.3152C9.95453 28.4141 10.1713 28.4447 10.3796 28.4015L13.529 27.7557L16.0146 29.7915C16.1834 29.9286 16.3907 30 16.598 30C16.8053 30
  17.0115 29.9286 17.1815 29.7915L19.667 27.7557L22.8165 28.4015C23.2436 28.4921 23.6775 28.2621 23.8485 27.8588L25.1049 24.9009L28.192 24.0115C28.3963 23.9524 28.5737 23.8244 28.6943 23.6493C28.8149 23.4742 28.8712 23.2627 28.8536 23.0508L28.5931 19.8493L30.9121
  17.6254C31.0655 17.4783 31.1634 17.2827 31.1892 17.0718C31.215 16.8608 31.1672 16.6474 31.0537 16.4676ZM23.256 12.0369L16.8087 21.6959C16.5652 22.0562 16.1879 22.2975 15.8129 22.2975C15.4391 22.2975 15.021 22.0879 14.7548 21.8205L10.0216 17.0114C9.86644
  16.8523 9.77961 16.6389 9.77961 16.4166C9.77961 16.1944 9.86644 15.981 10.0216 15.8219L11.1896 14.6323C11.2661 14.5554 11.3571 14.4943 11.4574 14.4526C11.5576 14.4109 11.6651 14.3895 11.7736 14.3895C11.8822 14.3895 11.9896 14.4109 12.0899 14.4526C12.1901
  14.4943 12.2811 14.5554 12.3576 14.6323L15.4379 17.7614L20.5178 10.1506C20.578 10.0599 20.6557 9.98199 20.7463 9.92158C20.837 9.86117 20.9387 9.81941 21.0457 9.79874C21.1526 9.77807 21.2626 9.7789 21.3692 9.80119C21.4758 9.82348 21.5769 9.86678 21.6666
  9.92856L23.0362 10.87C23.4135 11.1306 23.5109 11.6551 23.256 12.0369Z "
                  fill="#FFE900 "
                />
              </g>
            </g>
            <defs>
              <filter id="filter0_d_310_283 " x="0 " y="1 " width="33.196 " height="33 " filterUnits="userSpaceOnUse " color-interpolation-filters="sRGB ">
                <feFlood flood-opacity="0 " result="BackgroundImageFix " />
                <feColorMatrix in="SourceAlpha " type="matrix " values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0 " result="hardAlpha " />
                <feOffset dy="2 " />
                <feGaussianBlur stdDeviation="1 " />
                <feComposite in2="hardAlpha " operator="out " />
                <feColorMatrix type="matrix " values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0 " />
                <feBlend mode="normal " in2="BackgroundImageFix " result="effect1_dropShadow_310_283 " />
                <feBlend mode="normal " in="SourceGraphic " in2="effect1_dropShadow_310_283 " result="shape " />
              </filter>
              <clipPath id="clip0_310_283 ">
                <rect width="32 " height="32 " fill="white " transform="translate(0.5) " />
              </clipPath>
            </defs>
          </svg>
          <div class="div-13 text-white">Approval</div>
        </button>

            <button class="div-12">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
            <path
              d="M12.5 0C10.1266 0 7.80655 0.703788 5.83316 2.02236C3.85977 3.34094 2.3217 5.21508 1.41345 7.4078C0.505199 9.60051 0.267559 12.0133 0.730582 14.3411C1.1936 16.6689 2.33649 18.807 4.01472 20.4853C5.69295 22.1635 7.83115 23.3064 10.1589 23.7694C12.4867 24.2324 14.8995 23.9948 17.0922 23.0865C19.2849 22.1783 21.1591 20.6402 22.4776 18.6668C23.7962 16.6934 24.5 14.3734 24.5 12C24.4966 8.81843 23.2313 5.76814 20.9816 3.51843C18.7319 1.26872 15.6816 0.00335979 12.5 0ZM12.0385 5.53846C12.3123 5.53846 12.58 5.61967 12.8077 5.77181C13.0354 5.92395 13.2129 6.1402 13.3177 6.39321C13.4225 6.64621 13.4499 6.92461 13.3965 7.1932C13.343 7.46179 13.2112 7.7085 13.0175 7.90215C12.8239 8.09579 12.5772 8.22766 12.3086 8.28109C12.04 8.33451 11.7616 8.30709 11.5086 8.20229C11.2556 8.0975 11.0393 7.92002 10.8872 7.69233C10.7351 7.46463 10.6538 7.19693 10.6538 6.92308C10.6538 6.55585 10.7997 6.20367 11.0594 5.944C11.3191 5.68434 11.6712 5.53846 12.0385 5.53846ZM13.4231 18.4615C12.9334 18.4615 12.4639 18.267 12.1177 17.9208C11.7714 17.5746 11.5769 17.105 11.5769 16.6154V12C11.3321 12 11.0973 11.9027 10.9242 11.7296C10.7511 11.5565 10.6538 11.3217 10.6538 11.0769C10.6538 10.8321 10.7511 10.5973 10.9242 10.4242C11.0973 10.2511 11.3321 10.1538 11.5769 10.1538C12.0666 10.1538 12.5361 10.3483 12.8824 10.6946C13.2286 11.0408 13.4231 11.5104 13.4231 12V16.6154C13.6679 16.6154 13.9027 16.7126 14.0758 16.8857C14.2489 17.0589 14.3462 17.2936 14.3462 17.5385C14.3462 17.7833 14.2489 18.0181 14.0758 18.1912C13.9027 18.3643 13.6679 18.4615 13.4231 18.4615Z"
              fill="#FFE900"
            />
          </svg>
          <div class="div-13 text-white">Detail</div>
        </button>

            <button class="div-12 sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#karyawan" role="button" aria-expanded="false" aria-controls="karyawan">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/2353b0cdf451679e8c2af60effba1490ef91f20f2d2a30a175c208799d2f5e31?" class="img-5" />
          <div class="div-11 text-white">
            <a href="#" class="sidebar-link">Karyawan</a>
          </div>
          <ul id="karyawan" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="div-99">
              <a href="#" class="sidebar-link">Departemen</a>
            </li>
            <li class="div-99">
              <a href="#" class="sidebar-link">Karyawan</a>
            </li>
          </ul>
        </button>
            <button class="div-12">
          <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M16.0797 0.0862822C16.2125 0.0293544 16.3555 0 16.5 0C16.6445 0 16.7875 0.0293544 16.9203 0.0862822L31.4333 6.30708L16.5 12.7071L1.56667 6.30708L16.0797 0.0862822Z"
              fill="white"
            />
            <path d="M0.5 8.17162V24.5343C0.5 24.961 0.756 25.3449 1.1464 25.5156L15.4333 31.6383V14.5716L0.5 8.17162Z" fill="#FFE900" />
            <path d="M17.5667 14.5716L32.5 8.17162V24.5343C32.5002 24.7432 32.439 24.9475 32.3241 25.122C32.2092 25.2964 32.0456 25.4333 31.8536 25.5156L17.5667 31.6383V14.5716Z" fill="#FFE900" />
          </svg>
          <div class="div-13 text-white">Vendor</div>
        </button>
        </div>
    </aside>
    <!--Badan Isi-->
    <div class="body" style="margin-top: 65px; margin-left: 132px">
        <div class="badanisi">
            <button class="navback">
          <svg xmlns="http://www.w3.org/2000/svg " width="10 " height="17 " viewBox="0 0 10 17 " fill="none ">
            <path
              d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
        7.2501 0 7.6501 0 8.0501Z "
              fill="#4A25AA "
            />
          </svg>
          Back to Main Dashboard
        </button>

            <div class="judulhalaman" style="text-align: start">Request Budget</div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Data 1</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" disabled>Data 2</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false" disabled>Data 3</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
                </li>
            </ul>

            <!-- isi 1 -->
            <div class="tab-content" id="myTabContent" style="margin-top: 24px">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <form class="formrequest">
                        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                            <div class="mb-3">
                                <label for="Select " class="form-label">Pilih Program</label>
                                <select id="Select " class="form-select">
                    <option>Choose One</option>
                  </select>
                            </div>
                            <fieldset disabled>
                                <div class="mb-3"><label for="disabledTextInput" class="form-label">Kode Budget</label>
                                    <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
                                </div>
                            </fieldset>

                        </div>


                        <fieldset disabled>
                            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Budget Tahunan</label>
                                    <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput " class="form-label">Remaining Budget</label>
                                    <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
                                </div>
                            </div>
                        </fieldset>

                        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                            <div class="mb-3">
                                <label for="disabledTextInput " class="form-label">Episode</label>
                                <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput " class="form-label">Location</label>
                                <input type="text " id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
                            </div>
                        </div>

                        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
                            <div class="mb-3">
                                <label for="managerform" class="form-label">Tanggal Mulai</label>
                                <input type="date" id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
                            </div>
                            <div class="mb-3">
                                <label for="managerform" class="form-label">Tanggal Selesai</label>
                                <input type="date" id="disabledTextInput " class="form-control" placeholder="Rp10.000.000 " />
                            </div>
                        </div>
                    </form>


                    <button type="button" class="button-departemen" style="justify-content: center; align-items: center; display: inline-flex" id="nextButton">Next
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19 12L13 6M19 12L13 18M19 12H5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>

                <!-- isi 2 -->
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <form action="" class="formrequest">
                        <div style="border: 1px solid #c4c4c4; margin: 12px; border-radius: 4px; margin-bottom: 24px">
                            <table class="table table-hover" style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                                <thead style="font-weight: 500">
                                    <tr class="dicobain">
                                        <th scope="col ">NO</th>
                                        <th scope="col ">Description</th>
                                        <th scope="col ">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row ">1</th>
                                        <td style="text-align: start">SUB TOTAL PRODUCTION CREWS</td>

                                        <td class="total-price" style="font-weight: 300">$20</td>
                                    </tr>
                                    <tr>
                                        <th scope=" row ">2</th>
                                        <td style="text-align: start"></td>

                                        <td class="total-price" style="font-weight: 300">$20</td>
                                    </tr>
                                    <tr>
                                        <th scope="row ">3</th>
                                        <td style="text-align: start"></td>

                                        <td class="total-price" style="font-weight: 300">$20</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-right" style="font-weight: 500; background-color: #dbdee8">Total</td>
                                        <td class="total-price">$80</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="button-departemen" onclick="addSesi()">Add Sesi<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z" fill="white"/>
                      </svg>
                      </button>

                        <div id="tableContainer"></div>
                </div>


                <!-- Isi 3 -->
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">


                    <button type="button" class="button-permintaan"><svg  xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path d="M16 2C13.2311 2 10.5243 2.82109 8.22202 4.35943C5.91973 5.89777 4.12532 8.08427 3.06569 10.6424C2.00607 13.2006 1.72882 16.0155 2.26901 18.7313C2.80921 21.447 4.14258 23.9416 6.10051 25.8995C8.05845 27.8574 10.553 29.1908 13.2687 29.731C15.9845 30.2712 18.7994 29.9939 21.3576 28.9343C23.9157 27.8747 26.1022 26.0803 27.6406 23.778C29.1789 21.4757 30 18.7689 30 16C30 12.287 28.525 8.72601 25.8995 6.1005C23.274 3.475 19.713 2 16 2ZM23.447 16.895L11.447 22.895C11.2945 22.9712 11.1251 23.0072 10.9548 22.9994C10.7845 22.9917 10.619 22.9406 10.474 22.8509C10.329 22.7613 10.2093 22.636 10.1264 22.4871C10.0434 22.3381 9.99993 22.1705 10 22V10C10.0001 9.82961 10.0437 9.66207 10.1268 9.51327C10.2098 9.36448 10.3294 9.23936 10.4744 9.14981C10.6194 9.06025 10.7848 9.00921 10.955 9.00155C11.1252 8.99388 11.2946 9.02984 11.447 9.106L23.447 15.106C23.6129 15.1891 23.7524 15.3168 23.8498 15.4747C23.9473 15.6326 23.9989 15.8145 23.9989 16C23.9989 16.1855 23.9473 16.3674 23.8498 16.5253C23.7524 16.6832 23.6129 16.8109 23.447 16.894" fill="white"/>
                      </svg>Preview</button>
                    <button type="button" class="button-departemen">Submit
                    </button>
                </div>
                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
                </form>

            </div>
            <fieldset disabled></fieldset>
        </div>
    </div>
    <!--Footer-->
    <footer class="footer mt-auto text-center">
        <span id="bottom ">&copy;2024 Narasi TV | All rights reserved.</span>
    </footer>
    <script src="script.js"></script>
    <script>
        // Event listener for the "Next" button
        document.getElementById('nextButton').addEventListener('click', function() {
            // Enable the "Profile" button and update its styling
            var profileTab = document.getElementById('profile-tab');
            profileTab.disabled = false;
            profileTab.classList.add('active');

            // Enable the "Contact" button and update its styling
            var contactTab = document.getElementById('contact-tab');
            contactTab.disabled = false;

            // Disable the "Home" button and update its styling
            var homeTab = document.getElementById('home-tab');
            homeTab.classList.remove('active');

            // Hide the current tab content and show the "Profile" tab content
            var tabPanes = document.getElementsByClassName('tab-pane');
            for (var i = 0; i < tabPanes.length; i++) {
                tabPanes[i].classList.remove('show', 'active');
            }
            var profileTabPane = document.getElementById('profile-tab-pane');
            profileTabPane.classList.add('show', 'active');

            // Switch to the "Profile" tab header
            var tabList = document.getElementById('myTab');
            var tabListItems = tabList.getElementsByTagName('li');
            for (var j = 0; j < tabListItems.length; j++) {
                if (tabListItems[j].id === 'profile-tab') {
                    tabListItems[j].classList.add('active');
                } else {
                    tabListItems[j].classList.remove('active'); // Remove active class from other tabs
                }
            }

            // Scroll to the top of the "Profile" tab content
            var profileTabPaneOffset = profileTabPane.offsetTop;
            window.scrollTo(0, profileTabPaneOffset);
        });

        // Event listener for the "Home" tab
        document.getElementById('home-tab').addEventListener('click', function() {
            // Enable the "Profile" tab and update its styling
            var profileTab = document.getElementById('profile-tab');
            profileTab.disabled = false;

            // Enable the "Contact" tab and update its styling
            var contactTab = document.getElementById('contact-tab');
            contactTab.disabled = false;

            // Hide the current tab content and show the "Home" tab content
            var tabPanes = document.getElementsByClassName('tab-pane');
            for (var i = 0; i < tabPanes.length; i++) {
                tabPanes[i].classList.remove('show', 'active');
            }
            var homeTabPane = document.getElementById('home-tab-pane');
            homeTabPane.classList.add('show', 'active');

            // Switch to the "Home" tab header
            var tabList = document.getElementById('myTab');
            var tabListItems = tabList.getElementsByTagName('li');
            for (var j = 0; j < tabListItems.length; j++) {
                if (tabListItems[j].id === 'home-tab') {
                    tabListItems[j].classList.add('active');
                } else {
                    tabListItems[j].classList.remove('active'); // Remove active class from other tabs
                }
            }

            // Scroll to the top of the "Home" tab content
            var homeTabPaneOffset = homeTabPane.offsetTop;
            window.scrollTo(0, homeTabPaneOffset);
        });


        //
        function addSesi() {
            // Buat elemen-elemen untuk data yang akan ditambahkan
            var divContainer = document.createElement('div');
            divContainer.classList.add('tablein');
            divContainer.style.padding = '24px';
            divContainer.innerHTML = `
        <div class="delete-button" style="margin-bottom:-12px; text-align: right;">
            <button type="button" class="delete-button" onclick="deleteSesi(event)" style="background: none; border: none;">
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
        <div class="mb-3">
            <label for="Select" class="form-label">Pilih Request Budget</label>
            <select id="Select" class="form-select">
                <option>Choose One</option>
            </select>
        </div>
        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <!-- Input nama berbentuk select jika REP dipilih sebagai NCS -->
                <div id="nameInputContainer">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                </div>
            </div>
            <div class="mb-3">
                <label for="Select" class="form-label">REP</label>
                <select id="repSelect" class="form-select" onchange="toggleNameInput()">
                    <option value="in">Choose</option>
                    <option value="out">Out</option>
                    <option value="ncs">NCS</option>
                </select>
            </div>
        </div>

        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr 1fr">
            <div class="mb-3">
                <label for="name" class="day form-label">DAY</label>
                <input type="number" class="form-control" id="day" aria-describedby="emailHelp" />
            </div>
            <div class="mb-3">
                <label for="name" class="qty form-label">QTY</label>
                <input type="number" class="form-control" id="qty" aria-describedby="emailHelp" />
            </div>
            <div class="mb-3">
                <label for="name" class="freq form-label">FREQ</label>
                <input type="number" class="form-control" id="freq" aria-describedby="emailHelp" />
            </div>
        </div>
        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr;  margin-bottom:12px;">
            <div class="mb-3">
                <label for="name" class="form-label"  style="margin-bottom: 12px">COST</label>
                <input type="text" class="form-control" id="costdirect" aria-describedby="emailHelp" />
            </div>
            <fieldset disabled>
            <div class="mb-3">
                <label for="name" class="form-label" style="margin-bottom: 12px">TOTAL COST</label>
                <input type="text" class="form-control" id="totalcostdirect" aria-describedby="emailHelp" />
            </div>
        </fieldset>
        </div>
        <div class="garisbutton" style="margin-top: 12px; margin-bottom: -12px;">
            <button type="button" class="garisbutton" onclick="addVendor(event) ">Tambah Deskripsi</button>
        </div>

    `;

            // Tambahkan container baru ke dalam dokumen tanpa menghapus yang sebelumnya
            var tableContainer = document.getElementById('tableContainer');
            tableContainer.appendChild(divContainer);
        }

        function toggleNameInput() {
            var repSelect = document.getElementById('repSelect');
            var nameInputContainer = document.getElementById('nameInputContainer');

            // Periksa apakah REP yang dipilih adalah NCS
            if (repSelect.value === 'ncs') {
                // Jika ya, ubah input nama menjadi select
                nameInputContainer.innerHTML = `
            <select id="nameSelect" class="form-select">
                <option>Choose One</option>
                <option>Najwa Shihab</option>
                <!-- Opsi-opsi lainnya -->
            </select>
        `;
            } else {
                // Jika tidak, kembalikan input nama ke bentuk awal
                nameInputContainer.innerHTML = `
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
        `;
            }
        }

        function addVendor(event) {
            var addButton = event.target;
            var parentDiv = addButton.closest('.tablein');

            // Buat elemen untuk data deskripsi baru
            var divDescription = document.createElement('div');
            divDescription.classList.add('mb-3');
            divDescription.innerHTML = `
            <div style="margin-top: -12px; margin-bottom: -12px;">
    <div class="delete-button" style="text-align: right;">
        <button type="button" class="delete-description" onclick="deleteDescription(event)" style="background: none; border: none;">
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
</div>
        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <!-- Input nama berbentuk select jika REP dipilih sebagai NCS -->
                <div id="nameInputContainer">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                </div>
            </div>
            <div class="mb-3">
                <label for="Select" class="form-label">REP</label>
                <select id="repSelect" class="form-select" onchange="toggleNameInput()">
                    <option value="in">Choose</option>
                    <option value="out">Out</option>
                    <option value="ncs">NCS</option>
                </select>
            </div>
        </div>

        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr 1fr">
            <div class="mb-3">
                <label for="name" class="day form-label">DAY</label>
                <input type="number" class="form-control" id="day" aria-describedby="emailHelp" />
            </div>
            <div class="mb-3">
                <label for="name" class="qty form-label">QTY</label>
                <input type="number" class="form-control" id="qty" aria-describedby="emailHelp" />
            </div>
            <div class="mb-3">
                <label for="name" class="freq form-label">FREQ</label>
                <input type="number" class="form-control" id="freq" aria-describedby="emailHelp" />
            </div>
        </div>
        <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr">
            <div class="mb-3">
                <label for="name" class="form-label"  style="margin-bottom: 12px">COST</label>
                <input type="text" class="form-control" id="costdirect" aria-describedby="emailHelp" />
            </div>
            <fieldset disabled>
            <div class="mb-3">
                <label for="name" class="form-label" style="margin-bottom: 12px">TOTAL COST</label>
                <input type="text" class="form-control" id="totalcostdirect" aria-describedby="emailHelp" />
            </div>
        </fieldset>
        </div>
    `;

            // Cari elemen terakhir yang ditambahkan
            var lastDescription = parentDiv.querySelector('.garisbutton');

            // Sisipkan form deskripsi baru sebelum elemen terakhir
            parentDiv.insertBefore(divDescription, lastDescription);
        }


        function deleteSesi(event) {
            var target = event.target;
            var parentDiv = target.closest('.tablein');
            if (parentDiv) {
                parentDiv.remove();
            }
        }

        function deleteDescription(event) {
            var deleteButton = event.target;
            var descriptionDiv = deleteButton.closest('.mb-3');
            descriptionDiv.remove();
        }
    </script>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

</html>