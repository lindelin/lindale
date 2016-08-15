<div class="panel panel-default">
	<div class="panel-heading">
		{{ trans('admin.menu') }}
	</div>
	<div class="panel-body">
		<a href="{{ url('admin/article') }}" class="btn btn-lg btn-success col-xs-12"><span class="glyphicon glyphicon-file"></span> {{ trans('admin.articles') }}</a>
        <br />
		<br />
		<br />
		<a href="{{ url('admin/comment') }}" class="btn btn-lg btn-success col-xs-12"><span class="glyphicon glyphicon-thumbs-up"></span> {{ trans('admin.comments') }}</a>
		<br />
        <br />
        <br />
        <a href="{{ url('admin/user') }}" class="btn btn-lg btn-success col-xs-12"><span class="glyphicon glyphicon-user"></span> {{ trans('admin.users') }}</a>
        <br />
        <br />
        <br />
        <a href="{{ url('admin/task') }}" class="btn btn-lg btn-success col-xs-12"><span class="glyphicon glyphicon-list-alt"></span> {{ trans('task.task') }}</a>
	</div>
</div>