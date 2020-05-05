<?php
/* Template Name: Compare */
defined( 'ABSPATH' ) || exit;
get_header();
?>

<section class="page-content compare">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="page-menu">
			  <?php do_action( 'woocommerce_before_main_content' ); ?>
				</ul>
			</div>
		</div>
	 <?php echo do_shortcode('[yith_woocompare_table]');?>
	</div>
</section>
<?php get_footer(); ?>
