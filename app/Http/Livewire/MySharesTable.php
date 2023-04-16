<?php

namespace App\Http\Livewire;

use App\Models\MyShare;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class MySharesTable extends LivewireCustomComponent
{

    protected $listeners = ['refresh' => '$refresh'];

    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Symbol", "symbol")
                ->sortable(),
            Column::make("Current price", "current_price")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return MyShare::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.my_shares_table';
    }
}
