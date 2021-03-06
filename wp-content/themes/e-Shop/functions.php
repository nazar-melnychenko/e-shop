<?php
add_action( 'after_setup_theme', 'woocommerce_support' );

function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

function register_styles_scripts() {
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.min.css' );
	wp_enqueue_script( 'googleapis', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCDCApeoMpSTQxvz14Yhh09zlsw8FhB2ck&libraries', [], null, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.min.js', [], null, true );

};

add_action( 'wp_enqueue_scripts', 'register_styles_scripts' );

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'menu_title' => 'Налаштування полів',
		'menu_slug'  => 'theme-general-settings',
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'Header Settings',
		'menu_title'  => 'Header',
		'parent_slug' => 'theme-general-settings',
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'Banners and sliders',
		'menu_title'  => 'Banners & Sliders',
		'parent_slug' => 'theme-general-settings',
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'Footer Settings',
		'menu_title'  => 'Footer',
		'parent_slug' => 'theme-general-settings',
	) );

};

register_nav_menus( [
	'header_menu'   => 'Меню в шапці',
	'category_menu' => 'Меню категорій',
	'footer_menu'   => 'Меню в підвалі',
] );

include "inc/Custom_Walker_Nav_Menu.php";

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page' );

function new_loop_shop_per_page( $cols ) {
	$cols = 8;
	$spp  = false;
	if ( isset( $_GET['spp'] ) ) {
		$spp = $_GET['spp'];
	}

	if ( $spp ) {
		return $spp;
	}

	return $cols;
};

require_once ABSPATH . 'wp-admin/includes/template.php';

function stars_rating() {
	global $product;
	$review  = $product->get_review_count();
	$average = $product->get_average_rating();
	wp_star_rating( [ 'rating' => $average, 'type' => 'rating', 'number' => $review ] );
};

function register_widgets() {
	register_sidebar( [ 'name' => 'Список бажань', 'id' => 'wish_list' ] );
	register_sidebar( [
		'name'         => 'Фільтр товарів',
		'id'           => 'products_filters',
		'before_title' => '<h4 class="filter-title">',
		'after_title'  => "</h4>\n",
	] );
	register_sidebar( [ 'name' => 'Товари з найбільшим рейтенгом', 'id' => 'bestseller' ] );
	register_sidebar( [ 'name' => 'Соціальні мережі', 'id' => 'socials' ] );
	register_sidebar( [
		'name'         => 'Меню підвалу (ліве)',
		'id'           => 'left_footer_menu',
		'before_title' => '<div class="footer-title"><h5>',
		'after_title'  => "</h5></div>\n"
	] );
	register_sidebar( [
		'name'         => 'Меню підвалу (центр)',
		'id'           => 'center_footer_menu',
		'before_title' => '<div class="footer-title"><h5>',
		'after_title'  => "</h5></div>\n"
	] );
	register_sidebar( [
		'name'         => 'Меню підвалу (праве)',
		'id'           => 'right_footer_menu',
		'before_title' => '<div class="footer-title"><h5>',
		'after_title'  => "</h5></div>\n"
	] );
};

add_action( 'widgets_init', 'register_widgets' );

include 'inc/class-wc-widget-top-rat.php';
include 'inc/class-widget-products.php';

function wpb_load_widget() {
	register_widget( 'WC_Widget_Top_Rated' );
	register_widget( 'WC_Products' );
}

add_action( 'widgets_init', 'wpb_load_widget' );

function get_formatted_cart_item_data( $cart_item, $flat = false ) {
	$item_data = array();
	if ( $cart_item['data']->is_type( 'variation' ) && is_array( $cart_item['variation'] ) ) {
		foreach ( $cart_item['variation'] as $name => $value ) {
			$taxonomy = wc_attribute_taxonomy_name( str_replace( 'attribute_pa_', '', urldecode( $name ) ) );
			if ( taxonomy_exists( $taxonomy ) ) {
				$term = get_term_by( 'slug', $value, $taxonomy );
				if ( ! is_wp_error( $term ) && $term && $term->name ) {
					$value = $term->name;
				}
				$label = wc_attribute_label( $taxonomy );
			} else {
				$value = apply_filters( 'woocommerce_variation_option_name', $value, null, $taxonomy, $cart_item['data'] );
				$label = wc_attribute_label( str_replace( 'attribute_', '', $name ), $cart_item['data'] );
			}
			$item_data[] = array(
				'key'   => $label,
				'value' => $value,
			);
		}
	}

	// Filter item data to allow 3rd parties to add more to the array.
	$item_data = apply_filters( 'woocommerce_get_item_data', $item_data, $cart_item );

	// Format item data ready to display.
	foreach ( $item_data as $key => $data ) {
		// Set hidden to true to not display meta on cart.
		if ( ! empty( $data['hidden'] ) ) {
			unset( $item_data[ $key ] );
			continue;
		}
		$item_data[ $key ]['key']     = ! empty( $data['key'] ) ? $data['key'] : $data['name'];
		$item_data[ $key ]['display'] = ! empty( $data['display'] ) ? $data['display'] : $data['value'];
	}

	// Output flat or in list format.
	if ( count( $item_data ) > 0 ) {
		ob_start();

		if ( $flat ) {
			foreach ( $item_data as $data ) {
				echo esc_html( $data['key'] ) . ': ' . wp_kses_post( $data['display'] ) . "\n";
			}
		} else {
			wc_get_template( 'cart/cart-item-data.php', array( 'item_data' => $item_data ) );
		}

		return ob_get_clean();
	}

	return '';
};

function woocommerce_account_content() {
	global $wp;
	if(! empty ($wp->query_vars['view-order']) ? $view_order = $wp->query_vars['view-order'] : $view_order = '') {
		do_action('woocommerce_account_view-order_endpoint', $view_order);?>
		<div class="btnback"><a href="<?php echo home_url('/my-account/'); ?>" class="button">Назад</a></div>
	<?php } else {
		wc_get_template('myaccount/view-account.php');
	};

};

function be_register_blocks() {
	if( ! function_exists('acf_register_block') )
		return;
	acf_register_block([
		'name'			=> 'about',
		'title'			=> __( 'About', 'clientname' ),
		'render_template'	=> 'partials/block-about.php',
		'category'		=> 'formatting',
		'icon'			=> 'format-aside',
		'keywords'		=> array( 'profile', 'user', 'author' ),
		'enqueue_style'  => get_template_directory_uri() . '/partials/about.css',
	]);

	acf_register_block([
		'name'			=> 'our-team',
		'title'			=> __( 'Our team', 'clientname' ),
		'render_template'	=> 'partials/block-our-team.php',
		'category'		=> 'formatting',
		'icon'			=> 'format-aside',
		'keywords'		=> array( 'profile', 'user', 'author' ),
		'enqueue_style'  => get_template_directory_uri() . '/partials/about.css',
	]);

	acf_register_block([
		'name'			=> 'tabs-slider-product',
		'title'			=> __( 'Tabs slider product', 'clientname' ),
		'render_template'	=> 'partials/block-tabs-slider-product.php',
		'category'		=> 'formatting',
		'icon'			=> 'format-aside',
		'keywords'		=> array( 'profile', 'user', 'author' ),
	]);
};

add_action('acf/init', 'be_register_blocks' );