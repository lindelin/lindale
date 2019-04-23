<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
    {{ csrf_field() }}

    <auth-form-input name="email"
                     type="email"
                     display-name="{{ trans('auth.email') }}"
                     :is-invalid="@json($errors->has('email'))"
                     value="{{ old('email') }}"></auth-form-input>

    <div class="form-group">
        <button class="btn btn-primary submit-btn btn-block">
            {{ trans('auth.sent') }}
        </button>
    </div>

    <div class="text-block text-right my-3">
        @include('auth._lang_switch')
    </div>
</form>