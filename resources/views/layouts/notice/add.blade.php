<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @component('components.modals.form', ['type' => 'button', 'target' => 'addNotice', 'size' => 'modal-lg'])
            @slot('link')
                class='btn btn-info'
            @endslot
            @slot('url')
                {{ route('notice.store', compact('project')) }}
            @endslot
            @slot('linkTitle')
                {{ trans('common.new') }}
            @endslot
            @slot('modalTitle')
                {{ trans('project.notice') }}
            @endslot
            @slot('modalFooter')
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus"></span> {{ trans('common.add') }}
                </button>
            @endslot
            {{-- タイプ --}}
            @component('components.elements.form.select', ['name' => 'type_id'])
                @slot('label')
                    {{ trans('common.type') }}
                @endslot

                @foreach( $noticeTypes as $type)
                    <option value="{{ $type->id }}" @if(old('type_id') == $type->id) selected @endif>{{ trans($type->name) }}</option>
                @endforeach
            @endcomponent
            {{-- タイトル --}}
            @component('components.elements.form.text', ['name' => 'title'])
                {{ trans('common.title') }}
            @endcomponent
            {{-- 内容 --}}
            @component('components.elements.form.markdown', ['name' => 'content'])
                {{ trans('common.content') }}
            @endcomponent
            {{-- 掲載期間 --}}
            @component('components.elements.form.start-end', ['start_target' => 'noticeCreateStart', 'end_target' => 'noticeCreateEnd'])
                @slot('start')
                    {{ trans('notice.start') }}
                @endslot
                @slot('end')
                    {{ trans('notice.end') }}
                @endslot
            @endcomponent
        @endcomponent
    </div>
</div>