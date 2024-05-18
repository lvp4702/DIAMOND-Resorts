@extends('admin.layouts.app')
@section('content')
    <div class="content_top">
        <a class="btn btn-primary" href="{{ route('user.create') }}">
            <i class="fa-solid fa-plus"></i> Add new
        </a>
        <a class="btn btn-outline-info" href="{{ route('user.customer') }}" style="float: left;">Khách hàng</a>
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
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>
                            <div style="display: flex; align-items: center;">
                                @if ($employee->avatar)
                                    <img src="{{ asset($employee->avatar) }}" alt="">
                                @endif
                                {{ $employee->username }}
                            </div>
                        </td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->fullname }}</td>
                        <td>{{ $employee->phoneNumber }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>{{ $employee->created_at->format('Y-m-d') }}</td>
                        <td>{{ $employee->email_verified_at ? $employee->email_verified_at->format('Y-m-d') : 'Chưa xác minh' }}
                        </td>
                        <td>{{ $employee->role->name }}</td>
                        <td style="float: left; display: flex;">
                            <form action="{{ route('user.edit', $employee) }}" method="GET" id="editForm">
                                @csrf

                                <button title="Edit" type="submit" class="btn btn-outline-success btn-edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </form>
                            <form action="{{ route('user.destroy', $employee) }}" method="POST" id="deleteForm">
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
        {{ $employees->links() }}
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
