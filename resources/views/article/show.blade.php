@extends('layouts.main')

@section('title')
Lindalë-Show
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <div id="content" style="padding: 50px;">

		        <div align="right">
					@if(Auth::guest())
					<img alt="Logo" src="{{ asset('/img/logosub.png') }}" width="15%"/>
					@else
					<a href="{{ url('admin/article') }}" >
						<img alt="Logo" src="{{ asset('/img/logosub.png') }}" width="15%"/>
					</a>
					@endif
				</div>
		        <h4>
		            <a href="/"><h3 style="color: #ff65a3;"><span class="glyphicon glyphicon-arrow-left"></span> {{ trans('article-show.home') }}</h3></a>
		        </h4>
		
		        <h2 style="text-align: center; margin-top: 50px;">{{ $article->title }}</h2>
		        <hr>
		        <div id="date" style="text-align: right;">
		            {{ trans('article-show.writer') }}: {{ $article->User->name }}　 {{ trans('article-show.date') }}: {{ $article->updated_at }}
		        </div>
		        <div id="content" style="margin: 20px;">
					@include('layouts.markdown',['id' => $article->id, 'body' => $article->body])
		        </div>
		        
		        <div id="comments" style="margin-top: 50px;">
		
		            @if (count($errors) > 0)
		                <div class="alert alert-danger">
		                    <strong>{{ trans('article-show.error') }}</strong> {{ trans('article-show.input-error') }}<br><br>
		                    {!! implode('<br>', $errors->all()) !!}
		                </div>
		            @endif
		
		            <div id="new">
		                <form action="{{ url('comment') }}" method="POST">
		                    {!! csrf_field() !!}
		                    <input type="hidden" name="article_id" value="{{ $article->id }}">
		                    <div class="form-group">
		                        <label>{{ trans('article-show.nickname') }}</label>
		                        <input type="text" name="nickname" class="form-control" required="required">
		                    </div>
		                    <div class="form-group">
		                        <label>{{ trans('article-show.email') }}</label>
		                        <input type="email" name="email" class="form-control">
		                    </div>
		                    <div class="form-group">
		                        <label>{{ trans('article-show.home-page') }}</label>
		                        <input type="text" name="website" class="form-control">
		                    </div>
		                    <div class="form-group">
		                        <label>{{ trans('article-show.content') }}</label>
		                        <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required"></textarea>
		                    </div>
		                    <button type="submit" class="btn btn-lg btn-success col-lg-12">{{ trans('article-show.submit') }}</button>
		                </form>
		            </div>
		
		            <script>
		            function reply(a) {
		              var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
		              var textArea = document.getElementById('newFormContent');
		              textArea.innerHTML = '@'+nickname+' ';
		            }
		            </script>
		
		            <div class="conmments" style="margin-top: 100px;">
		                @foreach ($article->Comments as $comment)
		
		                    <div class="one" style="border-top: solid 20px #efefef; padding: 5px 20px;">
		                        <div class="nickname" data="{{ $comment->nickname }}">
		                            @if ($comment->website)
		                                <a href="{{ $comment->website }}">
		                                    <h3>{{ $comment->nickname }}</h3>
		                                </a>
		                            @else
		                                <h4>{{ $comment->nickname }}</h4>
		                            @endif
		                            <h6>{{ trans('article-show.date') }}: {{ $comment->created_at }}</h6>
		                        </div>
		                        <div class="content">
		                            <p style="padding: 20px;">
		                                {!! nl2br(e($comment->content)) !!}
		                            </p>
		                        </div>
		                        <div class="reply" style="text-align: right; padding: 5px;">
		                            <a href="#new" onclick="reply(this);">{{ trans('article-show.reply') }}</a>
		                        </div>
		                    </div>
		
		                @endforeach
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
