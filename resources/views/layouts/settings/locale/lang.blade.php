<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has(config('config.user.lang')) ? ' has-error' : '' }}">
            <label class="control-label">{{ trans('project.lang') }}</label>
            <div>
                <select class="selectpicker form-control" name="{{ config('config.user.lang') }}">
                    @foreach( config('app.available_locales') as $value)
                        <option value="{{ $value }}" @if(old(config('config.user.lang')) ? old(config('config.user.lang')) : user_config(Auth::user(), config('config.user.lang')) == $value)  selected @endif>
                            {{ config('app.available_language')[$value] }}
                        </option>
                    @endforeach
                </select>
                @include('layouts.common.error-one', ['field' => config('config.user.lang')])
            </div>
        </div>
    </div>
</div>