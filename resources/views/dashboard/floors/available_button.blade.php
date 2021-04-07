@if ($is_available)
<a class="dropdown-item btn bg-success white available_record" data-available="{{ $is_available }}"
    href="{{ route('dashboard.' . table_name() . '.is_available', $id) }}">

    <i class="fas fa-ban"></i> @lang('rooms.available')
</a>
@else
<a class="dropdown-item btn bg-warning white available_record" data-available="{{ $is_available }}"
    href="{{ route('dashboard.' . table_name() . '.is_available', $id) }}">

    <i class="fas fa-ban"></i> @lang('rooms.not_available')
</a>
@endif
