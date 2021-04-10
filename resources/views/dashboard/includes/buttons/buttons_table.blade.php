<span class="dropdown">
    <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        class="btn btn-info btn-sm dropdown-menu-right">
        <i class="ft-settings m-0"></i>
    </button>
    <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right" x-placement="top-end"
        style="position: absolute; transform: translate3d(0px, 23px, 10px); top: 0px; right: -85px; will-change: transform;">

        @if (auth()->user()->hasPermission('update-' . table_name()))
        <a href="{{ route('dashboard.' . table_name() . '.edit', $id) }}" class="dropdown-item primary load-form">
            <i class="ft-edit"></i> @lang('app.edit')
        </a>
        @endif

        @if (auth()->user()->hasPermission('delete-' . table_name()))
        <a class="dropdown-item btn bg-transparent danger delete_record">
            <i class="ft-trash"></i> @lang('app.delete')
            <form action="{{ route('dashboard.' . table_name() . '.destroy', $id) }}" method="POST"
                style="display: none;">
                @csrf
                @method('delete')
            </form>
        </a>
        @endif

    </span>
</span>
