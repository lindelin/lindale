<style type="text/css">

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.015);
    }

    .table td, .table th {
        border-top: none;
        font-size: 14px;
    }

    .table thead th {
        border-bottom: 1px solid #ff5722;
    }

    .text-warning {
        color: #eb5b4f !important;
    }

    .label {
        padding: 0.30em 0.8em;
    }

    table.hide-domains .domain {
        display: none;
    }

</style>
<div class="well well-home">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="lindale-color"><span class="glyphicon glyphicon-road lindale-icon-color"></span> Routes ({{ count($routes) }})</h3>

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
                    @foreach ($routes as $route)
                        <tr>
                            <td>
                                @foreach (array_diff($route->methods(), ['HEAD']) as $method)
                                    <span class="label label-{{ array_get($methodColours, $method) }}">{{ $method }}</span>
                                @endforeach
                            </td>
                            <td class="domain{{ strlen($route->domain()) == 0 ? ' domain-empty' : '' }}">{{ $route->domain() }}</td>
                            <td>{!! preg_replace('#({[^}]+})#', '<span class="text-warning">$1</span>', $route->uri()) !!}</td>
                            <td>{{ $route->getName() }}</td>
                            <td>{!! preg_replace('#(@.*)$#', '<span class="text-warning">$1</span>', $route->getActionName()) !!}</td>
                            <td>
                                {{ implode(', ', $route->middleware()) }}
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