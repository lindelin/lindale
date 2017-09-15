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
            <a href="{{ route('progress', compact('project')) }}" class="btn btn-default @if($mode == 'overview') btn-primary @endif">
                {{ trans('progress.schema-info') }}
            </a>
            <a href="#" class="btn btn-default @if($mode == 'member') btn-primary @endif">
                {{ trans('progress.user') }}
            </a>
            <a href="#" class="btn btn-default @if($mode == 'evaluation') btn-primary @endif">
                {{ trans('achievement.evaluation') }} <span class="badge">42</span>
            </a>
        </div>
    </div>
</div>
<br>