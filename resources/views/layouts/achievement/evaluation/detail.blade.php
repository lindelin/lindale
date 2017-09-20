<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading{{ $evaluation->id }}">
            <div class="row">
                <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
                    @include('layouts.common.user-img', ['user_img' => $evaluation->User])
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h4 style="margin-top: 0;">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $evaluation->id }}" aria-expanded="false" aria-controls="collapse{{ $evaluation->id }}">
                                    {{ trans('task.finish') }}：#{{ sprintf("%07d", $evaluation->task->id) }} {{ $evaluation->task->title }}
                                </a>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h5 style="margin-top: 0;">
                                {{ trans('task.user') }}：{{ $evaluation->User->name }}
                                <small>{{ $evaluation->User->email }}</small>
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <form action="{{ route('evaluation.update', compact('project', 'evaluation')) }}" method="POST" role="form" enctype="multipart/form-data" style="display: inline; margin-right: 8px;">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="evaluation" value="1">
                                <button type="submit" class="btn btn-danger btn-xs" style="border-radius: 100px !important;">
                                    &nbsp;<span class="glyphicon glyphicon-star"></span>&nbsp;
                                </button>
                            </form>
                            <form action="{{ route('evaluation.update', compact('project', 'evaluation')) }}" method="POST" role="form" enctype="multipart/form-data" style="display: inline; margin-right: 8px;">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="evaluation" value="2">
                                <button type="submit" class="btn btn-warning btn-xs" style="border-radius: 100px !important;">
                                    &nbsp;<span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>&nbsp;
                                </button>
                            </form>
                            <form action="{{ route('evaluation.update', compact('project', 'evaluation')) }}" method="POST" role="form" enctype="multipart/form-data" style="display: inline; margin-right: 8px;">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="evaluation" value="3">
                                <button type="submit" class="btn btn-info btn-xs" style="border-radius: 100px !important;">
                                    &nbsp;<span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>&nbsp;
                                </button>
                            </form>
                            <form action="{{ route('evaluation.update', compact('project', 'evaluation')) }}" method="POST" role="form" enctype="multipart/form-data" style="display: inline; margin-right: 8px;">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="evaluation" value="4">
                                <button type="submit" class="btn btn-primary btn-xs" style="border-radius: 100px !important;">
                                    &nbsp;<span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>&nbsp;
                                </button>
                            </form>
                            <form action="{{ route('evaluation.update', compact('project', 'evaluation')) }}" method="POST" role="form" enctype="multipart/form-data" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="evaluation" value="5">
                                <button type="submit" class="btn btn-success btn-xs" style="border-radius: 100px !important;">
                                    &nbsp;<span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>&nbsp;
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapse{{ $evaluation->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $evaluation->id }}">
            <div class="panel-body">
                @include('layouts.task.common.task', ['task' => $evaluation->task])
            </div>
        </div>
    </div>
</div>