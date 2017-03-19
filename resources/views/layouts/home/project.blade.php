@if($myProjects->count() > 0)
    @include('layouts.home.project.my-project')
@endif
@if($userProjects->count() > 0)
    @include('layouts.home.project.user-project')
@endif