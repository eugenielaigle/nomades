!function(){var e,n,a=document.getElementById("site-navigation");a&&(e=a.getElementsByTagName("button")[0],n=a.getElementsByTagName("ul")[0],e&&(n&&n.childNodes.length?e.onclick=function(){-1===n.className.indexOf("nav-menu")&&(n.className="nav-menu"),-1!==e.className.indexOf("toggled-on")?(e.className=e.className.replace(" toggled-on",""),n.className=n.className.replace(" toggled-on","")):(e.className+=" toggled-on",n.className+=" toggled-on")}:e.style.display="none"))}(jQuery),$(".navbar-toggler").click(function(){$(".navbar-toggler-icon").toggleClass("navbar-toggler-icon-close")}),$("#bs4navbar").append('<div id="progress" class="xs-invisible"></div>'),$(function(){$(document).on("scroll",function(){var e=$(document).height()-$(window).height(),n=$(document).scrollTop()/e*$("#bs4navbar").width();$("#progress").css("width",n)})});