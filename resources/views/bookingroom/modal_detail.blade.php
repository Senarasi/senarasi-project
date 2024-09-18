<style>
    .custom-tooltip {
  --bs-tooltip-bg: var(--bd-violet-bg);
  --bs-tooltip-color: var(--bs-white);
}
svg {
    pointer-events: all;
}

</style>

<div class="modal justify-content-center fade" id="modal-{{ $booking->id }}"  data-bs-keyboard="false"
        tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-body bg-white">
                <div class="row">
                    <div class="col mb-3" style="color: gray">Created Date :{{ \Carbon\Carbon::parse($booking->created_at)->translatedFormat('d F Y H:i') }}</div>
                    <div class="col mb-3" style="color: gray">Update Date :{{ \Carbon\Carbon::parse($booking->updated_at)->translatedFormat('d F Y H:i') }}</div>

                </div>

                <h4 class="mb-3" style="font-weight: 700">{{ $booking->br_number }}</h4>
                <div class="mb-3" style="font-weight: 500; text-transform:uppercase">{{ $booking->desc }}</div>
                <hr>
                <div class="row ">
                    <div class="col">
                        <div class="mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 12px;" height="16" width="17" viewBox="0 0 576 512"  data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="Room Name">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4a25aa" d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                            <span class="align-middle">{{ $booking->room->room_name }}
                            </span>
                        </div>

                        <div class="mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 14px;" height="16" width="16.25" viewBox="0 0 448 512" data-bs-toggle="tooltip" data-bs-title="Default tooltip">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4a25aa" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                            <span class="align-middle">{{ $booking->user->full_name }}
                            </span>
                        </div>

                        <div class="mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 14px;" height="16" width="16" viewBox="0 0 512 512" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="CP Booking (whatsapp)">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4a25aa" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                            <span class="align-middle">
                                <a style="text-decoration: none; vertical-align: middle;" href="https://wa.me/+62{{ $booking->user->phone }}" target="_blank">{{ $booking->user->phone }}</a></div>
                            </span>

                        <div class="mb-3">

                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 14px;" height="16" width="16.25" viewBox="0 0 448 512" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="Date">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4a25aa" d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                            <span class="align-middle">
                                @if (\Carbon\Carbon::parse($booking->start)->isSameDay(\Carbon\Carbon::parse($booking->end)))
                                {{ \Carbon\Carbon::parse($booking->start)->translatedFormat('d F Y') }}
                            @else
                                {{ \Carbon\Carbon::parse($booking->start)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($booking->end)->translatedFormat('d F Y') }}
                            @endif
                            </span>

                        </div>
                        <div class="mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 14px;" height="16" width="16" viewBox="0 0 512 512" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="Time">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4a25aa" d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                            <span class="align-middle">
                                {{ \Carbon\Carbon::parse($booking->start)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->end)->format('H:i') }}</div>
                            </span>


                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <span><strong>Participants</strong></span>
                            {{-- <svg xmlns="http://www.w3.org/2000/svg"  style="margin-right: 14px;" height="16" width="21.5" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4a25aa" d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3l0-84.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5l0 21.5c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32l0-26.8C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112l32 0c24 0 46.2 7.5 64.4 20.3zM448 416l0-21.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176l32 0c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2l0 26.8c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7l0 84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3l0-84.7c-10 11.3-16 26.1-16 42.3zm144-42.3l0 84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2l0 42.8c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32l0-42.8c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112l32 0c61.9 0 112 50.1 112 112z"/></svg> --}}
                            <ul class="pt-2">
                                @foreach ($booking->guests as $guest)
                                    <li>{{ $guest->user->full_name }}</li>
                                @endforeach
                                @foreach ($booking->externalGuests as $externalguest)
                                    <li>{{ $externalguest->email }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>






                <input type="hidden" id="eventModalBookingId" value="">
                <div class="modal-footer" style="border: none; margin-bottom: -12px">

                        @if($booking->isBookingDatePassed())
                        <button type="button" class="btn btn-primary disabled" style="background-color: #4a25aa; border:0;">Edit</button>
                        @else
                        <a href="{{ route('bookingroom.edit', $booking->id) }}" class="uwuq">Edit</a>
                        @endif
                        <form action="{{ route('bookingroom.destroy', $booking->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                </div>

            </div>
            <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
        </div>
    </div>
</div>


<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
