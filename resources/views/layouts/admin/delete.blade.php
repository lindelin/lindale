<!-- 模态窗按钮 -->
<button type="button" class="btn btn-danger btn-xs my-tooltip" title="{{ trans('user.delete-user').$user->email }}" data-toggle="modal" data-target="#userDelete{{ $user->id }}">
    <span class="glyphicon glyphicon-trash"></span>
</button>

<!-- 模态窗 -->
<div class="modal fade" id="userDelete{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title text-danger" id="myModalLabel" align="left">{{ trans('user.delete-input') }}</h4>
            </div>
            <form action="{{ url('admin/user/'.$user->id) }}" method="POST" style="display: inline;">
                <div class="modal-body" align="left">
                    <h3 class="text-danger">{{ $user->name }}（{{ $user->email }}）</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span> {{ trans('user.cancel') }}
                    </button>
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> {{ trans('user.delete') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>