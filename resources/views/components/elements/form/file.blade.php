<div class="input-group">
    <label class="input-group-btn">
        <span class="btn btn-info">
            {{ trans('common.choose-file') }}<input type="file" name="{{ $slot }}" style="display:none">
        </span>
    </label>
    <input type="text" class="form-control" readonly="">
</div>
<p class="help-block">（ jpeg、png、bmp、gif、svg ）</p>
<script>
    $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.parent().parent().next(':text').val(label);
    });
</script>