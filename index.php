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
			<div class="col-sm-12">
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
		<div class="col-sm-12">
			<h1>Servicios</h1>

			<?php

			$urbaniza_args = array(
				'post_type' => 'page',
				'name' => 'urbanizacion'
				);

			$urbaniza_query = new WP_Query( $urbaniza_args );
			?>

			<?php if ($urbaniza_query->have_posts()) : // Show latest posts as default ?>
				<div class="container">
					<div class="col-sm-12">
						<?php while ($urbaniza_query->have_posts()) : $urbaniza_query->the_post(); ?>
							<article>
								<h2> <?php the_title(); ?> </h2>
								<?php the_content(); ?>
							</article>
						<?php endwhile; wp_reset_postdata(); ?>
					</div><!--.col-sm-10-->
				</div><!--.container-->

			<?php endif; ?>


		</div><!--.col-sm-12-->
	</div><!--.container-->
</section><!--#servicios-->

<section id="desarrollos">
	<div class="container">
			<?php

			$desarrollos1_args = array(
				'post_type' => 'page',
				'name' => 'desarrollos1'
				);

			$desarrollos1_query = new WP_Query( $desarrollos1_args );
			?>

			<?php if ($desarrollos1_query->have_posts()) : // Show latest posts as default ?>
				<div class="container">
					<div class="col-sm-12">
						<?php while ($desarrollos1_query->have_posts()) : $desarrollos1_query->the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; wp_reset_postdata(); ?>
					</div><!--.col-sm-10-->
				</div><!--.container-->

			<?php endif; ?>
	</div>
</section>

<section id="clientes">
	<?php if(is_active_sidebar('clientes')): ?>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
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
			<h1>Contacto</h1>
			<div class="col-sm-7 mapa">
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
			<div class="col-sm-12 contact-form">
				<?php dynamic_sidebar( 'contact-form' ); ?>
			</div><!--.contact-form-->
		</div><!--.row-->
	</div><!--.container-->
</section><!--#contacto-->

<?php get_footer(); ?>