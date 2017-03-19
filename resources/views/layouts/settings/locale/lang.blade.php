<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has(UserConfig::LANG) ? ' has-error' : '' }}">
            <label class="control-label">{{ trans('project.lang') }}</label>
            <div>
                <select class="selectpicker form-control" name="{{ UserConfig::LANG }}">
                    @foreach( Config::get('app.available_locales') as $value)
                        <option value="{{ $value }}" @if(old(UserConfig::LANG) ? old(UserConfig::LANG) : UserConfig::get(Auth::user(), UserConfig::LANG) == $value)  selected @endif>
                            {{ Config::get('app.available_language')[$value] }}
                        </option>
                    @endforeach
                </select>
                @include('layouts.common.error-one', ['field' => UserConfig::LANG])
            </div>
        </div>
    </div>
</div>