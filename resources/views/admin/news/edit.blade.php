@extends('admin.layouts.app')
@section('content')
    <h1 class="modal-title fw-bolder text-center" id="modal-add-label">News information editing</h1>

    <form action="{{ route('news.update', $news) }}" method="POST" style="width: 700px; margin: auto;" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 fs-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') border-danger @enderror" id="title" name="title"
                value="{{ $news->title }}">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="editor">{{ $news->content }}</textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <p class="form-label">Image(Tối đa 2 ảnh)</p>
            <div style="display: flex; margin-bottom: 10px;">
                @if ($news->img1)
                    <img src="{{ asset($news->img1) }}" alt="" style="width: 100px; height: 100px; margin-right: 10px;"> <br>
                @endif
                @if ($news->img2)
                    <img src="{{ asset($news->img2) }}" alt="" style="width: 100px; height: 100px; margin-right: 10px;"> <br>
                @endif
            </div>

            <input type="file" class="form-control" name="img1" id="img1">
            <img id="previewImage1" src="#" alt="Preview"
                style="max-width: 200px; display: none; margin-top:6px;"> <br>

            <input type="file" class="form-control" name="img2" id="img2">
            <img id="previewImage2" src="#" alt="Preview"
                style="max-width: 200px; display: none; margin-top:6px;"> <br>

        </div>

        <button type="submit" class="btn btn-primary ms-2">Update</button>
        <a href="{{ route('news.index') }}" class="btn btn-secondary">Back</a>
    </form>

    <script>
        //render img
        document.getElementById('img1').addEventListener('change', function() {
            var file = this.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = document.getElementById('previewImage1');
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            }

            reader.readAsDataURL(file);
        });

        document.getElementById('img2').addEventListener('change', function() {
            var file = this.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = document.getElementById('previewImage2');
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            }

            reader.readAsDataURL(file);
        });
    </script>
@endsection
