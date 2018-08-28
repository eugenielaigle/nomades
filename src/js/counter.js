// var num = $('.layout').attr('data-count');

$('.layout').on('inview', function(event, isInView) {
  if (isInView) {
    var num = $(this).attr('data-count');
    var number = (num < 10 ? '0' : '') + num;
    // console.log(number);
    document.getElementById("counterLayout").innerHTML = number;
  } else {
  }
});


// BARRES LATERALES ARRET A ARTICLES A LA UNE
$('.articles-a-la-une').on('inview', function(event, isInView) {
  if (isInView) {
    // element is now visible in the viewport
    var footerHeight = document.body.clientHeight - $('.articles-a-la-une').offset().top;
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


if ( /^((?!chrome|android).)*safari/i.test(navigator.userAgent)) {

for (var j=1;j<50;j++){

var id="video"+j
// TAP SUR VIDEO = LECTURE SUR SAFARI
var videoPlay = document.getElementById(id);

if (videoPlay !== null){
  function PlayPause()
  {
    if (videoPlay.paused) videoPlay.play();
    else videoPlay.pause();
  }

videoPlay.onclick=function(){PlayPause()}
}

}
// var videoSecond = document.getElementById("video4");

// if (videoSecond !== null){
//   function PlayPause4()
//   {
//     if (videoSecond.paused) videoSecond.play();
//     else videoSecond.pause();
//   }

//   videoSecond.onclick=function(){PlayPause4()}
// }


}
