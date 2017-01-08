<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($project->start_at)
            <h5><i class="fa fa-hourglass-start" aria-hidden="true"></i> {{ $project->start_at }}</h5>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($project->end_at)
            <h5><i class="fa fa-hourglass-end" aria-hidden="true"></i> {{ $project->end_at }}</h5>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($project->updated_at)
            <h5><i class="fa fa-refresh fa-spin fa-fw"></i> {{ $project->updated_at }}</h5>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($project->created_at)
            <h5><span class="glyphicon glyphicon-time"></span> {{ $project->created_at }}</h5>
        @endif
    </div>
</div>