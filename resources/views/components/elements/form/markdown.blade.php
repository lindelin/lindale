<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
            <label class="control-label">
                {{ $slot }}
            </label>
            <div>
                <textarea class="form-control" rows="8" name="{{ $name }}" data-provide="markdown" placeholder=" Markdown">{{ old($name) ?? $value ?? '' }}</textarea>
                @include('layouts.common.error-one', ['field' => $name])
            </div>
        </div>
    </div>
</div>