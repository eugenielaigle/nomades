console.log('OK');
var myVideo = document.getElementById("video1");

function PlayPause()
{
if (myVideo.paused) myVideo.play();
else myVideo.pause();
}

myVideo.onclick=function(){PlayPause()}



var secondVideo = document.getElementById("video2");

function PlayPause2()
{
if (secondVideo.paused) secondVideo.play();
else secondVideo.pause();
}

secondVideo.onclick=function(){PlayPause2()}
