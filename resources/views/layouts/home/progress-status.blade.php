<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4 class="lindale-color">
            <i class="fa fa-area-chart lindale-icon-color" aria-hidden="true"></i>
            {{ trans('header.my').trans('progress.status') }}
        </h4>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-home">
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {!! $userProgressAreaspline->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>