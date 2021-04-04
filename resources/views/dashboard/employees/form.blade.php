<div class="row">
    {{-- ID --}}
    <input type="hidden" name="id" value="{{ $row->id ?? '' }}">
    {{-- INPUT [ USER NAME , EMAIL , PERSONAL ID , ADDRESS , PHONE, PASSWORD, CONFIRMED PASSWORD , Employee ID , Birthday ] --}}
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-6">
                {{-- User Name Input --}}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="@lang('employees.username')" required
                            value="{{ isset($row) ? old('username') ?? $row->username : old('username') }}" minlength="5" maxlength="25">
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
                        <input type="email" name="email" class="form-control" placeholder="@lang('employees.email')" required
                            value="{{ isset($row) ? old('email') ?? $row->email : old('email') }}">
                    </div>
                    @error('email') <span class="red"> {{ $message }} </span> @enderror
                </div>
            </div>

            <div class="col-md-6">
                <!-- Phone Input -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-mobile-alt"></i> </span>
                        </div>
                        <input type="text" name="phone" class="form-control" placeholder="@lang('employees.phone')" required
                            value="{{ isset($row) ? old('phone') ?? $row->phone : old('phone') }}" minlength="11" maxlength="14">
                    </div>
                    @error('phone') <span class="red"> {{ $message }} </span> @enderror
                </div>
            </div>

            <div class="col-md-6">
                <!-- Address Input -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                        </div>
                        <input type="text" name="address" class="form-control" placeholder="@lang('employees.address')" required
                            value="{{ isset($row) ? old('address') ?? $row->address : old('address') }}" minlength="10" maxlength="100">
                    </div>
                    @error('address') <span class="red"> {{ $message }} </span> @enderror
                </div>
            </div>

            <div class="col-md-6">
                <!-- Password Input -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-eye toggle-password"></i> </span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="@lang('employees.password')" autocomplete min="3"
                            max="50" {{ isset($row) ? '' : 'required' }}>
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
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="@lang('employees.password_confirmation')" autocomplete min="3" max="50"
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
                        <input type="number" name="personal_id" class="form-control" placeholder="@lang('employees.personal_id')" required
                            value="{{ isset($row) ? old('personal_id') ?? $row->personal_id : old('personal_id') }}" min="10000000000000"
                            max="99999999999999">
                    </div>
                    @error('personal_id') <span class="red"> {{ $message }} </span> @enderror
                </div>
            </div>

            @if (isset($row->emp_id))
                <div class="col-md-6">
                    <!-- Employee ID Input -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-id-card"></i> </span>
                            </div>
                            <input class="form-control" value="{{ isset($row) ? old('emp_id') ?? $row->emp_id : old('emp_id') }}" disabled>
                        </div>
                        @error('emp_id') <span class="red"> {{ $message }} </span> @enderror
                    </div>
                </div>
            @endif

            <div class="col-md-6">
                <!-- Birthday Input -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-birthday-cake"></i> </span>
                        </div>
                        <input type="date" name="birthday" class="form-control" max="2015-12-12" min="1990-01-01" required
                            placeholder="@lang('employees.birthday')"
                            value="{{ isset($row) ? old('birthday') ?? $row->birthday : old('birthday') }}">
                    </div>
                    @error('birthday') <span class="red"> {{ $message }} </span> @enderror
                </div>
            </div>

            <div class="col-md-6">
                {{-- SELECT ROLE --}}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-briefcase"></i> </span>
                        </div>
                        <select name='role' class="custom-select" id="roles" required>
                            <option> Select Role </option>
                            <optgroup label="@lang('employees.job')">
                                @foreach (App\Models\Role::select('name', 'display_name')->get() as $role)
                                    @if (!auth()
        ->user()
        ->hasRole($role->name) &&
    $role->name != 'super_admin')

                                    <option value="{{ $role->name }}" @if (isset($row)) {{ $row->hasRole($role->name) ? 'selected' : (old('role') == $role->name ? 'selected' : '') }} @else
                                                {{ old('role') == $role->name ? 'selected' : '' }} @endif>
                                            {{ $role->display_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    @error('role') <span class="red"> {{ $message }} </span> @enderror
                </div>
            </div>
        </div>

    </div>


    {{-- INPUT [ IMAGE ] --}}
    <div class="col-md-3">
        <!-- Image Input -->
        <div class="form-group">
            <div id="image">
                <input type="file" name="image" class="form-control image" placeholder="@lang('employees.image')"
                    value="{{ isset($row) ? $row->image : old('image') }}">
                <img src="{{ isset($row) ? $row->image_path : asset('uploads/images/employees/default.jpg') }}" class="img-border img-thumbnail">
            </div>
            @error('image') <span class="red"> {{ $message }} </span> @enderror
        </div>
    </div>

    {{-- INPUTS [ Role , Permissions ] --}}
    <div class="col-md-12">
        {{-- DISPLAY PERMISSIONS --}}
        <div class="card-content">
            <div id="permisions">
                @include('dashboard.employees.permissions')
            </div>
        </div>
    </div>
