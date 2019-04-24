<alert :messages="{{ json_encode($errors->all()) }}" type="alert-danger"></alert>
<alert :messages="{{ json_encode(session('status') ? [session('status')] : null) }}" type="alert-success"></alert>