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
                <input type="text" name="username" class="form-control" placeholder="@lang('users.username')"
                    value="{{ old('username') ?? $row->username }}" minlength="5" maxlength="25" required>
            </div>
            @error('username') <span class="red"> {{ $message }} </span> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <!-- Email Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-at"></i> </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="@lang('users.email')" value="{{ old('email') ?? $row->email }}"
                    required>
            </div>
            @error('email') <span class="red"> {{ $message }} </span> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <!-- Password Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-eye toggle-password"></i> </span>
                </div>
                <input type="password" name="password" class="form-control" placeholder="@lang('users.password')" autocomplete min="3" max="50"
                    {{ isset($row) ? '' : 'required' }} value="{{ old('password') ?? '' }}">
            </div>
            @error('password') <span class="red"> {{ $message }} </span> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <!-- Confirmed Password Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-eye toggle-password"></i> </span>
                </div>
                <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('users.password_confirmation')"
                    autocomplete min="3" max="50" {{ isset($row) ? '' : 'required' }} value="{{ old('password_confirmation') ?? '' }}">
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
                <input type="number" name="personal_id" class="form-control" placeholder="@lang('employees.personal_id')"
                    value="{{ old('personal_id') ?? $row->personal_id }}" min="10000000000000" max="99999999999999" required>
            </div>
            @error('personal_id') <span class="red"> {{ $message }} </span> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <!-- Phone Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-mobile-alt"></i> </span>
                </div>
                <input type="text" name="phone" class="form-control" placeholder="@lang('users.phone')" value="{{ old('phone') ?? $row->phone }}"
                    minlength="11" maxlength="14" required>
            </div>
            @error('phone') <span class="red"> {{ $message }} </span> @enderror
        </div>
    </div>
