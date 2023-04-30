<x-livewire-tables::bs4.table.cell>
   <a href="{{ route('my-shares.show',$row->id) }}" class="text-decoration-none"> <h6 class="font-weight-bold mb-0"> {{ $row->name }} </h6> </a>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <span class="badge badge-secondary"> {{ $row->symbol }} </span>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <h5 class="text-right"><span
            class="badge badge-light me-1"> <span>{!! profitLossArrow($row->id) !!}</span> {{ $row->current_price }} </span>
    </h5>
</x-livewire-tables::bs4.table.cell>
