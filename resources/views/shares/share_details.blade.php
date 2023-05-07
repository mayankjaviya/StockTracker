@extends('layouts.app')

@push('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/share_update.css') }}">
@endpush

@section('content')
    <div class="container share-update">
        <div class="pt-3">
            <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center flex-row">
        <h3 >{{ $share->name }}</h3><h5 class="ms-2"><span
                    class="badge badge-dark me-1"> <span>{!! profitLossArrow($share->id) !!}</span> {{ $share->current_price }} </span>
            </h5>
            </div>
                <a role="button" class="btn btn-secondary text-decoration-none px-4" href="{{ route('shares.index') }}">Back</a>
            </div>
            <livewire:share-update-table shareId="{{$share->id}}" />
        </div>
    </div>
@endsection

@push('page_scripts')
    <script src="{{ mix('assets/js/share_update.js') }}"></script>
@endpush
