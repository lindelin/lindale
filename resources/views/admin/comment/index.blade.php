@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		{{ trans('admin.comments') }}
	</div>
	<div class="panel-body">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				{!! implode('<br>', $errors->all()) !!}
			</div>
		@endif

		@foreach ($comments as $comment)
			<hr>
				<div class="comment">
					<h4>{{ $comment->id }}.{{ $comment->nickname }}</h4>
					<h6>{{ $comment->created_at }}　{{ trans('admin.email') }}：{{ $comment->email }}</h6>
					<div class="content">
						<p>
							{{ trans('admin.home-page') }}：{{ $comment->website }}
						</p>
						<p>
							{{ trans('admin.content') }}：{!! nl2br(e($comment->content)) !!}
						</p>
						<p>
							{{ trans('admin.article') }}：<a href="{{ url('/article/'.$comment->Article->id) }}">
							{{ $comment->Article->title }}
							</a>
						</p>
					</div>
				</div>
				<form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" style="display: inline;">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">{{ trans('admin.delete') }}</button>
				</form>
		@endforeach
	</div>
</div>
@endsection
