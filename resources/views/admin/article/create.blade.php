@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
	新增一篇文章
	</div>
	<div class="panel-body">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>新增失败</strong> 输入不符合要求<br><br>
				{!! implode('<br>', $errors->all()) !!}
			</div>
		@endif
			<form action="{{ url('admin/article') }}" method="POST">
				{!! csrf_field() !!}
				<input type="text" name="title" class="form-control" required="required" placeholder="请输入标题">
				<br>
				<textarea id="TextArea1" cols="20" rows="2" class="ckeditor" name="body"  class="form-control" required="required" placeholder="请输入内容"></textarea>
				<br>
				<button class="btn btn-lg btn-info">新增文章</button>
			</form>
	</div>
</div>
@endsection