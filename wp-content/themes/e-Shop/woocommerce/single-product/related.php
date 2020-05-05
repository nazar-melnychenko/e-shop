<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>
	<?php foreach ( $related_products as $product ) :
		$post_object = get_post( $product->get_id() );
		setup_postdata( $GLOBALS['post'] =& $post_object );
		?>
		<div class="col-xs-12">
		 <?php get_template_part( 'template-parts/product-item' ); ?>
		</div>
	<?php endforeach;

endif;

wp_reset_postdata();
