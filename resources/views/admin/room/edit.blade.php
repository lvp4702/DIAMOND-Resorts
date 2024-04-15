@extends('admin.layouts.app')
@section('content')
    <h1 class="modal-title fw-bolder text-center" id="modal-add-label">Room information editing</h1>

    <form action="{{ route('room.update', $room) }}" method="POST" style="width: 700px; margin: auto;"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 fs-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name"
                value="{{ old('name', $room->name) }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') border-danger @enderror" id="price" name="price"
                value="{{ old('price', $room->price) }}">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="describe" class="form-label">Describe</label>
            <textarea class="form-control @error('describe') border-danger @enderror" name="describe" id="describe">{{ old('describe', $room->describe) }}</textarea>
            @error('describe')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <p class="form-label">Image(Tối đa 3 ảnh)</p>
            <div style="display: flex; margin-bottom: 10px;">
                @if ($room->img1)
                    <img src="{{ asset($room->img1) }}" alt="" style="width: 100px; height: 100px; margin-right: 10px;"> <br>
                @endif
                @if ($room->img2)
                    <img src="{{ asset($room->img2) }}" alt="" style="width: 100px; height: 100px; margin-right: 10px;"> <br>
                @endif
                @if ($room->img3)
                    <img src="{{ asset($room->img3) }}" alt="" style="width: 100px; height: 100px; margin-right: 10px;"> <br>
                @endif
            </div>
            <input type="file" class="form-control" name="img1" id="img1">
            <img id="previewImage1" src="#" alt="Preview"
                style="max-width: 200px; display: none; margin-top:6px;"><br>
            <input type="file" class="form-control" name="img2" id="img2">
            <img id="previewImage2" src="#" alt="Preview"
                style="max-width: 200px; display: none; margin-top:6px;"><br>
            <input type="file" class="form-control" name="img3" id="img3">
            <img id="previewImage3" src="#" alt="Preview" style="max-width: 200px; display: none; margin-top:6px;">
        </div>

        <button type="submit" class="btn btn-primary ms-2">Update</button>
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
