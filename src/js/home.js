console.log('OK');

jQuery(document).ready(function($){
  $('.categories-prez').on('inview', function(event, isInView) {
    if (isInView) {
    // element is now visible in the viewport
    var prezHeight = document.body.clientHeight - $('.categories-prez').offset().top;
    $('.sidebar-recherche').css({
      'position': 'absolute',
      'bottom': prezHeight,
      'top':'auto',
      // 'transition': 'top .1s linear, bottom .1s linear'
    });

    $('.sidebar-contact').css({
      'position': 'absolute',
      'bottom': prezHeight,
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







// var myVideo = document.getElementById("video1");
// if (myVideo !== null){
// function PlayPause()
// {
// if (myVideo.paused) myVideo.play();
// else myVideo.pause();
// }

// myVideo.onclick=function(){PlayPause()}
// }


// var secondVideo = document.getElementById("video2");
// if (secondVideo !== null){
// function PlayPause2()
// {
// if (secondVideo.paused) secondVideo.play();
// else secondVideo.pause();
// }

// secondVideo.onclick=function(){PlayPause2()}
// }
