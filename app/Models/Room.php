<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
