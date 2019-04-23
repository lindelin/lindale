<form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
    {{ csrf_field() }}
    <auth-form-input name="email"
                     type="email"
                     display-name="{{ trans('auth.email') }}"
                     :is-invalid="@json($errors->has('email'))"
                     value="{{ old('email') }}"></auth-form-input>
    <auth-form-input name="password"
                     type="password"
                     display-name="{{ trans('auth.password') }}"
                     :is-invalid="@json($errors->has('password'))"
                     value=""></auth-form-input>
    <div class="form-group">
        <button class="btn btn-primary submit-btn btn-block">
            <icon icon="sign-in-alt" size="1x"></icon> {{ trans('auth.login') }}
        </button>
    </div>
    <div class="form-group d-flex justify-content-between">
        <auth-checkout-box name="remember" display-name="{{ trans('auth.remember') }}"></auth-checkout-box>
        <a href="{{ url('/password/reset') }}" class="text-small forgot-password text-black">{{ trans('auth.forgot') }}</a>
    </div>
    <div class="text-block text-right my-3">
        @include('auth._lang_switch')
    </div>
</form>