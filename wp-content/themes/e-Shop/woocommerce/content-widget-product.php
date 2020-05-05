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
<div class="col-xs-12">
	<div class="single-hot-deals">
		<div class="hot-deals-photo">
			<a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/img/hot-deals/2.jpg" alt="Product"></a>
		</div>
		<div class="count-down">
			<div class="timer">
				<div data-countdown="2017/06/30"></div>
			</div>
		</div>
		<div class="hot-deals-text">
			<h5><a href="#" class="name-group">Trid Palm</a></h5>
			<span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
								class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></span>
			<div class="price-box">
				<span class="price gfont-2">$85.00</span>
				<span class="old-price gfont-2">$120.00</span>
			</div>
		</div>
	</div>
</div>

