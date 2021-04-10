<div class="content-body">
    <!-- Description -->
    <section class="card mb-0">

        <div class="card-header bg-primary white">
            <h4 class="card-title white"> @lang(table_name() . (isset($row) ? '.update_data' : '.create_data'))</h4>
        </div>

        <div class="card-content">
            {{-- Include the table body --}}
            <form class="form" action="{{ route('dashboard.' . table_name() . '.update', $row) }}" method="post"
                enctype="multipart/form-data" id="form_data">
                @csrf
                {{ method_field('PUT') }}

                <div class="p-2">
                    @include('dashboard.' . table_name() . '.form')
                </div>

                @include('dashboard.includes.buttons.buttons_form')

            </form><!-- end of form -->
        </div>

    </section>
    <!--/ Description -->
</div>
