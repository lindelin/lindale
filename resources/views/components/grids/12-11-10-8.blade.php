<div class="row">
    {{-- 框架 --}}
    <div class="col-xs-12 col-sm-11 col-md-10 col-lg-8">
        {{ $slot }}
    </div>
    {{-- 框架 --}}
    <div class="col-xs-0 col-sm-1 col-md-2 col-lg-4">
        {{ $side ?? '' }}
    </div>
</div>