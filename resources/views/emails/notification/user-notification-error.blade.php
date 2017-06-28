@component('vendor.mail.markdown.message')
## {{ trans('email.hello') }}
{{ trans('errors.send-slack-failed') }}

@component('mail::button', ['url' => url('/settings/notification')])
    {{ trans('header.settings') }}
@endcomponent

{{ trans('email.regards') }}<br>
{{ config('app.name') }}
@endcomponent
