@if($user_img->photo != '')
    <a href="#" class="thumbnail">
        <img src="{{ asset('storage/'.$user_img->photo) }}">
    </a>
@else
    <a href="#" class="thumbnail">
        <img src="{{ asset(Colorable::lindaleProfileImg($user_img->email)) }}">
    </a>
@endif