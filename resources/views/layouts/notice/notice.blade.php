@component('components.well')
    @slot('title')
        <span class="glyphicon glyphicon-bullhorn lindale-icon-color"></span> {{ trans('project.notice') }}
    @endslot

    @component('components.elements.table')
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
                                    {!! markdown($notice->content) !!}
                                </div>
                            </div>
                        @endcomponent
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endcomponent