@component('mail::message')
# {{ trans('email.invite-user-title', ['app' => config('app.name')]) }}

{{ trans('email.invite-user-app', ['app' => config('app.name')]) }}

{{ trans('email.invite-user-body', ['user' => $user->name, 'email' => $user->email]) }}

@component('mail::button', ['url' => route('password.set', ['token' => $token->token])])
{{ trans('email.invite-user-button') }}
@endcomponent

{{ trans('email.error-button', ['name' => trans('email.invite-user-button')]) }}
{{ route('password.set', ['token' => $token->token]) }}

{{ trans('email.regards') }}<br>
{{ config('app.name') }}
@endcomponent
