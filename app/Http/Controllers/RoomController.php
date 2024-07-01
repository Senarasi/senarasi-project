<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\MeetingRoom;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = MeetingRoom::all();
        return view('bookingroom.manage-room', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(RoomRequest $request)
    {
        $data = $request->validated();

        MeetingRoom::create($data);

        return redirect()->route('manage-rooms.index')->with('status', 'Room added successfully!');
    }

    public function edit(MeetingRoom $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(MeetingRoom $room, RoomRequest $request)
    {
        $data = $request->validated();

        $room->update($data);

        return redirect()->route('manage-rooms.index')->with('status', 'Rooms successfully updated!');
    }

    public function destroy(MeetingRoom $room)
    {
        $room->delete();

        return redirect()->route('manage-rooms.index')->with('status', 'Rooms successfully deleted!');
    }
}
