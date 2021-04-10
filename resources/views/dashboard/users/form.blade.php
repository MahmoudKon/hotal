<div class="row">
    {{-- ID --}}
    <input type="hidden" name="id" value="{{ $row->id ?? '' }}">
    {{-- INPUT [ USER NAME , EMAIL , PERSONAL ID , ADDRESS , PHONE, PASSWORD, CONFIRMED PASSWORD , Employee ID , Birthday ] --}}
    <div class="col-md-6">
        {{-- User Name Input --}}
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="@lang('users.username')" required
                    value="{{ isset($row) ? old('username') ?? $row->username : old('username') }}" minlength="5"
                    maxlength="25">
            </div>
            <span class="error red" id="username_error"></span>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Email Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-at"></i> </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="@lang('users.email')" required
                    value="{{ isset($row) ? old('email') ?? $row->email : old('email') }}">
            </div>
            <span class="error red" id="email_error"></span>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Password Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-eye toggle-password"></i> </span>
                </div>
                <input type="password" name="password" class="form-control" placeholder="@lang('users.password')"
                    autocomplete min="3" max="50" {{ isset($row) ? '' : 'required' }}>
            </div>
            <span class="error red" id="password_error"></span>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Confirmed Password Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-eye toggle-password"></i> </span>
                </div>
                <input type="password" name="password_confirmation" class="form-control"
                    placeholder="@lang('users.password_confirmation')" autocomplete min="3" max="50"
                    {{ isset($row) ? '' : 'required' }}>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        {{-- Personal ID Input --}}
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input type="number" name="personal_id" class="form-control"
                    placeholder="@lang('employees.personal_id')" required
                    value="{{ isset($row) ? old('personal_id') ?? $row->personal_id : old('personal_id') }}"
                    min="10000000000000" max="99999999999999">
            </div>
            <span class="error red" id="uspersonal_id_error"></span>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Phone Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-mobile-alt"></i> </span>
                </div>
                <input type="text" name="phone" class="form-control" placeholder="@lang('users.phone')" required
                    value="{{ isset($row) ? old('phone') ?? $row->phone : old('phone') }}" minlength="11"
                    maxlength="14">
            </div>
            <span class="error red" id="phone_error"></span>
        </div>
    </div>
