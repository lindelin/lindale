@component('components.project.config', compact('project', 'selected', 'mode'))
    @component('components.well')
        @slot('title')
            <span class="glyphicon glyphicon-globe lindale-icon-color"></span> {{ trans('config.locale') }}
        @endslot
        @component('components.elements.form', ['url' => route('config.locale.update', compact('project')), 'method' => 'PATCH'])
            @component('components.grids.12-11-10-8')
                {{-- 项目语言设置 --}}
                @component('components.elements.form.select', ['name' => config('config.project.lang')])
                    @slot('label')
                        {{ trans('project.lang') }}
                    @endslot
                    @foreach( config('app.available_locales') as $lang)
                        <option value="{{ $lang }}" @if(old(config('config.project.lang')) ? old(config('config.project.lang')) : project_config($project, config('config.project.lang')) == $lang)  selected @endif>
                            {{ config('app.available_language')[$lang] }}
                        </option>
                    @endforeach
                @endcomponent
                @include('layouts.config.common.save-button')
            @endcomponent
        @endcomponent
    @endcomponent
@endcomponent