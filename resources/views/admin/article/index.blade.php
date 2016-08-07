@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">

	文章管理

	</div>
	<div class="panel-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							{!! implode('<br>', $errors->all()) !!}
						</div>
					@endif
					<a href="{{ url('admin/article/create') }}" class="btn btn-lg btn-primary">新增</a>
					@include('layouts.orderbtn',['url1' => '/admin/article/index/0','url2' => '/admin/article/index/1'])
				</div>
			</div>
		</div>
		@foreach ($articles as $article)
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<hr>
					<div class="row">
						<div class="col-lg-6">
							<h4>Title: {{ $article->title }}</h4>
							<h5>Date: {{ $article->created_at }}</h5>
						</div>
						<div class="col-lg-6">
							<div align="right">
								<a href="{{ url('article/'.$article->id) }}" class="btn btn-info">查看</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="content">
								@include('layouts.markdown',['id' => $article->id, 'body' => $article->body])
							</div>
							<a href="{{ url('admin/article/'.$article->id.'/edit') }}" class="btn btn-success">编辑</a>
							<form action="{{ url('admin/article/'.$article->id) }}" method="POST" style="display: inline;">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<button type="submit" class="btn btn-danger">删除</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection
