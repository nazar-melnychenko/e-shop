<?php

function get_navigation() {
	
	$templates = array();
	$templates[] = 'navigation.php';
	
	locate_template( $templates, TRUE);
}

function load_styles_scripts() {
	
	
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('style',get_template_directory_uri().'/css/style.css');
	
	if(!is_shop()) {
		wp_enqueue_style('component',get_template_directory_uri().'/css/component.css');
	}
	wp_enqueue_style('flexslider',get_template_directory_uri().'/css/flexslider.css');
	
	wp_enqueue_script('bootstrap-3.1.1',get_template_directory_uri().'/js/bootstrap-3.1.1.min.js');
	wp_enqueue_script('simpleCart',get_template_directory_uri().'/js/simpleCart.min.js');
	wp_enqueue_script('responsiveslides',get_template_directory_uri().'/js/responsiveslides.min.js');
	wp_enqueue_script('flexisel',get_template_directory_uri().'/js/jquery.flexisel.js');
	
	if(is_product()) {
		wp_enqueue_script('responsive-tabs',get_template_directory_uri().'/js/responsive-tabs.js');
	
		wp_enqueue_script( 'comment-reply' );
	}
	
}

add_action('wp_enqueue_scripts','load_styles_scripts');

add_filter('woocommerce_enqueue_styles','__return_empty_array');

function my_options() {
	
	
	add_settings_field('url_slide','Ссылка слайдера','display_url','general');
	register_setting('general','url_slide');
	
	add_settings_field('button_slide','Заголовок кнопки слайдера','display_button','general');
	register_setting('general','button_slide');
	
	add_settings_field('my_phone','Телефон','display_phone','discussion');
	register_setting('discussion','my_phone');
	
}

function display_url() {
	echo '<input type="text" class="regular-text" name="url_slide" value="'.esc_attr(get_option('url_slide')).'">';
}
function display_button() {
	echo '<input type="text" class="regular-text" name="button_slide" value="'.esc_attr(get_option('button_slide')).'">';
}function display_phone() {
	echo '<input type="text" class="regular-text" name="my_phone" value="'.esc_attr(get_option('my_phone')).'">';
}

add_action('admin_menu','my_options');

add_action('init','banner_index');
function banner_index() {
	register_post_type('slider',array(
		
		'public'=>true,
		'supports' => array('title','editor','thumbnail'),
		'menu_position' =>120,
		'menu_icon' => admin_url().'images/media-button-other.gif',
		'labels' => array(
			'name' => 'Слайдер',
			'all_items' => 'Все слайды',
			'add_new' => 'Добавить новый слайд',
			'add_new_item' => 'Новый слайд'
		)
	));
}

register_nav_menus(array(
		'top' => 'Верхнее меню',
		'bottom' => 'Меню футера'
		));
		
include "inc/Custom_Walker_Nav_Menu.php";

include "inc/fcollection/widget.php";

function myTempl_widgets_init() {
	
	register_sidebar(array(
		
		'name' => 'follow us',
		'id' => 'folow_us',
		'description' => "Блок для соц. сетей",
		'before_widget' => '',
		'after_widget' => ''
	
	));
	
	register_sidebar(array(
		
		'name' => 'Shipping',
		'id' => 'shipping',
		'description' => "Блок для доставки",
		'before_widget' => '',
		'after_widget' => ''
		
	
	));
	
	register_sidebar(array(
		
		'name' => 'Content Bottom',
		'id' => 'content_bottom',
		'description' => "Блок для отображения слайдера",
		'before_widget' => '',
		'after_widget' => ''

	));
	
	register_sidebar(array(
		
		'name' => 'Footer menu',
		'id' => 'footer',
		'description' => "Блок для отображения меню нижнего подвала",
		'before_widget' => '<div class="col-md-3 span1_of_4">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',

	));
	
	register_sidebar(array(
		
		'name' => 'Left bar',
		'id' => 'left_sidebar',
		'description' => "Блок для отображения левой колонки",
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',

	));
	
	
}
add_action('widgets_init','myTempl_widgets_init');

/*function woocommerce_output_content_wrapper() {
	wc_get_template( 'global/wrapper-start.php' );
}*/

/*add_filter('woocommerce_page_title','change_title');

function change_title($page_title) {
	return 'Hello'.$page_title;
}*/

function woocommerce_template_loop_product_thumbnail() {
	
	if(!is_shop() && !is_product()) {?>
		
		<div class="simpleCart_shelfItem">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
		
	<?php 
	
	
		echo mytempl_get_product_thumbnail();?>
		<div class="mask">
			<div class="info">Quick View</div>
		</div>
	<?php }
	else {
		echo woocommerce_get_product_thumbnail();
	
		echo '</a><div class="mask"><a href="'.get_the_permalink().'">Quick View</a></div>';

	}
	
}

function woocommerce_template_loop_product_title() {
	
	if(!is_shop() && !is_product()) {
			echo '<div class="product_container"><div class="cart-left"><p class="title">'.get_the_title().'</p></div>';
	}
	else {
		echo '<a class="product_name" href="'.get_the_permalink().'">'.get_the_title().'</a>';
	}
}


function change_sale_flash() {
	
	$html = '<div class="offer otop"><p>40%</p><small>Sale</small></div>';
	
	return $html;
}

add_filter('woocommerce_sale_flash','change_sale_flash');


add_filter('widget_nav_menu_args','change_menu','',4);

function change_menu($nav_menu_args, $nav_menu, $args, $instance) {
	
	if($args['id'] == 'left_sidebar') {
		$nav_menu_args['menu_class'] = "product-list";
		$nav_menu_args['container'] = "";
		return $nav_menu_args;
	}
	
	$nav_menu_args['container'] = "";
	$nav_menu_args['menu_class'] = "f_nav";
	$nav_menu_args['link_before'] = "<li>";
	$nav_menu_args['link_after'] = "</li>";
	
	return $nav_menu_args;
}

add_action('wp_enqueue_scripts','load_script',9);

function load_script() {
	wp_enqueue_script('wc-add-to-cart',get_template_directory_uri().'/js/add-to-cart.js', WC_VERSION, true);
}

add_filter('dynamic_sidebar_params','check_sidebar_params');

function check_sidebar_params($params) {
	global $wp_registered_widgets;
	
	if($params[0]['id'] == 'left_sidebar' && $params[0]['widget_id'] == 'nav_menu-'.$params[1]['number']) {
		$params[0]['before_widget'] = '<div class="product-listy">';
		$params[0]['after_widget'] = '</div>';
		$params[0]['before_title'] = '<h2>';
		$params[0]['after_title'] = '</h2>';
	}
	elseif($params[0]['id'] == 'left_sidebar' && $params[0]['widget_id'] == 'text-'.$params[1]['number']) {
		$params[0]['before_widget'] = '<div class="latest-bis">';
		$params[0]['after_widget'] = '</div>';
	}
	
	return $params;
}

if(!is_shop()) {
	
	remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open');
	
	add_action( 'woocommerce_before_shop_loop_item', 'mytempl_loop_product_link_open', 10 );
	
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
	
	add_action( 'woocommerce_before_shop_loop', 'woocommerce_pagination', 35 );
	
}

function mytempl_loop_product_link_open() {
	echo '<a class="cbp-vm-image" href="'.get_the_permalink().'">';
}


if ( ! function_exists( 'mytempl_get_product_thumbnail' ) ) {

	/**
	 * Get the product thumbnail, or the placeholder if not set.
	 *
	 * @subpackage	Loop
	 * @param string $size (default: 'shop_catalog')
	 * @param int $deprecated1 Deprecated since WooCommerce 2.0 (default: 0)
	 * @param int $deprecated2 Deprecated since WooCommerce 2.0 (default: 0)
	 * @return string
	 */
	function mytempl_get_product_thumbnail( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0 ) {
		global $post;
		$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

		if ( has_post_thumbnail() ) {
			$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
			return get_the_post_thumbnail( $post->ID, $image_size, array(
				'class'	 => 'img-responsive',
				'alt'    => $props['alt'],
			) );
		} elseif ( wc_placeholder_img_src() ) {
			return wc_placeholder_img( $image_size );
		}
	}
}


function change_rub_symbol() {
	return 'руб.';
}
add_filter( 'woocommerce_currency_symbol', 'change_rub_symbol');
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
									

add_filter('woocommerce_breadcrumb_defaults','change_breadcrump_args');
function change_breadcrump_args() {
	
	
	return array(
			'delimiter'   => '&nbsp;<span>&gt;</span>',
			'wrap_before' => '<div class="new-product-top"><ul class="product-top-list">',
			'wrap_after'  => '</ul>',
			'before'      => '<li>',
			'after'       => '</li>',
			'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' )
		);
}

add_filter('loop_shop_per_page', 'new_loop_shop_per_page');

function new_loop_shop_per_page($cols) {
	$cols = 9;

	$ppp = false;
	if(isset($_GET['ppp'])) {
		$ppp = $_GET['ppp'];
	}

	if($ppp) {
		return $ppp;
	}
	return $cols;
}

add_action('get_header','product_page_one');

function product_page_one() {
	
	if(is_product()) {
		
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		
		
		remove_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10 );
		
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 70 );
		
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
		
		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
		
		add_action( 'woocommerce_after_main_content', 'woocommerce_upsell_display', 15 );
		add_action( 'woocommerce_after_main_content', 'woocommerce_output_related_products', 20 );
		
		
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
		
	}
}

//add_filter('woocommerce_get_price_html','func_change_price',100, 2);

/*function func_change_price ($price,$product) {
	
	print_r($product->get_price());
    print_r($product->get_sale_price());
    print_r($product->get_regular_price());
    print_r($product->get_price_including_tax());
    print_r($product->get_price_suffix());
    
    $html = "";
    
    return $html;
}*/


if ( ! function_exists( 'woocommerce_review_display_gravatar' ) ) {
	/**
	 * Display the review authors gravatar
	 *
	 * @param array $comment WP_Comment.
	 * @return void
	 */
	function woocommerce_review_display_gravatar( $comment ) {
		echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '80' ), '' );
	}
}



if ( ! function_exists( 'woocommerce_review_display_comment_text' ) ) {

	/**
	 * Display the review content.
	 */
	function woocommerce_review_display_comment_text() {
		
		comment_text();
		
	}
}

add_filter('woocommerce_output_related_products_args', 'change_attr_related');

function change_attr_related($arg) {
	$args = array(
			'posts_per_page' 	=> 3,
			'columns' 			=> 4,
			'orderby' 			=> 'rand'
		);
	
	return $args;	
		
}



add_image_size('shop_cart_image_size', 277,396,TRUE);

add_filter('woocommerce_cart_item_thumbnail','remove_width_attribute',10);

function remove_width_attribute($html) {
	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'change_add_to_cart',35);

function change_add_to_cart ($arr) {
	
	 $html = '<div class="cart box_1 widget_shopping_cart_content"><a href="/cart"><h3 class=""><p class="total">'.WC()->cart->get_cart_subtotal().'</p></h3></a><p><a href="'.WC()->cart->get_cart_url().'?empty-cart">'.'Empty Cart'.'</a></p><div class="clearfix"> </div></div>';
		
		return ['div.widget_shopping_cart_content'=> $html];
}
add_action( 'init', 'woocommerce_clear_cart_url' );

function woocommerce_clear_cart_url() {
	global $woocommerce;
	
	if(isset($_GET['empty-cart'])) {
		$woocommerce->cart->empty_cart();
	}
}


