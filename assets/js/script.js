if(function(e){var i=e("#navbar"),o=e("#navbar-base .navbar-toggler");i.css("display","none"),e(document).on("scroll",function(){500<e(window).scrollTop()?(i.slideDown("slow"),e("#navbar .navbar-toggler").on("click",function(){e("#navbar").css("display","flex")})):(i.slideUp("slow"),o.css("display","block"))}),o.on("click",function(){e("#navbar").slideDown(),o.css("display","none"),e("#navbar .navbar-toggler").on("click",function(){e("#navbar").slideUp("slow").css("display","none"),o.css("display","block")})})}(jQuery),$(document).ready(function(){768<$(window).width()?$("#galerie").Chocolat({imageSize:"contain",loop:!0,fullScreen:!1,enableZoom:!1,afterImageLoad:function(){if($(this.elems.img).width()>$(this.elems.img).height()){var e=$(this.elems.img).width(),i=this.elems.content[0].offsetLeft;console.log(i),this.elems.pagination.appendTo(this.elems.bottom),this.elems.description.appendTo(this.elems.bottom),$(this.elems.bottom).width(e),$(this.elems.bottom).css("margin-left",i)}else this.elems.pagination.appendTo(this.elems.right),this.elems.description.appendTo(this.elems.right)}}):$(".article-header a").click(function(){return!1})}),768<$(window).width()){var widthContent=$(".container-video .video iframe").width()/1.35;console.log(widthContent);var goodHeight=widthContent/2.5;$(".container-video .video iframe ").height(goodHeight),$(".container-video .legende-video").width(widthContent);var containerVideoHeight=$(".container-video .video").height(parseFloat(goodHeight)+20+"px"),containerVideoWidth=$(".container-video .video").width(parseFloat(widthContent)+10+"px");console.log(containerVideoHeight),console.log(containerVideoWidth)}