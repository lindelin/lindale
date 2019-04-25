<script>
    window.default_locale = "{{ config('app.locale') }}";
    window.fallback_locale = "{{ config('app.fallback_locale') }}";
    window.messages = @json($messages);
</script>