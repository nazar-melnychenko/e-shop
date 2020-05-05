<?php
global $product;
$css_class_for_related_products_wrapper = apply_filters( 'yith_woocompare_css_class_for_related_products_wrapper','related-products' );
?>
<div id="yith-woocompare-related" class="woocommerce yith-woocompare-related" data-iframe="<?php echo $iframe ?>">
	<h3 class="yith-woocompare-related-title"><?php echo $related_title ?></h3>
	<div class="yith-woocompare-related-wrapper">
			<?php foreach( $products as $product_id ) : $product = wc_get_product( $product_id ); ?>
				<div class="product carosel-navigation">
					<div class="row">
						<div class="active-product-carosel">
							<!-- Start Single-Product -->
					<?php woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', [ 'posts_per_page' => 7 ] ) ); ?>
							<!-- End Single-Product -->
						</div>
					</div>
				</div>
			<?php endforeach; ?>

	</div>
</div>