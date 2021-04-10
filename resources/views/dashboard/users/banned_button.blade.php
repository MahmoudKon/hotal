@if ($banned)
<a class="dropdown-item btn bg-danger white ban_record" href="{{ route('dashboard.' . table_name() . '.banned', $id) }}"
    data-ban="{{ $banned }}">
    <i class="fas fa-ban"></i> @lang('app.unban')
</a>
@else
<a class="dropdown-item btn bg-warning white ban_record"
    href="{{ route('dashboard.' . table_name() . '.banned', $id) }}" data-ban="{{ $banned }}">
    <i class="fas fa-ban"></i> @lang('app.ban')
</a>
@endif
