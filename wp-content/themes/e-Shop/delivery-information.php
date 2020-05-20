<?php
/* Template Name: Delivery Information */

defined( 'ABSPATH' ) || exit;
get_header();
?>

	<section class="page-content delivery">
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
				</div>
				<div class="col-md-9 col-xs-12 delivery-main">
					<!-- START PRODUCT-BANNER -->
					<div class="product-banner">
						<div class="row">
							<div class="col-xs-12">
								<div class="banner">
									<a href="<?php the_field('main_banner_url', 'options');?>">
										<img src="<?php the_field('main_banner_img', 'options');?>" alt="Product Banner">
									</a>
								</div>
							</div>
						</div>
					</div>
					<br />
					<!-- END PRODUCT-BANNER -->
			  <?php
				  if ( have_posts() ){
					  while ( have_posts() ){
						  the_post();
						  the_content();
					  }
				  }
			  ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>