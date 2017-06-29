@component('vendor.mail.markdown.message')
## {{ trans('email.hello') }}
{{ trans('errors.send-slack-failed-message') }}

### {{ trans('member.pl') }}：{{ $notice->Project->ProjectLeader->name }}
### {{ trans('header.project') }}：{{ $notice->Project->title }}
### {{ trans('header.message') }}：

# 【{{ trans($notice->Type->name) }}】{{ $notice->title }}
{{ $notice->content }}

@component('mail::button', ['url' => route('project.show', ['project' => $notice->Project])])
View
@endcomponent

{{ trans('email.regards') }}<br>
{{ config('app.name') }}
@endcomponent
