@extends('layouts.dashboard')

@section('content')
<div class="content-body">
    <!-- Description -->
    <section class="card">
        {{-- Include the card header --}}
        @include('dashboard.includes.cards.header_form')

        <div class="card-content">
            {{-- Include the table body --}}
            <form class="form" action="{{ route('dashboard.' . table_name() . '.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                {{ method_field('post') }}

                <div class="p-2">
                    @include('dashboard.' . table_name() . '.form')
                </div>

                @include('dashboard.includes.buttons.buttons_form')

            </form><!-- end of form -->
        </div>
    </section>
    <!--/ Description -->
</div>
@endsection
