<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Personal settings</div>
    <!-- List group -->
    <ul class="list-group">

        <a href="{{ url('admin/user') }}" class="list-group-item @if($mode == 'profile') active @endif">
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
    </ul>
</div>