@extends('layouts.login')

@section('content')
    <section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0 pb-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <img src="{{ asset('assets/dashboard/images/logo/logo-dark.png') }}" alt="branding logo">
                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                            <span> @lang('app.login') </span>
                        </h6>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <form class="" action="{{ route('dashboard.login') }}" method="post">
                                @csrf
                                <!-- BEGIN USER NAME INPUT -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input type="text" id="username" placeholder="@lang('app.your_name') | @lang('app.email') | @lang('app.phone')"
                                            name="username" class="form-control @error('username') is-invalid @enderror"
                                            value="{{ old('username') ?? 'super_admin' }}" autofocus required>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- .\ END USER NAME INPUT -->

                                <!-- BEGIN USER PASSWORD INPUT -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-eye toggle-password"></i> </span>
                                        </div>
                                        <input type="password" id="password" placeholder="@lang('app.password')" name="password"
                                            class="form-control form-control-lg input-lg @error('username') is-invalid @enderror"
                                            value="{{ old('password') ?? 123 }}" required>
                                    </div>
                                </div>
                                <!-- .\ END USER PASSWORD INPUT -->

                                <!-- BEGIN REMEMBER ME CHECKBOX -->
                                <div class="form-group row">
                                    <div class="col-md-6 col-12 text-center text-md-left">
                                        <fieldset>
                                            <input class="chk-remember" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label mx-1" for="remember"> {{ __('Remember Me') }} </label>
                                        </fieldset>
                                    </div>
                                </div>
                                <!-- .\ END REMEMBER ME CHECKBOX  -->

                                <button type="submit" class="btn btn-info btn-block">
                                    <span class="mx-1"> @lang('app.login') </span>
                                    <i class="fas fa-sign-in-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
