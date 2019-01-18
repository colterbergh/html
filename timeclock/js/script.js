$(document).bind("mobileinit", function(){
	$.support.cors = true;
	$.mobile.allowCrossDomainPages = true;
});

/mobile/i.test(navigator.userAgent) && !location.hash && setTimeout(function () {
  if (!pageYOffset) window.scrollTo(0, 1);
}, 1000);

if(navigator.userAgent.match(/Android/i)) {
    window.scrollTo(0,1);
}