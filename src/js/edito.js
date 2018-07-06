

jQuery(document).ready(function($){
$('.contact-edito').on('inview', function(event, isInView) {
  if (isInView) {
    console.log('Inview !');
    // element is now visible in the viewport
    var editoHeight = document.body.clientHeight - $('.contact-edito').offset().top;
    $('.sidebar-recherche').css({
      'position': 'absolute',
      'bottom': editoHeight,
      'top':'auto',
      // 'transition': 'top .1s linear, bottom .1s linear'
    });

    $('.sidebar-contact').css({
      'position': 'absolute',
      'bottom': editoHeight,
      'top':'auto',
      // 'transition': 'top .1s linear, bottom .1s linear'
    });
  } else {
    // element has gone out of viewport
    $('.sidebar-recherche').css({
      'position': 'fixed',
      'bottom': '0',
      'top':'0'
    });
    $('.sidebar-contact').css({
      'position': 'fixed',
      'bottom': '0',
      'top':'0'
    });
  }
});

});
