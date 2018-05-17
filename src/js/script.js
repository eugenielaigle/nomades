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

var retrospectiveHome = $(".home-category-retrospective img").width();
  $('.article-under-picture').width(retrospectiveHome);

$('.vignets').on('inview', function(event, isInView) {
  if (isInView) {
    // element is now visible in the viewport
    $('.vignets').toggleClass("load");
  } else {
    // element has gone out of viewport
  }
});



})(jQuery);


