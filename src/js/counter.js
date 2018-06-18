// var num = $('.layout').attr('data-count');

$('.layout').on('inview', function(event, isInView) {
  if (isInView) {
    var num = $(this).attr('data-count');
    var number = (num < 10 ? '0' : '') + num;
    // console.log(number);
    document.getElementById("counterLayout").innerHTML = number;
  } else {
  }
});
