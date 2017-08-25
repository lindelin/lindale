<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-home">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4><span class="glyphicon glyphicon-info-sign lindale-icon-color"></span> {{ trans('header.info') }}</h4>
                </div>
            </div>
            <hr>
            @if($project->content)
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        {!! markdown($project->content) !!}
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <a href="{{ url('project/'.$project->id.'/edit') }}" class="btn btn-success btn-block">
                            {{ trans('project.edit-project') }}
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>