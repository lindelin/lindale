<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
            <label class="control-label">
                {{ $slot }}
            </label>
            <div>
                <input type="text" class="form-control" name="{{ $name }}" value="{{ old($name) ?? $value ?? '' }}">
                @include('layouts.common.error-one', ['field' => $name])
            </div>
        </div>
    </div>
</div>