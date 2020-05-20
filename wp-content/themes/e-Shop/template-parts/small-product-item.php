<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;
?>

<div class="single-product">
	<div class="product-img">
		<a href="<?php the_permalink(); ?>">
		 <?php the_post_thumbnail( 'thumbnail', 'Product' ); ?>
		</a>
	</div>
	<div class="product-description">
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<div class="price-box">
		 <?php echo $product->get_price_html(); ?>
		</div>
		<span class="rating">
			<?php stars_rating(); ?>
		</span>
		<div class="product-action">
			<div class="product-button-2">
				<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
				<?php echo do_shortcode('[yith_compare_button]');?>
				<?php echo do_shortcode('[yith_quick_view]');?>
			</div>
		</div>
	</div>
</div>
