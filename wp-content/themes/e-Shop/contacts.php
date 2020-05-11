<?php
/* Template Name: Contacts */
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
			<?php dynamic_sidebar( 'bestseller' ); ?>
			</div>
			<div class="col-md-9">
				<!-- Start Map area -->
				<div class="map-area">
					<div id="googleMap" style="width:100%;height:350px;"></div>
				</div>
				<!-- End Map area -->
				<!-- Start Contact-Message -->
			<?php the_post(); ?>
				<div class="contact-message">
			    <?php the_content(); ?>
				</div>
				<!-- End Contact-Message -->
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
