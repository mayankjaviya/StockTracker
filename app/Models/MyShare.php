<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyShare extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'symbol',
        'current_price',
    ];
}
