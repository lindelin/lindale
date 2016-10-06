<h2>{{ $project->title }} <small>{{ $project->Type->name }}#{{ sprintf("%02d", $project->type_id).$project->user_id.$project->id }}</small></h2>
<br>
@include('layouts.Project.project-nav')
<br>
@include('layouts.common.errors-all')
@include('layouts.common.succeed')