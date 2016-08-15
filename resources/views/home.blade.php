@extends('layouts.main')

@section('title')
Lindalë
@endsection

@section('content')
<div class="container">
    <div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		</div>
        <div class="col-md-8">
		    <div id="title" style="text-align: center;">
		    	<br>
		        <img alt="Bootstrap Image Preview" src="{{ asset('/img/logomin.png') }}" width="50%"/>
		        <div style="padding: 5px; font-size: 16px;"><h3>{{ Inspiring::quote() }}</h3></div>
		    </div>
		    <hr>
			<div class="row">
				<div class="col-xs-8 col-sm-9 col-md-9 col-lg-10">
					@include('layouts.orderbtn',['url1' => '/order/0', 'url2' => '/order/1' ])
				</div>
				<div class="col-xs-4 col-sm-3 col-md-3 col-lg-2" align="right">
					<div class="btn-group">
						<button class="btn btn-warning btn-xs">
							{{ trans('header.'.Config::get('app.locale')) }}
						</button>
						<button data-toggle="dropdown" class="btn btn-warning btn-xs dropdown-toggle">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li>
								<a href="{{ route('lang', ['locale' => 'zh']) }}">中文</a>
							</li>
							<li>
								<a href="{{ route('lang', ['locale' => 'ja']) }}">日本語</a>
							</li>
							<li>
								<a href="{{ route('lang', ['locale' => 'en']) }}">English</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						{!! implode('<br>', $errors->all()) !!}
					</div>
				@endif
				<div id="content">
					<ul>
						@foreach ($articles as $article)
							<li>
								<div class="title">
									<a href="{{ url('article/'.$article->id) }}">
										<h4>{{ $article->title }}</h4>
									</a>
								</div>
								@include('layouts.markdown',['id' => $article->id, 'body' => cut_str($article->body,400)])
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<div align="center">{!! $articles->render() !!}</div>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		</div>
	</div>
</div>
@endsection

