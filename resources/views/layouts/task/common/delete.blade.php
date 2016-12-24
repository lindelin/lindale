{{-- $model_id :识别ID --}}
{{-- $link_name :链接显示文字 --}}
{{-- $delete_url :删除Action --}}
{{-- $model :删除的对象 --}}
{{-- $model_name :删除的对象名 --}}

<!-- 模态窗按钮 -->
<a href="#{{ $model_id }}" class="text-danger" data-toggle="modal" data-target="#{{ $model_id }}">
    {!! $link_name !!}
</a>

<!-- 模态窗 -->
<div class="modal fade" id="{{ $model_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="left" style="color: #000000">{{ trans('task.delete') }}</h4>
            </div>
            <form action="{{ $delete_url }}" method="POST" style="display: inline;">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}

                <div class="modal-body" align="left" style="color: #000000">

                    <div class="row">
                    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    		<h4 class="text-danger">
                                #{{ $model->id }}{{ $model_name }}&nbsp;&nbsp;{{ trans('task.delete-title') }}
                            </h4>
                    	</div>
                    </div>

                </div>

                <div class="modal-footer" style="color: #000000">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span> {{ trans('task.cancel') }}
                            </button>
                            <button type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon glyphicon-trash"></span> {{ trans('task.delete') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>