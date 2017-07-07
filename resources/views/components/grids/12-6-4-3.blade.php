<div class="row">
    {{-- 框架 --}}
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        {{ $side ?? '' }}
    </div>

    {{-- 框架 --}}
    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
        {{ $slot }}
    </div>
    {{-- 框架结束 --}}
</div>