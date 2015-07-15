<?php get_header(); ?>
<div id="top"></div>
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
	<?php while ($nosotros_query->have_posts()) : $nosotros_query->the_post(); ?>
		<?php
			$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		?> 
		<div class="container">
			<div class="col-sm-10 col-xs-offset-1">
				<section id="nosotros" style="background-image:url('<?php echo $thumb[0]; ?>'); background-position:center; background-size:cover;">
					<article>
						<h1> <?php the_title(); ?> </h1>
						<?php the_content(); ?>
					</article>
				</section><!--#nosotros-->
			</div><!--.col-sm-10-->
		</div><!--.container-->
				<?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>


<section id="servicios">
	<div class="container">
		<div class="col-sm-10 col-xs-offset-1">
			<h1>Servicios</h1>
			<?php echo hexagon_gallery('construccion'); ?>

			<div class="clearfix"></div>
			
			<?php 
			$urbanizacion_args = array(
				'post_type' => 'page',
				'name' => 'urbanizacion'
				);

			$urbanizacion_query = new WP_Query( $urbanizacion_args );
			?>


			<?php if ($urbanizacion_query->have_posts()) : // Show latest posts as default ?>
				<?php while ($urbanizacion_query->have_posts()) : $urbanizacion_query->the_post(); ?>
					<?php
						$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					?> 
					<section id="urbanizacion" style="background-image:url('<?php echo $thumb[0]; ?>'); background-position:center; background-size:cover;">
						<article>
							<h1> <?php the_title(); ?> </h1>
							<?php the_content(); ?>
						</article>
					</section><!--#urbanizacion-->
				<?php endwhile; wp_reset_postdata(); ?>
			<?php endif; ?>

			<?php echo hexagon_gallery('servicios de medio ambiente', 'right'); ?>

			<div class="clearfix"></div>

		</div><!--.col-sm-10-->
	</div><!--.container-->
</section><!--#servicios-->
			
<section id="desarrollos">
	<div class="container">
		<div class="col-sm-10 col-xs-offset-1">
			<?php echo hexagon_gallery('desarrollos en venta'); ?>
		</div><!--.col-sm-10-->
	</div><!--.container-->
</section><!--.desarrollos-->

	<?php if(is_active_sidebar('descarga-pdf')): ?>
		<div class="container button">
			<div class="row">
				<div class="col-sm-10 col-xs-offset-1">
					<?php dynamic_sidebar( 'descarga-pdf' ); ?>
				</div><!--.col-sm-10 col-xs-offset-1-->
			</div><!--.row-->
		</div><!--.container-->
	<?php endif; ?>
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