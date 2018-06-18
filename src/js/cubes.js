console.log('cubes');

var cube = $('#cubes');

if ($(window).width() < 768){
cube.addClass('appear-cubes').removeClass('cubes');
cube.on('click', function(){
    console.log('ready');
    $('#categories').toggleClass('categ-cubes');
    $('.container-cubes').toggleClass('container-cubes-mobile');
    $('.navbar-brand').addClass('navbar-cubes');
});
}
