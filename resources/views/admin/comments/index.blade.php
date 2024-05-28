@extends('admin.layouts.app')
@section('content')
    <div class="content_top">
        <a class="btn btn-outline-info" href="{{ route('comment.daPhanHoi') }}" style="float: left;">Đã phản hồi</a>
        <a class="btn btn-outline-info" href="{{ route('comment.chuaPhanHoi') }}" style="float: left;">Chưa phản hồi</a>
    </div>
    <div id="list_comments">
        <table class="tbl" id="tbl_comments">
            <thead style="border-bottom: 1px solid #ccc;">
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Room</th>
                    <th>Comment</th>
                    <th>Satisfaction</th>
                    <th>Time</th>
                    <th>Reply</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->user->username }}</td>
                        <td>{{ $comment->room->name }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>{{ $comment->satisfaction }}</td>
                        <td>{{ $comment->created_at->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $comment->reply }}</td>
                        <td style="float: left; display: flex;">
                            <form action="{{ route('comment.edit', $comment) }}" method="GET" id="editForm">
                                @csrf

                                <button title="Reply" type="submit" class="btn btn-outline-success btn-edit">
                                    <i class="fa-solid fa-reply"></i>
                                </button>
                            </form>
                            <form action="{{ route('comment.destroy', $comment) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')

                                <button title="Delete" type="submit" class="btn btn-outline-danger btn-delete"
                                    onclick="return confirmDelete()">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $comments->links() }}
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
