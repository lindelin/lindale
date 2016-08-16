<div id="comments" style="margin-top: 50px;">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>{{ trans('article-show.error') }}</strong> {{ trans('article-show.input-error') }}<br><br>
            {!! implode('<br>', $errors->all()) !!}
        </div>
    @endif

    <div id="new">
        <form action="{{ url('admin/task/comment') }}" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="task_id" value="{{ $task->id }}">
            <input type="hidden" name="user_id" value="{{ Auth::getUser()->id }}">
            <div class="form-group">
                <label>{{ trans('task.logs') }}</label>
                <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required"></textarea>
            </div>
            <button type="submit" class="btn btn-lg btn-success col-lg-12">{{ trans('task.add-logs') }}</button>
        </form>
    </div>

    <script>
        function reply(a) {
            var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
            var textArea = document.getElementById('newFormContent');
            textArea.innerHTML = '@'+nickname+' ';
        }
    </script>

    <div class="conmments" style="margin-top: 100px;">
        @foreach ($task->Comments as $comment)

            <div class="one" style="border-top: solid 20px #efefef; padding: 5px 20px;">
                <div class="nickname" data="{{ $comment->User->name }}">
                    <h4>{{ $comment->User->name }}</h4>
                    <h6>{{ trans('task.created_at') }}: {{ $comment->created_at }}</h6>
                </div>
                <div class="content">
                    <p style="padding: 20px;">
                        {!! nl2br(e($comment->content)) !!}
                    </p>
                </div>
                <div class="reply" style="text-align: right; padding: 5px;">
                    <a href="#new" onclick="reply(this);">{{ trans('article-show.reply') }}</a>
                </div>
            </div>

        @endforeach
    </div>
</div>