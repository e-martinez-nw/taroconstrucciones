$(document).scroll(function(){
  var nosotrosOffsetTop = $("#nosotros").offset().top;
  var serviciosOffsetTop = $("#servicios").offset().top;
  var desarrollosOffsetTop = $("#desarrollos").offset().top;
  var clientesOffsetTop = $("#clientes").offset().top;
  var contactoOffsetTop = $("#contacto").offset().top;
  var windowScroll = $(window).scrollTop();


  if (nosotrosOffsetTop > (windowScroll - 100)  && nosotrosOffsetTop < (windowScroll +50)) {

    $("#main-header img").removeClass("active");
    $("#main-header .nosotros img").addClass("active");
  }else if (serviciosOffsetTop > (windowScroll - 100) && serviciosOffsetTop < (windowScroll +50)) {

    $("#main-header img").removeClass("active");
    $("#main-header .servicios img").addClass("active");
  }else if (desarrollosOffsetTop > (windowScroll - 100) && desarrollosOffsetTop < (windowScroll +50)) {

    $("#main-header img").removeClass("active");
    $("#main-header .desarrollos img").addClass("active");
  }else if (clientesOffsetTop > (windowScroll - 100) && clientesOffsetTop < (windowScroll +50)) {

    $("#main-header img").removeClass("active");
    $("#main-header .clientes img").addClass("active");
  }else if (contactoOffsetTop > (windowScroll - 100) && contactoOffsetTop < (windowScroll +50)) {

    $("#main-header img").removeClass("active");
    $("#main-header .contacto img").addClass("active");
  }
});



// //ESTE ES EL SCRIPT DEL SCROLLING SIDEBAR
//   $(function() {
//     var offset = $("#sidebar").offset();
//     var topPadding = 15;
//     $(window).scroll(function() {
//     if ($("#sidebar").height() < $(window).height() && $(window).scrollTop() > offset.top) { /* LINEA MODIFICADA POR ALEX PARA NO             ANIMAR SI EL SIDEBAR ES MAYOR AL TAMANO DE PANTALLA */
//     $("#sidebar").stop().animate({
//     marginTop: $(window).scrollTop() - offset.top + topPadding
//     });
//     } else {
//     $("#sidebar").stop().animate({
//   marginTop: 0
//     });
//     };
//     });
//     });

// //ESTE ES EL SCRIPT DE LOS ICONOS DEL SIDEBAR PARA MANTENER LA IMAGEN "ON"

// function swaparrows(idTag) {
//   var ele = document.getElementById(idTag);
//   switch(idTag){
//      case("icon1"):                
//       if (ele.src.match('images/nosotros_icon_tr.png')) {
//           ele.src="images/nosotros_icon_tr.png";

//       }    
//       else if (ele.src.match('nosotros_icon_on.png')) {
//           ele.src="images/nosotros_icon_tr.png";
//       }
//     break;
//     case("icon2"):
//       if (ele.src.match('images/servicios_icon_tr.png')) {
//           ele.src="images/servicios_icon_tr.png";
//       }

//       else if (ele.src.match('servicios_icon_on.png')) {
//           ele.src="images/servicios_icon_on.png";
//       }
//     break;

//       }
//   }

// // ESTE ES EL SCRIPT DE LOS SLIDESHOWS
// // SLIDESHOW SERVICIOS

// $(document).ready(function(){   
//   $('#slider1').bxSlider({
//   captions: true,
//   mode: 'fade',    
//   buildPager: function(slideIndex){
//   switch(slideIndex){
//   case 0:
//   return '<img id="policom" src="images/slides/poli_comercial.png">';
//   case 1:
//   return '<img id="polipub" src="images/slides/poli_publico.png">';
//   case 2:
//   return '<img id="polires" src="images/slides/poli_residencial.png">';
//   }
//   }
//   });
// });

// //SLIDESHOW SERVICIOS AMBIENTALES
//   $(document).ready(function(){   
//   $('#slider2').bxSlider({
//   captions: true,
//   mode: 'fade',    
//   buildPager: function(slideIndex){
//   switch(slideIndex){
//   case 0:
//   return '<img id="policom" src="images/slides/ambientales/poli_servamb.png">';
//   case 1:
//   return '<img id="polipub" src="images/slides/ambientales/poli_control.png">';
//   case 2:
//   return '<img id="polires" src="images/slides/ambientales/poli_greencity.png">';
//   }
//   }
//   });
//   });

// //SLIDESHOW DESARROLLOS
//   $(document).ready(function(){   
//   $('#slider3').bxSlider2({
//   captions: true,
//   mode: 'fade',    
//   buildPager: function(slideIndex){
//   switch(slideIndex){
//   case 0:
//   return '<img id="polipre" src="images/slides/desarrollos/poli_preventa.png">';
//   case 1:
//   return '<img id="poliven" src="images/slides/desarrollos/poli_venta.png">';
//   case 2:
//   return '<img id="polides" src="images/slides/desarrollos/poli_desarrollos.png">';
//   }
//   }
//   });
//   });