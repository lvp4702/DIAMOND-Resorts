@extends('admin.layouts.app')
@section('content')
    <div class="content_top">
        <a class="btn btn-primary" href="{{ route('booking.create') }}">
            <i class="fa-solid fa-plus"></i> Add new
        </a>
        <a class="btn btn-outline-info" href="{{ route('booking.paid') }}" style="float: left;">Đã thanh toán</a>
    </div>
    <div id="list_booking">
        <table class="tbl" id="tbl_booking">
            <thead style="border-bottom: 1px solid #ccc;">
                <tr>
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Phone number</th>
                    <th>Check-in date</th>
                    <th>Check-out date</th>
                    <th>Point used</th>
                    <th>Room</th>
                    <th>Total(đ)</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($bookingsUnpaid as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->phoneNumber }}</td>
                        <td>{{ $item->check_inDate }}</td>
                        <td>{{ $item->check_outDate }}</td>
                        <td>{{ number_format($item->pointUsed, 0, ',', '.') }}</td>
                        <td>{{ $item->room->name }}</td>
                        <td>{{ number_format($item->total, 0, ',', '.') }}</td>
                        <td>{{ $item->status }}</td>
                        <td style="float: left; display: flex;">
                            <form action="{{ route('booking.edit', $item) }}" method="GET" id="editForm">
                                @csrf

                                <button title="Edit" type="submit" class="btn btn-outline-success btn-edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </form>

                            <form action="{{ route('booking.destroy', $item) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')

                                <button title="Delete" type="submit" class="btn btn-outline-danger btn-delete" onclick="return confirmDelete()">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>

                            <form action="{{ route('booking.show', $item) }}" method="GET" id="detailForm">
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
        {{ $bookingsUnpaid->links() }}
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
