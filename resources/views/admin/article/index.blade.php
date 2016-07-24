@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">

	文章管理

	</div>
	<div class="panel-body">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
		{!! implode('<br>', $errors->all()) !!}
		</div>
		@endif
		<a href="{{ url('admin/article/create') }}" class="btn btn-lg btn-primary">新增</a>
			@foreach ($articles as $article)
			<hr>
			<div class="article">
				<h4>{{ $article->title }}</h4>
				<div class="content">
					<p>
						{!! nl2br(e($article->body)) !!}
					</p>
				</div>
			</div>
			<a href="{{ url('admin/article/'.$article->id.'/edit') }}" class="btn btn-success">编辑</a>
			<form action="{{ url('admin/article/'.$article->id) }}" method="POST" style="display: inline;">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<button type="submit" class="btn btn-danger">删除</button>
			</form>
			@endforeach
	</div>
</div>

@endsection
