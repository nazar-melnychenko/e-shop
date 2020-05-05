<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();


if ( $attachment_ids ) {
	
	foreach ( $attachment_ids as $attachment_id ) {
		
		$props       = wc_get_product_attachment_props( $attachment_id, $post );
		
		if ( ! $props['url'] ) {
				continue;
		}
		
		$props['data-imagezoom'] = true;
		
			echo apply_filters(
				'woocommerce_single_product_image_thumbnail_html',
				sprintf(
					'<li data-thumb="%s"><div class="thumb-image">%s</div></li>',
					wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' )[0],
					wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_full' ), 0, $props )
				),
				$attachment_id,
				$post->ID
			);
		
		
	}
?>



<?php } ?>