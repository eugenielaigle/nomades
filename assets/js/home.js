console.log("OK"),jQuery(document).ready(function(i){i(".categories-prez").on("inview",function(o,t){if(t){var e=document.body.clientHeight-i(".categories-prez").offset().top;i(".sidebar-recherche").css({position:"absolute",bottom:e,top:"auto"}),i(".sidebar-contact").css({position:"absolute",bottom:e,top:"auto"})}else i(".sidebar-recherche").css({position:"fixed",bottom:"0",top:"0"}),i(".sidebar-contact").css({position:"fixed",bottom:"0",top:"0"})})});