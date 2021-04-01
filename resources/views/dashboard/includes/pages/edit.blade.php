@extends('layouts.dashboard')

@section('content')
    <div class="content-body">
        <!-- Description -->
        <section class="card">
            {{-- Include the card header --}}
            <div class="card-header bg-primary white mb-1 p-1">
                <h4 class="card-title white" id=""><i class="fa fa-plus"></i> @lang(table_name() . '.create_data')</h4>
            </div>
            <div class="card-content">
                {{-- Include the table body --}}
                <form class="form" action="{{ route('dashboard.' . table_name() . '.update', $row) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="p-2">
                        @include('dashboard.' . table_name() . '.form')
                    </div>

                    @include('dashboard.includes.buttons.form')

                </form><!-- end of form -->
            </div>
        </section>
        <!--/ Description -->
    </div>
@endsection
