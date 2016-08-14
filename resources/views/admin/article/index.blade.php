@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">

		{{ trans('admin.articles') }}

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

					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="{{ url('admin/article/create') }}" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-pencil"></span> {{ trans('admin.new') }}</a>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							@include('layouts.orderbtn',['url1' => '/admin/article/index/0','url2' => '/admin/article/index/1'])
						</div>
					</div>
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
							<h4>{{ trans('admin.title') }}: {{ $article->title }}</h4>
							<h5>{{ trans('admin.date') }}: {{ $article->created_at }}</h5>
						</div>
						<div class="col-lg-6">
							<div align="right">
								<a href="{{ url('article/'.$article->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span> {{ trans('admin.view') }}</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="content">
								@include('layouts.markdown',['id' => $article->id, 'body' => $article->body])
							</div>
							<a href="{{ url('admin/article/'.$article->id.'/edit') }}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> {{ trans('admin.edit') }}</a>
							<form action="{{ url('admin/article/'.$article->id) }}" method="POST" style="display: inline;">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> {{ trans('admin.delete') }}</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{!! $articles->render() !!}
	</div>
</div>

@endsection
