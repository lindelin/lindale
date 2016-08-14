@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
	{{ trans('admin.edit-article') }}
	</div>
	<div class="panel-body">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				{!! implode('<br>', $errors->all()) !!}
			</div>
		@endif
		<form action="{{ url('admin/article/'.$article->id) }}" method="POST">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<input type="text" name="title" class="form-control" required="required" placeholder="{{ trans('admin.title') }}" value="{{ $article->title }}">
			<br>
			<textarea name="body" rows="10" class="form-control" data-provide="markdown" required="required" placeholder=" Markdown">{{ $article->body }}</textarea>
			<br>
			<button class="btn btn-lg btn-info"><span class="glyphicon glyphicon-edit"></span> {{ trans('admin.edit') }}</button>
		</form>
	</div>
</div>
@endsection