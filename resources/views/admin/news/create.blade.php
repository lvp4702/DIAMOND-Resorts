@extends('admin.layouts.app')
@section('content')
    <h1 class="modal-title fw-bolder text-center" id="modal-add-label">Add a news</h1>

    <form action="{{ route('news.store') }}" method="POST" style="width: 700px; margin: auto;" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 fs-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') border-danger @enderror" id="title" name="title"
                value="{{ old('title') }}">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="editor">{{ old('content') }}</textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label class="form-label">Image(Tối đa 2 ảnh)</label>

            <input type="file" class="form-control" name="img1" id="img1">
            <img id="previewImage1" src="#" alt="Preview"
                style="max-width: 200px; display: none; margin-top:6px;"><br>

            <input type="file" class="form-control" name="img2" id="img2">
            <img id="previewImage2" src="#" alt="Preview"
                style="max-width: 200px; display: none; margin-top:6px;"><br>

        </div>

        <button type="submit" class="btn btn-primary ms-2">Add</button>
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
