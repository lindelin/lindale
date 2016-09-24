@if (count($errors) > 0)
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                @foreach ($errors->all() as $error)
                    <span class="glyphicon glyphicon-exclamation-sign"></span> {{ $error }}<br>
                @endforeach
            </div>
        </div>
    </div>
@endif