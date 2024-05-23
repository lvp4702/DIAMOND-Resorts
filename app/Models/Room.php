<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'price',
        'describe',
        'img1',
        'img2',
        'img3'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'room_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'room_id', 'id');
    }

    //lay 5 phong co nhieu don dat nhat
    public static function topRoomsByBookings($limit = 5)
    {
        return self::select('rooms.id', 'rooms.name', DB::raw('COUNT(bookings.id) as bookings_count'))
            ->join('bookings', 'rooms.id', '=', 'bookings.room_id')
            ->groupBy('rooms.id', 'rooms.name')
            ->orderByDesc('bookings_count')
            ->limit($limit)
            ->get();
    }
}
