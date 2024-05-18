@extends('admin.layouts.app')
@section('content')
    <div class="content_top">
        <a class="btn btn-primary" href="{{ route('news.create') }}">
            <i class="fa-solid fa-plus"></i> Add new
        </a>
    </div>
    <div id="list_news">
        <table class="tbl" id="tbl_news">
            <thead style="border-bottom: 1px solid #ccc;">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Date created</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($news as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <textarea cols="35" rows="4" style="resize: none; padding: 4px">{{ $item->content }}</textarea>
                        </td>
                        <td><img src="{{ asset($item->img1) }}" alt="Image" class="news_img"></td>
                        <td>{{ $item->created_at }}</td>
                        <td style="float: left; display: flex;">
                            <form action="{{ route('news.edit', $item) }}" method="GET" id="editForm">
                                @csrf

                                <button title="Edit" type="submit" class="btn btn-outline-success btn-edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </form>

                            <form action="{{ route('news.destroy', $item) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')

                                <button title="Delete" type="submit" class="btn btn-outline-danger btn-delete" onclick="return confirmDelete()">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>

                            <form action="{{ route('news.show', $item) }}" method="GET" id="detailForm">
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
        {{ $news->links() }}
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
