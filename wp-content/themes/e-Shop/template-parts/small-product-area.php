<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- START SMALL-PRODUCT-AREA (1) -->
<div class="small-product-area">
	<!-- Start Product-Menu -->
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<div class="product-menu">
				<ul role="tablist">
					<li role="presentation" class=" active"><a href="#display-4-1" role="tab" data-toggle="tab">Нові поступлення</a></li>
					<li role="presentation"><a href="#display-4-2" role="tab" data-toggle="tab">Розпродаж</a></li>
					<li role="presentation"><a href="#display-4-3" role="tab" data-toggle="tab">Вибіркові товари</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- End Product-Menu -->
	<!-- Start Product -->
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<div class="product carosel-navigation">
				<div class="tab-content">
					<!-- Product = display-4-1 -->
					<div role="tabpanel" class="tab-pane fade in active" id="display-4-1">
						<div class="row">
							<div class="active-small-product">
								<!-- Start Single-Product -->
							  <?php $the_query_1 = new WP_Query(['post_type'=>'product','showposts'=>15,'order'=>'DESC']);
							    $i = 0;
							    while ($the_query_1 -> have_posts()) : $the_query_1 -> the_post();
							      echo ($i++ == 0) ? '<div class="col-xs-12">' : null; ?>
											<?php get_template_part('template-parts/small-product-item');
										echo ($i == 3) ? '</div>' : null;
									($i == 3) ? $i= 0 : null; ?>
					      <?php
							    endwhile;
							    wp_reset_query();
					        echo ($the_query_1->found_posts <= 15 && $the_query_1->found_posts % 3 != 0) ? '</div>' : null;
							    ?>
										<!-- End Single-Product -->
							</div>
						</div>
					</div>
					<!-- End Product = display-4-1 -->
					<!-- Start Product = display-4-2 -->
					<div role="tabpanel" class="tab-pane fade" id="display-4-2">
						<div class="row">
							<div class="active-small-product">
										<!-- Start Single-Product -->
								  <?php $the_query_2 = new WP_Query( [
									  'post_type'  => 'product',
									  'showposts'  => 15,
									  'meta_query' => [
							        'relation' => 'OR',
										  [
											  'key' => '_sale_price',
											   'value'         => 0,
											   'compare'       => '>',
											   'type'          => 'numeric'
										  ],
										  [
											    'key'           => '_min_variation_sale_price',
											    'value'         => 0,
											    'compare'       => '>',
											    'type'          => 'numeric'
										  ]
									  ]

								  ] );
								  $i= 0;
							  while ($the_query_2 -> have_posts()) : $the_query_2 -> the_post();
								  echo ($i++ == 0) ? '<div class="col-xs-12">' : null; ?>
								  <?php get_template_part('template-parts/small-product-item');
								  echo ($i == 3) ? '</div>' : null;
								  ($i == 3)? $i= 0 : null; ?>
								  <?php
									  endwhile;
									  wp_reset_query();
							      echo ($the_query_2->found_posts <= 15 && $the_query_2->found_posts % 3 != 0) ? '</div>' : null;
								  ?>
										<!-- End Single-Product -->
							</div>
							<?php
//							echo '<pre>';
//							print_r($the_query_2);
//							echo '</pre>';
							?>
						</div>
					</div>
					<!-- End Product = display-4-2 -->
					<!-- Start Product = display-4-3 -->
					<div role="tabpanel" class="tab-pane fade" id="display-4-3">
						<div class="row">
							<div class="active-small-product">
										<!-- Start Single-Product -->
							  <?php $the_query_3 = new WP_Query(['post_type'=>'product','showposts'=>15,'orderby'=>'rand']);
							  $i = 0;
							  while ($the_query_3 -> have_posts()) : $the_query_3 -> the_post();
								  echo ($i++ == 0) ? '<div class="col-xs-12">' : null; ?>
								  <?php get_template_part('template-parts/small-product-item');
								  echo ($i == 3) ? '</div>' : null;
								  ($i == 3) ? $i= 0 : null; ?>
							  <?php
							    endwhile;
							    wp_reset_query();
					        echo ($the_query_3->found_posts <= 15 && $the_query_3->found_posts % 3 != 0) ? '</div>' : null;
						    ?>
										<!-- End Single-Product -->
							</div>
						</div>
					</div>
					<!-- End Product = display-4-3 -->
				</div>
			</div>
		</div>
	</div>
	<!-- End Product -->
</div>
<!-- END SMALL-PRODUCT-AREA (1) -->

