<?php

/* Edited by NuevaWeb to make it simpler */

/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

require_once( 'lib/ftscratch-support/admin.php' );

require_once( 'lib/ftscratch-support/theme_support.php' );

// =======================================================
// Style & Javascript Enqueue
// =======================================================

function nw_enqueue_scripts(){
	wp_enqueue_style( 'nw_style', get_template_directory_uri(). '/css/style.css' );
	wp_enqueue_script( 'jquery', get_template_directory_uri(). '/js/jquery-1.11.1.min.js', '1.11.1' , false );
	wp_enqueue_script( 'nw-scripts',  get_template_directory_uri(). '/lib/bootstrap-3.3.1/dist/js/bootstrap.min.js', [], '3.3.1', true );
	wp_enqueue_script( 'nw-scripts',  get_template_directory_uri(). '/js/scripts.js');
}
add_action( 'wp_enqueue_scripts', 'nw_enqueue_scripts');

// Hero Unit (hero-unit.php)
// require_once( 'lib/ftscratch-support/custom-post-type/hero-unit-post-type.php' ); // you can disable this if you like

/*
Create your own Post Type:
*/
// require_once( 'lib/ftscratch-support/custom-post-type/custom-post-type.php' ); // you can disable this if you like

/*
Create your own button WordPress Editor Buttons:
*/
//require_once('lib/ftscratch-support/nw-shortcodes/wptuts-editor-buttons/wptuts.php'); // you can disable this if you like

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
// add_image_size( 'slide-1500-500', 1500, 500, true );
add_image_size( 'slide-1920-460', 1920, 460, true ); // default fullwith carousel slide

add_image_size( 'bg-thumbnail', 640, 480, true );
add_image_size( 'md-thumbnail', 360, 270, true );
add_image_size( 'sm-thumbnail', 203, 152, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bg-thumbnail' => __('640px by 480px'),
    	// 'md-thumbnail' => __('360px by 270px'),
    	// 'sm-thumbnail' => __('203px by 152px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select 
the new images sizes you have just created from within the media manager 
when you add media to your content blocks. If you add more image sizes, 
duplicate one of the lines in the array and name it according to your 
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function nw_register_sidebars() {
	// DOCS: http://codex.wordpress.org/Function_Reference/dynamic_sidebar

	register_sidebar(array(
		'id' => 'main-nav', // Change the id
		'name' => 'Main-nav', // Change the name
		'description' => 'The first (primary) sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'descarga-pdf', // Change the id
		'name' => 'Enlace para Descarga de PDF', // Change the name
		'description' => 'The first (primary) sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'clientes', // Change the id
		'name' => 'Clientes', // Change the name
		'description' => 'The first (primary) sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'contacto', // Change the id
		'name' => 'Contacto', // Change the name
		'description' => 'The first (primary) sidebar.', // Better change description too!
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'contact-form', // Change the id
		'name' => 'Contact-Form', // Change the name
		'description' => 'The first (primary) sidebar.', // Better change description too!
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'twitter', // Change the id
		'name' => 'Twitter', // Change the name
		'description' => 'The first (primary) sidebar.', // Better change description too!
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/


// ====================================
// Custom Support 
// ====================================

// -----------------------------------
// Post Categories function
// -----------------------------------
// Return the post categories
// It's necesary to echo the function when using it, ex: echo nw_categories();
function nw_categories(){
	$categories = get_the_category();
	$separator = ', ';
	if($categories):
		$category = '';
		foreach($categories as $category_meta):
			$category .= '<a href="'.get_category_link( $category_meta->term_id ).'" title="' . esc_attr( sprintf( __( "Ver todas las publicaciones en %s" ), $category_meta->name ) ) . '" itemprop="url"><span itemprop="title">'.$category_meta->cat_name.'</span></a>'.$separator; 
		endforeach;
		return trim($category, $separator);
	endif;

	return FALSE;
}

// -----------------------------------
// Breadcrumbs function
// -----------------------------------
// Return the post ancestors as breadcrumbs
// It's necesary to echo the function when using it, ex: echo nw_breadcrumbs();
function nw_breadcrumbs(){
	global $post;

	$post_ancestors = array_reverse(get_post_ancestors($post->ID));
	$separator = ' » ';
	$current_post = '<div class="current_post" id="'.get_post($ancestor)->post_name.'-breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" itemprop="child">'.
						'<a href="'.get_permalink($post->ID).'" itemprop="url">
							<span itemprop="title">'.$post->post_title.'</span>
						</a>
					</div>';

	$is_category = get_category(get_query_var('cat'))->slug.'-breadcrumb';
	$is_single = get_the_category($post->ID)[0]->slug.'-breadcrumb';
	$is_page = get_post($post_ancestors[0])->post_name.'-breadcrumb';
	$is_tag = get_tag(get_query_var('tag_id'))->slug.'-breadcrumb';

	$child_id = is_page() ? $is_page : (is_single() ? $is_single : (is_category() ? $is_category : $is_tag));

	$breadcrumb = '<div id="inicio" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" itemref="'.$child_id.'">
						<a href="'.get_bloginfo("url").'" itemprop="url">
							<span itemprop="title">Inicio</span>
						</a>'.$separator.
					'</div>';

	$container_opening = '<div class="breadcrumbs">';
	$container_closing = '</div>';

	if(is_page()):
		
		foreach ($post_ancestors as $key => $ancestor):
			$breadcrumb_id = get_post($ancestor)->post_name.'-breadcrumb';
			$child_id = get_post($post_ancestors[$key+1])->post_name.'-breadcrumb';
			$breadcrumb .= '<div id="'.$breadcrumb_id.'" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" itemprop="child" itemref="'.$child_id.'">
								<a href="'.get_permalink($ancestor).'" itemprop="url">
									<span itemprop="title">'.get_post($ancestor)->post_title.'</span>
								</a>'.$separator.
							'</div>';
		endforeach;
		$breadcrumb .= $current_post;
		$breadcrumb = $container_opening.$breadcrumb.$container_closing;

		return trim($breadcrumb, $separator);
	elseif(is_category()):

		$cat_permalink = get_category_link(get_query_var('cat'));

		$breadcrumb .= '<div class="current_post" id="'.get_category(get_query_var('cat'))->slug.'-breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" itemprop="child">
							<a href="'.$cat_permalink.'" itemprop="url">
								<span itemprop="title">'.get_category(get_query_var('cat'))->name.'</span>
							</a>'.
						'</div>';

		$breadcrumb = $container_opening.$breadcrumb.$container_closing;

		return $breadcrumb;
	elseif(is_single()):
		$first_category = get_the_category($post->ID)[0];
		$cat_permalink = get_category_link($first_category->term_id);


		$breadcrumb .= '<div id="'.$first_category->slug.'-breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" itemprop="child" itemref="'.$post->post_name.'-breadcrumb">
							<a href="'.$cat_permalink.'" itemprop="url">
								<span itemprop="title">'.$first_category->name.'</span>
							</a>'.$separator.
						'</div>';

		$breadcrumb .= $current_post;
		$breadcrumb = $container_opening.$breadcrumb.$container_closing;

		return $breadcrumb;
	else:

		$breadcrumb .= '<div class="current_post" id="'.get_tag(get_query_var('tag_id'))->slug.'-breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" itemprop="child">
							<a href="'.get_tag_link(get_query_var('tag_id')).'" itemprop="url">
								<span itemprop="title">'.get_tag(get_query_var('tag_id'))->name.'</span>
							</a>'.
						'</div>';

		$breadcrumb = $container_opening.$breadcrumb.$container_closing;

		return $breadcrumb;
	endif;
	
	return $breadcrumb;
}


// -----------------------------------
// Add Page attribute "Page Order" to Posts.
// -----------------------------------

// add_action( 'admin_init', 'posts_order_wpse_91866' );

// function posts_order_wpse_91866() 
// {
//     add_post_type_support( 'post', 'page-attributes' );
// }

// -----------------------------------
// Add Post attribute to Page.
// -----------------------------------

// // Exceprt
// add_action( 'admin_init', 'nw_page_excerpt_init' );

// function nw_page_excerpt_init() {
//     add_post_type_support( 'page', 'excerpt' );
// }


// -----------------------------------
// Add Tag Support to Pages
// -----------------------------------

// function tags_support_all() {
// 	register_taxonomy_for_object_type('post_tag', 'page');
// }


//*************************** Widgets Import *************************** //

require_once( 'widget/widget-custom-link.php' ); // Agrega un custom url, icon o imagen.
require_once( 'widget/widget-main-nav.php' ); // Agrega un custom url, icon o imagen.

function get_attachment_id_from_src ($image_src) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_src )); 
	return $attachment[0]; 
}

function hexagon_gallery($parent_name, $side){ ?>
	<div id="<?php echo get_page_by_title($parent_name)->post_name; ?>">
		<h2><?php echo get_page_by_title($parent_name)->post_title; ?></h2>

		<?php
			$parent_id = get_page_by_title($parent_name)->ID;

			global $post;

			$section_posts_args = array(
				'post_type' => 'page',
				'post_parent' => $parent_id
				);

			$section_posts_query = new WP_Query( $section_posts_args );

			
		?>
		<?php if ($section_posts_query->have_posts()) : // Show latest posts as default ?>
			<?php $text = get_post_field('post_content', $parent_id); ?>
			<?php if (empty($text)) { ?>
			<?php } else { ?>
				<p><?php echo $text; ?></p>
			<?php } ?>
			<div class="col-sm-5 relative <?php echo $side==right ? 'pull-right':''; ?>">
				<?php while ($section_posts_query->have_posts()) : $section_posts_query->the_post(); ?>
					<?php if (has_post_thumbnail() ) { ?>
						<div class="feature-img" data-carouselname="#carousel-gallery-<?php echo $post->post_name; ?>" data-parent="<?php echo get_post($parent_id)->post_name; ?>">
							<?php the_title('<h3>','</h3>'); ?>
							<?php the_post_thumbnail('medium'); ?>
						</div>
					<?php } ?>
				<?php endwhile; ?>
			</div><!-- /.col-sm-6 -->

			<div class="col-sm-7">
			<?php $i = 0; while ($section_posts_query->have_posts()) : $section_posts_query->the_post(); 
				$gallery = get_post_gallery_images($post->ID); ?>

				<div id="carousel-gallery-<?php echo $post->post_name; ?>" class="carousel slide <?php echo $i==0 ? 'visible':''; ?>" data-ride="carousel" data-target="<?php echo get_post($parent_id)->post_name; ?>">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php foreach ($gallery as $key => $image_src): ?>
							<li data-target="#carousel-gallery-<?php echo $post->post_name; ?>" data-slide-to="<?php echo $key; ?>" <?php echo $key == 0 ? 'class="active"':''; ?>></li>
						<?php endforeach; ?>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php $description = get_post_custom_values('description'); ?>
						<?php if (empty($description)) {
						} else { ?>
							<div class="description">
								<p><?php echo $description[0]; ?></p>
							</div>
						<?php } ?>
						<?php foreach ($gallery as $key => $image_src): ?>
							<?php $id = get_attachment_id_from_src($image_src);?>
							<?php $alt_text = get_post_meta($id, '_wp_attachment_image_alt', true); ?>
							<div class="item <?php echo $key == 0 ? 'active' : ''?>">
								<img src="<?php bloginfo('template_url'); ?>/img/slides/pixel.png" style="background-image:url(<?php echo $image_src; ?>)" alt=""/>
							</div>
						<?php endforeach; ?>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-gallery-<?php echo $post->post_name; ?>" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-gallery-<?php echo $post->post_name; ?>" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			<?php $i++; endwhile; wp_reset_postdata(); ?>

			</div><!-- /.col-sm-6 -->
		<?php endif; ?>
	</div><!--#contruccion-->
<?php } 
			

















?>