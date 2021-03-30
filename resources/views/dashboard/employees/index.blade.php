@extends('layouts.dashboard')

@section('content')
    <div class="content-body">
        <!-- Description -->
        <section id="description" class="card">
            <div class="card-header">
                <h4 class="card-title">{{ ucfirst(model_name()) }} : {{ $count }}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </section>
        <!--/ Description -->
    </div>
@endsection

@push('script')
    {{ $dataTable->scripts() }}
@endpush
