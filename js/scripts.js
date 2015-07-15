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

$(document).ready(function(){
  $('.feature-img').click(function(){
      var carouselName = $(this).data('carouselname');
      var parentName = $(this).data('parent');

      $('[data-target='+parentName+']').removeClass('visible');
      $(carouselName).addClass("visible");


  });
});