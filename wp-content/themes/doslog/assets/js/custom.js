// Preloader
$(document).ready(function() {
    setTimeout(function(){
        $("body").addClass("loaded");
        $('.preloader').fadeOut();
    }, 2000);
});

// Navbar scroll resize
$(function(){
	var navbar = $('.navbar');
	$(window).scroll(function(){
		if($(window).scrollTop() <= 60){
			navbar.removeClass('navbar-scroll');
		} else {
			navbar.addClass('navbar-scroll');
		}
	});
});

// Video
$(document).on('click','.js-videoPoster',function(ev) {
  ev.preventDefault();
  var $poster = $(this);
  var $wrapper = $poster.closest('.js-videoWrapper');
  videoPlay($wrapper);
});
function videoPlay($wrapper) {
  var $iframe = $wrapper.find('.js-videoIframe');
  var src = $iframe.data('src');
  $wrapper.addClass('videoWrapperActive');
  $iframe.attr('src',src);
}
function videoStop($wrapper) {
  if (!$wrapper) {
    var $wrapper = $('.js-videoWrapper');
    var $iframe = $('.js-videoIframe');
  } else {
    var $iframe = $wrapper.find('.js-videoIframe');
  }
  $wrapper.removeClass('videoWrapperActive');
  $iframe.attr('src','');
}