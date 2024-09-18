
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
width: 260px;
min-width: 260px;
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
                    <a  href="{{ route('bookingroom.index') }}" class="sidebar-link {{ request()->routeIs('bookingroom.index','bookingroom.create', 'bookingroom.edit' ) ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 19 19" fill="none">
                            <path d="M0.5 18.9092V16.9092H2.5V0.90918H12.5V1.90918H16.5V16.9092H18.5V18.9092H14.5V3.90918H12.5V18.9092H0.5ZM8.5 10.9092C8.78333 10.9092 9.021 10.8132 9.213 10.6212C9.405 10.4292 9.50067 10.1918 9.5 9.90918C9.49933 9.62651 9.40333 9.38918 9.212 9.19718C9.02067 9.00518 8.78333 8.90918 8.5 8.90918C8.21667 8.90918 7.97933 9.00518 7.788 9.19718C7.59667 9.38918 7.50067 9.62651 7.5 9.90918C7.49933 10.1918 7.59533 10.4295 7.788 10.6222C7.98067 10.8148 8.218 10.9105 8.5 10.9092ZM4.5 16.9092H10.5V2.90918H4.5V16.9092Z" fill="white"/>
                          </svg>
                        <span style="vertical-align: middle">Booking Room</span>
                    </a>
                </li>
                <li class="sidebar-item" style="list-style: none;">
                    <a href="{{ route('bookingroom.list') }}" class="sidebar-link {{ request()->routeIs('bookingroom.list' ) ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 18 17" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5455 1.63636H2.45455C2.23755 1.63636 2.02944 1.72256 1.876 1.876C1.72256 2.02944 1.63636 2.23755 1.63636 2.45455V13.9091C1.63636 14.1261 1.72256 14.3342 1.876 14.4876C2.02944 14.6411 2.23755 14.7273 2.45455 14.7273H15.5455C15.7624 14.7273 15.9706 14.6411 16.124 14.4876C16.2774 14.3342 16.3636 14.1261 16.3636 13.9091V2.45455C16.3636 2.23755 16.2774 2.02944 16.124 1.876C15.9706 1.72256 15.7624 1.63636 15.5455 1.63636ZM2.45455 0C1.80356 0 1.17924 0.258603 0.71892 0.71892C0.258603 1.17924 0 1.80356 0 2.45455V13.9091C0 14.5601 0.258603 15.1844 0.71892 15.6447C1.17924 16.105 1.80356 16.3636 2.45455 16.3636H15.5455C16.1964 16.3636 16.8208 16.105 17.2811 15.6447C17.7414 15.1844 18 14.5601 18 13.9091V2.45455C18 1.80356 17.7414 1.17924 17.2811 0.71892C16.8208 0.258603 16.1964 0 15.5455 0H2.45455ZM4.09091 4.09091H5.72727V5.72727H4.09091V4.09091ZM8.18182 4.09091C7.96482 4.09091 7.75672 4.17711 7.60328 4.33055C7.44984 4.48399 7.36364 4.6921 7.36364 4.90909C7.36364 5.12609 7.44984 5.33419 7.60328 5.48763C7.75672 5.64107 7.96482 5.72727 8.18182 5.72727H13.0909C13.3079 5.72727 13.516 5.64107 13.6695 5.48763C13.8229 5.33419 13.9091 5.12609 13.9091 4.90909C13.9091 4.6921 13.8229 4.48399 13.6695 4.33055C13.516 4.17711 13.3079 4.09091 13.0909 4.09091H8.18182ZM5.72727 7.36364H4.09091V9H5.72727V7.36364ZM7.36364 8.18182C7.36364 7.96482 7.44984 7.75672 7.60328 7.60328C7.75672 7.44984 7.96482 7.36364 8.18182 7.36364H13.0909C13.3079 7.36364 13.516 7.44984 13.6695 7.60328C13.8229 7.75672 13.9091 7.96482 13.9091 8.18182C13.9091 8.39881 13.8229 8.60692 13.6695 8.76036C13.516 8.9138 13.3079 9 13.0909 9H8.18182C7.96482 9 7.75672 8.9138 7.60328 8.76036C7.44984 8.60692 7.36364 8.39881 7.36364 8.18182ZM5.72727 10.6364H4.09091V12.2727H5.72727V10.6364ZM7.36364 11.4545C7.36364 11.2376 7.44984 11.0294 7.60328 10.876C7.75672 10.7226 7.96482 10.6364 8.18182 10.6364H13.0909C13.3079 10.6364 13.516 10.7226 13.6695 10.876C13.8229 11.0294 13.9091 11.2376 13.9091 11.4545C13.9091 11.6715 13.8229 11.8796 13.6695 12.0331C13.516 12.1865 13.3079 12.2727 13.0909 12.2727H8.18182C7.96482 12.2727 7.75672 12.1865 7.60328 12.0331C7.44984 11.8796 7.36364 11.6715 7.36364 11.4545Z" fill="white"/>
                          </svg>
                        <span style="vertical-align: middle">Booking List</span>
                    </a>
                </li>
                <li class="sidebar-item" style="list-style: none;">
                    <a href="{{ route('manage-rooms.index') }}"class="sidebar-link {{ request()->routeIs('manage-rooms.index' ) ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20" fill="none">
                            <path d="M9.57567 7.10426L5.92065 8.60995V12.3219C5.92065 14.3107 9.99989 16.2104 9.99989 16.2104C9.99989 16.2104 14.0791 14.3107 14.0791 12.3219V8.60995L10.4241 7.10426C10.2897 7.04833 10.1455 7.01953 9.99989 7.01953C9.85428 7.01953 9.7101 7.04833 9.57567 7.10426Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.41162 11.3997L9.82099 12.7993L12.088 9.88672" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.7437 8.31541L10.9462 1.36101C10.6859 1.12851 10.3491 1 10 1C9.65095 1 9.31412 1.12851 9.05377 1.36101L1.25628 8.31541C0.733793 8.78147 1.06363 9.64694 1.76418 9.64694H2.76149V17.731C2.76162 18.0244 2.87828 18.3058 3.08583 18.5133C3.29337 18.7207 3.57481 18.8373 3.86826 18.8373H16.1317C16.4252 18.8373 16.7066 18.7207 16.9142 18.5133C17.1217 18.3058 17.2384 18.0244 17.2385 17.731V9.64645H18.2358C18.9364 9.64645 19.2662 8.78098 18.7437 8.31492V8.31541Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        <span style="vertical-align: middle">Manage Room</span>
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