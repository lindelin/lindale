<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <auth-form-input name="email"
                     type="email"
                     display-name="{{ trans('auth.email') }}"
                     :is-invalid="@json($errors->has('email'))"
                     value="{{ $email ?? old('email') }}"></auth-form-input>
    <auth-form-input name="password"
                     type="password"
                     display-name="{{ trans('auth.password') }}"
                     :is-invalid="@json($errors->has('password'))"
                     value=""></auth-form-input>
    <auth-form-input name="password_confirmation"
                     type="password"
                     display-name="{{ trans('auth.confirm_password') }}"
                     :is-invalid="@json($errors->has('password_confirmation'))"
                     value=""></auth-form-input>

    <div class="form-group">
        <button class="btn btn-primary submit-btn btn-block">
            {{ trans('auth.reset') }}
        </button>
    </div>

    <div class="text-block text-right my-3">
        @include('auth._lang_switch')
    </div>
</form>