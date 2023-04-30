<x-livewire-tables::bs4.table.cell>
    <h5><span class="badge badge-info"> {{ Carbon\Carbon::parse($row->trade_date)->format('Y-m-d') }} </span></h5>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <span>{{ $row->high }} </span>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <span> {{ $row->low }} </span>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <h5 class="text-right"><span class="badge badge-primary"> {{ $row->open }} </span></h5>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <h5 class="text-right">
        <span class=" badge badge-light me-1">{!! differenceAmount($row->share_id,$row->id) !!}</span><span
            class="badge badge-light me-1"> <span class="ms-2">{!! profitLossArrow($row->share_id,$row->id) !!}</span> {{ $row->current_price }} </span>
    </h5>
</x-livewire-tables::bs4.table.cell>
