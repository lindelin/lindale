<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if(Auth::user()->photo != '')
            <a href="#" class="thumbnail">
                <img src="{{ asset('storage/'.Auth::user()->photo) }}">
            </a>
        @else
            <a href="#" class="thumbnail">
                <img src="{{ asset('img/admin.png') }}">
            </a>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h2>{{ Auth::user()->name }}<br> <small>{{ Auth::user()->email }}</small></h2>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if(Auth::user()->content)
            <div class="panel panel-default">
                <div class="panel-body">
                    {{ Auth::user()->content }}
                </div>
            </div>
        @else
            <div class="list-group">
                <a href="#" class="list-group-item"><span class="glyphicon glyphicon-plus"></span> 添加自我介绍</a>
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <a href="#" class="btn btn-success btn-block">编辑个人资料</a>
    </div>
</div>
<hr>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

	</div>
</div>