@extends('admin.layouts.app')
@section('content')
    <h1 class="modal-title fw-bolder text-center" id="modal-add-label">Add a new room</h1>

    <form action="{{ route('room.store') }}" method="POST" style="width: 700px; margin: auto;" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 fs-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name"
                value="{{ old('name') }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') border-danger @enderror" id="price" name="price"
                value="{{ old('price') }}">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="describe" class="form-label">Describe</label>
            <textarea name="describe" id="editor">{{ old('describe') }}</textarea>
            @error('describe')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label class="form-label">Image(Tối đa 3 ảnh)</label>
            <input type="file" class="form-control" name="img1" id="img1">
            <img id="previewImage1" src="#" alt="Preview"
                style="max-width: 200px; display: none; margin-top:6px;"><br>
            <input type="file" class="form-control" name="img2" id="img2">
            <img id="previewImage2" src="#" alt="Preview"
                style="max-width: 200px; display: none; margin-top:6px;"><br>
            <input type="file" class="form-control" name="img3" id="img3">
            <img id="previewImage3" src="#" alt="Preview"
                style="max-width: 200px; display: none; margin-top:6px;">
        </div>

        <button type="submit" class="btn btn-primary ms-2">Add</button>
        <a href="{{ route('room.index') }}" class="btn btn-secondary">Back</a>
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

        document.getElementById('img3').addEventListener('change', function() {
            var file = this.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = document.getElementById('previewImage3');
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            }

            reader.readAsDataURL(file);
        });
    </script>
@endsection
