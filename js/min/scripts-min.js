$(document).scroll(function(){var e=$("#nosotros").offset().top,a=$("#servicios").offset().top,s=$("#desarrollos").offset().top,i=$("#clientes").offset().top,o=$("#contacto").offset().top,t=$(window).scrollTop();e>t-100&&t+50>e?($("#main-header img").removeClass("active"),$("#main-header .nosotros img").addClass("active")):a>t-100&&t+50>a?($("#main-header img").removeClass("active"),$("#main-header .servicios img").addClass("active")):s>t-100&&t+50>s?($("#main-header img").removeClass("active"),$("#main-header .desarrollos img").addClass("active")):i>t-100&&t+50>i?($("#main-header img").removeClass("active"),$("#main-header .clientes img").addClass("active")):o>t-100&&t+50>o&&($("#main-header img").removeClass("active"),$("#main-header .contacto img").addClass("active"))});