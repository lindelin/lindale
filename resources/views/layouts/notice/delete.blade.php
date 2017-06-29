@component('components.modals.form', ['type' => 'button', 'target' => 'deleteNotice'.$notice->id, 'size' => ''])

    @slot('link')
        class='btn btn-danger btn-xs'
    @endslot
    @slot('url')
        {{ route('notice.delete', compact('project', 'notice')) }}
    @endslot
    @slot('linkTitle')
        <span class="glyphicon glyphicon-trash"></span>
    @endslot
    @slot('modalTitle')
        {{ trans('project.notice') }}{{ trans('common.delete') }}
    @endslot
    @slot('modalFooter')
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger">
            <span class="glyphicon glyphicon-trash"></span> {{ trans('common.delete') }}
        </button>
    @endslot
    {{ trans('common.delete-info', ['name' => trans('project.notice')]) }}

@endcomponent