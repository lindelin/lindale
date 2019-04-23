<div class="dropdown">
    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <icon icon="globe-americas"></icon> {{ trans('header.'.config('app.locale')) }}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('lang', ['lang' => 'en']) }}">English</a>
        <a class="dropdown-item" href="{{ route('lang', ['lang' => 'ja']) }}">日本語</a>
        <a class="dropdown-item" href="{{ route('lang', ['lang' => 'zh']) }}">中文</a>
    </div>
</div>