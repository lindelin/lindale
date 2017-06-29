<form action="{{ $url }}" method="POST" role="form" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if($method ?? false)
        {{ method_field($method) }}
    @endif
    {{ $slot }}
</form>