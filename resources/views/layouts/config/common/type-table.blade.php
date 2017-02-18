<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>{{ trans('config.type-name') }}</th>
            <th>{{ trans('common.updated') }}</th>
            <th>{{ trans('common.created') }}</th>
            <th>{{ trans('common.edit') }}</th>
        </tr>
        </thead>
        <tbody>
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