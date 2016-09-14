<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" @if($mode == "home") class="active" @endif><a href="#">首页</a></li>
            <li role="presentation" @if($mode == "2") class="active" @endif><a href="#">概要</a></li>
            <li role="presentation" @if($mode == "2") class="active" @endif><a href="#">掲示板</a></li>
            <li role="presentation" @if($mode == "2") class="active" @endif><a href="#">メッセージ</a></li>
            <li role="presentation" @if($mode == "2") class="active" @endif><a href="#">進捗</a></li>
            <li role="presentation" @if($mode == "3") class="active" @endif><a href="#">任务</a></li>
            <li role="presentation" @if($mode == "6") class="active" @endif><a href="#">todo</a></li>
            <li role="presentation" @if($mode == "4") class="active" @endif><a href="#">成员</a></li>
            <li role="presentation" @if($mode == "4") class="active" @endif><a href="#">日报</a></li>
            <li role="presentation" @if($mode == "5") class="active" @endif><a href="#">WIKI</a></li>
            <li role="presentation" @if($mode == "7") class="active" @endif><a href="#">设定</a></li>
        </ul>
    </div>
</div>