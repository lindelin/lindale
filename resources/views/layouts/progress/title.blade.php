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
            <a href="{{ route('progress.member', compact('project')) }}" class="btn btn-default @if($mode == 'member') btn-primary @endif">
                {{ trans('progress.user') }}
            </a>
            <a href="{{ route('progress.gantt', compact('project')) }}" class="btn btn-default @if($mode == 'gantt') btn-primary @endif">
                {{ trans('progress.gantt') }}
            </a>
            <a href="{{ route('progress.tasks', compact('project')) }}" class="btn btn-default @if($mode == 'task') btn-primary @endif">
                {{ trans('progress.task') }}
            </a>
            <a href="#" class="btn btn-default @if($mode == 'todo') btn-primary @endif" disabled>
                TODO
            </a>
            <a href="#" class="btn btn-default @if($mode == 'report') btn-primary @endif" disabled>
                {{ trans('progress.report') }}
            </a>
        </div>
    </div>
</div>
<br>