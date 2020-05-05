<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
WC()->payment_gateways()->set_current_gateway( $available_gateways );
$order_button_text = 'Підтвердити замовлення';
// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );

	return;
}
do_action( 'woocommerce_before_checkout_form', $checkout );
?>

<!-- Start checkout-area -->
<form name="checkout" method="post" class="checkout woocommerce-checkout"
      action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
	<div class="checkout-area">
		<div class="row">
			<div class="col-md-12">
				<div class="cart-title">
					<h2 class="entry-title">Оформлення заказу</h2>
				</div>
				<!-- Accordion start -->
				<div class="panel-group" id="accordion">
					<!-- Start 2 Payment-Address -->
			  <?php if ( $checkout->get_checkout_fields() ) : ?>
						 <div class="panel panel_default">
							 <div class="panel-heading">
								 <h4 class="panel-title">
									 <a class="accordion-trigger  collapsed" data-toggle="collapse" data-parent="#accordion"
									    href="#payment-address">Дані
										 доставки <?php echo ! is_user_logged_in() && $checkout->is_registration_enabled() ? 'та реєстрація користувача' : ''; ?>
										 <i class="fa fa-caret-down"></i> </a>
								 </h4>
							 </div>
							 <div id="payment-address" class="collapse">
								 <div class="panel-body">
									 <div class="row">
										 <div class="col-md-6 col-xs-12">
								<?php do_action( 'woocommerce_checkout_billing' ); ?>
										 </div>
										 <div class="col-md-6 col-xs-12">
								<?php do_action( 'woocommerce_checkout_shipping' ); ?>
										 </div>
									 </div>
								 </div>
							 </div>
						 </div>
			  <?php endif; ?>
					<!-- End Payment-Address -->
					<!-- Start 4 shipping-Method -->
			  <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
						 <div class="panel panel_default">
							 <div class="panel-heading">
								 <h4 class="panel-title">
									 <a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion"
									    href="#shipping-method">Варіанти доставки <i class="fa fa-caret-down"></i> </a>
								 </h4>
							 </div>
							 <div id="shipping-method" class="collapse">
								 <div class="panel-body">
									 <p>Виберіть спосіб доставки, який буде використано для цього замовлення.</p>
									 <div class="radio">
							 <?php wc_cart_totals_shipping_html(); ?>
									 </div>
								 </div>
							 </div>
						 </div>
			  <?php endif; ?>
					<!-- End shipping-Method -->
					<!-- Start 5 Payment-Method -->
			  <?php if ( WC()->cart->needs_payment() ) : ?>
						 <div class="panel panel_default">
							 <div class="panel-heading">
								 <h4 class="panel-title">
									 <a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion"
									    href="#payment-method">Способи оплати <i class="fa fa-caret-down"></i> </a>
								 </h4>
							 </div>
							 <div id="payment-method" class="collapse">
								 <div class="panel-body">
									 <p>Виберіть спосіб оплати, який буде використовувати для цього замовлення.</p>
									 <div class="radio">
										 <ul class="wc_payment_methods payment_methods methods">
								<?php
								if ( ! empty( $available_gateways ) ) {
									foreach ( $available_gateways as $gateway ) {
										wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
									}
								} else {
									echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
								}
								?>
										 </ul>
									 </div>
								 </div>
							 </div>
						 </div>
			  <?php endif; ?>
					<!-- End Payment-Method -->
				</div>
				<!-- Accordion end -->
				<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
				<div class="panel-body">
					<div class="table-responsive">
					<?php woocommerce_order_review(); ?>123456789
					</div>
					<div class="buttons pull-right">
						<noscript class="noscript">
					<?php
					/* translators: $1 and $2 opening and closing emphasis tags respectively */
					printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ), '<em>', '</em>' );
					?>
							<br/><br/>
							<button type="submit" class="alt btn btn-primary" name="woocommerce_checkout_update_totals"
							        value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
							<br/><br/>
						</noscript>
				 <?php wc_get_template( 'checkout/terms.php' ); ?>
				 <?php do_action( 'woocommerce_review_order_before_submit' ); ?>
				 <?php echo apply_filters( 'woocommerce_order_button_html', '<br/><div class="order_btn"><button type="submit" class="alt btn btn-primary" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button></div>' ); ?>
				 <?php do_action( 'woocommerce_review_order_after_submit' ); ?>
				 <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Shopping-Cart -->
</form>

