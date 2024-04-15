@extends('admin.layouts.app')
@section('content')
    <div class="content_top">
        <a class="btn btn-primary" href="{{ route('user.create') }}">
            <i class="fa-solid fa-plus"></i> Add new
        </a>
    </div>
    <div id="list_user">
        <table class="tbl" id="tbl_user">
            <thead style="border-bottom: 1px solid #ccc;">
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Fullname</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Date created</th>
                    <th>Date verified</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <div style="display: flex; align-items: center;">
                                @if ($user->avatar)
                                    <img src="{{ asset($user->avatar) }}" alt="">
                                @endif
                                {{ $user->username }}
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->phoneNumber }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td>{{ $user->email_verified_at ? $user->email_verified_at->format('Y-m-d') : 'Chưa xác minh' }}
                        </td>
                        <td>{{ $user->role->name }}</td>
                        <td style="float: left; display: flex;">
                            <form action="{{ route('user.edit', $user) }}" method="GET" id="editForm">
                                @csrf

                                <button title="Edit" type="submit" class="btn btn-success btn-edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </form>
                            <form action="{{ route('user.destroy', $user) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')

                                <button title="Delete" type="submit" class="btn btn-danger btn-delete"
                                    onclick="return confirmDelete()">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
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
