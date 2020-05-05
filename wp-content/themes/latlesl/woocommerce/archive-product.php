<?php get_header(); ?>
	<?php get_navigation();?>
	
<?php get_template_part('home','banner');?>

		<!-- content-section-starts-here -->
		<?php do_action('woocommerce_before_main_content'); ?>
		
		
				<div class="online-strip">
					<?php if (function_exists('dynamic_sidebar') ): ?>
					<div class="col-md-4 follow-us">
						<?php dynamic_sidebar('folow_us');?>
					</div>
					<?php endif; ?>
					<?php if (function_exists('dynamic_sidebar') ): ?>
					<div class="col-md-4 shipping-grid">
						<?php dynamic_sidebar('shipping');?>
					</div>
					<?php endif; ?>
					<div class="col-md-4 online-order">
						<p>Order online</p>
						<h3>Tel:<?php echo get_option('my_phone')?></h3>
					</div>
					<div class="clearfix"></div>
				</div>
				
				<?php do_action('woocommerce_archive_description');?>
				
				<?php 

				$args = array(
							'post_type' => 'product',
							'posts_per_page' => 9,
							///'meta_key' => '_featured',
							///'meta_value' => 'yes'
							);
							
				global $wp_query;
				
				$wp_query = new WP_Query($args);
				
								
				if($wp_query->have_posts()) :
				?>

			<?php woocommerce_product_loop_start(); ?>
					
					
					<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>

						<?php wc_get_template_part('content','product');?>
						
					<?php endwhile; ?>
					
					<div class="clearfix"></div>
				<?php woocommerce_product_loop_end();?>	
					<?php endif;?>
				
				
<?php do_action('woocommerce_after_main_content');
echo 'fdsfdsfdsfdgdg';?>

		<?php get_sidebar('content-bottom')?>
		<!-- content-section-ends-here -->
	<?php get_footer();?>	