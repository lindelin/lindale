<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading" style="{{ Colorable::lindale() }}">Wiki</div>
            <div class="panel-body">
                <p>{{ trans('wiki.index') }}</p>
            </div>

            <!-- List group -->
            <ul class="list-group">
                @foreach( $wikis as $wiki)
                    @if( $wiki->type_id === 0 or $wiki->type_id === 1)
                        <a class="list-group-item" href="{{ url("project/$project->id/wiki/$wiki->id") }}">
                            {{ $wiki->title }}
                            @if($wiki->type_id === 0) ({{ trans('wiki.default') }}) @endif
                        </a>
                    @endif
                @endforeach
                    <li class="list-group-item"><div align="center">{{ $wikis->links() }}</div></li>
            </ul>

        </div>
    </div>
</div>
@foreach( $types as $type)
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading" style="{{ Colorable::lindale() }}">{{ $type->name }}</div>
                <div class="panel-body">
                    <p>{{ trans('wiki.index') }}</p>
                </div>

                <!-- List group -->
                <ul class="list-group">
                    @foreach( $wikis as $wiki)
                        @if( $wiki->type_id === $type->id)
                            <a class="list-group-item" href="{{ url("project/$project->id/wiki/$wiki->id") }}">
                                {{ $wiki->title }}
                                @if($wiki->type_id === 0) ({{ trans('wiki.default') }}) @endif
                            </a>
                        @endif
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
@endforeach