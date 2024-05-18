@extends('admin.layouts.app')
@section('content')
    <div class="content_top">
        <a class="btn btn-primary" href="{{ route('room.create') }}">
            <i class="fa-solid fa-plus"></i> Add new
        </a>
    </div>
    <div id="list_room">
        <table class="tbl" id="tbl_room">
            <thead style="border-bottom: 1px solid #ccc;">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price($)</th>
                    <th>Describe</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->price }}</td>
                        <td>
                            <textarea cols="40" rows="4" style="resize: none; padding: 4px">{{ $room->describe }}</textarea>
                        </td>
                        <td><img src="{{ asset($room->img1) }}" alt="Image" class="room_img"></td>
                        <td style="float: left; display: flex;">
                            <form action="{{ route('room.edit', $room) }}" method="GET" id="editForm">
                                @csrf

                                <button title="Edit" type="submit" class="btn btn-outline-success btn-edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </form>

                            <form action="{{ route('room.destroy', $room) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')

                                <button title="Delete" type="submit" class="btn btn-outline-danger btn-delete" onclick="return confirmDelete()">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>

                            <form action="{{ route('room.show', $room) }}" method="GET" id="detailForm">
                                @csrf

                                <button title="Detail" type="submit" class="btn btn-outline-warning btn-detail">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $rooms->links() }}
        <script>
            function confirmDelete() {
                if (confirm('Bạn có chắc chắn muốn xóa?')) {
                    document.getElementById('deleteForm').submit();
                } else {
                    return false;
                }
            }
        </script>
    </div>
@endsection
