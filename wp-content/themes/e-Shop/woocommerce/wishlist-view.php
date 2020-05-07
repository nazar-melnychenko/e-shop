<?php
if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
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
			</div>
			<div class="col-md-9">
				<!-- START PRODUCT-BANNER -->
				<div class="product-banner">
					<div class="row">
						<div class="col-xs-12">
							<div class="banner">
								<a href="<?php the_field('main_banner_url', 'options');?>">
									<img src="<?php the_field('main_banner_img', 'options');?>" alt="Product Banner">
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- END PRODUCT-BANNER -->
				<div class="Wishlist-area">
					<?php do_action( 'yith_wcwl_wishlist_before_wishlist_content', $var ); ?>
					<div class="table-responsive">
						<table class="table table-bordered table-hover shop_table wishlist_table cart wishlist_view traditional responsive <?php echo $no_interactions ? 'no-interactions' : ''; ?> <?php echo $enable_drag_n_drop ? 'sortable' : ''; ?>"
						data-pagination="<?php echo esc_attr( $pagination ); ?>" data-per-page="<?php echo esc_attr( $per_page ); ?>"
						data-page="<?php echo esc_attr( $current_page ); ?>" data-id="<?php echo esc_attr( $wishlist_id ); ?>"
						data-token="<?php echo esc_attr( $wishlist_token ); ?>" >
				 <?php $column_count = 2; ?>
							<thead>
								<tr>
									<td class="text-center">Зображення</td>
									<td class="text-left">Назва товару</td>
									<td class="text-right">Наявність</td>
									<td class="text-right">Ціна</td>
									<td class="text-right">Дії</td>
								</tr>
							</thead>
							<tbody>
						  <?php
							  if ( $wishlist && $wishlist->has_items() ) :
							  foreach ( $wishlist_items as $item ) :
							  global $product;
							  $product      = $item->get_product();
							  $availability = $product->get_availability();
							  $stock_status = isset( $availability['class'] ) ? $availability['class'] : false;
							  if ( $product && $product->exists() ) :
						  ?>
							<tr id="yith-wcwl-row-<?php echo esc_attr( $item->get_product_id() ); ?>" data-row-id="<?php echo esc_attr( $item->get_product_id() ); ?>">
								<td class="product-thumbnail">
									<a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item->get_product_id() ) ) ); ?>">
										<?php echo $product->get_image();?>
									</a>
								</td>
								<td class="text-left">
									<a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item->get_product_id() ) ) ); ?>">
										<?php echo esc_html( apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product ) ); ?>
									</a>
								</td>

								<td class="text-right product-stock-status">
						 <?php echo 'out-of-stock' === $stock_status ? '<span class="wishlist-out-of-stock">Не в наявності</span>' : '<span class="wishlist-in-stock">В наявності</span>'; ?>
								</td>
								<td class="text-right">
									<div class="price-box">
											<?php
											 if ( $show_price ) { echo $item->get_formatted_product_price(); }
											 if ( $show_price_variations ) { echo $item->get_price_variation(); }
										 ?>
									</div>
								</td>
								<td class="text-right">
									<div class="wrapper">
							<?php $show_add_to_cart = apply_filters( 'yith_wcwl_table_product_show_add_to_cart', $show_add_to_cart, $item, $wishlist ); ?>
							<?php if ( $show_add_to_cart && isset( $stock_status ) && 'out-of-stock' !== $stock_status ) : ?>
										<?php woocommerce_template_loop_add_to_cart(); ?>
							<?php endif ?>
							<?php if ( $repeat_remove_button ) : ?>
											 <a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item->get_product_id() ) ); ?>" class="remove_from_wishlist btn btn-danger" title="Видалити"><i class="fa fa-times"></i></a>
							<?php endif; ?>
									</div>
								</td>
							</tr>
				    <?php
				    endif;
				    endforeach;
				    else :
					    ?>
								  <tr>
									  <td colspan="<?php echo esc_attr( $column_count ); ?>" class="wishlist-empty"><?php echo esc_html( apply_filters( 'yith_wcwl_no_product_to_remove_message', __( 'No products added to the wishlist', 'yith-woocommerce-wishlist' ), $wishlist ) ); ?></td>
								  </tr>
				    <?php
				    endif;
				  if ( ! empty( $page_links ) ) :
					  ?>
							  <tr class="pagination-row wishlist-pagination">
								  <td colspan="<?php echo esc_attr( $column_count ); ?>"><?php echo $page_links; ?></td>
							  </tr>
				  <?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- WISHLIST TABLE -->