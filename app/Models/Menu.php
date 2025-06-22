<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Promo;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus'; // pakai tabel menus
    protected $fillable = ['name', 'type', 'price', 'image', 'description'];

    public function promos()
    {
        return $this->belongsToMany(Promo::class, 'menu_promo')
            ->withPivot('quantity', 'promo_price');
    }


}