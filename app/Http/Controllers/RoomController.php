<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('bookingroom.manage-room', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        $data = $request->validated();

        Room::create($data);

        return redirect()->route('manage-rooms.index')->with('status', 'Room added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Room $room, RoomRequest $request)
    {
        $data = $request->validated();

        $room->update($data);

        return redirect()->route('manage-rooms.index')->with('status', 'Rooms successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('manage-rooms.index')->with('status', 'Rooms successfully deleted!');
    }
}
