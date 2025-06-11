<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'menu_id', 'quantity', 'subtotal'];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
    public function menu()
    {
        return $this->belongsTo(Cart::class, 'menu_id');
    }


}
