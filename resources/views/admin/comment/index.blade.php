@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">评论管理</div>
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
                            <h6>{{ $comment->created_at }}　E-mail：{{ $comment->email }}</h6>
                            <div class="content">
                                <p>
                                	主页：{{ $comment->website }}
                                </p>
                                <p>
                                	内容：{!! nl2br($comment->content) !!}
                                </p>
                                <p>
                                	文章：<a href="{{ url('/article/'.$comment->hasOneArticle->id) }}">
                                	{{ $comment->hasOneArticle->title }}
                                	</a>
                                </p>
                            </div>
                        </div>
                        <form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection