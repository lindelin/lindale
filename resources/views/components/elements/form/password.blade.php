<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
            <label for="password" class="control-label">
                {{ $slot }}
            </label>
            <div>
                <input id="{{ $name }}" type="password" class="form-control" name="{{ $name }}">
                @include('layouts.common.error-one', ['field' => $name])
            </div>
        </div>
    </div>
</div>