<ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" @if($mode == 'home' or $mode == 'project') class="active" @endif><a href="{{ url('home') }}">Home</a></li>
    <li role="presentation" @if($mode == 'profile') class="active" @endif><a href="{{ url('home/profile') }}">Profile</a></li>
    <li role="presentation" @if($mode == 'messages') class="active" @endif><a href="{{ url('home/messages') }}">Messages</a></li>
</ul>