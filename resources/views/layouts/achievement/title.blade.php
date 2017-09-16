<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3 class="lindale-color">
            <span class="glyphicon glyphicon-stats lindale-icon-color"></span>
            {{ trans('header.achievement') }}
        </h3>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="btn-group" role="group" aria-label="...">
            <a href="{{ route('achievement', compact('project')) }}" class="btn btn-default @if($mode == 'overview') btn-primary @endif">
                {{ trans('progress.schema-info') }}
            </a>
            <a href="{{ route('achievement.member', compact('project')) }}" class="btn btn-default @if($mode == 'member') btn-primary @endif">
                {{ trans('progress.user') }}
            </a>
            <a href="{{ route('evaluation', compact('project')) }}" class="btn btn-default @if($mode == 'evaluation') btn-primary @endif">
                {{ trans('achievement.evaluation') }}
                @if ($project->openEvaluationCount() > 0)
                    &nbsp;<span class="badge">{{ $project->openEvaluationCount() }}</span>
                @endif
            </a>
        </div>
    </div>
</div>
<br>