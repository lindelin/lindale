@extends('layouts.master')

@section('title')
    {{ trans('header.admin') }} - {{ config('app.title') }}
@endsection

@section('content')
    @include('layouts.common.message')

    <div class="row">
        {{-- 框架 --}}
        @include('layouts.admin.header')
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            <div class="well well-home">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h1 class="display-4">Routes ({{ count($routes) }})</h1>

                        <div class="table-responsive">
                            <table class="table table-sm table-hover" style="visibility: hidden;">
                            <thead>
                            <tr>
                                <th>Methods</th>
                                <th class="domain">Domain</td>
                                <th>Path</td>
                                <th>Name</th>
                                <th>Action</th>
                                <th>Middleware</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $methodColours = ['GET' => 'success', 'HEAD' => 'default', 'POST' => 'primary', 'PUT' => 'warning', 'PATCH' => 'info', 'DELETE' => 'danger']; ?>
                            @foreach ($routes as $route)
                                <tr>
                                    <td>
                                        @foreach (array_diff($route->methods(), []) as $method)
                                            <span class="tag tag-{{ array_get($methodColours, $method) }}">{{ $method }}</span>
                                        @endforeach
                                    </td>
                                    <td class="domain{{ strlen($route->domain()) == 0 ? ' domain-empty' : '' }}">{{ $route->domain() }}</td>
                                    <td>{!! preg_replace('#({[^}]+})#', '<span class="text-warning">$1</span>', $route->uri()) !!}</td>
                                    <td>{{ $route->getName() }}</td>
                                    <td>{!! preg_replace('#(@.*)$#', '<span class="text-warning">$1</span>', $route->getActionName()) !!}</td>
                                    <td>
                                        @if (is_callable([$route, 'controllerMiddleware']))
                                            {{ implode(', ', array_map($middlewareClosure, array_merge($route->middleware(), $route->controllerMiddleware()))) }}
                                        @else
                                            {{ implode(', ', $route->middleware()) }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>

                        <script type="text/javascript">
                            function hideEmptyDomainColumn() {
                                var table = document.querySelector('.table');
                                var domains = table.querySelectorAll('tbody .domain');
                                var emptyDomains = table.querySelectorAll('tbody .domain-empty');
                                if (domains.length == emptyDomains.length) {
                                    table.className += ' hide-domains';
                                }

                                table.style.visibility = 'visible';
                            }

                            hideEmptyDomainColumn();
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection