<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

get_navigation();

?>


		<!-- content-section-starts -->
	<div class="container">
	   <div class="products-page">
			
			<?php get_sidebar();?>
			
			<div class="new-product">
				
				<?php remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );?>
				<?php do_action('woocommerce_before_main_content');?>
				
				
				<div class="mens-toolbar">
                 
                 <?php do_action( 'woocommerce_before_shop_loop' ); ?>

	               		 <div class="clearfix"></div>		
			        </div>
			        
			        
	<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
			<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
			</div>
		
		
		<div class="pages">   
        	 <div class="limiter visible-desktop">
               <label>Show</label>
                  <select id="pagination-posts">
                            <option <?php if(isset($_GET['ppp']) && $_GET['ppp'] == 3) :?> selected="selected" <?php endif;?> value="3" >
                    3                </option>
                            <option <?php if(isset($_GET['ppp']) && $_GET['ppp'] == 6) :?> selected="selected" <?php endif;?> value="6">
                    6                </option>
                            <option <?php if($_GET['ppp'] == 9 || !isset($_GET['ppp'])) :?> selected="selected" <?php endif;?> value="9">
                    9                </option>
                  </select> per page        
               </div>
       	   </div>
					<div class="clearfix"></div>
					
					
					<!--content-->
					
					<?php if(have_posts()) :?>
					<ul>
					
					<?php while(have_posts()) : the_post();?>
						<?php wc_get_template_part('content','product-cat');?>
					<?php endwhile;?>
					  
						
					</ul>
					<?php else :?>
						<?php wc_get_template('loop/no-products-found.php')?>
					<?php endif;?>
					
				</div>
				
				<?php 
				 wp_enqueue_script('cbpViewModeSwitch',get_template_directory_uri().'/js/cbpViewModeSwitch.js');
				 wp_enqueue_script('classie',get_template_directory_uri().'/js/classie.js');
				
				?>
	
      
			</div>
			<?php do_action( 'woocommerce_after_shop_loop' ); ?>
			<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
   </div>
   <!-- content-section-ends -->


<?php 

get_sidebar('content-bottom');

get_footer();

?>


