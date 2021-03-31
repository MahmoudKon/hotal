<div class="card-body">
    {{ $dataTable->table() }}
</div>

@push('script')
    {{ $dataTable->scripts() }}
@endpush