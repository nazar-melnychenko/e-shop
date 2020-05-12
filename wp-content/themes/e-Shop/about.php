<?php
/* Template Name: About */
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
	</div>
  <?php
  if ( have_posts() ){
	  while ( have_posts() ){
		  the_post();
		  the_content();
	  }
  }
  ?>
</section>

<?php get_footer(); ?>
