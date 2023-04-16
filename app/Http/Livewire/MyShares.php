<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class MyShares extends Component
{
    public string $searchSymbol = '';

    public function render()
    {
        $sharesArray = [];
        if (Str::length($this->searchSymbol) > 3) {
            $json = file_get_contents('https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=' . $this->searchSymbol . '&apikey=' . env('ALPHA_VANTAGE_API_KEY'));
            $data = json_decode($json, true);
            $sharesArray = $data['bestMatches'] ?? [];
        }
        return view('livewire.my-shares', compact('sharesArray'));
    }
}
