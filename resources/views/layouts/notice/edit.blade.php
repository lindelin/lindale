@component('components.modals.form', ['type' => 'button', 'target' => 'editNotice'.$notice->id, 'size' => 'modal-lg'])
    @slot('link')
        class='btn btn-warning btn-xs'
    @endslot
    @slot('url')
        {{ route('notice.update', compact('project', 'notice')) }}
    @endslot
    @slot('linkTitle')
        <span class="glyphicon glyphicon-edit"></span>
    @endslot
    @slot('modalTitle')
        {{ trans('project.notice') }}{{ trans('common.edit') }}
    @endslot
    @slot('modalFooter')
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <button type="submit" class="btn btn-warning">
            <span class="glyphicon glyphicon-edit"></span> {{ trans('common.edit') }}
        </button>
    @endslot
    {{-- タイプ --}}
    @component('components.elements.form.select', ['name' => 'type_id'])
        @slot('label')
            {{ trans('common.type') }}
        @endslot

        @foreach( $noticeTypes as $type)
            <option value="{{ $type->id }}" @if(old('type_id') ?? $notice->type_id == $type->id) selected @endif>{{ trans($type->name) }}</option>
        @endforeach
    @endcomponent
    {{-- タイトル --}}
    @component('components.elements.form.text', ['name' => 'title', 'value' => $notice->title])
        {{ trans('common.title') }}
    @endcomponent
    {{-- 内容 --}}
    @component('components.elements.form.markdown', ['name' => 'content', 'value' => $notice->content])
        {{ trans('common.content') }}
    @endcomponent
    {{-- 掲載期間 --}}
    @component('components.elements.form.start-end', ['start_target' => 'noticeStart-'.$notice->id, 'end_target' => 'noticeEnd-'.$notice->id])
        @slot('start')
            {{ trans('notice.start') }}
        @endslot
        @slot('end')
            {{ trans('notice.end') }}
        @endslot
        @slot('start_value')
            {{ $notice->start_at }}
        @endslot
        @slot('end_value')
            {{ $notice->end_at }}
        @endslot
    @endcomponent
@endcomponent