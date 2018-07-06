/*********** PAGE CATEGORY **************/


console.log('cubes');


// SIDEBAR QUI STOP AU FOOTER
$('footer').on('inview', function(event, isInView) {
  if (isInView) {
    console.log('Inview!');
    // element is now visible in the viewport
    var footerHeight = document.body.clientHeight - $('footer').offset().top;
    $('.sidebar-recherche').css({
      'position': 'absolute',
      'bottom': footerHeight,
      'top':'auto',
      // 'transition': 'top .1s linear, bottom .1s linear'
    });

    $('.sidebar-contact').css({
      'position': 'absolute',
      'bottom': footerHeight,
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





// CUBES SUR MOBILE
var cube = $('#cubes');

if (typeof cube !== 'undefined'){
  $('.container-header .navbar .navbar-brand').css({
    'margin-left': '30px',
    'margin-right': '-30px'
  });
}

if ($(window).width() <= 768){
cube.addClass('appear-cubes').removeClass('cubes');
cube.on('click', function(){
    console.log('ready');
    $('#categories').toggleClass('categ-cubes');
    $('#categories').toggleClass('categ-without-cubes');
    $('.container-cubes').toggleClass('container-cubes-mobile');
    $('.navbar-brand').addClass('navbar-cubes');
});
}



