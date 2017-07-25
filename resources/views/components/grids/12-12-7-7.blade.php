<div class="row">
    {{-- 框架 --}}
    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        {{ $slot }}
    </div>
    {{-- 框架 --}}
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        {{ $side ?? '' }}
    </div>
</div>