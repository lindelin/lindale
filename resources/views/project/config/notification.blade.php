@component('components.project.config', compact('project', 'selected', 'mode'))
    {{-- Slack --}}
    @include('layouts.config.notification.slack')
    {{-- Slack END --}}
@endcomponent