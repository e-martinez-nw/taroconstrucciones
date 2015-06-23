<?php get_header(); ?>
	<div class="head-img">
		<img src="<?php bloginfo('template_url')?>/img/index/header.jpg" />
	</div><!--.head-img-->
	<div class="container" id="page">
		<div class="col-sm-10 col-sm-offset-1">
			<?php if (have_posts()) : ?> 
				<?php while (have_posts()) : the_post(); ?>

					<article>
						<header>
							<h1><?php the_title(); ?></h1>
						</header>

						<?php the_content(); ?>

					</article>

				<?php endwhile;?>

			<?php else: ?>
				<?php // there is no data ?>
			<?php endif; ?>
		</div><!--.col-sm-12-->
	</div><!--.container-->

<?php get_footer(); ?>
