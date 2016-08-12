
<!-- BEGIN SCRIPTS + CSS -->

<!-- BEGIN CALL JS -->
<script src="{{ asset('js/pageloader.js') }}" type="text/javascript"></script>
<!-- END CALL JS -->

<!-- BEGIN CALL CSS -->
<link rel="stylesheet" id="pageloader-css"  href="{{ asset('css/pageloader.css') }}" type="text/css" media="all" />
<!-- END CALL CSS -->

<!-- END SCRIPTS + CSS -->

<!-- BEGIN THE LOADING SCREEN -->
<div id="bonfire-pageloader">

    <!-- BEGIN THE ICON -->
    <div class="bonfire-pageloader-icon">
        <div align="center"><img alt="Bootstrap Image Preview" id="loading-12-icon" src="{{ asset('/img/bars.svg') }}" width="90%"/></div>
            <div align="center"><h5>Loading...</h5></div>
    </div>
    <!-- END THE ICON -->

    <!-- BEGIN PLACE LOADING ICON IN THE MIDDLE OF THE PAGE -->
    <script>
        jQuery(window).resize(function(){
            resizenow();
        });
        function resizenow() {
            var browserwidth = jQuery(window).width();
            var browserheight = jQuery(window).height();
            jQuery('.bonfire-pageloader-icon').css('right', ((browserwidth - jQuery(".bonfire-pageloader-icon").width())/2)).css('top', ((browserheight - jQuery(".bonfire-pageloader-icon").height())/2));
        };
        resizenow();
    </script>
    <!-- END PLACE LOADING ICON IN THE MIDDLE OF THE PAGE -->

</div>
<!-- END THE LOADING SCREEN -->
