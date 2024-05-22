@extends('admin.layouts.app')
@section('content')
    <h1 class="modal-title fw-bolder text-center" id="modal-add-label">Booking information</h1>
    <div style="width: 700px; margin: auto;">
        <div class="mb-3 fs-4">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $booking->fullname }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="phoneNumber" class="form-label">Phone number</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ $booking->phoneNumber }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="check_inDate" class="form-label">Check-in date</label>
            <input type="date" class="form-control" id="check_inDate" name="check_inDate"
                value="{{ $booking->check_inDate }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="check_outDate" class="form-label">Check-out date</label>
            <input type="date" class="form-control" id="check_outDate" name="check_outDate"
                value="{{ $booking->check_outDate }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="amountOfPeople" class="form-label">Amount of people</label>
            <input type="text" class="form-control" id="amountOfPeople" name="amountOfPeople"
                value="{{ $booking->amountOfPeople }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="total" class="form-label">Total</label>
            <input type="text" class="form-control" id="total" name="total" value="{{ number_format($booking->total, 0, ',', '.') }}đ" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $booking->status }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="user" class="form-label">Username</label>
            <input name="user" id="user" class="form-control"
                value="{{ $booking->user_id ? $booking->user->username : '' }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="room" class="form-label">Room</label>
            <input type="text" class="form-control" id="room" name="room" value="{{ $booking->room->name }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="date_created" class="form-label">Date created</label>
            <input type="text" class="form-control" id="date_created" name="date_created" value="{{ $booking->created_at->format('d-m-Y') }}" disabled>
        </div>

        <a href="{{ route('booking.index') }}" class="btn btn-secondary">Back</a>
        @if ($booking->status == "Đã thanh toán")
        <a href="{{ route('booking.xuatHoaDon', ['id' => $booking->id]) }}" class="btn btn-primary">Xuất hóa đơn</a>
        @endif

    </div>
@endsection
