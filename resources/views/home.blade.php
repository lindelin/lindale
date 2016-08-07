@extends('layouts.main')

@section('title')
Lindalë
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <div id="title" style="text-align: center;">
		    	<br>
		        <img alt="Bootstrap Image Preview" src="{{ asset('/img/logomin.png') }}" width="50%"/>
		        <div style="padding: 5px; font-size: 16px;"><h3>{{ Inspiring::quote() }}</h3></div>
		    </div>
		    <hr>
			@include('layouts.orderbtn',['url1' => '/0', 'url2' => '/1' ])
		    @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>操作失败：</strong> 文章不存在！<br><br>
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
</div>
@endsection

