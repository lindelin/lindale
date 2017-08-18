@component('components.modals.form', ['type' => 'a', 'target' => 'addFavorites-', 'size' => ''])
    @slot('link')
        href="#"
    @endslot
    @slot('linkTitle')
        <span class="glyphicon glyphicon-plus text-success"></span>
    @endslot
    @slot('modalTitle')
        お気に入り追加
    @endslot
    @slot('modalFooter')
        {{ csrf_field() }}
        <button type="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span> {{ trans('common.add') }}
        </button>
    @endslot
    @slot('url')
        {{ route('add.favorites') }}
    @endslot
    @component('components.elements.form.select', ['name' => 'project_id'])
        @slot('label')
        @endslot
        @if($myProjects)
            @foreach($myProjects as $project)
                <option value="{{ $project->id }}">
                    {{ $project->title }}
                </option>
            @endforeach
        @endif
        @if($userProjects)
            @foreach($userProjects as $project)
                <option value="{{ $project->id }}">
                    {{ $project->title }}
                </option>
            @endforeach
        @endif
    @endcomponent
@endcomponent