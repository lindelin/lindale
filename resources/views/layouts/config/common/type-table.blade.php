<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>{{ trans('config.type-name') }}</th>
            <th>{{ trans('user.updated') }}</th>
            <th>{{ trans('user.created') }}</th>
            <th>{{ trans('config.delete') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            <tr>
                <td>{{ trans($model->name) }}</td>
                <td>{{ $model->updated_at }}</td>
                <td>{{ $model->created_at }}</td>
                <td>
                    @include('layouts.config.common.type-delete', [
                    'model' => $model,
                    'delete_url' => '#',/* TODO: URL */
                    ])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>