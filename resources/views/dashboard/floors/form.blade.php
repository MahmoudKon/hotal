{{-- ID --}}
<input type="hidden" name="id" value="{{ $row->id ?? '' }}">

{{-- Number Of Room Input --}}
<div class="form-group">
    <label for="number">Number of Floor :</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-sort-numeric-up-alt"></i> </span>
        </div>
        <input type="number" name="number" id="number" class="form-control" placeholder="@lang('floors.number')"
            required value="{{ isset($row) ? old('number') ?? $row->number : old('number') }}" min="1">
    </div>
    <span class="red error" id="number_error"></span>
</div>
