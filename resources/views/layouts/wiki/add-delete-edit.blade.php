<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="right">
        <a href="{{ url("project/$project->id/wiki/create") }}" class="btn btn-link my-tooltip" title="{{ trans('wiki.submit') }}">
            <h4 class="text-success"><span class="glyphicon glyphicon-plus"></span></h4>
        </a>
        @if(isset($is_index) == 'index')
            <a href="{{ url("project/$project->id/wiki/$HomeWiki->id/edit") }}" class="btn btn-link my-tooltip" title="{{ trans('wiki.edit-title') }}">
                <h4 class="text-info"><span class="glyphicon glyphicon-edit"></span></h4>
            </a>
        @else
            <a href="{{ url("project/$project->id/wiki/$wiki->id/edit") }}" class="btn btn-link my-tooltip" title="{{ trans('wiki.edit-title') }}">
                <h4 class="text-info"><span class="glyphicon glyphicon-edit"></span></h4>
            </a>

            <!-- 模态窗按钮 -->
            <button type="button" class="btn btn-link my-tooltip" title="{{ trans('wiki.delete-title') }}" data-toggle="modal" data-target="#projectDelete">
                <h4 class="text-danger"><span class="glyphicon glyphicon-trash"></span></h4>
            </button>

            <!-- 模态窗 -->
            <div class="modal fade" id="projectDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                            </button>
                            <h4 class="modal-title text-danger" id="myModalLabel" align="left">{{ trans('wiki.delete-title') }}</h4>
                        </div>
                        <form action="{{ url("project/$project->id/wiki/$wiki->id") }}" method="POST" style="display: inline;">
                            <div class="modal-body" align="left">
                                {{ trans('wiki.delete-input') }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove"></span> {{ trans('project.cancel') }}
                                </button>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> {{ trans('wiki.delete') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>