@extends('layouts.dashboard')

@section('content')
    <div class="content-body">
        <!-- Description -->
        <section class="card">
            {{-- Include the card header --}}
            @include('dashboard.includes.cards.header')
            <div class="card-content">
                {{-- Include the table body --}}
                @include('dashboard.includes.tables.datatable')
            </div>
        </section>
        <!--/ Description -->
    </div>
@endsection
