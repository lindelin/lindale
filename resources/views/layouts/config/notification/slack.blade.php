@component('components.well')
    @slot('title')
        <i class="fa fa-slack lindale-icon-color" aria-hidden="true"></i> {{ trans('config.slack-notify') }}
    @endslot
    @component('components.elements.form', ['url' => route('config.notification.update', compact('project')), 'method' => 'PATCH'])
        @component('components.grids.12-11-10-8')
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                    <a href="#" class="thumbnail">
                        <img src="{{ asset('img/ico/Slack-icon.png') }}">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
                    <h3>Slack</h3>
                    <hr>
                    <p>{{ trans('config.notifiable') }}</p>
                    @component('components.elements.form.switch', ['name' => config('config.project.slack')])
                        {{ project_config($project, config('config.project.slack')) }}
                    @endcomponent
                </div>
            </div>
            {{-- API Key --}}
            @component('components.elements.form.text',
            [
                'name' => config('config.project.key.slack'),
                'value' => project_config($project, config('config.project.key.slack'))
            ])
                WebHook
            @endcomponent
            @include('layouts.config.common.save-button')
        @endcomponent
    @endcomponent
@endcomponent