<!Doctype html>
<!--[if lt IE 7]><html lang="es-mx" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="es-mx" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="es-mx" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="es-mx" class="no-js"><!--<![endif]-->

<html>
<head>
	
	<meta charset="UTF-8">
	
	<meta name="author" content="The NuevaWeb Team">
	<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>

	<?php // Load styles and scripts from functions.php nw_enqueue_scripts() function ?>
	<?php // icons & favicons ?>
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/img/assets/apple-icon-touch.png">
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/img/assets/favicon.png">
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/assets/favicon.ico">
	<![endif]-->
	<meta name="msapplication-TileColor" content="#f8e047">
	<meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/img/assets/win8-tile-icon.png">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider/jquery.bxslider.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/jquery.bxslider/jquery.bxslider.css">
	
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider/jquery.bxslider2.js" type=	"text/javascript"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/jquery.bxslider/jquery.bxslider2.css">
	

	<script>
		$(document).ready(function(){   
		$('#slider3').bxSlider2({
				captions: true,
				mode: 'fade',    
				buildPager: function(slideIndex){
					switch(slideIndex){
						case 0:
							return '<img id="polipre" src="<?php bloginfo('template_url')?>/img/slides/desarrollos/poli_preventa.png">';
						case 1:
							return '<img id="poliven" src="<?php bloginfo('template_url')?>/img/slides/desarrollos/poli_venta.png">';
						case 2:
							return '<img id="polides" src="<?php bloginfo('template_url')?>/img/slides/desarrollos/poli_desarrollos.png">';
					}
				}
			});
		});
	</script>

	<?php wp_head(); // wordpress admin-bar functions ?>

	<?php // Your Google Analytics goes here. ?>
	
</head>
<body>

	<header id="main-header">
    <?php if(is_active_sidebar('main-nav')): ?>
		<div class="main-nav">
						<?php dynamic_sidebar( 'main-nav' ); ?>
		</div><!--.main-nav-->
	<?php endif; ?>

	</header><!-- /#main-header -->




