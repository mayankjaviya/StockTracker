<?php

use App\Models\ShareUpdate;

function profitLossArrow($id, $previousId = 0, $defaultPriceColumn = 'current_price')
{
    $secondDay = ShareUpdate::where("id",$id)->first();
    $firstDay = ShareUpdate::where("id",$previousId)->first();

    if (isset($firstDay,$secondDay) && $secondDay->$defaultPriceColumn < $firstDay->$defaultPriceColumn){
        return '<i class="far fa-arrow-alt-circle-down in-loss"></i>';
    }

   return '<i class="far fa-arrow-alt-circle-up in-profit"></i>';
}
