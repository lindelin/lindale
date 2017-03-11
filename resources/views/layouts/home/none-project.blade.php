@if($myProjects->count() === 0 and $userProjects->count() === 0)
    <div class="row">
        <br>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
            <h1>{{ trans('project.none-project') }}</h1>
            <br>
            <a href="{{ url('project/create') }}" class="btn btn-group-lg btn-success">{{ trans('project.create-project') }}</a>
        </div>
    </div>
@endif