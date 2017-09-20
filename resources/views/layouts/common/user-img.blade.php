@if($user_img->photo != '' and File::exists(public_path('storage/'.$user_img->photo)))
    <a href="{{ url('profile/'.$user_img->id) }}" class="thumbnail" style="margin-bottom: 0;">
        <img src="{{ asset('storage/'.$user_img->photo) }}" width="600" height="600">
    </a>
@else
    <a href="{{ url('profile/'.$user_img->id) }}" class="thumbnail" style="margin-bottom: 0;">
        <img src="{{ asset(Colorable::lindaleProfileImg($user_img->email)) }}" width="600" height="600">
    </a>
@endif