<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="index.html">
                        <img class="brand-logo" alt="modern admin logo" src="{{ asset('assets/dashboard/images/logo/logo.png') }}">
                        <h3 class="brand-text">Modern Admin</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>

        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Explore Modern...">
                        </div>
                    </li>
                </ul>

                <ul class="nav navbar-nav float-right mx-1">
                    {{-- Change The Languages Links --}}
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentFlagName() }}"></i>
                            <span class="selected-language"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ App::getLocale() !== $localeCode ? LaravelLocalization::getLocalizedURL($localeCode, null, [], true) : 'javascript::void(0)' }}">
                                    <i class="flag-icon flag-icon-{{ $properties['flag'] }}"></i>
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    {{-- .\ Change The Languages Links --}}

                    {{-- .\ Auth Links --}}
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1">Hello,
                                <span class="user-name text-bold-700">{{ auth()->user()->username }}</span>
                            </span>
                            <span class="avatar avatar-online" style="max-width: 30px;">
                                <img src="{{ auth()->user()->image_path }}" alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                            <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                            <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                            <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item danger" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> @lang('app.logout')
                            </a>
                            <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;"> @csrf </form>
                        </div>
                    </li>
                    {{-- .\ Auth Links --}}
                </ul>
            </div>
        </div>
    </div>
</nav>
