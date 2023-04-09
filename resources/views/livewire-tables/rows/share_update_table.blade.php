<x-livewire-tables::bs4.table.cell>
    <h6 class="font-weight-bold mb-0"> {{ $row->name }} </h6>
    <span class="badge badge-secondary"> {{ $row->symbol }} </span>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <h5> <span class="badge badge-info"> {{ Carbon\Carbon::parse($row->trade_date)->format('Y-m-d') }} </span> </h5>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
     {{ $row->high }} </span>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
     {{ $row->low }} </span>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <h5 class="text-right"> <span class="badge badge-primary"> {{ $row->open }} </span> </h5>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <h5 class="text-right"> <span class="badge badge-light me-1"> <span>{!! profitLossArrow($row->id,$row->id - 1) !!}</span> {{ $row->current_price }} </span></h5>
</x-livewire-tables::bs4.table.cell>
