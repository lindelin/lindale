<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group{{ $errors->has('start_at') ? ' has-error' : '' }}">
            <label class="control-label">
                {{ $start }}
            </label>
            <div>
                <div class="input-group date" id="{{ $start_target }}">
                    <input type='text' class="form-control" name="start_at" value="{{ old('start_at') ?? $start_value ?? Carbon\Carbon::today() }}"/>
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
                @include('layouts.common.error-one', ['field' => 'start_at'])
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#{{ $start_target }}').datetimepicker({
                        format: 'YYYY-MM-DD',
                        locale : '{{ trans_lang_for_date() }}'
                    });
                });
            </script>
        </div>
    </div>
    {{-- 结束时间 --}}
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group{{ $errors->has('end_at') ? ' has-error' : '' }}">
            <label class="control-label">
                {{ $end }}
            </label>
            <div>
                <div class="input-group date" id="{{ $end_target }}">
                    <input type='text' class="form-control" name="end_at" value="{{ old('end_at') ?? $end_value ?? '' }}"/>
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
                @include('layouts.common.error-one', ['field' => 'end_at'])
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#{{ $end_target }}').datetimepicker({
                        format: 'YYYY-MM-DD',
                        locale : '{{ trans_lang_for_date() }}'
                    });
                });
            </script>
        </div>
    </div>
</div>
{{ $slot }}