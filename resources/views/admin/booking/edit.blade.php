@extends('admin.layouts.app')
@section('content')
    <h1 class="modal-title fw-bolder text-center" id="modal-add-label">Booking information editing</h1>

    <form action="{{ route('booking.update', $booking) }}" method="POST" style="width: 700px; margin: auto;" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 fs-4">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control @error('fullname') border-danger @enderror" id="fullname"
                name="fullname" value="{{ old('fullname', $booking->fullname) }}">
            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="phoneNumber" class="form-label">Phone number</label>
            <input type="text" class="form-control @error('phoneNumber') border-danger @enderror" id="phoneNumber"
                name="phoneNumber" value="{{ old('phoneNumber', $booking->phoneNumber) }}">
            @error('phoneNumber')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="check_inDate" class="form-label">Check-in date</label>
            <input type="date" class="form-control" id="check_inDate" name="check_inDate" value="{{ $booking->check_inDate }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="check_outDate" class="form-label">Check-out date</label>
            <input type="date" class="form-control" id="check_outDate" name="check_outDate" value="{{ $booking->check_outDate }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="amountOfPeople" class="form-label">Amount of people</label>
            <input type="text" class="form-control @error('amountOfPeople') border-danger @enderror" id="amountOfPeople"
                name="amountOfPeople" value="{{ old('amountOfPeople', $booking->amountOfPeople) }}">
            @error('amountOfPeople')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="point" class="form-label">Point</label>
            <input type="text" class="form-control" id="point" name="point" value="{{ number_format($booking->pointUsed, 0, ',', '.') }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="total" class="form-label">Total</label>
            <input type="text" class="form-control" id="total"name="total" value="{{ number_format($booking->total, 0, ',', '.') }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="Chưa thanh toán" {{ $booking->status == "Chưa thanh toán" ? "selected" : "" }}>Chưa thanh toán</option>
                <option value="Đã thanh toán" {{ $booking->status == "Đã thanh toán" ? "selected" : "" }}>Đã thanh toán</option>
            </select>
        </div>

        <div class="mb-3 fs-4">
            <label for="user_id" class="form-label">Username</label>
            <input name="user_id" id="user_id" class="form-control" value="{{ $booking->user_id ? $booking->user->username : '' }}" disabled>
        </div>

        <div class="mb-3 fs-4">
            <label for="room_id" class="form-label">Room</label>
            <input name="room_id" id="room_id" class="form-control" value="{{ $booking->room->name }}" disabled>
        </div>

        <button type="submit" class="btn btn-primary ms-2">Update</button>
        <a href="{{ route('booking.index') }}" class="btn btn-secondary">Back</a>
    </form>

@endsection
