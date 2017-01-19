$("html").addClass('bonfire-html-onload');

$(document.body).on("touchmove", function(e) {
    e.preventDefault();
});

var scrollPosition = [
self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
];

var html = $("html");
html.data('scroll-position', scrollPosition);
html.data('previous-overflow', html.css('overflow'));
html.css('overflow', 'hidden');

window.scrollTo(scrollPosition[0], scrollPosition[1]);

$(window).on('load', function() {

	setTimeout(function(){

	$(".bonfire-pageloader-icon").addClass('bonfire-pageloader-icon-hide');
	},500);

	setTimeout(function(){

		$(document.body).unbind('touchmove');

		var html = $('html');
		var scrollPosition = html.data('scroll-position');
		html.css('overflow', html.data('previous-overflow'));
		window.scrollTo(scrollPosition[0], scrollPosition[1]);

		$("#bonfire-pageloader").addClass('bonfire-pageloader-fade');

		$("html").removeClass('bonfire-html-onload');

	},750);

	setTimeout(function(){

		$("#bonfire-pageloader").addClass('bonfire-pageloader-hide');

	},1500);
	
});