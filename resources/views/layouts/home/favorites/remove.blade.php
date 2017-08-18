@component('components.modals.form', ['type' => 'a', 'target' => 'removeFavorites-', 'size' => ''])
    @slot('link')
        href="#"
    @endslot
    @slot('linkTitle')
        <span class="glyphicon glyphicon-minus text-danger"></span>
    @endslot
    @slot('modalTitle')
        お気に入り削除
    @endslot
    @slot('modalFooter')
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger">
            <span class="glyphicon glyphicon-minus"></span> {{ trans('common.delete') }}
        </button>
    @endslot
    @slot('url')
        {{ route('remove.favorites') }}
    @endslot
    @component('components.elements.form.select', ['name' => 'project_id'])
        @slot('label')
        @endslot
        @if(Auth::user()->favorites)
            @foreach(Auth::user()->favorites as $project)
                <option value="{{ $project->id }}">
                    {{ $project->title }}
                </option>
            @endforeach
        @endif
    @endcomponent
@endcomponent