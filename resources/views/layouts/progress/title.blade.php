<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3 class="lindale-color">
            <span class="glyphicon glyphicon-dashboard lindale-icon-color"></span>
            {{ trans('header.progress') }}
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
            <a href="#" class="btn btn-default @if($mode == 'user') btn-primary @endif">
                {{ trans('progress.user') }}
            </a>
            <a href="#" class="btn btn-default @if($mode == 'gantt') btn-primary @endif">
                {{ trans('progress.gantt') }}
            </a>
            <a href="#" class="btn btn-default @if($mode == 'task') btn-primary @endif">
                {{ trans('progress.task') }}
            </a>
            <a href="#" class="btn btn-default @if($mode == 'todo') btn-primary @endif">
                TODO
            </a>
            <a href="#" class="btn btn-default @if($mode == 'report') btn-primary @endif">
                {{ trans('progress.report') }}
            </a>
        </div>
    </div>
</div>
<br>