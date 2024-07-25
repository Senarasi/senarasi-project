@extends('layout.index2')

@section('title')
    Dashboard - Budgeting System
@endsection

@section('content')
<div class="kitacobain">
    <div class="container">
        <div class="beruda">
            <div style="display: flex; gap: 8px">
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46" fill="none">
                    <rect width="46" height="46" rx="23" fill="#F1F1F1" />
                    <path d="M23 19.7143C26.2663 19.7143 28.9143 17.0664 28.9143 13.8C28.9143 10.5336 26.2663 7.88571 23 7.88571C19.7336 7.88571 17.0857 10.5336 17.0857 13.8C17.0857 17.0664 19.7336 19.7143 23 19.7143Z" fill="#75757E" />
                    <path
                        d="M34.1715 31.5429C34.1715 35.1718 34.1715 38.1143 23 38.1143C11.8286 38.1143 11.8286 35.1718 11.8286 31.5429C11.8286 27.914 16.8306 24.9714 23 24.9714C29.1695 24.9714 34.1715 27.914 34.1715 31.5429Z"
                        fill="#75757E"
                    />
                </svg>
                <div>
                    <p style="font-weight: 500; margin-bottom: -4px">IT NARASI</p>
                    <p style="font-weight: 300; font-size: 14px">27 Maret 2024</p>
                </div>
            </div>
            {{-- <img src="{{ asset('asset/image/construction.jpg') }}"  style="width:700px; height:700px; justify-" alt="Responsive image" /> --}}
            <div style="margin-top: 100px">
                <img src="{{ asset('image/construction.png') }}" alt="" style="margin-bottom: -350px; margin-left: 550px">
                <p style="text-align: center; padding-top: 310px; font: 600 48px Narasi Sans, sans-serif; color: #4a25aa">WEBSITE UNDER CONSTRUCTION</p>
            </div>
        </div>
    </div>
    <div class="position-absolute  end-0" style="margin-bottom: 120px">
        <div class="wokwok" style="margin-top: -32px; margin-bottom: 24px; margin-right: 42px;">
            <div class="wkwk"></div>
            <div class="wikwik"></div>
        </div>
        <div>
            {{-- <a href="#" class="markicob">
                <div class="bercoba">Asset Management System</div>
                <div class="bercabe">Asset Information and Requests</div>
            </a> --}}
            <a href="/dashboard-budget" class="markicob">
                <div class="bercoba">Budgeting System</div>
                <div class="bercabe">Budget Information and Budget Requests</div>
            </a>
            <a href="{{ route('company-document.index') }}" class="markicob">
                <div class="bercoba">Company File Documents</div>
                <div class="bercabe">List of Company File Document </div>
            </a>
            <a href="/transport-request" class="markicob">
                <div class="bercoba">Transportation Request</div>
                <div class="bercabe">Request Driver and Transportation</div>
            </a>
            {{-- <a href="/payment-request" class="markicob">
                <div class="bercoba">Payment Request</div>
                <div class="bercabe">Request for Payment of Company Invoices </div>
            </a> --}}
            <a href="{{ route('bookingroom.index') }}" class="markicob">
                <div class="bercoba">Booking Room</div>
                <div class="bercabe">Book Room Meeting</div>
            </a>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
    <script>        // Mengambil elemen-elemen dengan kelas yang sesuai
        const wkwkElement = document.querySelector('.wkwk');
        const wikwikElement = document.querySelector('.wikwik');

        // Fungsi untuk mendapatkan tanggal dan jam saat ini
        function updateDateTime() {
            // Mendapatkan waktu saat ini
            const now = new Date();

            // Array nama bulan dalam bahasa Indonesia
            const monthNames = [
                "Januari", "Februari", "Maret",
                "April", "Mei", "Juni", "Juli",
                "Agustus", "September", "Oktober",
                "November", "Desember"
            ];

            // Mendapatkan tanggal dalam format 'DD MonthName YYYY'
            const date = now.getDate() + ' ' + monthNames[now.getMonth()] + ' ' + now.getFullYear();

            // Mendapatkan jam, menit, dan detik
            const hour = ('0' + now.getHours()).slice(-2); // Menambahkan 0 di depan jika jam hanya satu digit
            const minute = ('0' + now.getMinutes()).slice(-2); // Menambahkan 0 di depan jika menit hanya satu digit
            const second = ('0' + now.getSeconds()).slice(-2); // Menambahkan 0 di depan jika detik hanya satu digit

            // Format jam dalam format 'HH:MM:SS WIB'
            const time = hour + ':' + minute + ':' + second + ' WIB';

            // Memasukkan tanggal dan jam ke dalam elemen-elemen
            wkwkElement.textContent = date;
            wikwikElement.textContent = time;
        }

        // Memanggil fungsi updateDateTime setiap detik (untuk mengupdate waktu secara otomatis)
        setInterval(updateDateTime, 1000);

        // Memanggil updateDateTime saat pertama kali halaman dimuat
        updateDateTime();
    </script>
@endsection
