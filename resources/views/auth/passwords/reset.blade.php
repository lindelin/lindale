@extends('layouts.auth')

@section('title')
    {{ trans('auth.reset') }} | {{ config('app.name') }}
@endsection

@section('content')
    <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <h2 class="text-center mb-4">{{ trans('auth.reset') }}</h2>
                <div class="auto-form-wrapper">
                    @include('auth.passwords._reset_form')
                </div>
            </div>
        </div>
    </div>
@endsection