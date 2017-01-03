<ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" @if($mode == 'home') class="active" @endif><a href="{{ url('home') }}">{{ trans('header.my') }}{{ trans('header.home') }}</a></li>
    <li role="presentation" @if($mode == 'project') class="active" @endif><a href="{{ url('home/project') }}">{{ trans('header.my') }}{{ trans('header.project') }}</a></li>
    {{--<li role="presentation" @if($mode == 'messages') class="active" @endif><a href="{{ url('home/messages') }}">{{ trans('header.my') }}{{ trans('header.message') }}</a></li>--}}
</ul>