<div class="main-menu menu-fixed menu-bordered menu-dark menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- Dashboard Link --}}
            <li class="nav-item {{ in_url('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard./') }}">
                    <i class="fa fa-home"></i>
                    <span class="menu-title mx-1"> @lang('app.dashboard') </span>
                </a>
            </li>
            {{-- .\ Dashboard Link --}}

            {{-- Employees Link --}}
            <li class="nav-item {{ in_url('employees') ? 'active' : '' }}">
                <a href="{{ route('dashboard.employees.index') }}">
                    <i class="fa fa-user-shield"></i>
                    <span class="menu-title mx-1"> @lang('app.employees') </span>
                </a>
            </li>
            {{-- .\ Employees Link --}}

            {{-- Users Link --}}
            <li class="nav-item {{ in_url('users') ? 'active' : '' }}">
                <a href="{{ route('dashboard.users.index') }}">
                    <i class="fa fa-user"></i>
                    <span class="menu-title mx-1"> @lang('app.users') </span>
                </a>
            </li>
            {{-- .\ Users Link --}}
        </ul>
    </div>
</div>
