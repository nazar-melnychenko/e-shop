<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $woocommerce_loop;

if ( ! $upsells = $product->get_upsells() ) {
	return;
}

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => 3,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->id ),
	'meta_query'          => WC()->query->get_meta_query()
);

$products                    = new WP_Query( $args );

if ( $products->have_posts() ) : ?>

   <div class="other-products products-grid">
		<div class="container">
	<header>
			<h3 class="like text-center"><?php _e( 'You may also like&hellip;', 'woocommerce' ) ?></h3>
		</header>


		

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

					<div class="clearfix"></div>
				   </div>
				</div>

<?php endif;

wp_reset_postdata();
