<?php
defined( 'ABSPATH' ) || exit;
$filds = get_field('tabs_slider_product');
?>
<!-- START PRODUCT-AREA (2) -->
<div class="product-area">
	<!-- Start Product-Menu -->
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<div class="product-menu  border-red">
				<div class="product-title">
					<h3 class="title-group-2 gfont-1"><?php echo $filds[0]->name;?></h3>
				</div>

				<ul role="tablist">
					<?php
				    $i = 1;
						foreach ($filds as $fild){
						 if ($fild->count != 0){ ?>
							 <li role="presentation" <?php echo ($i === 1) ? 'class=" active"' : null; ?> >
								 <a href="#display-<?php echo $filds[0]->term_id; ?>-<?php echo $i;?>" role="tab" data-toggle="tab">
									  <?php echo $fild->name; ?>
								 </a>
							 </li>
			    <?php
					    $i++;
						 } }; ?>
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
			  <?php
				  $i = 1;
				  foreach ($filds as $fild){
					  if ($fild->count != 0){ ?>
						  <div role="tabpanel" class="tab-pane fade <?php echo ($i === 1) ? 'in active' : null; ?>" id="display-<?php echo $filds[0]->term_id; ?>-<?php echo $i;?>">
							  <div class="row">
								  <div class="active-product-carosel">
									  <?php
									  $posts = new WP_Query([
										  'posts_per_page' => 7,
										  'post_type' => 'product',
										  'tax_query' => [
											  [
												  'taxonomy' => 'product_cat',
												  'field' => 'id',
												  'terms' => $fild->term_id
											  ]
										  ]]);

									  while ($posts->have_posts()) : $posts->the_post()?>
										  <!-- Start Single-Product -->
										  <div class="col-xs-12">
							          <?php get_template_part('template-parts/product-item');?>
										  </div>
										  <!-- End Single-Product -->
									  <?php endwhile; ?>
								  </div>
							  </div>
						  </div>
			  <?php
				  $i++;
				    } }; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End Product -->
</div>
<!-- END PRODUCT-AREA (2) -->