@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <div class="p-3 rounded shadow bg-info text-light d-flex justify-content-between">
                <div>
                    <h3 class="fs-1 fw-bold">{{ $totalUsers }}</h3>
                    <p class="fs-3">User registrations</p>
                </div>
                <div class="align-items-center d-flex">
                    <i class="fa-solid fa-user-plus" style="font-size: 50px"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="p-3 rounded shadow bg-success text-light d-flex justify-content-between">
                <div>
                    <h3 class="fs-1 fw-bold">{{ $totalBookingsToday }}</h3>
                    <p class="fs-3">Bookings today</p>
                </div>
                <div class="align-items-center d-flex">
                    <i class="fa-solid fa-bag-shopping" style="font-size: 50px"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="p-3 rounded shadow bg-secondary text-light d-flex justify-content-between">
                <div>
                    <h3 class="fs-1 fw-bold">{{ $totalNewsToday }}</h3>
                    <p class="fs-3">News today</p>
                </div>
                <div class="align-items-center d-flex">
                    <i class="fa-regular fa-newspaper" style="font-size: 50px"></i>
                </div>
            </div>
        </div>
    </div>
    
@endsection
