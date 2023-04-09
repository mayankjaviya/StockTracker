<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareUpdate extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'symbol',
        'trade_date',
        'open',
        'close',
        'high',
        'low',
        'current_price',
    ];

    const SHARES = [
        'TIINDIA.bse' => 'Tube Investments',
        'TATAMOTORS.bse' => 'Tata Motors',
        'TATAPOWER.bse' => 'Tata Power',
    ];
}
