<?php
defined( 'ABSPATH' ) || exit;
?>

<section class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="page-menu">
			  <?php do_action( 'woocommerce_before_main_content' ); ?>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<!-- CATEGORY-MENU-LIST START -->
			<?php get_template_part( 'template-parts/category' ); ?>
				<!-- END CATEGORY-MENU-LIST -->
				<!-- START SMALL-PRODUCT-AREA -->
			<?php dynamic_sidebar( 'bestseller' ); ?>
				<!-- END SMALL-PRODUCT-AREA -->
			</div>
			<div class="col-md-9">
				<!-- START PRODUCT-BANNER -->
				<div class="product-banner">
					<div class="row">
						<div class="col-xs-12">
							<div class="banner">
								<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/12.jpg"
								                 alt="Product Banner"></a>
							</div>
						</div>
					</div>
				</div>
				<!-- END PRODUCT-BANNER -->
				<!-- Start Shopping-Cart -->
				<div class="shopping-cart">
					<div class="row">
						<div class="col-md-12">
							<div class="cart-title">
								<h2 class="entry-title">Кошик</h2>
							</div>
							<?php do_action( 'woocommerce_cart_is_empty' );

							  if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
											<p class="return-to-shop">
												<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
										<?php esc_html_e( 'Return to shop', 'woocommerce' ); ?>
												</a>
											</p>
							  <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
