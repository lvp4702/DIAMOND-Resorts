@extends('admin.layouts.app')
@section('content')

    <div id="list_booking">
        <table class="tbl" id="tbl_booking">
            <thead style="border-bottom: 1px solid #ccc;">
                <tr>
                    <th>Tháng</th>
                    <th>Tổng số đơn</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->month }}/{{ $booking->year }}</td>
                        <td>{{ $booking->total_orders }}</td>
                        <td>{{ $booking->total_amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('booking.index') }}" class="btn btn-secondary" style="margin-top: 10px">Back</a>
    </div>

@endsection
