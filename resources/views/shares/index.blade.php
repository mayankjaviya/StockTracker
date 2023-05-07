@extends('layouts.app')

@section('content')
    <div class="container shares">
        <div class="pt-5">
            <div class="d-flex justify-content-end my-2">
                <button class="btn btn-primary" id="addShareBtn" data-bs-toggle="modal"
                        data-bs-target="#addShareModal">Add new
                </button>
            </div>
            <div class="card p-4">
                <div class="card-body">
                    <livewire:shares-table/>
                </div>
            </div>
        </div>
    </div>
    @include('shares.add-modal')
@endsection

@push('page_scripts')
    <script src="{{ asset('assets/js/shares.js') }}"></script>
@endpush
