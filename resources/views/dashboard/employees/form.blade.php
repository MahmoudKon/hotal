<div class="row">
    {{-- INPUT [ USER NAME, EMAIL ] --}}
    <div class="col-md-6">
        {{-- User Name Input --}}
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="@lang('employees.username')" minlength=5 maxlength=25
                    value="{{ $row->username ?? '' }}">
            </div>
            <span id="username_error" class="red error"></span>
        </div>

        <!-- Email Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-at"></i> </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="@lang('employees.email')" value="{{ $row->email ?? '' }}">
            </div>
            <span id="email_error" class="red error"></span>
        </div>
    </div>

    {{-- INPUT [ FULL NAME, ADDRESS ] --}}
    <div class="col-md-6">
        {{-- Full Name Input --}}
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input type="text" name="full_name" class="form-control" placeholder="@lang('employees.full_name')" minlength=5 maxlength=50
                    value="{{ $row->full_name ?? '' }}">
            </div>
            <span id="full_name_error" class="red error"></span>
        </div>

        <!-- Address Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                </div>
                <input type="text" name="address" class="form-control" placeholder="@lang('employees.address')" minlength=10 maxlength=100
                    value="{{ $row->address ?? '' }}">
            </div>
            <span id="address_error" class="red error"></span>
        </div>
    </div>

    {{-- INPUTS [ PHONE, PASSWORD, CONFIRMED PASSWORD ] --}}
    <div class="col-md-5">
        <!-- Phone Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-mobile-alt"></i> </span>
                </div>
                <input type="text" name="phone" class="form-control" placeholder="@lang('employees.phone')" value="{{ $row->phone ?? '' }}">
            </div>
            <span id="phone_error" class="red error"></span>
        </div>

        <!-- Password Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-eye toggle-password"></i> </span>
                </div>
                <input type="password" name="password" class="form-control" placeholder="@lang('employees.password')" autocomplete>
            </div>
            <span id="password_error" class="red error"></span>
        </div>

        <!-- Confirmed Password Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-eye toggle-password"></i> </span>
                </div>
                <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('employees.password_confirmation')"
                    autocomplete>
            </div>
        </div>
    </div>

    {{-- INPUTS [ PERSONAL ID, SELECT JOB, AGE ] --}}
    <div class="col-md-4">
        <!-- Personal ID Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-id-card"></i> </span>
                </div>
                <input type="number" name="personal_id" class="form-control" placeholder="@lang('employees.personal_id')" min=10000000000000
                    max=99999999999999 size=14 value="{{ $row->personal_id ?? '' }}">
            </div>
            <span id="personal_id_error" class="red error"></span>
        </div>

        <!-- Age Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-birthday-cake"></i> </span>
                </div>
                <input type="number" name="age" class="form-control" placeholder="@lang('employees.age')" min=20 max=80
                    value="{{ $row->age ?? '' }}">
            </div>
            <span id="age_error" class="red error"></span>
        </div>
    </div>

    {{-- INPUT [ IMAGE ] --}}
    <div class="col-md-3">
        <!-- Image Input -->
        <div class="form-group">
            <div id="image">
                <input type="file" name="image" class="form-control image" placeholder="@lang('employees.image')">
                <img src="{{ $row->image_path ?? asset('uploads/images/employees.employee.jpg') }}" class="img-border img-thumbnail">
            </div>
            <span id="image_error" class="red error"></span>
        </div>
    </div>

    <div class="col-md-12">
        {{-- SELECT job [ Role ] --}}
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-briefcase"></i> </span>
                </div>
                <select name='role' class="custom-select" id="roles">
                    <optgroup label="@lang('employees.job')">
                        @foreach (App\Models\Role::select('name')->get() as $role)
                            <option value="{{ $role->name }}" {{ isset($row) ? ($row->hasRole($role->name) ? 'selected' : '') : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </optgroup>
                </select>
                <span id="role_error" class="red error"></span>
            </div>
        </div>

        {{-- SELECT job [ Role ] --}}
        <div class="card-content">
            <div id="permisions"></div>
        </div>
    </div>
