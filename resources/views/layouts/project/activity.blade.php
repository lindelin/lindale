<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-home">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4><i class="fa fa-area-chart lindale-icon-color" aria-hidden="true"></i> {{ trans('progress.status') }}</h4>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {!! $projectActivity->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>