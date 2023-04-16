<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShareUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'share_id',
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

    public function share(): BelongsTo
    {
        return $this->belongsTo(MyShare::class, 'share_id', 'id');
    }
}
