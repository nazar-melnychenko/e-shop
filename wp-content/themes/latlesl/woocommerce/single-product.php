<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

get_navigation();

?>


<!-- content-section-starts -->
	<div class="container">
	
	
	
	<?php do_action( 'woocommerce_before_main_content' ); ?>
	   <div class="products-page">
	   
			<?php get_sidebar();?>
			
			
			<div class="new-product">
			
			<?php while(have_posts()) : the_post();?>
				<?php  wc_get_template_part('content','single-product');?>
			<?php endwhile; ?>
			

			</div>
			<div class="clearfix"></div>
			</div>
   </div>
   
   <?php 
   	do_action('woocommerce_after_main_content');
   ?>
   
   <!-- content-section-ends -->
   
   
   <?php 
   get_footer();

?>
