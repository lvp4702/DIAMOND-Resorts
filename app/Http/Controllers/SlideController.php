<?php

namespace App\Http\Controllers;

use App\Http\Requests\Slide\SlideRequest;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = Slide::orderByDesc('id')->get();

        return view('admin.slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SlideRequest $request)
    {
        $image = '';
        if ($request->hasFile('image')) {
            $ext = $request->file('image')->extension();
            $generate_unique_file_name = md5(time()) . '.' . $ext;
            $request->file('image')->move('images', $generate_unique_file_name, 'local');

            $image = 'images/' . $generate_unique_file_name;
        }
        else
        {
            return redirect()->route('slide.index')->with('error', 'Thêm mới không thành công!');
        }
        Slide::create(['image' => $image]);
        return redirect()->route('slide.index')->with('message', 'Thêm mới thành công!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        $slide->delete();
        return redirect()->route('slide.index')->with('message', 'Xóa thành công!');
    }
}
