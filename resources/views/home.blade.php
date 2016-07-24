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
		        <div style="padding: 5px; font-size: 16px;"><h2>{{ Inspiring::quote() }}</h2></div>
		    </div>
		    <hr>
		    @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>操作失败：</strong> 文章不存在！<br><br>
                    {!! implode('<br>', $errors->all()) !!}
                </div>
            @endif
		    <div id="content">
		        <ul>
		            @foreach ($articles as $article)
		            <li style="margin: 50px 0;">
		                <div class="title">
		                    <a href="{{ url('article/'.$article->id) }}">
		                        <h3>{{ $article->title }}</h3>
		                    </a>
		                </div>
		                <div class="body">
		                    <p>{!! cut_str(nl2br($article->body),300) !!}</p>
		                </div>
		            </li>
		            @endforeach
		        </ul>
		    </div>
		</div>
	</div>
</div>
@endsection

