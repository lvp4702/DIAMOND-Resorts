@extends('admin.layouts.app')
@section('content')
    <div class="content_top">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add">
            <i class="fa-solid fa-plus"></i> Add new
        </button>
    </div>
    <div class="listSlide">
        @foreach ($slides as $slide)
            <div class="item">
                <img src="{{ asset($slide->image) }}" alt="">
                <form action="{{ route('slide.destroy', $slide) }}" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-delete btn_delete_slide" onclick="return confirmDelete()">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </form>
            </div>
        @endforeach
    </div>
    @include('admin.slide.add')
    <script>
        function confirmDelete() {
            if (confirm('Bạn có chắc chắn muốn xóa?')) {
                document.getElementById('deleteForm').submit();
            } else {
                return false;
            }
        }
    </script>
@endsection
