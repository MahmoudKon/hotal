<div class="card-header bg-primary">
    <h4 class="card-title white">
        @lang('app.' . table_name()) :
        <span id="count"> {{ $count }} </span>
    </h4>

    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
    @if (auth()
    ->user()
    ->hasPermission('delete-' . table_name()))
    <div class="heading-elements" style="margin-top: -6px">
        <a type="button" class="btn btn-outline-blue bg-darken-4 btn-min-width box-shadow-3 btn-glow white load-form"
            href="{{ route('dashboard.' . table_name() . '.create') }}">
            <i class="fas fa-plus"></i>
            <span class="mx-1"> @lang(table_name() . '.create_data') </span>
        </a>
    </div>
    @endif
</div>
