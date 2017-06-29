@component('vendor.mail.markdown.message')
## {{ trans('email.hello') }}
{{ trans('errors.send-slack-failed-message') }}

### {{ trans('member.pl') }}：{{ $project->ProjectLeader->name }}
### {{ trans('header.project') }}：{{ $project->title }}
### {{ trans('header.message') }}：{{ trans('errors.send-slack-failed') }}

@component('mail::button', ['url' => url('/project/'.$project->id.'/config/notification')])
{{ trans('config.project-config') }}
@endcomponent

{{ trans('email.regards') }}<br>
{{ config('app.name') }}
@endcomponent
