@extends('bookingroom.layout.app')

@section('title')
   Booking Room
@endsection

@section('content')
    <!--Badan Isi-->
    <div style="margin-left: 24px; ">
        <div class="judulhalaman" style="display: flex; align-items: center; margin-top: -12px;">Manage Room</div>
            <div style="display: inline-flex; gap: 12px; margin-left:4px;">
                <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#modal-create-room"> Add New Room
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                            fill="white" />
                    </svg>
                </button>
            </div>

            <div class="tablenih" style="padding-top: -24px;">
                {{-- <div class="judulhalaman " style="text-align: start;">Booking Room</div> --}}
                <div class="table-responsive p-3">
                    <table id="datatable" class="table table-hover"
                    style="font: 300 16px Narasi Sans, sans-serif; margin-top: 12px; display: 100%; width: 100% ;  color: #4A25AA; ">
                    <thead style="font-weight: 500; text-align: center">
                        <tr class="text-center">
                            <th scope="col" style="width: 120px">No.</th>
                            <th scope="col">Room  Name</th>
                            <th scope="col">Max Capacity</th>
                            <th scope="col" style="width: 120px">Action</th>

                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;" class="text-center">
                        @foreach ($rooms as $room)
                            <tr>
                                <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                    <td>{{ $room->room_name }}</td>
                                    <td>{{ $room->capacity }}</td>
                                <td class="text-center">

                                        <span style="display: flex; gap: 2px; justify-content: center">
                                            <a type="button" class="uwuq" data-bs-toggle="modal" data-bs-target="#modal-edit-room" data-id="{{ $room->room_id }}" data-name="{{ $room->room_name }}" data-capacity="{{ $room->capacity }}" data-desc="{{ $room->desc }}">
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('manage-rooms.destroy', $room->room_id )}}" class="">
                                                @csrf
                                                @method('delete')
                                            <button type="submit" class="btn btn-danger m-2"><i class="fas fa-trash-alt"></i>Delete</button>
                                            </form>
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
    <div class="modal justify-content-center fade" id="modal-create-room"  data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form method="POST" action="{{ route('manage-rooms.store') }}" class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif">
                        @csrf
                        <div class="mb-3">
                            <label for="room_name" class="form-label">{{ __('Room Name') }}</label>
                            <input id="room_name" type="text" class="form-control @error('room_name') is-invalid @enderror" name="room_name" value="{{ old('room_name') }}" required autocomplete="room_name">
                            @error('room_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="capacity" class="form-label">{{ __('Room Capacity') }}</label>
                            <input id="capacity" type="number" class="form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ old('capacity') }}" required autocomplete="capacity">

                            @error('capacity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
            </div>
        </div>
    </div>


    <div class="modal justify-content-center fade" id="modal-edit-room" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body bg-white">
                    <form method="POST" action="" class="modal-form-check" style="font: 500 14px Narasi Sans, sans-serif" id="edit-room-form">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="room_name" class="form-label">{{ __('Room Name') }}</label>
                            <input id="modal-room-name" type="text" class="form-control @error('room_name') is-invalid @enderror" name="room_name" value="{{ old('room_name') }}" required autocomplete="room_name">
                            @error('room_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="capacity" class="form-label">{{ __('Room Capacity') }}</label>
                            <input id="modal-capacity" type="number" class="form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ old('capacity') }}" required autocomplete="capacity">
                            @error('capacity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="button-submit">Submit</button>
                        <button type="button" class="button-tutup" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
                <img class="img-8" src="{{ asset('asset/image/Narasi_Logo.svg')  }}" alt=" " />
            </div>
        </div>
    </div>

@endsection

@section('custom-js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var editButtons = document.querySelectorAll('.uwuq');
    var editForm = document.getElementById('edit-room-form');
    var roomNameInput = document.getElementById('modal-room-name');
    var capacityInput = document.getElementById('modal-capacity');

    editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var roomId = this.getAttribute('data-id');
            var roomName = this.getAttribute('data-name');
            var capacity = this.getAttribute('data-capacity');


            editForm.setAttribute('action', '/manage-rooms/' + roomId + '/update');

            roomNameInput.value = roomName;
            capacityInput.value = capacity;
        });
    });
});
</script>

@endsection
