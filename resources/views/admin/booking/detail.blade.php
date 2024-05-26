@extends('admin.layouts.app')
@section('content')
    <h1 class="modal-title fw-bolder text-center" id="modal-add-label">Booking information</h1>
    <div style="width: 700px; margin: auto;">
        <div class="info">
            <label>Fullname:</label>
            <b>{{ $booking->fullname }}</b>
        </div>

        <div class="info">
            <label>Phone number:</label>
            <b>{{ $booking->phoneNumber }}</b>
        </div>

        @if ($booking->user_id)
        <div class="info">
            <label>Username:</label>
            <b>{{ $booking->user->username }}</b>
        </div>
        @endif

        <table>
            <tr>
                <th>Room</th>
                <th>Check-in date</th>
                <th>Check-out date</th>
                <th>Amount of people</th>
            </tr>
            <tr>
                <td>{{ $booking->room->name }}</td>
                <td>{{ $booking->check_inDate }}</td>
                <td>{{ $booking->check_outDate }}</td>
                <td>{{ $booking->amountOfPeople }}</td>
            </tr>
        </table>
        <p style="text-align:right;" class="info">Total: <b>{{ number_format($booking->total, 0, ',', '.') }}đ</b></p>

        <div class="info">
            <label>Status:</label>
            <b>{{ $booking->status }}</b>
        </div>

        <div class="info">
            <label>Booking date:</label>
            <b>{{ $booking->created_at->format('d-m-Y H:i:s') }}</b>
        </div>

        <a href="{{ route('booking.index') }}" class="btn btn-secondary">Back</a>
        @if ($booking->status == "Đã thanh toán")
        <a href="{{ route('booking.xuatHoaDon', ['id' => $booking->id]) }}" class="btn btn-primary">Xuất hóa đơn</a>
        @endif

    </div>
    <style>
        .info {
            margin-bottom: 12px;
            font-size: 1.4rem;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 1.4rem;
            margin-bottom: 30px;
        }

        tr {
            border-bottom: 1px solid #ddd;
            height: 50px;
        }

        th {
            text-align: left;
        }
    </style>
@endsection
