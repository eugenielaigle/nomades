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





if ( /^((?!chrome|android).)*safari/i.test(navigator.userAgent)) {

$('#videohome1 .lecture').css('display','block');
var boutonPlay = document.getElementById("videohome1");
var myVideo = document.getElementById("video1");
if (myVideo !== null){
function PlayPause()
{
if (myVideo.paused){
  myVideo.play();
  $('#videohome1 .lecture').css('display','none');
}
else{
  myVideo.pause();
  $('#videohome1 .lecture').css('display','block');

}
}

boutonPlay.onclick=function(){PlayPause();}
}


$('#videohome2 .lecture').css('display','block');
var boutonPlaySecond = document.getElementById("videohome2");
var secondVideo = document.getElementById("video2");

if (secondVideo !== null){
function PlayPause2()
{
if (secondVideo.paused){
  secondVideo.play();
  $('#videohome2 .lecture').css('display','none');
}
else{
  secondVideo.pause();
  $('#videohome2 .lecture').css('display','block');

}
}

boutonPlaySecond.onclick=function(){PlayPause2();}
}

}
