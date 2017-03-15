@if($user_img->photo != '')
    <a href="#" class="thumbnail">
        <img src="{{ asset('storage/'.$user_img->photo) }}" width="600" height="600">
    </a>
@else
    <a href="#" class="thumbnail">
        <img src="{{ asset(Colorable::lindaleProfileImg($user_img->email)) }}" width="600" height="600">
    </a>
@endif