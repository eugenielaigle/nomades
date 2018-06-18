
// NAVBAR APPEARS ON SCROLL HOMEPAGE
(function($){

  var navbar = $('#navbar');
  navbar.css("display", "none");
  $(document).on('scroll', function() {
   if($(window).scrollTop()> 500){
    navbar.slideDown('slow');
  }else{
    navbar.slideUp('slow');
  }
});

})(jQuery);


// PHOTOS GALLERY ON SINGLE PAGES
$(document).ready(function(){
  if ($(window).width() < 768){
    $('#galerie').Chocolat({
      imageSize: 'contain',
      loop: true,
      afterMarkup: function () {
        this.elems.pagination.appendTo(this.elems.bottom);
        this.elems.description.appendTo(this.elems.bottom);
      }
    });
  } else{
    $('#galerie').Chocolat({
      imageSize: 'contain',
      loop: true,
      afterImageLoad: function () {
       if ($(this.elems.img).width() > $(this.elems.img).height()){
        this.elems.pagination.appendTo(this.elems.bottom);
        this.elems.description.appendTo(this.elems.bottom);
      } else{
        this.elems.pagination.appendTo(this.elems.right);
        this.elems.description.appendTo(this.elems.right);
      }
    }
  });
  }
});
