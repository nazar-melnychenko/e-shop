<?php
/* Template Name: New Products */
defined( 'ABSPATH' ) || exit;
get_header();
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
					<?php dynamic_sidebar('bestseller');?>
			</div>
			<div class="col-md-9 col-xs-12">
				<!-- START PRODUCT-BANNER -->
				<div class="product-banner">
					<div class="row">
						<div class="col-xs-12">
							<div class="banner">
								<a href="<?php the_field( 'main_banner_url', 'options' ); ?>">
									<img src="<?php the_field( 'main_banner_img', 'options' ); ?>" alt="Product Banner">
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- END PRODUCT-BANNER -->
				<!-- START PRODUCT-AREA -->

				<div class="product-area">
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<!-- Start Product -->
							<div class="product">
								<div class="tab-content">
									<!-- Start Product-->
									<div role="tabpanel" class="tab-pane fade in  active" id="display-1-2">
										<div class="row">
											<!-- Start Single-Product -->
							  <?php
							  $args = array(
								  'post_type'      => 'product',
								  'order'        => 'DESC',
								  'posts_per_page' => 20
							  );
							  $loop = new WP_Query( $args );
							  while ( $loop->have_posts() ) : $loop->the_post(); ?>
												 <div class="col-md-3 col-sm-4 col-xs-12">
									 <?php get_template_part( 'template-parts/product-item' ); ?>
												 </div>
							  <?php endwhile; ?>
							  <?php wp_reset_query(); ?>
											<!-- End Single-Product -->
										</div>
									</div>
									<!-- End Product = TV -->
								</div>
							</div>
							<!-- End Product -->
						</div>
					</div>
				</div>

				<!-- END PRODUCT-AREA -->
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
