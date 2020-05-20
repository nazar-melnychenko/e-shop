<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
while ( have_posts() ) :
	the_post();
	?>
	<div class="product">
		<?php if ( ! post_password_required() ) { ?>

			<div id="product-<?php the_ID(); ?> productModal" <?php post_class( 'product' ); ?>>
				<input type="hidden" id="yith_wcqv_product_id" value="<?php the_ID(); ?>"/>
				<?php do_action( 'yith_wcqv_product_image' ); ?>
				<?php do_action( 'yith_wcqv_before_product_summary' ); ?>
				<div class="summary entry-summary modal-dialog modal-product">
					<div class="summary-content">
						<div class="product-info">
							<h1><?php woocommerce_template_single_title(); ?></h1>
							<div class="price-box-3">
								<hr/>
								<div class="s-price-box"><?php woocommerce_template_single_price(); ?></div>
								<hr/>
							</div>
							<a href="<?php the_permalink(); ?>" class="see-all">Переглянути всі характеристики</a>
							<div class="quick-add-to-cart">
								<div class="cart"><?php woocommerce_template_single_add_to_cart(); ?></div>
							</div>
							<div class="quick-desc"><?php woocommerce_template_single_excerpt(); ?></div>
							<div class="social-sharing">
								<div class="widget widget_socialsharing_widget">
									<h3 class="widget-title-modal">Поділитися цим продуктом</h3>
									<?php wc_get_template( 'yith-quick-view-share.php'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php do_action( 'yith_wcqv_after_product_summary' ); ?>

			</div>

			<?php

		} else {
			echo get_the_password_form(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		?>
	</div>
<?php
endwhile; // end of the loop.
