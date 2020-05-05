<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;

if ( ! $product->is_purchasable() ) {
	return;
}
?>

<?php if ( $product->is_in_stock() ) : ?>
	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<div class="span span4">

<form class="cart" method="post" enctype='multipart/form-data'>
	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

<?php
	// Availability
	$availability      = $product->get_availability();
	$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';

	?>


					<div class="left"><?php echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
?></div>
						<div class="right">
						<?php
						 		if ( ! $product->is_sold_individually() ) {
						 			woocommerce_quantity_input( array(
						 				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
						 				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
						 				'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
						 			) );
						 		}
						 	?>
	 		
	 					</div>
						<div class="clearfix"></div>


	 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

</div>


<div class="purchase">
	<a id="purchaseNow" href="#">Purchase Now</a>
	
	<script>
		
	jQuery('#purchaseNow').on('click',function(e) {
		e.preventDefault();
		jQuery('form.cart').submit();
	});
		
	</script>
	<div class="social-icons">
	<ul>
								<li><a class="facebook1" href="#"></a></li>
								<li><a class="twitter1" href="#"></a></li>
								<li><a class="googleplus1" href="#"></a></li>
							</ul>
						</div>
						<div class="clearfix"></div>
</div>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
<?php endif;?>