@extends('layouts.auth-master')

@section('panel-title')
    Authorization Request
@endsection

@section('panel-body')

    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- Introduction -->
            <p><strong>{{ $client->name }}</strong> is requesting permission to access your account.</p>
    	</div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- Scope List -->
            @if (count($scopes) > 0)
                <div class="scopes">
                    <p><strong>This application will be able to:</strong></p>

                    <ul>
                        @foreach ($scopes as $scope)
                            <li>{{ $scope->description }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="right">
            <!-- Authorize Button -->
            <form method="post" action="/oauth/authorize">
                {{ csrf_field() }}

                <input type="hidden" name="state" value="{{ $request->state }}">
                <input type="hidden" name="client_id" value="{{ $client->id }}">
                <button type="submit" class="btn btn-success btn-approve">Authorize</button>
            </form>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="left">
            <!-- Cancel Button -->
            <form method="post" action="/oauth/authorize">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <input type="hidden" name="state" value="{{ $request->state }}">
                <input type="hidden" name="client_id" value="{{ $client->id }}">
                <button class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </div>

@endsection