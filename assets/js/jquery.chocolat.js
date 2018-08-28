!function(t){"object"==typeof module&&"object"==typeof module.exports?module.exports=t(require("jquery"),window,document):t(jQuery,window,document)}(function(d,p,t,e){var i=0;function s(t,e){var i=this;return this.settings=e,this.elems={},this.element=t,this._cssClasses=["chocolat-open","chocolat-in-container","chocolat-cover","chocolat-zoomable","chocolat-zoomed"],!this.settings.setTitle&&t.data("chocolat-title")&&(this.settings.setTitle=t.data("chocolat-title")),!this.settings.setCategory&&t.data("chocolat-category")&&(this.settings.setCategory=t.data("chocolat-category")),this.element.find(this.settings.imageSelector).each(function(){i.settings.images.push({title:d(this).attr("title"),src:d(this).attr(i.settings.imageSource),height:!1,width:!1})}),this.element.find(this.settings.imageSelector).each(function(e){d(this).off("click.chocolat").on("click.chocolat",function(t){i.init(e),t.preventDefault()})}),this}d.extend(s.prototype,{init:function(t){return this.settings.initialized||(this.setDomContainer(),this.markup(),this.events(),this.settings.lastImage=this.settings.images.length-1,this.settings.initialized=!0),this.settings.afterInitialize.call(this),this.load(t)},preload:function(t){var e=d.Deferred();if(void 0!==this.settings.images[t]){var i=new Image;return i.onload=function(){e.resolve(i)},i.src=this.settings.images[t].src,e}},load:function(e){var i=this;if(this.settings.fullScreen&&this.openFullScreen(),this.settings.currentImage!==e){this.elems.overlay.fadeIn(this.settings.duration),this.elems.wrapper.fadeIn(this.settings.duration),this.elems.domContainer.addClass("chocolat-open"),this.settings.timer=setTimeout(function(){void 0!==i.elems&&d.proxy(i.elems.loader.fadeIn(),i)},this.settings.duration);var t=this.preload(e).then(function(t){return i.place(e,t)}).then(function(t){return i.appear(e)}).then(function(t){i.zoomable(),i.settings.afterImageLoad.call(i)}),s=e+1;return void 0!==this.settings.images[s]&&this.preload(s),t}},place:function(t,e){var i;return this.settings.currentImage=t,this.description(),this.pagination(),this.arrows(),this.storeImgSize(e,t),i=this.fit(t,this.elems.wrapper),this.center(i.width,i.height,i.left,i.top,0)},center:function(t,e,i,s,n){return this.elems.content.css("overflow","visible").animate({width:t,height:e,left:i,top:s},n).promise()},appear:function(t){var e=this;clearTimeout(this.settings.timer),this.elems.loader.stop().fadeOut(300,function(){e.elems.img.attr("src",e.settings.images[t].src)})},fit:function(t,e){var i,s,n=this.settings.images[t].height,o=this.settings.images[t].width,a=d(e).height(),l=d(e).width(),h=this.getOutMarginH(),r=l-this.getOutMarginW(),c=a-h,m=c/r,g=a/l,u=n/o;return"cover"==this.settings.imageSize?u<g?s=(i=a)/u:i=(s=l)*u:"native"==this.settings.imageSize?(i=n,s=o):(m<u?s=(i=c)/u:i=(s=r)*u,"default"===this.settings.imageSize&&(o<=s||n<=i)&&(s=o,i=n)),1025<d(p).width()&&d(p).width()<=1800&&670<d(p).height()?o<n?{height:1.3*i,width:1.3*s,top:(a-i)/10,left:(l-s)/2.3}:{height:i,width:s,top:(a-i)/4,left:(l-s)/2}:768<d(p).width()&&d(p).width()<=1025?o<n?{height:1.2*i,width:1.2*s,top:(a-i)/5,left:(l-s)/2.3}:{height:1.2*i,width:1.2*s,top:(a-i)/4,left:(l-s)/3}:d(p).width()<768?o<n?{height:1.5*i,width:1.5*s,top:(a-i)/5,left:(l-s)/4}:{height:1.75*i,width:1.75*s,top:(a-i)/5,left:(l-s)/15}:1800<=d(p).width()?o<n?{height:1.15*i,width:1.2*s,top:(a-i)/10,left:(l-s)/2}:{height:1.1*i,width:1.1*s,top:(a-i)/6,left:(l-s)/2.2}:o<n?{height:1.3*i,width:1.3*s,top:(a-i)/10,left:(l-s)/2.3}:{height:i,width:s,top:(a-i)/3,left:(l-s)/2}},change:function(t){this.zoomOut(0),this.zoomable();var e=this.settings.currentImage+parseInt(t);if(e>this.settings.lastImage){if(this.settings.loop)return this.load(0)}else{if(!(e<0))return this.load(e);if(this.settings.loop)return this.load(this.settings.lastImage)}},arrows:function(){this.settings.loop?d([this.elems.left[0],this.elems.right[0]]).addClass("active"):this.settings.linkImages?(this.settings.currentImage==this.settings.lastImage?this.elems.right.removeClass("active"):this.elems.right.addClass("active"),0===this.settings.currentImage?this.elems.left.removeClass("active"):this.elems.left.addClass("active")):d([this.elems.left[0],this.elems.right[0]]).removeClass("active")},description:function(){this.elems.description.html(this.settings.images[this.settings.currentImage].title)},pagination:function(){var t=this.settings.lastImage+1,e=this.settings.currentImage+1;this.elems.pagination.html("PHOTO N°"+e+" "+this.settings.separator2+" "+t)},storeImgSize:function(t,e){void 0!==t&&(this.settings.images[e].height&&this.settings.images[e].width||(this.settings.images[e].height=t.height,this.settings.images[e].width=t.width))},close:function(){if(!this.settings.fullscreenOpen){var t=[this.elems.overlay[0],this.elems.loader[0],this.elems.wrapper[0]],e=this,i=d.when(d(t).fadeOut(200)).done(function(){e.elems.domContainer.removeClass("chocolat-open")});return this.settings.currentImage=!1,i}this.exitFullScreen()},destroy:function(){this.element.removeData(),this.element.find(this.settings.imageSelector).off("click.chocolat"),this.settings.initialized&&(this.settings.fullscreenOpen&&this.exitFullScreen(),this.settings.currentImage=!1,this.settings.initialized=!1,this.elems.domContainer.removeClass(this._cssClasses.join(" ")),this.elems.wrapper.remove())},getOutMarginW:function(){return this.elems.left.outerWidth(!0)+this.elems.right.outerWidth(!0)},getOutMarginH:function(){return this.elems.top.outerHeight(!0)+this.elems.bottom.outerHeight(!0)},markup:function(){this.elems.domContainer.addClass("chocolat-open "+this.settings.className),"cover"==this.settings.imageSize&&this.elems.domContainer.addClass("chocolat-cover"),this.settings.container!==p&&this.elems.domContainer.addClass("chocolat-in-container"),this.elems.wrapper=d("<div/>",{class:"chocolat-wrapper",id:"chocolat-content-"+this.settings.setIndex}).appendTo(this.elems.domContainer),this.elems.overlay=d("<div/>",{class:"chocolat-overlay"}).appendTo(this.elems.wrapper),this.elems.loader=d("<div/>",{class:"chocolat-loader"}).appendTo(this.elems.wrapper),this.elems.content=d("<div/>",{class:"chocolat-content"}).appendTo(this.elems.wrapper),this.elems.img=d("<img/>",{class:"chocolat-img",src:""}).appendTo(this.elems.content),this.elems.top=d("<div/>",{class:"chocolat-top"}).appendTo(this.elems.wrapper),this.elems.left=d("<div/>",{class:"chocolat-left"}).appendTo(this.elems.wrapper),this.elems.right=d("<div/>",{class:"chocolat-right"}).appendTo(this.elems.wrapper),this.elems.bottom=d("<div/>",{class:"chocolat-bottom"}).appendTo(this.elems.wrapper),this.elems.close=d("<span/>",{class:"chocolat-close"}).appendTo(this.elems.top),this.elems.fullscreen=d("<span/>",{class:"chocolat-fullscreen"}).appendTo(this.elems.bottom),this.elems.pagination=d("<span/>",{class:"chocolat-pagination"}).appendTo(this.elems.right),this.elems.description=d("<div/>",{class:"chocolat-description"}).appendTo(this.elems.right),this.elems.setTitle=d("<span/>",{class:"chocolat-set-category",html:this.settings.setCategory}).appendTo(this.elems.top),this.elems.setTitle=d("<span/>",{class:"chocolat-set-title",html:this.settings.setTitle}).appendTo(this.elems.top),this.settings.afterMarkup.call(this)},openFullScreen:function(){var t=this.elems.wrapper[0];t.requestFullscreen?(this.settings.fullscreenOpen=!0,t.requestFullscreen()):t.mozRequestFullScreen?(this.settings.fullscreenOpen=!0,t.mozRequestFullScreen()):t.webkitRequestFullscreen?(this.settings.fullscreenOpen=!0,t.webkitRequestFullscreen()):t.msRequestFullscreen?(t.msRequestFullscreen(),this.settings.fullscreenOpen=!0):this.settings.fullscreenOpen=!1},exitFullScreen:function(){t.exitFullscreen?(t.exitFullscreen(),this.settings.fullscreenOpen=!1):t.mozCancelFullScreen?(t.mozCancelFullScreen(),this.settings.fullscreenOpen=!1):t.webkitExitFullscreen?(t.webkitExitFullscreen(),this.settings.fullscreenOpen=!1):t.msExitFullscreen?(t.msExitFullscreen(),this.settings.fullscreenOpen=!1):this.settings.fullscreenOpen=!0},events:function(){var u=this;d(t).off("keydown.chocolat").on("keydown.chocolat",function(t){u.settings.initialized&&(37==t.keyCode?u.change(-1):39==t.keyCode?u.change(1):27==t.keyCode&&u.close())}),this.elems.wrapper.find(".chocolat-right").off("click.chocolat").on("click.chocolat",function(){u.change(1)}),this.elems.wrapper.find(".chocolat-left").off("click.chocolat").on("click.chocolat",function(){return u.change(-1)}),d([this.elems.overlay[0],this.elems.close[0]]).off("click.chocolat").on("click.chocolat",function(){return u.close()}),this.elems.fullscreen.off("click.chocolat").on("click.chocolat",function(){u.settings.fullscreenOpen?u.exitFullScreen():u.openFullScreen()}),u.settings.backgroundClose&&this.elems.overlay.off("click.chocolat").on("click.chocolat",function(){return u.close()}),this.elems.wrapper.off("click.chocolat").on("click.chocolat",function(t){return u.zoomOut(t)}),this.elems.wrapper.find(".chocolat-img").off("click.chocolat").on("click.chocolat",function(t){if(null===u.settings.initialZoomState&&u.elems.domContainer.hasClass("chocolat-zoomable"))return t.stopPropagation(),u.zoomIn(t)}),this.elems.wrapper.mousemove(function(t){if(null!==u.settings.initialZoomState&&!u.elems.img.is(":animated")){var e=d(this).offset(),i=d(this).height(),s=d(this).width(),n=u.settings.images[u.settings.currentImage],o=n.width,a=n.height,l=[t.pageX-s/2-e.left,t.pageY-i/2-e.top],h=0;if(s<o){var r=u.settings.zoomedPaddingX(o,s);h=l[0]/(s/2),h*=(o-s)/2+r}var c=0;if(i<a){var m=u.settings.zoomedPaddingY(a,i);c=l[1]/(i/2),c*=(a-i)/2+m}var g={"margin-left":-h+"px","margin-top":-c+"px"};void 0!==t.duration?d(u.elems.img).stop(!1,!0).animate(g,t.duration):d(u.elems.img).stop(!1,!0).css(g)}}),d(p).on("resize",function(){u.settings.initialized&&!1!==u.settings.currentImage&&u.debounce(50,function(){var t=u.fit(u.settings.currentImage,u.elems.wrapper);u.center(t.width,t.height,t.left,t.top,0),u.zoomable()})})},zoomable:function(){var t=this.settings.images[this.settings.currentImage],e=this.elems.wrapper.width(),i=this.elems.wrapper.height(),s=!(!this.settings.enableZoom||!(t.width>e||t.height>i)),n=this.elems.img.width()>t.width||this.elems.img.height()>t.height;s&&!n?this.elems.domContainer.addClass("chocolat-zoomable"):this.elems.domContainer.removeClass("chocolat-zoomable")},zoomIn:function(t){this.settings.initialZoomState=this.settings.imageSize,this.settings.imageSize="native";var e=d.Event("mousemove");e.pageX=t.pageX,e.pageY=t.pageY,e.duration=this.settings.duration,this.elems.wrapper.trigger(e),this.elems.domContainer.addClass("chocolat-zoomed");var i=this.fit(this.settings.currentImage,this.elems.wrapper);return this.center(i.width,i.height,i.left,i.top,this.settings.duration)},zoomOut:function(t,e){if(null!==this.settings.initialZoomState&&!1!==this.settings.currentImage){e=e||this.settings.duration,this.settings.imageSize=this.settings.initialZoomState,this.settings.initialZoomState=null,this.elems.img.animate({margin:0},e),this.elems.domContainer.removeClass("chocolat-zoomed");var i=this.fit(this.settings.currentImage,this.elems.wrapper);return this.center(i.width,i.height,i.left,i.top,e)}},setDomContainer:function(){this.settings.container===p?this.elems.domContainer=d("body"):this.elems.domContainer=d(this.settings.container)},debounce:function(t,e){clearTimeout(this.settings.timerDebounce),this.settings.timerDebounce=setTimeout(function(){e()},t)},api:function(){var i=this;return{open:function(t){return t=parseInt(t)||0,i.init(t)},close:function(){return i.close()},next:function(){return i.change(1)},prev:function(){return i.change(-1)},goto:function(t){return i.open(t)},current:function(){return i.settings.currentImage},place:function(){return i.place(i.settings.currentImage,i.settings.duration)},destroy:function(){return i.destroy()},set:function(t,e){return i.settings[t]=e},get:function(t){return i.settings[t]},getElem:function(t){return i.elems[t]}}}});var n={container:p,imageSelector:".chocolat-image",className:"",imageSize:"default",initialZoomState:null,fullScreen:!1,loop:!1,linkImages:!0,duration:300,setTitle:"",separator2:"/",setIndex:0,firstImage:0,lastImage:!1,currentImage:!1,initialized:!1,timer:!1,timerDebounce:!1,images:[],enableZoom:!0,imageSource:"href",afterInitialize:function(){},afterMarkup:function(){},afterImageLoad:function(){},zoomedPaddingX:function(t,e){return 0},zoomedPaddingY:function(t,e){return 0}};d.fn.Chocolat=function(e){return this.each(function(){i++;var t=d.extend(!0,{},n,e,{setIndex:i});d.data(this,"chocolat")||d.data(this,"chocolat",new s(d(this),t))})}});