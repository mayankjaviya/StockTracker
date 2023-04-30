<?php

namespace App\Http\Livewire;

use App\Models\ShareUpdate;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ShareUpdateTable extends LivewireCustomComponent
{

    protected $listeners = ['shareFilter' => 'shareFilter'];

    public string $defaultSortColumn = 'trade_date';
    public string $defaultSortDirection = 'desc';
    public int $shareId;


    public function mount(int $shareId){
        $this->shareId = $shareId;
    }

    public function columns(): array
    {
        return [
            Column::make("Trade date", "trade_date")
                ->sortable(),
            Column::make("High", "high")
                ->sortable(),
            Column::make("Low", "low")
                ->sortable(),
            Column::make("Open", "open")
                ->sortable(),
            Column::make("Current price", "current_price")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        $query = ShareUpdate::with('share');

        $query->when(!empty($this->shareId),function($q){
            $q->where('share_id',$this->shareId);
        });

        return $query;
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.share_update_table';
    }
}
