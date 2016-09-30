<div class="list-group">

    <a href="{{ url('admin') }}" class="list-group-item @if($mode == 'center') active @endif">
        <span class="glyphicon glyphicon-home"></span> {{ trans('admin.center') }}
    </a>

    <a href="{{ url('admin/user') }}" class="list-group-item @if($mode == 'user') active @endif">
        <span class="glyphicon glyphicon-user"></span> {{ trans('admin.user') }}
    </a>

    <a href="#" class="list-group-item">
        Morbi leo risus
    </a>

    <a href="#" class="list-group-item">
        Porta ac consectetur ac
    </a>

    <a href="#" class="list-group-item">
        Vestibulum at eros
    </a>

</div>