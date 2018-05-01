( function() {
  var nav = document.getElementById( 'site-navigation' ), button, menu;
  if ( ! nav ) {
    return;
  }

  button = nav.getElementsByTagName( 'button' )[0];
  menu   = nav.getElementsByTagName( 'ul' )[0];
  if ( ! button ) {
    return;
  }

  // Hide button if menu is missing or empty.
  if ( ! menu || ! menu.childNodes.length ) {
    button.style.display = 'none';
    return;
  }

  button.onclick = function() {
    if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
      menu.className = 'nav-menu';
    }

    if ( -1 !== button.className.indexOf( 'toggled-on' ) ) {
      button.className = button.className.replace( ' toggled-on', '' );
      menu.className = menu.className.replace( ' toggled-on', '' );
    } else {
      button.className += ' toggled-on';
      menu.className += ' toggled-on';
    }
  };
} )(jQuery);

// ICONE DE FERMETURE MENU POUR MOBILE
$('.navbar-toggler').click(function(){
  $(".navbar-toggler-icon").toggleClass('navbar-toggler-icon-close');
});


// ANIMATION BARRE POUR SCROLL BODY
$('#bs4navbar').append('<div id="progress" class="xs-invisible"></div>');


$(function(){
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
});

