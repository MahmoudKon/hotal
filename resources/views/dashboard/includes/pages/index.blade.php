@extends('layouts.dashboard')

@section('content')
    <div class="content-body">
        <!-- Description -->
        <section class="card">
            {{-- Include the card header --}}
            @include('dashboard.includes.cards.header_tabel')
            <div class="card-content">
                <div class=" table-responsive">
                    {{-- Include the table body --}}
                    <div id="load-datatables"></div>
                </div>
            </div>
        </section>
        <!--/ Description -->
    </div>
@endsection
