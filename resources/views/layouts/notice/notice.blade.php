@component('components.well')
    @slot('title')
        <span class="glyphicon glyphicon-bullhorn lindale-icon-color"></span> {{ trans('project.notice') }}
    @endslot

    @if($notices->count() > 0)
        @component('components.elements.table')
            <thead>
            <th>
                #
            </th>
            <th>
                {{ trans('common.type') }}
            </th>
            <th>
                {{ trans('common.title') }}
            </th>
            </thead>
            @slot('tbody')
                @foreach($notices as $notice)
                    <tr>
                        <td>
                            #{{ $notice->id }}
                        </td>
                        <td>
                            {!! Colorable::label($notice->Type->color_id, trans($notice->Type->name)) !!}
                        </td>
                        <td>
                            @component('components.modals.link', ['target' => 'notice-'.$notice->id, 'size' => 'modal-lg'])
                                @slot('link')
                                    href="#"
                                @endslot
                                @slot('linkTitle')
                                    {{ $notice->title }}
                                @endslot
                                @slot('modalTitle')
                                    {{ $notice->title }}
                                @endslot
                                @slot('modalFooter')
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remove"></span> {{ trans('todo.cancel') }}
                                    </button>
                                @endslot
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        @component('components.elements.table')
                                            <thead>
                                            <th>
                                                {{ trans('common.type') }}
                                            </th>
                                            <th>
                                                {{ trans('notice.user') }}
                                            </th>
                                            <th>
                                                {{ trans('notice.start') }}
                                            </th>
                                            <th>
                                                {{ trans('notice.end') }}
                                            </th>
                                            </thead>
                                            @slot('tbody')
                                                <tr>
                                                    <td>
                                                        {!! Colorable::label($notice->Type->color_id, trans($notice->Type->name)) !!}
                                                    </td>
                                                    <td>
                                                        {{ $notice->User->name }}
                                                    </td>
                                                    <td>
                                                        {{ $notice->start_at }}
                                                    </td>
                                                    <td>
                                                        {{ $notice->end_at }}
                                                    </td>
                                                </tr>
                                            @endslot
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        {!! markdown($notice->content) !!}
                                    </div>
                                </div>
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            @endslot
        @endcomponent
    @else
        <p>{{ trans('notice.none') }}</p>
    @endif

@endcomponent