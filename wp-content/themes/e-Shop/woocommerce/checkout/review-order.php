<?php
defined( 'ABSPATH' ) || exit;
?>


<table class="shop_table woocommerce-checkout-review-order-table table table-bordered table-hover">
	<thead>
		<tr>
			<td class="text-left">Товар</td>
			<td class="text-left">Опис</td>
			<td class="text-left">Кількість</td>
			<td class="text-left">Ціна за одиницю</td>
			<td class="text-left">Загальна ціна</td>
		</tr>
	</thead>
	<tbody>
  <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

  $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
  if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) { ?>
	<tr>
		<td class="text-left">
			<a href="<?php echo get_permalink($cart_item['product_id']); ?>"><?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';?></a>
		</td>
		<td class="text-left">
		 <?php echo $cart_item['data']->is_type( 'variation' ) && is_array( $cart_item['variation'] )? get_formatted_cart_item_data( $cart_item ): '-'; ?>
		</td>
		<td class="text-left">
		 <?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong>' . sprintf( $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
		</td>
		<td class="text-left">
		 <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_price( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );?>
		</td>
		<td class="text-left">
			 <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );?>
		</td>
	</tr>
  <?php } } ?>
	</tbody>
	<tfoot>
	<tr>
		<td class="text-right" colspan="4">
			<strong><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></strong>
		</td>
		<td class="text-right"><?php wc_cart_totals_subtotal_html(); ?></td>
	</tr>
  <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
	<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
		<td class="text-right" colspan="4">
			<strong><?php wc_cart_totals_coupon_label( $coupon ); ?></strong>
		</td>
		<td class="text-right"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
	</tr>
  <?php endforeach; ?>
  <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
		<tr class="fee">
			<td colspan="4"><?php echo esc_html( $fee->name ); ?></td>
			<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
		</tr>
  <?php endforeach; ?>
  <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
	  <?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
		  <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) :?>
				<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					<td colspan="4"><?php echo esc_html( $tax->label ); ?></td>
					<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
				</tr>
		  <?php endforeach; ?>
	  <?php else : ?>
			<tr class="tax-total">
				<td colspan="4"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></td>
				<td><?php wc_cart_totals_taxes_total_html(); ?></td>
			</tr>
	  <?php endif; ?>
  <?php endif; ?>
	<tr>
		<td class="text-right" colspan="4">
			<strong><?php esc_html_e( 'Total', 'woocommerce' ); ?></strong>
		</td>
		<td class="text-right"><?php wc_cart_totals_order_total_html(); ?></td>
	</tr>
	</tfoot>
</table>

