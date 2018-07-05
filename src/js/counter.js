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



var videoPlay = document.getElementById("video3");

function PlayPause3()
{
if (videoPlay.paused) videoPlay.play();
else videoPlay.pause();
}

videoPlay.onclick=function(){PlayPause3()}


var videoSecond = document.getElementById("video4");

function PlayPause4()
{
if (videoSecond.paused) videoSecond.play();
else videoSecond.pause();
}

videoSecond.onclick=function(){PlayPause4()}
