<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <form id="addShareForm">
        <div class="modal-body p-4">
            <label class="form-label">Share Symbol</label>
            <input name="symbol" class="form-control" id="shareSymbol" placeholder="eg. TATAPOWER.bse"
                   wire:model="searchSymbol" required>
            <ul class="text-end">
                @foreach($sharesArray as $share)
                    <li role="button" class="form-text share-name-symbol"
                        onclick="document.getElementById('shareSymbol').value = '{{$share['1. symbol']}}'">{{ $share['2. name'] ." | ".$share['1. symbol'] }}</li>
                @endforeach
            </ul>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </form>
</div>
