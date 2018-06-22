console.log('recherche');

(function() {
  var searchForm = document.getElementById('s');
  var searchSubmit = document.getElementById('searchsubmit');

  searchForm.placeholder = "Je recherche";
  searchSubmit.value = "Rechercher";

} )(jQuery);

// EFFET BOUTONS RADIOs

$(function() {
    // Lorsque la valeur d'un input change
    $('#choix input').change(function(){
        // On stocke l'id de l'input dans une variable
        var id = $(this).attr('id');
        // On déselectionne toutes les boites
        $('#choix label').removeClass('active');
        // On sélectionne la bonne boite et on lui ajoute la classe "active"
        $('#choix label[for=' + id + ']').addClass('active');
    })
});
