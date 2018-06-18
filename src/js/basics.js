jQuery(document).ready(function($){
  var textDyptique = $(".image-dyptique-asymetrique-right").width();
console.log(textDyptique);
$('.legende-dyptique-asymetrique').width(textDyptique);
});

// ICONE DE FERMETURE MENU POUR MOBILE
$('.navbar-toggler').click(function(){
  $(".navbar-toggler-icon").toggleClass('navbar-toggler-icon-close');
  $(".navbar-toggler-table-icon").toggleClass('navbar-toggler-table-icon-close');
});


// ANIMATION BARRE POUR SCROLL BODY
$('#bs4navbar').append('<div id="progress" class="xs-invisible"></div>');
$('#navbar-navigation').append('<div id="progress-bar" class="xs-visible"></div>');

// PROGRESS BAR
jQuery(function($){

// LAPTOP
  $(document).on('scroll',function(){ // Détection du scroll

    // Calcul de la hauteur "utile"
    var hauteur = $(document).height()-$(window).height();

    // Récupération de la position verticale
    var position = $(document).scrollTop();

    // Récupération de la largeur de la fenêtre
    var largeur = $('#bs4navbar').width();

    // Calcul de la largeur de la barre
    var barre = position / hauteur * largeur;

    // Modification du CSS pour élargir ou réduire la barre
    $("#progress").css("width",barre);
  });

// MOBILE
  $(document).on('scroll',function(){ // Détection du scroll

    // Calcul de la hauteur "utile"
    var hauteur = $(document).height()-$(window).height();

    // Récupération de la position verticale
    var position = $(document).scrollTop();

    // Récupération de la largeur de la fenêtre
    var largeur = $('#navbar-navigation').width();

    // Calcul de la largeur de la barre
    var barre = position / hauteur * largeur;

    // Modification du CSS pour élargir ou réduire la barre
    $("#progress-bar").css("width",barre);
  });

});

// BUTTON ENGLISH TEXT ON MOBILE
$('#english-text').click(function(){
  $('.article-anglais').toggleClass('toggle-anglais');
  $('.legende-anglais').toggleClass('toggle-anglais');
  $('.article-francais').toggle('slow');
  $('.legende-francais').toggle('slow');
  $('.legende-francais-dyptique').toggle('slow');
  $('.legende-anglais-dyptique').toggleClass('toggle-anglais');
});

// CUSTOM SELECT CONTACT
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
      });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);



// Image + Texte scrollable
if ($(window).width()>768){
  $(".sticky-wrapper").stick_in_parent({
    offset_top: 60
  });
}


// if ($(window).width() > 768){
//   var retrospectiveHome = $(".home-category-retrospective img").width();
//   $('.article-under-picture').width(retrospectiveHome);
// }

  // var dyptiqueEdito = $(".row-dyptique-edito img:last-child").width();
  // $('.legende-sous-dyptique').width(dyptiqueEdito);

// LOADER SINGLE

$(window).on('load',function(){
  $(".loader-single").fadeOut("200");
});

jQuery(document).ready(function ($) {
    //initialize swiper when document ready
    var mySwiper = new Swiper ('.swiper-container', {
      // Optional parameters
      direction: 'horizontal',
      init: true,
      width: 300
    });
  });


(function($){

  var navbar = $('#navbar');
  $(document).on('scroll', function() {
   if($(window).scrollTop()> 0){
    $('#container-with-banner').removeClass('container-with-banner');
  }else if($(window).scrollTop()< 1){
    $('#container-with-banner').addClass('container-with-banner');
  }
});

})(jQuery);






