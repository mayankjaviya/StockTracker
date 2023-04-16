<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;


class LivewireCustomComponent extends DataTableComponent
{
    public bool $showSearch = false;

    public bool $showPerPage = false;

    public bool $showSorting = false;

    public $headerTopClass = 'p-0';

    public function columns(): array
    {
        // TODO: Implement columns() method.
    }

    public function query()
    {
        // TODO: Implement query() method.
    }
}
