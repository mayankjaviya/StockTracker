<?php

use App\Models\ShareUpdate;

function profitLossArrow($shareId,$id = null, $defaultPriceColumn = 'current_price'): string
{

    // Get the specific share update record
    $shareUpdates = ShareUpdate::where('share_id',$shareId);
    $latestShare = !empty($id) ? $shareUpdates->findOrFail($id) : $shareUpdates->firstOrFail();
    $previousShare = ShareUpdate::where('share_id',$shareId)->where('trade_date', '<', $latestShare->trade_date)
        ->orderBy('trade_date', 'desc')
        ->first();

    if (isset($previousShare) && $latestShare->$defaultPriceColumn < $previousShare->$defaultPriceColumn) {
        // Specific share price is higher than the previous record
        return '<i class="far fa-arrow-alt-circle-down in-loss"></i>';
    }

   return '<i class="far fa-arrow-alt-circle-up in-profit"></i>';
}

function differenceAmount($shareId,$id = null, $defaultPriceColumn = 'current_price'): string
{
    // Get the specific share update record
    $shareUpdates = ShareUpdate::where('share_id',$shareId);
    $latestShare = !empty($id) ? $shareUpdates->findOrFail($id) : $shareUpdates->firstOrFail();
    $previousShare = ShareUpdate::where('share_id',$shareId)->where('trade_date', '<', $latestShare->trade_date)
        ->orderBy('trade_date', 'desc')
        ->first();
    $latestPrice = $latestShare->$defaultPriceColumn;
    $previousPrice = !empty($previousShare) ? $previousShare->$defaultPriceColumn : $latestPrice;
    $className = $latestPrice > $previousPrice ? 'in-profit' : 'in-loss';
    $differenceAmount = number_format($latestPrice - $previousPrice,2);
    return '<span class="'.$className.'">'.$differenceAmount.'</span>' ;
}
