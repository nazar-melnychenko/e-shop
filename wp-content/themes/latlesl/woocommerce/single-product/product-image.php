<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;

?>
<div class="flexslider">
						<ul class="slides">
<?php						
if(has_post_thumbnail()) {
	
	$props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
	$image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'class'	 => 'img-responsive',
				'alt'    => $props['alt'],
				'data-imagezoom' => "true"
			) );
	
	echo apply_filters('woocommerce_single_product_image_html',
			
			sprintf(
			'<li data-thumb="%s"><div class="thumb-image"> %s </div></li>',
			esc_url($props['url']),
				$image
			),
			$post->ID
	
	);		
			
		
		do_action('woocommerce_product_thumbnails');
	
}

?>

						</ul>
					</div>