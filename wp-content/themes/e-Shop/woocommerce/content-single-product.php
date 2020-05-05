<?php
defined( 'ABSPATH' ) || exit;

global $product;

if ( post_password_required() ) {
	echo get_the_password_form();

	return;
}; ?>
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
				<!-- START SIDEBAR-BANNER -->
				<div class="sidebar-banner hidden-sm hidden-xs">
					<div class="active-sidebar-banner">
						<div class="single-sidebar-banner">
							<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/1.jpg"
							                 alt="Product Banner"></a>
						</div>
						<div class="single-sidebar-banner">
							<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/2.jpg"
							                 alt="Product Banner"></a>
						</div>
					</div>
				</div>
				<!-- END SIDEBAR-BANNER -->
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<!-- Start Toch-Prond-Area -->
				<div class="toch-prond-area">
					<div class="row">
						<div class="col-md-5 col-sm-5 col-xs-12">
							<div class="clear"></div>
					<?php woocommerce_show_product_images(); ?>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<h2 class="title-product"><?php the_title(); ?></h2>
							<div class="about-toch-prond">
					  <?php stars_rating(); ?><br/>
								<p>Кількість відгуків: <?php echo $product->get_review_count(); ?></p>
								<hr/>
								<p class="short-description"><?php the_excerpt(); ?></p>
								<br/>
					  <?php woocommerce_show_product_sale_flash(); ?>
								<hr/>
					  <?php if ( $product->get_type( 'simple' ) === 'simple' || count( $product->get_available_variations() ) == 1 ) : ?>
									 <span class="current-price"><?php echo $product->get_price_html(); ?></span>
					  <?php endif; ?>
							</div>

							<div class="product-quantity">
					  <?php woocommerce_template_single_add_to_cart(); ?>
					  <?php if ( $product->get_type( 'simple' ) === 'simple' ) : ?>
							 <div class="product-button-2">
								  <?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?>
					        <?php echo do_shortcode('[yith_compare_button]');?>
							 </div>
					  <?php endif; ?>
							</div>
							<br/>
					<?php do_action( 'woocommerce_before_single_product' ); ?>
							<br/>
					<?php woocommerce_template_single_meta(); ?>
						</div>

					</div>
					<!-- Start Toch-Box -->
					<div class="toch-box">
						<div class="row">
							<div class="col-xs-12">
								<!-- Start Toch-Menu -->
								<div class="toch-menu">
									<ul role="tablist">
										<li role="presentation" class=" active"><a href="#description" role="tab" data-toggle="tab">Опис</a>
										</li>
										<li role="presentation"><a href="#reviews" role="tab" data-toggle="tab">Відгуки
												( <?php echo $product->get_review_count(); ?> )</a></li>
									</ul>
								</div>
								<!-- End Toch-Menu -->
								<div class="tab-content toch-description-review">
									<!-- Start display-description -->
									<div role="tabpanel" class="tab-pane fade in active" id="description">
										<div class="toch-description">
							  <?php the_content(); ?>
										</div>
									</div>
									<!-- End display-description -->
									<!-- Start display-reviews -->
									<div role="tabpanel" class="tab-pane fade" id="reviews">
							<?php get_template_part( 'template-parts/review' ); ?>
									</div>
									<!-- End Product = display-reviews -->
								</div>
							</div>
						</div>
					</div>
					<!-- End Toch-Box -->
					<!-- START PRODUCT-AREA -->
					<div class="product-area">
						<div class="row">
							<div class="col-xs-12 col-md-12">
								<!-- Start Product-Menu -->
								<div class="product-menu">
									<div class="product-title">
										<h3 class="title-group-2 gfont-1">Схожі товари</h3>
									</div>
								</div>
							</div>
						</div>
						<!-- End Product-Menu -->
						<div class="clear"></div>
						<!-- Start Product -->
						<div class="product carosel-navigation">
							<div class="row">
								<div class="active-product-carosel">
									<!-- Start Single-Product -->
						 <?php woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', [ 'posts_per_page' => 7 ] ) ); ?>
									<!-- End Single-Product -->
								</div>
							</div>
						</div>
						<!-- End Product -->
					</div>
					<!-- END PRODUCT-AREA -->
				</div>
				<!-- End Toch-Prond-Area -->
			</div>
		</div>
	</div>
</section>
