<?php
/**
 * Shipping Calculator
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/shipping-calculator.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_shipping_calculator' ); ?>

<form class="woocommerce-shipping-calculator" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<div class="accordion-cart">
		<div class="panel-group" id="accordion">
			<div class="panel panel_default">
	<div class="panel-heading">
		<h4 class="panel-title">
			<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion"
			   href="#shipping">Адреса доставки <i class="fa fa-caret-down"></i> </a>
		</h4>
	</div>
	<div id="shipping" class="collapse">
		<div class="panel-body">

			<div class="col-sm-12">
				<p>Введіть або змініть адресу доставки для отримання її вартості.</p>
				<br/>
			</div>
			<div class="form-horizontal">
			<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_country', true ) ) : ?>
					 <div class="form-group">
						 <label class="col-sm-2 control-label">Країна<sup>*</sup></label>
						 <div class="col-sm-10">
							 <select name="calc_shipping_country" id="calc_shipping_country"
							         class="country_to_state country_select form-control" rel="calc_shipping_state">
								 <option value=""><?php esc_html_e( 'Select a country / region&hellip;', 'woocommerce' ); ?></option>
						<?php
						foreach ( WC()->countries->get_shipping_countries() as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '"' . selected( WC()->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
						}
						?>
							 </select>

						 </div>
					 </div>
			<?php endif; ?>
			<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_state', true ) ) : ?>
					 <div class="form-group">
						 <label class="col-sm-2 control-label"><?php esc_attr_e( 'State / County', 'woocommerce' ); ?></label>
						 <div class="col-sm-10">
							 <p class="form-row form-row-wide" id="calc_shipping_state_field">
						<?php
						$current_cc = WC()->customer->get_shipping_country();
						$current_r  = WC()->customer->get_shipping_state();
						$states     = WC()->countries->get_states( $current_cc );
						if ( is_array( $states ) && empty( $states ) ) { ?>
										<input type="hidden" name="calc_shipping_state" id="calc_shipping_state"/>
							<?php
						} elseif ( is_array( $states ) ) {
							?><span>
										<select name="calc_shipping_state" class="state_select form-control" id="calc_shipping_state"
										        data-placeholder="<?php esc_attr_e( 'State / County', 'woocommerce' ); ?>">
							<option value=""><?php esc_html_e( 'Select an option&hellip;', 'woocommerce' ); ?></option>
							<?php
				  foreach ( $states as $ckey => $cvalue ) {
					  echo '<option value="' . esc_attr( $ckey ) . '" ' . selected( $current_r, $ckey, false ) . '>' . esc_html( $cvalue ) . '</option>';
				  }
				  ?>
						</select>
										</span>
							<?php
						} else {
							?>
							<input type="text" class="input-text form-control" value="<?php echo esc_attr( $current_r ); ?>"
										       name="calc_shipping_state" id="calc_shipping_state"/>
							<?php
						}
						?>
							 </p>

						 </div>
					 </div>
			<?php endif; ?>
			<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_city', true ) ) : ?>
					 <div class="form-group">
						 <label class="col-sm-2 control-label"><?php esc_attr_e( 'City', 'woocommerce' ); ?></label>
						 <div class="col-sm-10">

							 <p class="form-row form-row-wide" id="calc_shipping_city_field">
								 <input type="text" class="input-text form-control"
								        value="<?php echo esc_attr( WC()->customer->get_shipping_city() ); ?>" name="calc_shipping_city"
								        id="calc_shipping_city"/>
							 </p>

						 </div>
					 </div>
			<?php endif; ?>
			<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ) : ?>
					 <div class="form-group">
						 <span class="form-row form-row-wide" id="calc_shipping_postcode_field">
						 <label class="col-sm-2 control-label"><?php esc_attr_e( 'Postcode / ZIP', 'woocommerce' ); ?></label>
						 <div class="col-sm-10">

								 <input type="text" class="input-text form-control"
								        value="<?php echo esc_attr( WC()->customer->get_shipping_postcode() ); ?>"
								        name="calc_shipping_postcode" id="calc_shipping_postcode"/>

						 </div>
							  </span>
					 </div>
			<?php endif; ?>
			</div>

			<p>
				<button type="submit" name="calc_shipping" value="1"
				        class="button"><?php esc_html_e( 'Update', 'woocommerce' ); ?></button>
			</p>
		 <?php wp_nonce_field( 'woocommerce-shipping-calculator', 'woocommerce-shipping-calculator-nonce' ); ?>
		</div>
	</div>
</div>
		</div>
	</div>
	<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
</form>


<?php do_action( 'woocommerce_after_shipping_calculator' ); ?>
