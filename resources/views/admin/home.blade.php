@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
	{{ trans('admin.information') }}
	</div>
	<div class="panel-body">
		<div align="center">
			<h1>Lindale Information Center</h1>
			<h3>{{ Inspiring::quote() }}</h3>
		</div>
	</div>
</div>
@endsection