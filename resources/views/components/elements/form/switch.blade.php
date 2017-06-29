<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="btn-group form-group" data-toggle="buttons">
            <label class="btn btn-default @if(old($name) ? old($name) : $slot == config('config.off'))  active @endif">
                <input type="radio" name="{{ $name }}" value="{{ config('config.off') }}" id="option1" autocomplete="off"
                       @if(old($name) ? old($name) : $slot == config('config.off'))  checked @endif> OFF
            </label>
            <label class="btn btn-default @if(old($name) ? old($name) : $slot == config('config.on'))  active @endif">
                <input type="radio" name="{{ $name }}" value="{{ config('config.on') }}" id="option2" autocomplete="off"
                       @if(old($name) ? old($name) : $slot == config('config.on'))  checked @endif> ON
            </label>
        </div>
    </div>
</div>