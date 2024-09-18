<style>
    ::after,
::before {
box-sizing: border-box;
margin: 0;
padding: 0;
}

a {
text-decoration: none;
}


#sidebar {
  padding-top: 8px;
  width: 80px;
  min-width: 70px;
  z-index: 1000;
  transition: all .25s ease-in-out;
  background-color: #260B6F;
  display: flex;
  flex-direction: column;
  padding-bottom: 40px;
  position: fixed; /* Mengubah dari absolute ke fixed */
  top: 0; /* Pastikan posisinya dimulai dari atas */
  bottom: 0; /* Pastikan sidebar menjangkau sampai bawah */
  height: 100%;
  overflow: auto; /* Mengizinkan scroll jika konten lebih tinggi dari sidebar */
  scrollbar-width: none;
}

#sidebar.expand {
width: 284px;
min-width: 284px;
overflow: auto;
}
/* Untuk menyembunyikan scrollbar di Chrome, Edge, Safari */
#sidebar.expand::-webkit-scrollbar {
  display: none;
}
.toggle-btn {
background-color: transparent;
cursor: pointer;
border: 0;
padding: 1rem 1.5rem;
}

.toggle-btn i {
font-size: 1.5rem;
color: #FFF;
}

.sidebar-logo {
margin: auto 0;
}

.sidebar-logo a {
color: #FFF;
font-size: 1.15rem;
font-weight: 600;
}

#sidebar:not(.expand) .sidebar-logo,
#sidebar:not(.expand) a.sidebar-link span {
display: none;
}

.sidebar-nav {
padding: 2rem 0;
flex: 1 1 auto;
}

a.sidebar-link {
padding: .925rem 1.625rem;
color: #FFF;
display: block;
font-size: 0.9rem;
white-space: nowrap;
border-left: 3px solid transparent;
}

.sidebar-link i {
font-size: 1.1rem;
margin-right: .75rem;
line-height: 1;
}
.sidebar-link span {
flex-grow: 1;
line-height: 1; /* Pastikan line-height tidak melebihi ukuran font */
margin-left: 12px;
}

a.sidebar-link:hover, a.sidebar-link.active {
background-color:#4a25aa;
border-left: 3px solid #3b7ddd;
}

.sidebar-item {
position: relative;
}

#sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
position: absolute;
top: 0;
left: 70px;
background-color: #260B6F;
padding: 0;
min-width: 15rem;
display: none;
}

/* #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
display: block;
width: 100%;
opacity: 1;
} */

#sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
border: solid;
border-width: 0 .075rem .075rem 0;
content: "";
display: inline-block;
padding: 2px;
position: absolute;
right: 1.5rem;
top: 1.4rem;
transform: rotate(-135deg);
transition: all .2s ease-out;
}

#sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
transform: rotate(45deg);
transition: all .2s ease-out;
}

.dropdown-menu{
border: none;
}
.overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Warna overlay dengan transparansi */
            display: none; /* Tersembunyi di awal */
            z-index: 1;
        }

        .overlay.show {
            display: block; /* Tampilkan overlay */
        }
</style>

    <aside id="sidebar" >
            <ul class="sidebar-nav" style="padding-top: 60px">
                <li class="sidebar-item" style="list-style: none;">
                    <a href="{{ route('transport-request.index') }}" class="sidebar-link {{ Request::is('transport-request*', ) ? 'active' : ''}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M135.2 117.4L109.1 192l293.8 0-26.1-74.6C372.3 104.6 360.2 96 346.6 96L165.4 96c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32l181.2 0c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2l0 144 0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L96 400l0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L0 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                            <path d="M135.2 117.4L109.1 192l293.8 0-26.1-74.6C372.3 104.6 360.2 96 346.6 96L165.4 96c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32l181.2 0c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2l0 144 0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L96 400l0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L0 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                        <span class="align-middle">Transportation Request</span>
                    </a>
                </li>
                <li class="sidebar-item" style="list-style: none;">
                    <a href="{{ route('approval-head-transport.index') }}" class="sidebar-link {{ Request::is('approval-head-transport*', ) ? 'active' : ''}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M256 32c-17.7 0-32 14.3-32 32l0 2.3 0 99.6c0 5.6-4.5 10.1-10.1 10.1c-3.6 0-7-1.9-8.8-5.1L157.1 87C83 123.5 32 199.8 32 288l0 64 512 0 0-66.4c-.9-87.2-51.7-162.4-125.1-198.6l-48 83.9c-1.8 3.2-5.2 5.1-8.8 5.1c-5.6 0-10.1-4.5-10.1-10.1l0-99.6 0-2.3c0-17.7-14.3-32-32-32l-64 0zM16.6 384C7.4 384 0 391.4 0 400.6c0 4.7 2 9.2 5.8 11.9C27.5 428.4 111.8 480 288 480s260.5-51.6 282.2-67.5c3.8-2.8 5.8-7.2 5.8-11.9c0-9.2-7.4-16.6-16.6-16.6L16.6 384z"/></svg>
                            <span class="align-middle">Approval Head of Department</span>
                    </a>
                </li>
                <li class="sidebar-item" style="list-style: none;">
                    <a href="{{ route('approval-transport.index') }}" class="sidebar-link {{ Request::is('approval-transport*', ) ? 'active' : ''}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M176 88l0 40 160 0 0-40c0-4.4-3.6-8-8-8L184 80c-4.4 0-8 3.6-8 8zm-48 40l0-40c0-30.9 25.1-56 56-56l144 0c30.9 0 56 25.1 56 56l0 40 28.1 0c12.7 0 24.9 5.1 33.9 14.1l51.9 51.9c9 9 14.1 21.2 14.1 33.9l0 92.1-128 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32-128 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L0 320l0-92.1c0-12.7 5.1-24.9 14.1-33.9l51.9-51.9c9-9 21.2-14.1 33.9-14.1l28.1 0zM0 416l0-64 128 0c0 17.7 14.3 32 32 32s32-14.3 32-32l128 0c0 17.7 14.3 32 32 32s32-14.3 32-32l128 0 0 64c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64z"/></svg>
                        <span class="align-middle">Approval General Affair</span>
                    </a>
                </li>
                <li class="sidebar-item" style="list-style: none;">
                    <a href="{{ route('transport-approved.index') }}" class="sidebar-link {{ Request::is('transport-approved*', ) ? 'active' : ''}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 19 18" fill="none">
                            <path d="M18.3311 9.53612L17.2701 7.86263L17.8994 5.98449C17.9409 5.86027 17.9382 5.72553 17.8918 5.60307C17.8453 5.48062 17.758 5.378 17.6445 5.31258L15.9277 4.32287L15.612 2.36721C15.5908 2.2379 15.5256 2.11987 15.4275 2.03298C15.3294 1.94609 15.2044 1.89566 15.0735 1.89016L13.0934 1.81263L11.9053 0.227148C11.8268 0.122227 11.7144 0.04776 11.5872 0.0164308C11.4599 -0.0148984 11.3258 -0.0011519 11.2076 0.0553288L9.41882 0.906044L7.62939 0.0546304C7.51098 -0.00124154 7.37694 -0.0145898 7.24984 0.0168348C7.12274 0.0482595 7.01036 0.122536 6.93163 0.227148L5.74357 1.81263L3.76346 1.89016C3.63264 1.89539 3.50765 1.94567 3.40964 2.03247C3.31164 2.11928 3.24664 2.23728 3.22565 2.36651L2.90995 4.32217L1.19315 5.31188C1.07956 5.37719 0.992058 5.47977 0.945467 5.60223C0.898876 5.72469 0.896068 5.8595 0.937518 5.98379L1.56682 7.86193L0.506573 9.53612C0.436633 9.64694 0.407121 9.77851 0.42303 9.90859C0.438939 10.0387 0.499293 10.1592 0.59388 10.2499L2.02361 11.621L1.86297 13.5948C1.85228 13.7254 1.88704 13.8557 1.96137 13.9637C2.0357 14.0716 2.14503 14.1505 2.27086 14.1871L4.17415 14.7354L4.94873 16.5591C4.99958 16.6799 5.09084 16.7794 5.2069 16.8404C5.32297 16.9014 5.45662 16.9202 5.58502 16.8936L7.52672 16.4955L9.05912 17.7506C9.16319 17.8351 9.29101 17.8791 9.41882 17.8791C9.54664 17.8791 9.67376 17.8351 9.77853 17.7506L11.3109 16.4955L13.2526 16.8936C13.5159 16.9495 13.7835 16.8077 13.8889 16.5591L14.6635 14.7354L16.5668 14.1871C16.6927 14.1506 16.8021 14.0717 16.8764 13.9638C16.9508 13.8558 16.9855 13.7255 16.9747 13.5948L16.814 11.621L18.2438 10.2499C18.3384 10.1592 18.3987 10.0387 18.4146 9.90859C18.4305 9.77851 18.401 9.64694 18.3311 9.53612ZM13.5236 6.80447L9.54873 12.7595C9.39857 12.9816 9.16598 13.1304 8.9348 13.1304C8.70431 13.1304 8.44658 13.0011 8.28244 12.8363L5.36431 9.87138C5.26866 9.77328 5.21512 9.6417 5.21512 9.50469C5.21512 9.36768 5.26866 9.23609 5.36431 9.138L6.08441 8.40463C6.1316 8.35718 6.1877 8.31952 6.24949 8.29382C6.31128 8.26813 6.37754 8.2549 6.44446 8.2549C6.51138 8.2549 6.57764 8.26813 6.63944 8.29382C6.70123 8.31952 6.75733 8.35718 6.80452 8.40463L8.70361 10.3338L11.8355 5.64155C11.8726 5.5856 11.9205 5.53759 11.9764 5.50035C12.0322 5.4631 12.095 5.43736 12.1609 5.42461C12.2268 5.41187 12.2946 5.41238 12.3603 5.42613C12.4261 5.43987 12.4884 5.46656 12.5437 5.50465L13.3881 6.08507C13.6207 6.24571 13.6808 6.56909 13.5236 6.80447Z" fill="white"/>
                          </svg>
                        <span class="align-middle">List Request Approved</span>
                    </a>
                </li>
                <li class="sidebar-item" style="list-style: none;">
                    <a href="{{ route('transport-report.index') }}"class="sidebar-link {{ Request::is('transport-report*', ) ? 'active' : ''}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 16 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 5.625C1.65326 5.625 1.08097 5.86205 0.65901 6.28401C0.237053 6.70597 0 7.27826 0 7.875V15.1875C0 15.9334 0.296316 16.6488 0.823762 17.1762C1.35121 17.7037 2.06658 18 2.8125 18H12.9375C13.6834 18 14.3988 17.7037 14.9262 17.1762C15.4537 16.6488 15.75 15.9334 15.75 15.1875V13.5C15.75 12.9033 15.5129 12.331 15.091 11.909C14.669 11.4871 14.0967 11.25 13.5 11.25H11.3861C11.0878 11.2499 10.8017 11.1314 10.5907 10.9204L5.95463 6.28425C5.53277 5.86226 4.96056 5.62513 4.36388 5.625H2.25Z" fill="white"/>
                            <path d="M10.125 0C10.7217 0 11.294 0.237053 11.716 0.65901C12.1379 1.08097 12.375 1.65326 12.375 2.25V10.125H11.3861L6.75 5.48888C6.11721 4.8559 5.25891 4.50019 4.36388 4.5H2.25C1.85625 4.5 1.47712 4.5675 1.125 4.69125V2.25C1.125 1.65326 1.36205 1.08097 1.78401 0.65901C2.20597 0.237053 2.77826 0 3.375 0H10.125Z" fill="white"/>
                            <path d="M13.5 10.125C13.8937 10.125 14.2729 10.1925 14.625 10.3163V4.5C14.625 4.10505 14.521 3.71706 14.3235 3.37503C14.1261 3.033 13.842 2.74897 13.5 2.5515V10.125Z" fill="white"/>
                          </svg>
                        <span class="align-middle">Report Transportation Request</span>
                    </a>
                </li>
                <li class="sidebar-item" style="list-style: none;">
                    <a href="{{ route('operational-car-report.index') }}"class="sidebar-link {{ request()->routeIs('operational-car-report.index') ? 'active' : '' }}" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 16 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 5.625C1.65326 5.625 1.08097 5.86205 0.65901 6.28401C0.237053 6.70597 0 7.27826 0 7.875V15.1875C0 15.9334 0.296316 16.6488 0.823762 17.1762C1.35121 17.7037 2.06658 18 2.8125 18H12.9375C13.6834 18 14.3988 17.7037 14.9262 17.1762C15.4537 16.6488 15.75 15.9334 15.75 15.1875V13.5C15.75 12.9033 15.5129 12.331 15.091 11.909C14.669 11.4871 14.0967 11.25 13.5 11.25H11.3861C11.0878 11.2499 10.8017 11.1314 10.5907 10.9204L5.95463 6.28425C5.53277 5.86226 4.96056 5.62513 4.36388 5.625H2.25Z" fill="white"/>
                            <path d="M10.125 0C10.7217 0 11.294 0.237053 11.716 0.65901C12.1379 1.08097 12.375 1.65326 12.375 2.25V10.125H11.3861L6.75 5.48888C6.11721 4.8559 5.25891 4.50019 4.36388 4.5H2.25C1.85625 4.5 1.47712 4.5675 1.125 4.69125V2.25C1.125 1.65326 1.36205 1.08097 1.78401 0.65901C2.20597 0.237053 2.77826 0 3.375 0H10.125Z" fill="white"/>
                            <path d="M13.5 10.125C13.8937 10.125 14.2729 10.1925 14.625 10.3163V4.5C14.625 4.10505 14.521 3.71706 14.3235 3.37503C14.1261 3.033 13.842 2.74897 13.5 2.5515V10.125Z" fill="white"/>
                          </svg>
                        <span class="align-middle">Daily Report Operational Car</span>
                    </a>
                </li>
                <li class="sidebar-item" style="list-style: none;">
                    <a href="{{ route('operational-car-report.list') }}"class="sidebar-link {{ request()->routeIs('operational-car-report.list',) ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 16 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 5.625C1.65326 5.625 1.08097 5.86205 0.65901 6.28401C0.237053 6.70597 0 7.27826 0 7.875V15.1875C0 15.9334 0.296316 16.6488 0.823762 17.1762C1.35121 17.7037 2.06658 18 2.8125 18H12.9375C13.6834 18 14.3988 17.7037 14.9262 17.1762C15.4537 16.6488 15.75 15.9334 15.75 15.1875V13.5C15.75 12.9033 15.5129 12.331 15.091 11.909C14.669 11.4871 14.0967 11.25 13.5 11.25H11.3861C11.0878 11.2499 10.8017 11.1314 10.5907 10.9204L5.95463 6.28425C5.53277 5.86226 4.96056 5.62513 4.36388 5.625H2.25Z" fill="white"/>
                            <path d="M10.125 0C10.7217 0 11.294 0.237053 11.716 0.65901C12.1379 1.08097 12.375 1.65326 12.375 2.25V10.125H11.3861L6.75 5.48888C6.11721 4.8559 5.25891 4.50019 4.36388 4.5H2.25C1.85625 4.5 1.47712 4.5675 1.125 4.69125V2.25C1.125 1.65326 1.36205 1.08097 1.78401 0.65901C2.20597 0.237053 2.77826 0 3.375 0H10.125Z" fill="white"/>
                            <path d="M13.5 10.125C13.8937 10.125 14.2729 10.1925 14.625 10.3163V4.5C14.625 4.10505 14.521 3.71706 14.3235 3.37503C14.1261 3.033 13.842 2.74897 13.5 2.5515V10.125Z" fill="white"/>
                          </svg>
                        <span class="align-middle">Report Operational Car</span>
                    </a>
                </li>

                <li class="sidebar-item" style="list-style: none;">
                    <a href="{{ route('manage-card.index') }}"class="sidebar-link {{ request()->routeIs('manage-card.index',) ? 'active' : '' }}">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 16 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 5.625C1.65326 5.625 1.08097 5.86205 0.65901 6.28401C0.237053 6.70597 0 7.27826 0 7.875V15.1875C0 15.9334 0.296316 16.6488 0.823762 17.1762C1.35121 17.7037 2.06658 18 2.8125 18H12.9375C13.6834 18 14.3988 17.7037 14.9262 17.1762C15.4537 16.6488 15.75 15.9334 15.75 15.1875V13.5C15.75 12.9033 15.5129 12.331 15.091 11.909C14.669 11.4871 14.0967 11.25 13.5 11.25H11.3861C11.0878 11.2499 10.8017 11.1314 10.5907 10.9204L5.95463 6.28425C5.53277 5.86226 4.96056 5.62513 4.36388 5.625H2.25Z" fill="white"/>
                            <path d="M10.125 0C10.7217 0 11.294 0.237053 11.716 0.65901C12.1379 1.08097 12.375 1.65326 12.375 2.25V10.125H11.3861L6.75 5.48888C6.11721 4.8559 5.25891 4.50019 4.36388 4.5H2.25C1.85625 4.5 1.47712 4.5675 1.125 4.69125V2.25C1.125 1.65326 1.36205 1.08097 1.78401 0.65901C2.20597 0.237053 2.77826 0 3.375 0H10.125Z" fill="white"/>
                            <path d="M13.5 10.125C13.8937 10.125 14.2729 10.1925 14.625 10.3163V4.5C14.625 4.10505 14.521 3.71706 14.3235 3.37503C14.1261 3.033 13.842 2.74897 13.5 2.5515V10.125Z" fill="white"/>
                          </svg> --}}
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 576 512" fill="#ffff"><path d="M512 80c8.8 0 16 7.2 16 16l0 32L48 128l0-32c0-8.8 7.2-16 16-16l448 0zm16 144l0 192c0 8.8-7.2 16-16 16L64 432c-8.8 0-16-7.2-16-16l0-192 480 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24l48 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-112 0z"/></svg>
                        <span class="align-middle">Manage Card</span>
                    </a>
                </li>


            </ul>

{{--
            <div class="sidebar-footer" style="border-top: 3px solid #3b7ddd; ">
                <a href="{{ route('setting') }}" class="sidebar-link" style="padding-top: 12px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M16.2369 9.59392C16.0926 9.4297 16.0131 9.21859 16.0131 9C16.0131 8.78141 16.0926 8.5703 16.2369 8.40608L17.3887 7.11026C17.5157 6.96868 17.5945 6.79053 17.6139 6.60138C17.6333 6.41223 17.5923 6.2218 17.4967 6.0574L15.697 2.94382C15.6024 2.77961 15.4584 2.64945 15.2855 2.57189C15.1126 2.49433 14.9196 2.47333 14.7341 2.51188L13.0423 2.85384C12.8271 2.89832 12.603 2.86246 12.4123 2.75305C12.2217 2.64363 12.0777 2.46822 12.0075 2.25992L11.4585 0.613141C11.3982 0.434406 11.2832 0.279164 11.1298 0.169359C10.9764 0.0595529 10.7923 0.000736816 10.6037 0.0012238H7.00415C6.80792 -0.00901865 6.61373 0.0452515 6.45124 0.155745C6.28875 0.266239 6.16689 0.426883 6.10428 0.613141L5.60034 2.25992C5.53016 2.46822 5.38615 2.64363 5.1955 2.75305C5.00485 2.86246 4.78075 2.89832 4.56549 2.85384L2.82872 2.51188C2.65284 2.48703 2.47354 2.51478 2.3134 2.59165C2.15327 2.66851 2.01946 2.79105 1.92884 2.94382L0.129088 6.0574C0.0311457 6.21996 -0.0128925 6.40933 0.00326975 6.59843C0.019432 6.78753 0.094967 6.96667 0.219076 7.11026L1.36192 8.40608C1.50619 8.5703 1.58575 8.78141 1.58575 9C1.58575 9.21859 1.50619 9.4297 1.36192 9.59392L0.219076 10.8897C0.094967 11.0333 0.019432 11.2125 0.00326975 11.4016C-0.0128925 11.5907 0.0311457 11.78 0.129088 11.9426L1.92884 15.0562C2.02342 15.2204 2.16742 15.3505 2.34031 15.4281C2.51321 15.5057 2.70618 15.5267 2.89171 15.4881L4.58348 15.1462C4.79875 15.1017 5.02285 15.1375 5.2135 15.2469C5.40415 15.3564 5.54815 15.5318 5.61834 15.7401L6.16727 17.3869C6.22988 17.5731 6.35174 17.7338 6.51423 17.8443C6.67672 17.9547 6.87091 18.009 7.06715 17.9988H10.6667C10.8553 17.9993 11.0393 17.9404 11.1928 17.8306C11.3462 17.7208 11.4612 17.5656 11.5215 17.3869L12.0705 15.7401C12.1407 15.5318 12.2847 15.3564 12.4753 15.2469C12.666 15.1375 12.8901 15.1017 13.1053 15.1462L14.7971 15.4881C14.9826 15.5267 15.1756 15.5057 15.3485 15.4281C15.5214 15.3505 15.6654 15.2204 15.76 15.0562L17.5597 11.9426C17.6553 11.7782 17.6963 11.5878 17.6769 11.3986C17.6575 11.2095 17.5787 11.0313 17.4517 10.8897L16.2369 9.59392ZM14.8961 10.7998L15.616 11.6096L14.4641 13.6074L13.4023 13.3914C12.7542 13.2589 12.08 13.369 11.5077 13.7008C10.9354 14.0325 10.5048 14.5629 10.2977 15.1912L9.95575 16.199H7.65207L7.32811 15.1732C7.12101 14.5449 6.69044 14.0146 6.11814 13.6828C5.54584 13.351 4.87164 13.2409 4.22353 13.3734L3.16168 13.5894L1.99184 11.6006L2.71174 10.7908C3.15444 10.2958 3.39918 9.65505 3.39918 8.991C3.39918 8.32695 3.15444 7.6862 2.71174 7.19125L1.99184 6.38136L3.14368 4.40163L4.20553 4.6176C4.85365 4.75008 5.52784 4.63999 6.10014 4.30822C6.67244 3.97645 7.10301 3.4461 7.31011 2.81784L7.65207 1.80098H9.95575L10.2977 2.82684C10.5048 3.4551 10.9354 3.98545 11.5077 4.31722C12.08 4.64898 12.7542 4.75908 13.4023 4.62659L14.4641 4.41062L15.616 6.40835L14.8961 7.21824C14.4584 7.71206 14.2166 8.3491 14.2166 9.009C14.2166 9.6689 14.4584 10.3059 14.8961 10.7998ZM8.80391 5.40049C8.09199 5.40049 7.39606 5.6116 6.80413 6.00712C6.21219 6.40264 5.75083 6.9648 5.47839 7.62253C5.20596 8.28025 5.13467 9.00399 5.27356 9.70223C5.41245 10.4005 5.75527 11.0418 6.25867 11.5452C6.76207 12.0486 7.40344 12.3915 8.10168 12.5303C8.79992 12.6692 9.52366 12.598 10.1814 12.3255C10.8391 12.0531 11.4013 11.5917 11.7968 10.9998C12.1923 10.4078 12.4034 9.71192 12.4034 9C12.4034 8.04535 12.0242 7.1298 11.3491 6.45476C10.6741 5.77972 9.75856 5.40049 8.80391 5.40049ZM8.80391 10.7998C8.44795 10.7998 8.09999 10.6942 7.80402 10.4964C7.50805 10.2987 7.27737 10.0176 7.14115 9.68874C7.00493 9.35987 6.96929 8.998 7.03874 8.64889C7.10818 8.29977 7.27959 7.97908 7.53129 7.72738C7.78299 7.47568 8.10368 7.30427 8.45279 7.23483C8.80191 7.16538 9.16378 7.20102 9.49265 7.33724C9.82151 7.47346 10.1026 7.70414 10.3004 8.00011C10.4981 8.29608 10.6037 8.64404 10.6037 9C10.6037 9.47732 10.414 9.9351 10.0765 10.2726C9.73901 10.6101 9.28123 10.7998 8.80391 10.7998Z" fill="white"/>
                      </svg>
                    <span>Setting</span>
                </a>
                <a href="{{ route('logout') }}" class="sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                        <path d="M6.5 3V2C6.5 1.44772 6.9477 1 7.5 1H16.5C17.0523 1 17.5 1.44772 17.5 2V18C17.5 18.5523 17.0523 19 16.5 19H7.5C6.9477 19 6.5 18.5523 6.5 18V17" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12.5 10H1.5" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <path d="M5 6.5L1.5 10L5 13.5" stroke="white" stroke-width="2" stroke-linecap="round"/>
                      </svg>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div> --}}


    </aside>

    <div class="overlay" id="overlay"></div>

    <script>
 const hamBurger = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("#sidebar");
const overlay = document.querySelector("#overlay");

// Fungsi untuk menambahkan event listener hover pada desktop
function addHoverListeners() {
    hamBurger.addEventListener("mouseover", handleMouseOver);
    hamBurger.addEventListener("mouseleave", handleMouseLeave);
    sidebar.addEventListener("mouseover", handleMouseOver);
    sidebar.addEventListener("mouseleave", handleMouseLeave);
}

// Fungsi untuk menghapus event listener hover pada mobile
function removeHoverListeners() {
    hamBurger.removeEventListener("mouseover", handleMouseOver);
    hamBurger.removeEventListener("mouseleave", handleMouseLeave);
    sidebar.removeEventListener("mouseover", handleMouseOver);
    sidebar.removeEventListener("mouseleave", handleMouseLeave);
}

// Fungsi hover (mouseover dan mouseleave)
function handleMouseOver() {
    sidebar.classList.add("expand");
    overlay.classList.add("show");
}

function handleMouseLeave() {
    sidebar.classList.remove("expand");
    overlay.classList.remove("show");
}

// Event listener untuk toggle button
hamBurger.addEventListener("click", function () {
    sidebar.classList.toggle("expand");
    overlay.classList.toggle("show");
});

// Menyembunyikan sidebar ketika overlay diklik
overlay.addEventListener("click", function () {
    sidebar.classList.remove("expand");
    overlay.classList.remove("show");
});

// Memastikan hover hanya berfungsi di desktop
function handleResize() {
    if (window.innerWidth > 768) {
        addHoverListeners(); // Aktifkan hover di desktop
    } else {
        removeHoverListeners(); // Nonaktifkan hover di mobile
    }
}

// Tambahkan event listener untuk mendeteksi perubahan ukuran layar
window.addEventListener("resize", handleResize);

// Jalankan fungsi ini pada awal halaman
handleResize();

// Optional: Tooltip functionality
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    </script>

    {{-- <script>
    const hamBurger = document.querySelector(".toggle-btn");
    const sidebar = document.querySelector("#sidebar");
    const overlay = document.querySelector("#overlay");
    const sidebarLinks = document.querySelectorAll("#sidebar a"); // Asumsi elemen link adalah <a>

    hamBurger.addEventListener("mouseover", function () {
        sidebar.classList.add("expand");
        overlay.classList.add("show");
    });

    hamBurger.addEventListener("mouseleave", function () {
        sidebar.classList.remove("expand");
        overlay.classList.remove("show");
    });

    sidebar.addEventListener("mouseover", function () {
        sidebar.classList.add("expand");
        overlay.classList.add("show");
    });

    sidebar.addEventListener("mouseleave", function () {
        sidebar.classList.remove("expand");
        overlay.classList.remove("show");
    });

    // Optional: Tooltip functionality
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
 --}}
