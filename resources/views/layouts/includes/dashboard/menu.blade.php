<div class="main-menu menu-fixed menu-bordered menu-dark menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ in_url('employees') ? 'active' : '' }}">
                <a href="{{ route('dashboard.employees.index') }}">
                    <i class="fa fa-user-shield"></i>
                    <span class="menu-title mx-1">Employees</span>
                </a>
            </li>

            <li class="nav-item {{ in_url('users') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span class="menu-title mx-1">Users</span>
                </a>
            </li>
        </ul>
    </div>
</div>
