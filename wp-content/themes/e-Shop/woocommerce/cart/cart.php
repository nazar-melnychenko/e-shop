<?php
defined( 'ABSPATH' ) || exit;
?>

<section class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="page-menu">
			  <?php do_action( 'woocommerce_before_main_content' ); ?>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<!-- CATEGORY-MENU-LIST START -->
			<?php get_template_part( 'template-parts/category' ); ?>
				<!-- END CATEGORY-MENU-LIST -->
				<!-- START SMALL-PRODUCT-AREA -->
			<?php dynamic_sidebar( 'bestseller' ); ?>
				<!-- END SMALL-PRODUCT-AREA -->
			</div>
			<div class="col-md-9">
				<!-- START PRODUCT-BANNER -->
				<div class="product-banner">
					<div class="row">
						<div class="col-xs-12">
							<div class="banner">
								<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/12.jpg"
								                 alt="Product Banner"></a>
							</div>
						</div>
					</div>
				</div>
				<!-- END PRODUCT-BANNER -->
				<!-- Start Shopping-Cart -->
				<div class="shopping-cart">
					<div class="row">
						<div class="col-md-12">
							<div class="cart-title">
								<h2 class="entry-title">Кошик</h2>
							</div>
							<!-- Start Table -->
							<div class="table-responsive">
								<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
									<table class="table table-bordered shop_table shop_table_responsive cart woocommerce-cart-form__contents"
									       cellspacing="0">
										<thead>
										<tr>
											<td class="text-left">Зображення</td>
											<td class="text-left">Товар</td>
											<td class="text-center">Кількість</td>
											<td class="text-right">Ціна одиниці</td>
											<td class="text-right">Загальна ціна</td>
										</tr>
										</thead>
										<tbody>
						  <?php
						  foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
							  $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							  $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
							  if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
								  $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								  ?>
												 <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
													 <td class="text-center product-thumbnail">
										<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'thumbnail' ), $cart_item, $cart_item_key );
										if ( ! $product_permalink ) {
											echo $thumbnail; // PHPCS: XSS ok.
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
										}
										?>
													 </td>
													 <td class="text-left product-name">
										<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key ) );
										}

										echo get_formatted_cart_item_data( $cart_item );
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
										}
										?>
													 </td>
													 <td class="text-left">
														 <div class="cart-put">
														  <?php
										  if ( $_product->is_sold_individually() ) {
											  $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
										  } else {
											  $product_quantity = woocommerce_quantity_input(
												  array(
													  'input_name'   => "cart[{$cart_item_key}][qty]",
													  'input_value'  => $cart_item['quantity'],
													  'max_value'    => $_product->get_max_purchase_quantity(),
													  'min_value'    => '0',
													  'product_name' => $_product->get_name(),
												  ),
												  $_product,
												  false
											  );
										  }
										  echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
										  ?>
															 <div class="input-group-btn cart-buttons">
																 <button type="submit" class="btn btn-primary" name="update_cart"
																         value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><i
																					 class="fa fa-refresh"></i></button>
																 <span class="product-remove">
											   <?php
											   echo apply_filters( 'woocommerce_cart_item_remove_link',
												   sprintf(
													   '<a href="%s" class="btn btn-danger" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-times-circle"></i></a>',
													   esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
													   esc_html__( 'Remove this item', 'woocommerce' ),
													   esc_attr( $product_id ),
													   esc_attr( $_product->get_sku() )
												   ),
												   $cart_item_key
											   );
											   ?>
																 </span>
															 </div>
														 </div>
													 </td>
													 <td class="text-right">
										<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
										?>
													 </td>
													 <td class="text-right">
										<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
										?>
													 </td>
												 </tr>
							  <?php endif; endforeach; ?>
										</tbody>
									</table>

							<?php do_action( 'woocommerce_before_cart' ); ?>
							<!-- End Table -->
							<h3 class="title-group-3 gfont-1">Що б ви хотіли зробити далі?</h3>
							<!-- Accordion start -->
							<div class="accordion-cart">
								<div class="panel-group" id="accordion">
									<!-- Start Coupon -->
								  <?php if ( wc_coupons_enabled() ) { ?>
									<div class="panel panel_default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="accordion-trigger" data-toggle="collapse" data-parent="#accordion" href="#coupon">Використати купон <i class="fa fa-caret-down"></i> </a>
											</h4>
										</div>
										<div id="coupon" class="collapse in">
											<div class="panel-body">
												<div class="col-sm-2">
													<p>Введіть код купона</p>
												</div>
												<div class="input-group coupon">
													<input type="text" name="coupon_code" class="form-control" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
													<button type="submit" class="btn btn-primary" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
												</div>
											</div>
										</div>
									</div>
								  <?php } ?>
								</div>
					    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
							</div>
							</form>
					  <?php woocommerce_shipping_calculator(); ?>

						</div>
							<!-- Accordion end -->
							<div class="row">
								<div class="col-sm-5">
								 <?php
					        woocommerce_cross_sell_display();
								 ?>
								</div>
								<div class="col-sm-6">
								 <?php
					         woocommerce_cart_totals();
								 ?>
								</div>
							</div>
							<div class="shopping-checkout">
								<a href="<?php echo esc_url( home_url() ); ?>" class="btn btn-default pull-left">Продовжити покупки</a>
								<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-primary pull-right"><?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?></a>
							</div>
						</div>
					</div>
				</div>
<!--				 End Shopping-Cart-->
			</div>
		</div>
	</div>
</section>
