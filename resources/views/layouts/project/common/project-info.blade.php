<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($project->start_at)
            <h5 class="lindale-color"><i class="fa fa-hourglass-start lindale-icon-color" aria-hidden="true"></i> {{ $project->start_at }}</h5>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($project->end_at)
            <h5 class="lindale-color"><i class="fa fa-hourglass-end lindale-icon-color" aria-hidden="true"></i> {{ $project->end_at }}</h5>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($project->updated_at)
            <h5 class="lindale-color"><i class="fa fa-refresh fa-spin fa-fw lindale-icon-color"></i> {{ $project->updated_at }}</h5>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($project->created_at)
            <h5 class="lindale-color"><span class="glyphicon glyphicon-time lindale-icon-color"></span> {{ $project->created_at }}</h5>
        @endif
    </div>
</div>