@extends('admin.layouts.app')
@section('content')
    <h1 class="modal-title fw-bolder text-center" id="modal-add-label">News information</h1>
    <div style="width: 700px; margin: auto;">
        <div class="mb-3 fs-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ $news->title }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="editor">{{ $news->content }}</textarea>
        </div>

        <div class="mb-3 fs-4">
            <p class="form-label">Images</p>
            <div style="display: flex; margin-bottom: 10px;">
                @if ($news->img1)
                    <img src="{{ asset($news->img1) }}" alt="" style="height: 100px; margin-right: 10px;">
                    <br>
                @endif
                @if ($news->img2)
                    <img src="{{ asset($news->img2) }}" alt="" style="height: 100px; margin-right: 10px;">
                    <br>
                @endif
            </div>
        </div>

        <a href="{{ route('news.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
