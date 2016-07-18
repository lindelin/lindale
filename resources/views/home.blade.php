<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lindale</title>

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
		        <div style="padding: 5px; font-size: 16px;"></div>
		    </div>
		    <hr>
		    <div id="content">
		        <ul>
		            @foreach ($articles as $article)
		            <li style="margin: 50px 0;">
		                <div class="title">
		                    <a href="{{ url('article/'.$article->id) }}">
		                        <h4>{{ $article->title }}</h4>
		                    </a>
		                </div>
		                <div class="body">
		                    <p>{{ $article->body }}</p>
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