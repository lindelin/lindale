@extends('layouts.master')

@section('title')
    Admin
@endsection

@section('content')
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            @include('layouts.admin.menu')
        </div>
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Users Information Center</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                    	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <h3>{{ trans('user.user-list') }}</h3>
                    	</div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            @include('layouts.admin.add')
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                    	<table class="table table-hover">
                    		<thead>
                    			<tr>
                    				<th>#</th>
                                    <th>{{ trans('user.email') }}</th>
                                    <th>{{ trans('user.name') }}</th>
                                    <th>{{ trans('user.updated') }}</th>
                                    <th>{{ trans('user.created') }}</th>
                                    <th>{{ trans('user.delete') }}</th>
                    			</tr>
                    		</thead>
                    		<tbody>
                    			@foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>@include('layouts.admin.delete')</td>
                                    </tr>
                                @endforeach
                    		</tbody>
                    	</table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection