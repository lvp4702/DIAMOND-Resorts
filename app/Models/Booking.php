<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneNumber',
        'fullname',
        'check_inDate',
        'check_outDate',
        'amountOfPeople',
        'user_id',
        'room_id',
        'total',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
    public function order()
    {
        return $this->hasOne(Order::class, 'booking_id', 'id');
    }
}


