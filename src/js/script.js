// var el = document.getElementsByClassName("wpcf7-mail-sent-ok");
// var elChild = document.createElement("h2");
// elChild.innerHTML = 'FORMULAIRE';


// NAVBAR APPEARS ON SCROLL HOMEPAGE
(function($){
  var navbar = $('#navbar');

  var navbarBase = $('#navbar-base .navbar-toggler');
  navbar.css("display", "none");
  $(document).on('scroll', function() {
   if($(window).scrollTop()> 500){
    navbar.slideDown('slow');
    $('#navbar .navbar-toggler').on('click', function() {
      $('#navbar').css("display", "flex");
    });
  }else{
    navbar.slideUp('slow');
    navbarBase.css("display", "block");
  }
});

  // var navbarBase = $('#navbar-base .navbar-toggler');
  navbarBase.on('click', function() {
    $('#navbar').slideDown();
    navbarBase.css("display", "none");
    $('#navbar .navbar-toggler').on('click', function() {
      $('#navbar').slideUp('slow').css("display", "none");
      navbarBase.css("display", "block");
    });
  });

})(jQuery);


// PHOTOS GALLERY ON SINGLE PAGES
$(document).ready(function(){
  if ($(window).width() < 768 && $(window).height() > 670){
    $('#galerie').Chocolat({
      imageSize: 'contain',
      loop: true,
      enableZoom: false,
      afterMarkup: function () {
        this.elems.pagination.appendTo(this.elems.top);
        this.elems.description.appendTo(this.elems.bottom);
        $('.chocolat-set-category').css("display", "none");
        $('.chocolat-set-title').css("display", "none");
      },
      afterImageLoad: function () {
       if ($(this.elems.img).width() > $(this.elems.img).height()){
        this.elems.bottom.css("justify-content","flex-start");
        this.elems.bottom.css("height", "390px");
      } else{
        this.elems.bottom.css("height", "350px");
        this.elems.bottom.css("justify-content","center");
      }
    }
  });
  } else if ($(window).width() < 768 && $(window).height() < 670 ){
    $('#galerie').Chocolat({
      imageSize: 'contain',
      loop: true,
      enableZoom: false,
      afterMarkup: function () {
        this.elems.pagination.appendTo(this.elems.top);
        this.elems.description.appendTo(this.elems.bottom);
        $('.chocolat-set-category').css("display", "none");
        $('.chocolat-set-title').css("display", "none");
      },
      afterImageLoad: function () {
       if ($(this.elems.img).width() > $(this.elems.img).height()){
        this.elems.bottom.css("justify-content","flex-start");
        this.elems.bottom.css("height", "200px");
      } else{
        this.elems.bottom.css("height", "80px");
        this.elems.bottom.css("justify-content","center");
      }
    }
  });
  } else if  ($(window).width() > 768){
    $('#galerie').Chocolat({
      imageSize: 'contain',
      loop: true,
      enableZoom: false,
      afterImageLoad: function () {
       if ($(this.elems.img).width() > $(this.elems.img).height()){
        this.elems.pagination.appendTo(this.elems.bottom);
        this.elems.description.appendTo(this.elems.bottom);
        this.elems.fullscreen.appendTo(this.elems.bottom);
      } else{
        this.elems.pagination.appendTo(this.elems.right);
        this.elems.description.appendTo(this.elems.right);
      }
    }
  });
  }
});


if ($(window).width() > 768) {
  var widthContent = $('.container-video .video iframe').width();
  console.log(widthContent);
  var goodHeight = widthContent/1.8;
  $('.container-video .video iframe').height(goodHeight);

  $('.container-video .legende-video').width(widthContent);
  var containerVideoHeight = $('.container-video .video').height((parseFloat(goodHeight) + 20 + "px"));

  var containerVideoWidth = $('.container-video .video').width((parseFloat(widthContent) + 10) + "px");
  console.log(containerVideoHeight);
  console.log(containerVideoWidth);
}







// if ( 'mail_sent' == data.status ) {
//         $message.html( '' ).append( "<h2>FORMULAIRE</h2>").append( data.message ).slideDown( 'fast' );
//         $message.attr( 'role', 'alert' );
//       } else {
//         $message.html( '' ).append( data.message ).slideDown( 'fast' );
//         $message.attr( 'role', 'alert' );
//       }
