<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if(empty($product) || !$product->is_visible()) {
	return;
}
?>

<li>
							<?php do_action('woocommerce_before_shop_loop_item');?>
							
							<?php do_action('woocommerce_before_shop_loop_item_title')?>
										
									<?php 
									
									do_action('woocommerce_shop_loop_item_title');
									
									do_action('woocommerce_after_shop_loop_item_title');
									
									?>

		                    
		                    <?php do_action('woocommerce_after_shop_loop_item');?>

						</li>