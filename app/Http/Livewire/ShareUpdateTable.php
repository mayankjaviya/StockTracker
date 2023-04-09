<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ShareUpdate;

class ShareUpdateTable extends DataTableComponent
{
    public bool $showSearch = false;

    public bool $showPerPage = false;

    public bool $showSorting = false;

    public $headerTopClass = 'p-0';

    protected $listeners = ['shareFilter' => 'shareFilter'];

    protected $shareFilter;

    function shareFilter($filter){
        $this->shareFilter = $filter;
    }

    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->sortable(),
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
        $query = ShareUpdate::query();

        $query->when(!empty($this->shareFilter),function($q){
            $q->where('name',$this->shareFilter);
        });

        return $query;
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.share_update_table';
    }
}
