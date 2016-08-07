<input type="hidden" id="input{{ $id }}" oninput="this.editor.update()" value="{{ $body }}">
<div id="preview{{ $id }}"></div>
<script>
    var $ = function (id) { return document.getElementById(id); };
    new MarkDownToHtml($("input{{ $id }}"), $("preview{{ $id }}"));
</script>