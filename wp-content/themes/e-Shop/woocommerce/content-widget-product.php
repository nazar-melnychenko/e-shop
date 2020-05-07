<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}
?>

<div class="single-hot-deals">
	<div class="hot-deals-photo">
		<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
		<?php echo $product->get_image('thumbnail');?>
		</a>
	</div>
	<div class="count-down">
		<div class="timer">
			<div data-countdown="<?php echo date("Y/m/d",time() + 24 * 60 * 60);?>"></div>
		</div>
	</div>
	<div class="hot-deals-text">
		<h5><a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="name-group">
					<?php echo wp_kses_post( $product->get_name() ); ?>
			</a></h5>
		<span class="rating">
			<?php stars_rating(); ?>
		</span>
		<div class="price-box">
			<?php echo $product->get_price_html();?>
		</div>
	</div>
</div>
