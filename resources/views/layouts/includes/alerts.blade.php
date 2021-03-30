@if (Session('error'))

    <div class="alert round bg-danger alert-icon-left {{ App::getLocale() === 'ar' ? 'alert-arrow-left' : '' }} alert-dismissible mb-0"
        role="alert">
        <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
        {{ Session::get('error') }}
    </div>

@elseif (Session('success'))

    <div class="alert round bg-success alert-icon-left {{ App::getLocale() === 'ar' ? 'alert-arrow-left' : '' }} alert-dismissible mb-0"
        role="alert">
        <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
        {{ Session::get('success') }}
    </div>

@endif
