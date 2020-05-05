<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>


<?php do_action( 'woocommerce_product_meta_start' ); ?>

					<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

					<div class="span span1">
						<p class="left"><?php _e( 'SKU:', 'woocommerce' ); ?></p>
						<p class="right"><?php echo $product->get_sku();?></p>
						<div class="clearfix"></div>
					</div>
					
					<?php endif; ?>
					<div class="span span2">
					<?php echo $product->get_categories( ', ', '<p class="left">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . '</p><p class="right">', '</p>' ); ?>
						<div class="clearfix"></div>
					</div>
					<div class="span span3">
					<?php echo $product->get_tags( ', ', '<p class="left">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . '</p><p class="right">', '</p>' ); ?>
						<div class="clearfix"></div>
					</div>

<?php do_action( 'woocommerce_product_meta_end' ); ?>
