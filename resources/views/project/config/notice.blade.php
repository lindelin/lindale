@component('components.project.config', compact('project', 'selected', 'mode'))
    @component('components.well')
        @slot('title')
            <span class="glyphicon glyphicon-bullhorn lindale-icon-color"></span> {{ trans('project.notice') }}
        @endslot

        @include('layouts.notice.add')
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                        <th>
                            {{ trans('common.edit') }}
                        </th>
                        <th>
                            {{ trans('common.delete') }}
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
                                    {{ $notice->title }}
                                </td>
                                <td>
                                    @include('layouts.notice.edit')
                                </td>
                                <td>
                                    @include('layouts.notice.delete')
                                </td>
                            </tr>
                        @endforeach
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endcomponent