<!-- 模态窗按钮 -->
<a {{ $link }} data-toggle="modal" data-target="#{{ $target }}">
    {{ $linkTitle }}
</a>
<!-- 模态窗 -->
<div class="modal fade" id="{{ $target }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog {{ $size }}" role="document">
        <div class="modal-content">
            <div class="modal-header" style="color: #000000">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="left">{{ $modalTitle }}</h4>
            </div>
            <div class="modal-body">
            {{ $slot }}
            </div>
            <div class="modal-footer" style="color: #000000">
                {{ $modalFooter }}
            </div>
        </div>
    </div>
</div>