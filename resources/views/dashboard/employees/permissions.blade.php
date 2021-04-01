<div class="card-body p-0">
    {{-- Tabs Links [ Models ] --}}
    <ul class="nav nav-tabs nav-top-border no-hover-bg">
        @foreach (get_permissions() as $key => $val)
            <li class="nav-item">
                <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="base-{{ $key }}" data-toggle="tab"
                    aria-controls="{{ $key }}" href="#{{ $key }}" aria-expanded="true">
                    @lang('app.' . $key)
                </a>
            </li>
        @endforeach
    </ul>

    {{-- Tabs Content [ Checkbox ] --}}
    <div class="tab-content px-1 pt-1">
        @foreach (get_permissions() as $key => $permissions)
            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="{{ $key }}" aria-labelledby="base-{{ $key }}">
                @foreach ($permissions as $permission)
                    <label class="alert bg-light text-muted alert-icon-left alert-dismissible text-bold-700" role="alert">
                        <span class="alert-icon">
                            <div class="icheckbox_square {{ isset($role_permissions) ? (in_array($permission, $role_permissions) ? 'checked' : '') : '' }}"
                                style="position: relative;">
                                <input type="checkbox" style="position: absolute; opacity: 0;">
                            </div>
                        </span>
                        <span class="mx-1"> @lang('app.' . explode('-', $permission)[0]) </span>
                    </label>
                @endforeach
            </div>
        @endforeach
        <span id="permissions_error" class="red error"></span>
    </div>
</div>
