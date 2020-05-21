<?php

defined( 'ABSPATH' ) || exit;

class WC_Widget_Top_Rated extends WC_Widget {

	public function __construct() {
		$this->widget_cssclass    = 'widget_top_rated_products';
		$this->widget_description = 'Рейтинг товарів e-shop';
		$this->widget_id          = 'top_rated_products';
		$this->widget_name        = 'Рейтинг товарів e-shop';
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => 'Рейтинг товарів',
				'label' => __( 'Title', 'woocommerce' ),
			)
		);
		parent::__construct();
	}
	public function widget( $args, $instance ) {
		if ( $this->get_cached_widget( $args ) ) {
			return;
		}



		$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];

		$query_args = apply_filters(
			'woocommerce_top_rated_products_widget_args',
			array(
				'posts_per_page' => $number,
				'no_found_rows'  => 1,
				'post_status'    => 'publish',
				'post_type'      => 'product',
				'meta_key'       => '_wc_average_rating',
				'orderby'        => 'meta_value_num',
				'order'          => 'DESC',
				'meta_query'     => WC()->query->get_meta_query(),
				'tax_query'      => WC()->query->get_tax_query(),
			)
		); // WPCS: slow query ok.

		$response = new WP_Query( $query_args );

		if ( $response->have_posts() ) {

			?>
				<div class="small-product-area carosel-navigation">
			    <?php $this->widget_start( $args, $instance );?>

					<div class="row">
						<div class="active-bestseller sidebar">
							<div class="col-xs-12">
					  <?php
					  $i = 0;
					  while ( $response->have_posts() ) {
			       $response->the_post();
					  global $product; ?>
								<div class="single-product">
									<div class="product-img">
							      <?php the_post_thumbnail( 'thumbnail', 'Product' ); ?>
									</div>
									<div class="product-description">
										<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
										<div class="price-box">
							  <?php echo $product->get_price_html(); ?>
										</div>
										<span class="rating">
															<?php stars_rating(); ?>
														</span>
									</div>
								</div>
					  <?php
					  $i ++;
					  if ( $i === 4 ) { ?>
							</div>
							<div class="col-xs-12">
					  <?php }
					  }
					  ?>
							</div>
						</div>
					</div>
				</div>
			<?php wp_reset_postdata();
		}
	}
}


