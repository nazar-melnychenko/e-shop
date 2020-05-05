<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;



$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', __( 'Product Description', 'woocommerce' ) ) );


?>


<div class="tab-pane active" id="description">
		<?php if ( $heading ): ?>
		  <h2><?php echo $heading; ?></h2>
		<?php endif; ?>
	<div class="tab-text"><?php the_content(); ?> </div>    
</div>