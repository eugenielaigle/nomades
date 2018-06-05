(function($){

var navbar = $('#navbar');
navbar.css("display", "none");
// var winH = $(".background-img").height();

// console.log(winH);

$(document).on('scroll', function() {
     if($(window).scrollTop()> 500){
        navbar.slideDown('slow');
      }else{
        navbar.slideUp('slow');
      }
});



})(jQuery);


// jQuery(document).ready(function($) {
//   $('.popup-gallery').magnificPopup({
//     delegate: 'a',
//     type: 'image',
//     tLoading: 'Loading image #%curr%...',
//     mainClass: 'mfp-img-mobile',
//     gallery: {
//       enabled: true,
//       navigateByImgClick: true,
//       preload: [0,1] // Will preload 0 - before current, and 1 after the current image
//     },
//     image: {
//       tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
//       titleSrc: function(item) {
//         return '<h4 class="lb-title">' + item.el.attr('title') + '</h4>' + '<p class="lb-description">' + item.el.attr('data-description') + '</p>';
//       }
//     }
//   });
// });


$(document).ready(function(){

if ($(window).width() < 768){
  $('#galerie').Chocolat({
      imageSize: 'contain',
      afterMarkup: function () {
// console.log(this.elems.content.current.clientWidth);
this.elems.pagination.appendTo(this.elems.bottom);
this.elems.description.appendTo(this.elems.bottom);



}
    });
} else{
  $('#galerie').Chocolat({
      imageSize: 'contain',
      afterMarkup: function () {
// console.log(this.elems.content.current.clientWidth);
// this.elems.description.appendTo(this.elems.bottom)

}
    });
}
});
