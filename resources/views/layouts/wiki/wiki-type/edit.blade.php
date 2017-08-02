<!-- 模态窗按钮 -->
<script>
    $(document).ready(function(){
        $('#checkbox-delete{{ $type->id }}').change(function () {
            $('#delete{{ $type->id }}').prop("disabled", $(this).is(':checked') == false);
        }).change();
    });
</script>
<h4 class="panel-title">
    <a class="my-tooltip" title="{{ trans('wiki.edit-index') }}" data-toggle="modal" data-target="#editIndex{{ $type->id }}">
        <span class="glyphicon glyphicon-cog lindale-icon-color"></span>
    </a>
</h4>

<!-- 模态窗 -->
<div class="modal fade" id="editIndex{{ $type->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="color: #000000">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="left">
                    {{ trans('wiki.edit-index') }}
                    <small class="text-danger">
                        <span class="glyphicon glyphicon-trash"></span>
                        <label for="checkbox-delete{{ $type->id }}">{{ trans('todo.delete') }}</label>
                        <input type="checkbox" id="checkbox-delete{{ $type->id }}">
                    </small>
                </h4>
            </div>
            <form action="{{ url("/project/$project->id/wiki-index/$type->id") }}" method="POST" style="display: inline;">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="modal-body" align="left" style="color: #000000">

                    {{-- 索引 --}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('type_name') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('wiki.index') }}
                                </label>
                                <div>
                                    <input type="text" class="form-control" name="type_name" value="{{ $type->name }}">
                                    @include('layouts.common.error-one', ['field' => 'type_name'])
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span> {{ trans('wiki.cancel') }}
                            </button>
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-edit"></span> {{ trans('wiki.edit') }}
                            </button>
                    	</div>
                    </div>

                </div>
            </form>
            <div class="modal-footer" style="color: #000000">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form action="{{ url("/project/$project->id/wiki-index/$type->id") }}" method="post" role="form">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-block" id="delete{{ $type->id }}">
                                <span class="glyphicon glyphicon-trash"></span> {{ trans('wiki.delete-index') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>