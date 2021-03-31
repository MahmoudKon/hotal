<div class="card-header">
    <h4 class="card-title">{{ ucfirst(table_name()) }} : {{ $count }}</h4>

    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
    <div class="heading-elements">
        <a type="button" class="btn btn-outline-primary btn-min-width box-shadow-3 btn-glow"
            href="{{ route('dashboard.' . table_name() . '.create') }}">
            <i class="fas fa-plus"></i>
            <span class="mx-1">Create New {{ ucfirst(model_name()) }}</span>
        </a>
    </div>
</div>
