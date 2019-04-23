@extends('layouts.auth')

@section('title')
    {{ trans('auth.login') }} | {{ config('app.name') }}
@endsection

@section('content')
    <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <div class="auto-form-wrapper">
                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="{{ url('login') }}" class="">
                                <icon icon="arrow-alt-circle-left" size="2x"></icon>
                            </a>
                        </div>
                    </div>
                    @include('auth.passwords._send_email_form')
                </div>
                @include('auth._footer')
            </div>
        </div>
    </div>
@endsection