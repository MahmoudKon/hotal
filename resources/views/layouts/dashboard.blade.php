{{-- HEADER FILES --}}
@include('layouts.includes.dashboard.header')
{{-- .\ HEADER --}}

{{-- NAVBAR --}}
@include('layouts.includes.dashboard.navbar')
{{-- .\ NAVBAR --}}

{{-- MENU --}}
@include('layouts.includes.dashboard.menu')
{{-- .\ MENU --}}


{{-- CONTENT --}}
<div class="app-content content">
    <div class="content-wrapper">

        {{-- BREADCRUMB --}}
        @include('layouts.includes.dashboard.breadcrumb')
        {{-- .\ BREADCRUMB --}}

        {{-- BODY --}}
        @yield('content')
        {{-- .\ BODY --}}
    </div>
</div>
{{-- .\ CONTENT --}}

{{-- FOOTER --}}
@include('layouts.includes.dashboard.footer')
{{-- .\ FOOTER --}}
