<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'date', 'time', 'people', 'message' , 'total_bill', 'paid'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'booking_id');
    }
}
