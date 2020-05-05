<?php global $product; ?>
<div class="single-product">
<div class="label_new">
	<?php woocommerce_show_product_sale_flash();?>
</div>
<div class="product-img">
	<a href="<?php the_permalink(); ?>">
	  <?php the_post_thumbnail( 'thumbnail', 'Product' ); ?>
	</a>
</div>
<div class="product-description">
	<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
	<div class="price-box">
	  <?php echo $product->get_price_html(); ?>
	</div>
	<div class="rating">
	  <?php stars_rating(); ?>
	</div>
</div>
<div class="product-action">
	<div class="button-group">
		<div class="product-button">
			<?php woocommerce_external_add_to_cart(); ?>
		</div>

		<div class="product-button-2">
		 <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
		 <?php echo do_shortcode('[yith_compare_button]');?>
		 <?php echo do_shortcode('[yith_quick_view]');?>
<!--			<a href="#" class="modal-view" data-toggle="modal" data-target="#productModal"><i-->
<!--								class="fa fa-search-plus"></i></a>-->
		</div>

	</div>
</div>
</div>