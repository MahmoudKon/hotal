<div class="row">
    {{-- ID --}}
    <input type="hidden" name="id" value="{{ $row->id ?? '' }}">
    {{-- INPUT [ USER NAME , EMAIL , PERSONAL ID , ADDRESS , PHONE, PASSWORD, CONFIRMED PASSWORD , Employee ID , Birthday ] --}}
    <div class="col-md-6">
        {{-- Number Of Room Input --}}
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input type="number" name="number" class="form-control" placeholder="@lang('rooms.number')" required
                    value="{{ isset($row) ? old('number') ?? $row->number : old('number') }}" min="1">
            </div>
            <span class="red error" id="number_error"></span>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Count Of Pepole Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-at"></i> </span>
                </div>
                <input type="number" name="people_count" class="form-control" placeholder="@lang('rooms.people_count')"
                    required min="1" max="9"
                    value="{{ isset($row) ? old('people_count') ?? $row->people_count : old('people_count') }}">
            </div>
            <span class="red error" id="people_count_error"></span>
        </div>
    </div>

    <div class="col-md-6">
        {{-- Price Input --}}
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input type="number" name="price" class="form-control" placeholder="@lang('rooms.price') 00.00" required
                    value="{{ isset($row) ? old('price') ?? $row->price : old('price') }}">
            </div>
            <span class="red error" id="personal_id_error"></span>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Floor ID Input -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-mobile-alt"></i> </span>
                </div>
                <select class="form-control" name="floor_id">
                    <optgroup label="@lang('rooms.select_floor')">
                        @foreach ($floors as $floor)
                        <option value="{{ $floor->id }}"
                            {{ ( isset($row) ? ($row->floor_id == $floor->id ? 'selected' : '') : (old('floor_id') == $floor->id ? 'selected' : '') ) }}>
                            {{ $floor->number }}
                        </option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
            <span class="red error" id="floor_id_error"></span>
        </div>
    </div>

    <div class="col-md-12">
        <h4 class="p-1 text-white mb-0 bg-blue-grey bg-darken-3">info :</h4>
        <div class="form-group">
            <textarea id="ckeditor-language" class="ckeditor-language ckeditor" name="info"
                placeholder="Please Write Info you here..." rows="5"
                required>{{ isset($row->info) ? $row->info : old('info') }}</textarea>
        </div>
        <span class="error red" id="info_error"></span>
    </div>


    <script type="text/javascript" src="{{ asset('assets/dashboard/vendors/js/editors/ckeditor/ckeditor.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/dashboard/js/scripts/editors/editor-ckeditor.js') }}"></script>
    <script>
        $(function() {
            CKEDITOR.replace( '.ckeditor' );
                // setup the repeater
                $('.repeater').repeater();
                //get the values of the inputs as a formatted object
                $('.repeater').repeaterVal();
                $("#wizard").steps();
        });
    </script>
