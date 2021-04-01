<div class="card-header bg-primary white">
    <h4 class="card-title white"> @lang(table_name() . (isset($row) ? '.update_data' : '.create_data'))</h4>

    @if (auth()
        ->user()
        ->hasPermission('read-' . table_name()))
        <div class="heading-elements" style="margin-top: -6px">
            <a type="button" class="btn btn-outline-blue bg-darken-4 btn-min-width box-shadow-3 btn-glow white"
                href="{{ route('dashboard.' . table_name() . '.index') }}">
                <i class="fas fa-backward"></i>
                <span class="mx-1"> @lang('app.back') </span>
            </a>
        </div>
    @endif
</div>
