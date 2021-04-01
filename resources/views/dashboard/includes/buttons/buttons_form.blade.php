<div class="form-group d-flex justify-content-between mb-0">
    <button type="submit" class="btn btn-primary" style="width: 49.5%;">
        <i class="ft-plus" style="margin: 0 5px;"></i>
        {{ isset($row) ? __('app.update') : __('app.create') }}
    </button>

    <button type="reset" class="btn btn-warning" style="width: 49.5%;">
        <i class="ft-refresh-cw position-right" style="margin: 0 5px;"></i>
        @lang('app.reset')
    </button>
</div>
