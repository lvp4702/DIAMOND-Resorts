<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderByDesc('id')->paginate(3);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
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

        News::create($body);
        return redirect()->route('news.index')->with('message', 'Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.detail', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
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

        $news->update($body);
        return redirect()->route('news.index')->with('message', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('message', 'Xóa thành công!');
    }
}
