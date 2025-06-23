<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    
    protected $table = 'galery';
    public $timestamps = false;
    protected $fillable = ['name', 'image'];
}
