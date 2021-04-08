@extends('layouts.dashboard')

@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-md-8">
            <!-- Description -->
            <section class="card">
                {{-- Include the card header --}}
                <div class="card-header bg-primary">
                    <h4 class="card-title white">
                        @lang('app.' . table_name()) :
                        <span id="count"> {{ $count }} </span>
                    </h4>
                </div>

                <div class="card-content">
                    <div class=" table-responsive">
                        {{-- Include the table body --}}
                        <div id="load-datatables"></div>
                    </div>
                </div>

            </section>
            <!--/ Description -->
        </div>
        <div class="col-md-4">
            <section class="card">
                <div class="card-content">
                    <div class=" table-responsive">
                        {{-- Include the table body --}}
                        <div id="load-form">
                            @include('dashboard.floors.create')
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </div>
</div>
@endsection
