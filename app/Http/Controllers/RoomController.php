<?php

namespace App\Http\Controllers;

use App\Http\Requests\Room\StoreRoomRequest;
use App\Http\Requests\Room\UpdateRoomRequest;
use App\Models\Room;

use function Laravel\Prompts\error;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::orderByDesc('id')->paginate(3);

        return view('admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $body = $request->all();

        if ($request->hasFile('img1')) {
            $ext = $request->file('img1')->extension();
            $generate_unique_file_name = md5(time() . '1') . '.' . $ext;
            $request->file('img1')->move('images', $generate_unique_file_name, 'local');

            $body['img1'] = 'images/' . $generate_unique_file_name;

        }

        if ($request->hasFile('img2')) {
            $ext = $request->file('img2')->extension();
            $generate_unique_file_name = md5(time() . '2') . '.' . $ext;
            $request->file('img2')->move('images', $generate_unique_file_name, 'local');

            $body['img2'] = 'images/' . $generate_unique_file_name;
        }

        if ($request->hasFile('img3')) {
            $ext = $request->file('img3')->extension();
            $generate_unique_file_name = md5(time() . '3') . '.' . $ext;
            $request->file('img3')->move('images', $generate_unique_file_name, 'local');

            $body['img3'] = 'images/' . $generate_unique_file_name;
        }

        Room::create($body);
        return redirect()->route('room.index')->with('message', 'Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('admin.room.detail', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('admin.room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $body = $request->all();

        if ($request->hasFile('img1')) {
            $ext = $request->file('img1')->extension();
            $generate_unique_file_name = md5(time() . '1') . '.' . $ext;
            $request->file('img1')->move('images', $generate_unique_file_name, 'local');

            $body['img1'] = 'images/' . $generate_unique_file_name;

        }

        if ($request->hasFile('img2')) {
            $ext = $request->file('img2')->extension();
            $generate_unique_file_name = md5(time() . '2') . '.' . $ext;
            $request->file('img2')->move('images', $generate_unique_file_name, 'local');

            $body['img2'] = 'images/' . $generate_unique_file_name;
        }

        if ($request->hasFile('img3')) {
            $ext = $request->file('img3')->extension();
            $generate_unique_file_name = md5(time() . '3') . '.' . $ext;
            $request->file('img3')->move('images', $generate_unique_file_name, 'local');

            $body['img3'] = 'images/' . $generate_unique_file_name;
        }

        $room->update($body);
        return redirect()->route('room.index')->with('message', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('room.index')->with('message', 'Xóa thành công!');
    }
}
