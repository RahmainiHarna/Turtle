<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'menu_id', 'qty', 'subtotal'];

    public function menu()
    {
        return $this->belongsTo(Cart::class);
    }
}
