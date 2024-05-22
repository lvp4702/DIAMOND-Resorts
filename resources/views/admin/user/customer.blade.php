@extends('admin.layouts.app')
@section('content')
    <div class="content_top">
        <a class="btn btn-primary" href="{{ route('user.create') }}">
            <i class="fa-solid fa-plus"></i> Add new
        </a>
        <a class="btn btn-outline-info" href="{{ route('user.employee') }}" style="float: left;">Nhân viên</a>
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
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>
                            <div style="display: flex; align-items: center;">
                                @if ($customer->avatar)
                                    <img src="{{ asset($customer->avatar) }}" alt="">
                                @endif
                                {{ $customer->username }}
                            </div>
                        </td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->fullname }}</td>
                        <td>{{ $customer->phoneNumber }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->created_at->format('d-m-Y') }}</td>
                        <td>{{ $customer->email_verified_at ? $customer->email_verified_at->format('d-m-Y') : 'Chưa xác minh' }}
                        </td>
                        <td>{{ $customer->role->name }}</td>
                        <td style="float: left; display: flex;">
                            <form action="{{ route('user.edit', $customer) }}" method="GET" id="editForm">
                                @csrf

                                <button title="Edit" type="submit" class="btn btn-outline-success btn-edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </form>
                            <form action="{{ route('user.destroy', $customer) }}" method="POST" id="deleteForm">
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
        {{ $customers->links() }}
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
