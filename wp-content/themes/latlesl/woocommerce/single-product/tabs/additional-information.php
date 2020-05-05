<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional Information', 'woocommerce' ) );

?>

 <div class="tab-pane" id="additional_information">
 
 <?php if ( $heading ): ?>
	<h2><?php echo $heading; ?></h2>
<?php endif; ?>

      <div class="tab-text"><?php $product->list_attributes();?></div>
</div>