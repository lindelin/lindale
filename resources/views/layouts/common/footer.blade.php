<nav class="navbar-inverse navbar-fixed-bottom" role="navigation">
    <div class="container-fluid">
        <div class="col-xs-0 col-sm-0 col-md-4 col-lg-4">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div align="center" style="color: #ffffff">
                &copy; {{ date('Y') }}
                <a style="color: #ffffff" href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>.
                All rights reserved.
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <script language="javascript">
                $(function(){
                    setInterval(function(){
                        $("#currentTime").text(new Date().toLocaleString());
                    },100);
                });
            </script>
            <div id="currentTime" align="center" style="color: #ffffff"></div>
        </div>

    </div>
</nav>
