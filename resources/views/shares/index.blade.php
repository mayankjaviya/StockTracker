@extends('layouts.app')

@push('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/share_update.css') }}">
@endpush

@section('content')
    <div class="container share-update">
        <div class="pt-5">
            <div class="d-flex justify-content-end my-2">
            <div class=" col-md-4">
                <select id="filterByShare" class="filterByShare">
                    <option value="0">Select any option</option>
                    @foreach(\App\Models\ShareUpdate::SHARES as $share)
                        <option value="{{ $share }}">{{ $share }}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <livewire:share-update-table />
        </div>
    </div>
@endsection

@push('page_scripts')
    <script src="{{ mix('assets/js/share_update.js') }}"></script>
@endpush
