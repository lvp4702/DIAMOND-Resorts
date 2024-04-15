@extends('admin.layouts.app')
@section('content')

    <h1 class="modal-title fw-bolder text-center" id="modal-add-label">Customer comment response</h1>

    <form action="{{ route('comment.update', $comment) }}" method="POST" style="width: 700px; margin: auto;">
        @csrf
        @method('PUT')

        <div class="mb-3 fs-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" value="{{ $comment->user->username }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="room" class="form-label">Room</label>
            <input type="text" class="form-control" id="room" value="{{ $comment->room->name }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="comment" class="form-label">Comment</label>
            <textarea type="text" rows="4" class="form-control" id="comment" disabled>{{ $comment->content }}</textarea>
        </div>

        <div class="mb-3 fs-4">
            <label for="reply" class="form-label">Reply</label>
            <textarea type="text" rows="4" class="form-control @error('reply') border-danger @enderror"
                id="reply" name="reply"></textarea>
            @error('reply')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary ms-2">Send</button>
        <a href="{{ route('comment.index') }}" class="btn btn-secondary">Back</a>
    </form>

@endsection
