@if(Auth::user()->photo != '' and File::exists(public_path('storage/'.Auth::user()->photo)))
    <a href="#" class="thumbnail">
        <img src="{{ asset('storage/'.Auth::user()->photo) }}">
    </a>
@else
    <a href="#" class="thumbnail">
        <img src="{{ asset(Colorable::lindaleProfileImg(Auth::user()->email)) }}">
    </a>
@endif