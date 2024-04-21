@extends('admin.layouts.app')
@section('content')
    <h1 class="modal-title fw-bolder text-center" id="modal-add-label">Room information</h1>
    <div style="width: 700px; margin: auto;">
        <div class="mb-3 fs-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $room->name }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $room->price }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="describe" class="form-label">Describe</label>
            <textarea name="describe" id="editor">{{ $room->describe }}</textarea>
        </div>

        <div class="mb-3 fs-4">
            <p class="form-label">Images</p>
            <div style="display: flex; margin-bottom: 10px;">
                @if ($room->img1)
                    <img src="{{ asset($room->img1) }}" alt=""
                        style="height: 100px; margin-right: 10px;"> <br>
                @endif
                @if ($room->img2)
                    <img src="{{ asset($room->img2) }}" alt=""
                        style="height: 100px; margin-right: 10px;"> <br>
                @endif
                @if ($room->img3)
                    <img src="{{ asset($room->img3) }}" alt=""
                        style="height: 100px; margin-right: 10px;"> <br>
                @endif
            </div>
        </div>

        <a href="{{ route('room.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
