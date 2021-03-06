<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-home">
            <div class="row">
                <div class="col-xs-9 col-sm-6 col-md-6 col-lg-6">
                    <a href="{{ url('/project') }}" type="button" class="btn  btn-xs btn-primary">{{ trans('common.all') }}</a>
                    <a href="{{ url('/unfinished/project') }}" type="button" class="btn  btn-xs btn-warning">{{ trans('common.unfinished') }}</a>
                    <a href="{{ url('/finished/project') }}" type="button" class="btn  btn-xs btn-success">{{ trans('common.finish') }}</a>
                </div>
                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6" align="right">
                    <a id="add-project-link" href="{{ url('project/create') }}"><span class="glyphicon glyphicon-plus"></span></a>
                </div>
            </div>
        </div>
	</div>
</div>