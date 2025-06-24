<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = []; // artinya semua kolom boleh diisi (bebas)

    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'time',
        'people',
        'message',
        'total_bill',
        'paid',
        'status'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'booking_id');
    }
}

