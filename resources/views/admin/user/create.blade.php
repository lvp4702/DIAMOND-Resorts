@extends('admin.layouts.app')
@section('content')

<h1 class="modal-title fw-bolder text-center" id="modal-add-label">Add a new user</h1>

    <form action="{{ route('user.store') }}" method="POST" style="width: 700px; margin: auto;" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 fs-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') border-danger @enderror" id="username" name="username" value="{{ old('username') }}">
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') border-danger @enderror" id="password" name="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') border-danger @enderror"  id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control @error('fullname') border-danger @enderror"  id="fullname" name="fullname" value="{{ old('fullname') }}">
            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="phoneNumber" class="form-label">Phone number</label>
            <input type="text" class="form-control @error('phoneNumber') border-danger @enderror"  id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}">
            @error('phoneNumber')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control @error('address') border-danger @enderror"  id="address" name="address" value="{{ old('address') }}">
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <p class="form-label">Avatar</p>
            <input type="file" class="form-control" name="avatar" id="avatar" style="margin: 10px 0">
            <img id="previewAvatar" src="#" alt="Preview" style="display: none; width: 100px; height: 100px;">
        </div>

        <div class="mb-3 fs-4">
            <label for="role_id" class="form-label">Role</label>
            <select name="role_id" id="role_id" class="form-select @error('role_id') border-danger @enderror">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary ms-2">Add</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
    </form>

    <script>
        //render img
        document.getElementById('avatar').addEventListener('change', function() {
                var file = this.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    var previewImage = document.getElementById('previewAvatar');
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                }

                reader.readAsDataURL(file);
            });
    </script>

@endsection
