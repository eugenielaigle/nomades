var x,i,j,selElmnt,a,b,c;for(jQuery(document).ready(function(e){var t=e(".image-dyptique-asymetrique-right").width();console.log(t),e(".legende-dyptique-asymetrique").width(t)}),$(".navbar-toggler").click(function(){$(".navbar-toggler-icon").toggleClass("navbar-toggler-icon-close"),$(".navbar-toggler-table-icon").toggleClass("navbar-toggler-table-icon-close")}),$("#bs4navbar").append('<div id="progress" class="xs-invisible"></div>'),$("#navbar-navigation").append('<div id="progress-bar" class="xs-visible"></div>'),jQuery(function(n){n(document).on("scroll",function(){var e=n(document).height()-n(window).height(),t=n(document).scrollTop()/e*n("#bs4navbar").width();n("#progress").css("width",t)}),n(document).on("scroll",function(){var e=n(document).height()-n(window).height(),t=n(document).scrollTop()/e*n("#navbar-navigation").width();n("#progress-bar").css("width",t)})}),$("#english-text").click(function(){$(".article-anglais").toggleClass("toggle-anglais"),$(".legende-anglais").toggleClass("toggle-anglais"),$(".article-francais").toggle("slow"),$(".legende-francais").toggle("slow"),$(".legende-francais-dyptique").toggle("slow"),$(".legende-anglais-dyptique").toggleClass("toggle-anglais")}),x=document.getElementsByClassName("custom-select"),i=0;i<x.length;i++){for(selElmnt=x[i].getElementsByTagName("select")[0],(a=document.createElement("DIV")).setAttribute("class","select-selected"),a.innerHTML=selElmnt.options[selElmnt.selectedIndex].innerHTML,x[i].appendChild(a),(b=document.createElement("DIV")).setAttribute("class","select-items select-hide"),j=1;j<selElmnt.length;j++)(c=document.createElement("DIV")).innerHTML=selElmnt.options[j].innerHTML,c.addEventListener("click",function(e){var t,n,s,i,l;for(i=this.parentNode.parentNode.getElementsByTagName("select")[0],l=this.parentNode.previousSibling,n=0;n<i.length;n++)if(i.options[n].innerHTML==this.innerHTML){for(i.selectedIndex=n,l.innerHTML=this.innerHTML,t=this.parentNode.getElementsByClassName("same-as-selected"),s=0;s<t.length;s++)t[s].removeAttribute("class");this.setAttribute("class","same-as-selected");break}l.click()}),b.appendChild(c);x[i].appendChild(b),a.addEventListener("click",function(e){e.stopPropagation(),closeAllSelect(this),this.nextSibling.classList.toggle("select-hide"),this.classList.toggle("select-arrow-active")})}function closeAllSelect(e){var t,n,s,i=[];for(t=document.getElementsByClassName("select-items"),n=document.getElementsByClassName("select-selected"),s=0;s<n.length;s++)e==n[s]?i.push(s):n[s].classList.remove("select-arrow-active");for(s=0;s<t.length;s++)i.indexOf(s)&&t[s].classList.add("select-hide")}document.addEventListener("click",closeAllSelect),768<$(window).width()&&$(".sticky-wrapper").stick_in_parent({offset_top:60}),$(window).on("load",function(){$(".loader-single").fadeOut("200")}),jQuery(document).ready(function(e){new Swiper(".swiper-container",{direction:"horizontal",init:!0,width:300})}),function(e){e("#navbar");e(document).on("scroll",function(){0<e(window).scrollTop()?e("#container-with-banner").removeClass("container-with-banner"):e(window).scrollTop()<1&&e("#container-with-banner").addClass("container-with-banner")})}(jQuery);