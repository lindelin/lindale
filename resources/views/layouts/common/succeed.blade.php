@if (session('status'))
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <span class="glyphicon glyphicon-ok-sign"></span> {{ session('status') }}
            </div>
        </div>
    </div>
@endif