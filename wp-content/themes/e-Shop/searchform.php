<div class="search-by-category">
	<form method="get" action="/">
		<div class="search-container">
		 <?php if ( class_exists( 'WooCommerce' ) ) :
			 if ( isset( $_REQUEST['product_cat'] ) && ! empty( $_REQUEST['product_cat'] ) ) {
				 $optsetlect = $_REQUEST['product_cat'];
			 } else {
				 $optsetlect = 0;
			 }
			 $args             = array(
				 'show_option_all' => esc_html__( 'Всі категорії', 'woocommerce' ),
				 'hierarchical'    => 1,
				 'echo'            => 1,
				 'value_field'     => 'slug',
				 'selected'        => $optsetlect
			 );
			 $args['taxonomy'] = 'product_cat';
			 $args['name']     = 'product_cat';
			 wp_dropdown_categories( $args );
			 ?>
				 <input type="hidden" value="product" name="post_type">
		 <?php endif; ?>
		</div>
		<div class="header-search">
			<input name="s" type="text" placeholder="Пошук">
			<button type="submit"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>

