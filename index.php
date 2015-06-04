<?php get_header(); ?>

<video width="100%" height="auto" autoplay loop>
  <source src="<?php bloginfo('template_url')?>/img/index/video.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>

<?php

$nosotros_args = array(
	'post_type' => 'page',
	'name' => 'nosotros'
	);

$nosotros_query = new WP_Query( $nosotros_args );
?>


<?php if ($nosotros_query->have_posts()) : // Show latest posts as default ?>
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'header-thumb' ); $url = $thumb['0']; ?> <section id="nosotros" style="background-image:url(<?=$url?>); background-position:center; background-size:cover;">
		<div class="container">
			<div class="col-sm-10 col-xs-offset-1">
				<?php while ($nosotros_query->have_posts()) : $nosotros_query->the_post(); ?>
					<article>
						<h1> <?php the_title(); ?> </h1>
						<?php the_content(); ?>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div><!--.col-sm-10-->
		</div><!--.container-->
	</section><!--#nosotros-->
<?php endif; ?>


<section id="servicios">
	<div class="container">
		<div class="col-sm-10 col-xs-offset-1">
			<h1>Servicios</h1>

			<h2>Construcción</h2>
			<div id="slideconstruccion">
		        <ul id="slider1">
		            <li><img style="position:relative; left:140px;" src="<?php bloginfo('template_url')?>/img/slides/comercial.jpg" width="642" height="400" title="Con una amplia trayectoria en el área comercial, ofrecemos los servicios de construcción, remodelación, mantenimiento y proyecto llave en mano. Nuestras propuestas generan impacto y atracción hacia los puntos de venta, donde incluimos diseño y funcionalidad."></li>
		            <li><img style="position:relative; left:140px;" src="<?php bloginfo('template_url')?>/img/slides/publico.jpg" width="642" height="400" title="Contamos con un extenso historial de trabajos realizados, entre ellos, la construcción,  reestructuración y remodelación integral de edificios del sector público,  construcción de vivienda, construcción y remodelación de escuelas y CENDIS, construcción de unidades deportivas; entre otros."></li>
		            <li><img style="position:relative; left:140px;" class="centerslideimage" src="<?php bloginfo('template_url')?>/img/slides/residencial.jpg" width="642" height="400" title="Analizando todas las variables en cuanto a las condiciones del lugar, presupuesto, programa, clima, gustos y preferencias, desarrollamos conceptos únicos y flexibles, que se adaptan con el tiempo a los cambios que va requiriendo el usuario."></li>
		        </ul>
	        </div>

			<?php

			$urbaniza_args = array(
				'post_type' => 'page',
				'name' => 'urbanizacion'
				);

			$urbaniza_query = new WP_Query( $urbaniza_args );
			?>

			<?php if ($urbaniza_query->have_posts()) : // Show latest posts as default ?>
						<?php while ($urbaniza_query->have_posts()) : $urbaniza_query->the_post(); ?>
							<article>
								<h2> <?php the_title(); ?> </h2>
								<?php the_content(); ?>
							</article>
						<?php endwhile; wp_reset_postdata(); ?>

			<?php endif; ?>

			<h1>Servicios de Medio Ambiente</h1>
        <!---Agregar Slideshow--> 
     <div id="slideservicios">
        <ul id="slider2">
            <li><img style="position:relative; left:140px;" src="<?php bloginfo('template_url')?>/img/slides/ambientales/servamb.jpg" width="642" height="400" title="Parte importante de la organización es el área dedicada al medio ambiente. Con más de 40 años dedicados al control de fauna nociva y medio ambiente en urbes y desarrollos turísticos como Cancún, Los Cabos, Huatulco y más, hemos implementado con el equipo más experimentado, metodologías y servicio únicos, garantizando total satisfacción del resultado en nuestros trabajos."></li>
            <li><img style="position:relative; left:140px;" src="<?php bloginfo('template_url')?>/img/slides/ambientales/control.jpg" width="642" height="400" title="Comprende acciones para el control de insectos y roedores, potencialmente perjudiciales a la salud y bienestar del ser humano. Se utilizan métodos específicos con productos y tecnología de vanguardia, autorizados por los organismos nacionales e internacionales facultados.Se ejecutan en áreas naturales urbanas, infraestructura, inmuebles, entre otros."></li>
            <li><img style="position:relative; left:140px;" class="centerslideimage" src="<?php bloginfo('template_url')?>/img/slides/ambientales/greencity.jpg" width="642" height="400" title="Estudios multidisciplinarios: Son estudios de análisis de proyectos diversos que concluyen en el establecimiento de un plan maestro de desarrollo auto sostenible."></li>
        </ul>
        </div>    

		</div><!--.col-sm-10-->
	</div><!--.container-->
</section><!--#servicios-->

<section id="desarrollos">
	<div class="container">
<!--			<?php

			$desarrollos1_args = array(
				'post_type' => 'page',
				'name' => 'desarrollos1'
				);

			$desarrollos1_query = new WP_Query( $desarrollos1_args );
			?>

			<?php if ($desarrollos1_query->have_posts()) : // Show latest posts as default ?>
				<div class="container">
					<div class="col-sm-10 col-xs-offset-1">
						<h1>Desarrollos en venta</h1>
						<?php while ($desarrollos1_query->have_posts()) : $desarrollos1_query->the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; wp_reset_postdata(); ?>
					</div><!--.col-sm-10-->
				<!--</div><!--.container-->

			<!--<?php endif; ?>-->
		<div class="col-sm-10 col-xs-offset-1">
			<h2>Desarrollos en venta</h2>
			<div id="slidedesarrollos">
	        <ul id="slider3">
	            <li><img style="position:relative; left:370px; top:0px;" src="<?php bloginfo('template_url')?>/img/slides/desarrollos/preventa.jpg" width="500" height="600" title="Descripción próximamente"></li>
	            <li><img style="position:relative; left:370px; top:0px;" src="<?php bloginfo('template_url')?>/img/slides/desarrollos/venta.jpg" width="500" height="600" title="Descripción próximamente"></li>
	            <li><img style="position:relative; left:370px; top:0px;" src="<?php bloginfo('template_url')?>/img/slides/desarrollos/desarrollos.jpg" width="500" height="600" title="Descripción próximamente"></li>
	        </ul>
	        </div>
		</div>
	</div>


</section>

<section id="clientes">
	<?php if(is_active_sidebar('clientes')): ?>
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-xs-offset-1">
					<h1>Clientes</h1>
					<?php dynamic_sidebar( 'clientes' ); ?>
				</div><!--.col-sm-3-->
			</div><!--.row-->
		</div><!--.container visible-xs-->
	<?php endif; ?>
</section><!--#clientes-->

<section id="contacto">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-xs-offset-1 mapa">
				<h1>Contacto</h1>
				<?php if(is_active_sidebar('contacto')): ?>
					<?php dynamic_sidebar( 'contacto' ); ?>
				<?php endif; ?>
			</div><!--.col-sm-7-->
			<div class="col-sm-5" id="twitter">
				<div>
				<?php if(is_active_sidebar('twitter')): ?>
					<?php dynamic_sidebar( 'twitter' ); ?>
				<?php endif; ?>
				</div>
			</div><!--.col-sm-5-->
			<div class="col-sm-10 col-xs-offset-1 contact-form">
				<?php dynamic_sidebar( 'contact-form' ); ?>
			</div><!--.contact-form-->
		</div><!--.row-->
	</div><!--.container-->
</section><!--#contacto-->

<?php get_footer(); ?>