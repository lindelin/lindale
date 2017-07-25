<div class="row">
    <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
        {{ $slot }}
    </div>
    <div class="col-xs-9 col-sm-10 col-md-11 col-lg-11">
        {{ $side ?? '' }}
    </div>
</div>