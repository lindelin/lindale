<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
            <label class="control-label">
                {{ $label }}
            </label>
            <div>
                <select class="selectpicker form-control" data-live-search="true" name="{{ $name }}">
                    {{ $slot }}
                </select>
                @include('layouts.common.error-one', ['field' => $name])
            </div>
        </div>
    </div>
</div>