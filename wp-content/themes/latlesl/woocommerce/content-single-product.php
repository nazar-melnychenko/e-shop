
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>				
				<?php do_action( 'woocommerce_before_single_product' ); ?>
				

				<div class="col-md-5 zoom-grid">
				
				<?php do_action('woocommerce_before_single_product_summary');?>

				</div>
				
				
				<div class="col-md-7 dress-info">
				
				
				<?php do_action('woocommerce_single_product_summary');?>
								
					
					
					<!--<div class="span span4">
						<p class="left">SIZE</p>
						<p class="right"><span class="selection-box"><select class="domains valid" name="domains">
										   <option>M</option>
										   <option>L</option>
										   <option>XL</option>
										   <option>FS</option>
										   <option>S</option>
									   </select></span></p>
						<div class="clearfix"></div>
					</div>-->
					
					
					
					
					
				
				<?php 
				 wp_enqueue_script('flexslider',get_template_directory_uri().'/js/jquery.flexslider.js');
				 wp_enqueue_script('imagezoom',get_template_directory_uri().'/js/imagezoom.js');
				
				?>
					<script>
						// Can also be used with $(document).ready()
						jQuery(window).load(function() {
						  jQuery('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
					</script>
				</div>
				<div class="clearfix"></div>
	<div class="reviews-tabs">
	
	
	<?php do_action('woocommerce_after_single_product_summary');?>
	
      <!-- Main component for a primary marketing message or call to action -->
      

       
      
      
      <script type="text/javascript">
      jQuery( '#myTab a' ).click( function ( e ) {
        e.preventDefault();
        jQuery( this ).tab( 'show' );
      } );

      jQuery( '#moreTabs a' ).click( function ( e ) {
        e.preventDefault();
        jQuery( this ).tab( 'show' );
      } );

      ( function( $ ) {
          // Test for making sure event are maintained
          jQuery( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

    </script>
      		
	</div>