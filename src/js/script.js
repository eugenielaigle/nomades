jQuery(document).ready(function($){

var offset = 10;
$('body').on('click', '.load-more', function() {

  jQuery.post(
      ajaxurl,
      {
          'action': 'load_more',
          'offset': offset
      },
      function(response){
        offset= offset + 10;
        $('.alasuite').append(response);
      }
  );
});
});
