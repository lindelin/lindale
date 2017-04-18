<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tbody>

        <tr>
            <th>
                <span class="{{ Colorable::textColorClass($model->color_id) }}">
                    {{ trans('config.type-name') }}
                </span>
            </th>
            <th>{{ trans('common.updated') }}</th>
            <th>{{ trans('common.created') }}</th>
            <th>{{ trans('common.edit') }}</th>
        </tr>

        @foreach($models as $model)
            <tr>
                <td>{{ trans($model->name) }}</td>
                <td>{{ $model->updated_at }}</td>
                <td>{{ $model->created_at }}</td>
                <td>
                    @include('layouts.config.common.type-edit', [
                    'model' => $model,
                    'edit_url' => $edit_url.'/'.$model->id
                    ])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>