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
@if(isset($add_wiki_index) == 'on')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading" style="{{ Colorable::lindale() }}">{{ trans('wiki.add-index') }}</div>
                <div class="panel-body">
                    <form action="{{ url("project/$project->id/wiki-index") }}" method="POST" role="form">
                        {{ csrf_field() }}

                        {{-- 添加索引 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('type_name') ? ' has-error' : '' }}">
                                <div>
                                    <input type="text" class="form-control" name="type_name" value="{{ old('type_name') }}">
                                    @include('layouts.common.error-one', ['field' => 'type_name'])
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                <span class="glyphicon glyphicon-plus"></span> {{ trans('wiki.add-index') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="list-group">
            <a href="{{ url("project/$project->id/wiki-index/create") }}" class="list-group-item">
                <span class="glyphicon glyphicon-plus"></span> {{ trans('wiki.add-index') }}
            </a>
        </div>
	</div>
</div>

