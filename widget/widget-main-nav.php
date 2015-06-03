<?php
/**
 * Plugin Name: Custom Widget
 * Plugin URI: http://nuevaweb.com.mx/widget-custom-link
 * Description: A widget that make custom links with icon, image, url and text.
 * Author: Carlos González
 * Author URI: http://nuevaweb.com.mx/
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'widget_custom_menu' );

/**
 * Register our widget.
 * 'Custom_Menu' is the widget class used below.
 *
 * @since 0.1
 */
function widget_custom_menu() {
	register_widget( 'Custom_Menu' );
}

/**
 * Custom Link class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Custom_Menu extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Custom_Menu() {
		/* Widget settings. */
		$widget_ops = array( 
			'classname' => 'CustomMenu', 
			'description' => __('Agrega un link con url, imágen, ícono de FontAwesome y/o texto.', 'CustomMenu') 
			);

		/* Widget control settings. */
		$control_ops = array( 
			'width' => 300,
		 	'height' => 350, 
		 	'id_base' => 'custom-menu' 
		 	);

		/* Create the widget. */
		$this->WP_Widget( 'custom-menu', __('Custom Menu', 'CustomMenu'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('title', $instance['title'] );
		$link_title = $instance['link_title'];
		$url = $instance['url'];
		$url = $instance['url'];
		$icon = $instance['icon'];
		$image_url = $instance['image_url'];
		$custom_class = $instance['custom_class'];
	?>

	<div class="widget-custom-menu <?php echo $custom_class ? $custom_class : ''; ?>">
		<?php echo $url ? '<a href="'.$url.'" rel="m_PageScroll2id">':''; ?>

			<?php if($icon): ?>
				<div class="widget-custom-menu-icon">
					<i class="<?php echo $icon; ?>"></i>
				</div><!-- end .widget-custom-menu-icon -->
			<?php endif; ?>

			<?php if($image_url): ?>
				<div class="widget-custom-menu-image">
					<img src="<?php bloginfo('template_url'); ?>/img/index/pixel.png" style="background-image:url('<?php echo $image_url; ?>');" title="<?php echo $text; ?>" alt="<?php echo $text; ?>" ?>
				</div><!-- end .widget-custom-menu-image -->
			<?php endif; ?>

			<?php if($link_title): ?>
				<div class="widget-custom-menu-title">
					<p><?php echo $link_title; ?></p>
				</div><!-- end .widget-custom-menu-title -->
			<?php endif; ?>

		<?php echo $url ? '</a>':''; ?>			
	</div>

	<?php	
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['link_title'] = strip_tags( $new_instance['link_title'] );
		$instance['url'] = strip_tags( $new_instance['url'] );
		$instance['icon'] = strip_tags( $new_instance['icon'] );
		$instance['image_url'] = strip_tags( $new_instance['image_url'] );
		$instance['custom_class'] = strip_tags( $new_instance['custom_class'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		 	'title' => __('My CustomMenu', 'CustomMenu'),
		 	'link_title' => __('', 'CustomMenu'),
			'url' => __('', 'CustomMenu'),
			'icon' => __('', 'CustomMenu'),
			'image_url' => __('', 'CustomMenu'),
			'custom_class' => __('', 'CustomMenu')

		 	);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<style type="text/css">
			.customMenu span{ font-size: .8em; }
		</style>

		<div class="customMenu">
			<!-- Widget Title: Text Input -->
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title:', 'hybrid'); ?></label>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
				<span>This is the name of the widget. It wont be displayed on the website.</span>
			</p>

			<!-- Your Title: Text Input -->
			<p>
				<label for="<?php echo $this->get_field_id( 'link_title' ); ?>"><?php _e('Title:', 'CustomLink'); ?></label>
				<input id="<?php echo $this->get_field_id( 'link_title' ); ?>" name="<?php echo $this->get_field_name( 'link_title' ); ?>" value="<?php echo $instance['link_title']; ?>" style="width:100%;" />
			</p>

			<!-- Your URL: Text Input -->
			<p>
				<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e('URL:', 'CustomLink'); ?></label>
				<input id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" style="width:100%;" placeholder="http://www."/>
			</p>

			<!-- Your Icon: Text Input -->
			<p>
				<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e('Icon:', 'CustomLink'); ?></label>
				<input id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo $instance['icon']; ?>" style="width:100%;" placeholder="fa fa-facebook"/>
				<span>Consigue el nombre del ícono de <a href="http://fontawesome.io/icons/" target="_blank">Font Awesome</a>. <strong>Recuerda</strong> agrega fa antes de tu fa-icon, p,ej: <strong>fa fa-facebook</strong></span>
			</p>

			<!-- Your Custom Css Class: Text Input -->
			<p>
				<label for="<?php echo $this->get_field_id( 'custom_class' ); ?>"><?php _e('Css Class:', 'CustomLink'); ?></label>
				<input id="<?php echo $this->get_field_id( 'custom_class' ); ?>" name="<?php echo $this->get_field_name( 'custom_class' ); ?>" value="<?php echo $instance['custom_class']; ?>" style="width:100%;" placeholder="primary-btn small"/>
				<span>Agrega clases a tu link.</span>
			</p>

			<!-- Your Image URL: Text Input -->
			<p>
				<label for="<?php echo $this->get_field_id( 'image_url' ); ?>"><?php _e('Image URL:', 'CustomLink'); ?></label>
				<input id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" value="<?php echo $instance['image_url']; ?>" style="width:100%;" placeholder="http://www."/>
			</p>
		</div><!-- end .customLink-->

	<?php
	}
}

?>