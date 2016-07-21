<?php 
    function cut_str($str,$len,$suffix="..."){
        if(function_exists('mb_substr')){
            if(strlen($str) > $len){
                $str= mb_substr($str,0,$len).$suffix;
            }
            return $str;
        }else{
            if(strlen($str) > $len){
                $str= substr($str,0,$len).$suffix;
            }
            return $str;
        }         
    }
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lindalë</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <div id="title" style="text-align: center;">
		    	<br>
		        <img alt="Bootstrap Image Preview" src="{{ asset('/img/logomin.png') }}" width="50%"/>
		        <div style="padding: 5px; font-size: 16px;">...is a word from J.R.R. Tolkien's elvish language named Quenya and <br>means "to sing" or "to make music."</div>
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
</body>
</html>
