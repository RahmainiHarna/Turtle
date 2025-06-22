<?php

namespace App\Models;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ['title', 'promo_price','image', 'description'];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_promo')
            ->withPivot('quantity');
    }
}
