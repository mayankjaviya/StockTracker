@extends('layouts.app')

@push('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/my_shares.css') }}">
@endpush

@section('content')
    <div class="container my-shares">
        <div class="pt-5">
            <div class="d-flex justify-content-end my-2">
                <button class="btn btn-primary" id="addMyShareBtn" data-bs-toggle="modal"
                        data-bs-target="#addMyShareModal">Add new
                </button>
            </div>
            <div class="card p-4">
                <div class="card-body">
                    <livewire:my-shares-table/>
                </div>
            </div>
        </div>
    </div>
    @include('myShares.add-modal')
@endsection

@push('page_scripts')
    <script src="{{ asset('assets/js/my_shares.js') }}"></script>
@endpush
