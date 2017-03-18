<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class='notifications top-right'></div>
    </div>
</div>
@if (session('status'))
    <script>
        $(function(){
            $('.top-right').notify({
                message: { text: '{{ session('status') }}' }
            }).show();
        });
    </script>
@endif
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            $(function(){
                $('.top-right').notify({
                    type: 'danger',
                    closable: true,
                    fadeOut: { enabled: true, delay: 3000 },
                    message: { text: '{{ $error }}' }
                }).show();
            });
        </script>
    @endforeach
@endif