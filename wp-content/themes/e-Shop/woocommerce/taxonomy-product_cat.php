<?php
defined( 'ABSPATH' ) || exit;
get_header();
global $product;
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
			<?php get_template_part( 'template-parts/filters' ); ?>
			</div>
			<div class="col-md-9 col-xs-12">
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
				<!-- START PRODUCT-AREA -->
				<div class="product-area">
					<div class="row">
						<div class="col-xs-12">
							<!-- Start Product-Menu -->
							<div class="product-menu">
								<div class="product-title">
						 <?php if ( is_search() ) : ?>
										 <h3 class="title-group-3 gfont-1">Результат пошуку за запитом: <?php the_search_query(); ?></h3>
						 <?php else: ?>
										 <h3 class="title-group-3 gfont-1"><?php echo get_queried_object()->name; ?></h3>
						 <?php endif; ?>

								</div>
							</div>
							<div class="product-filter">
								<ul role="tablist">
									<li role="presentation" class="list">
										<a href="#display-1-1" role="tab" data-toggle="tab"></a>
									</li>
									<li role="presentation" class="grid active">
										<a href="#display-1-2" role="tab" data-toggle="tab"></a>
									</li>
								</ul>
					  <?php woocommerce_catalog_ordering(); ?>
								<div class="limit">

									<label>Показувати: </label>
									<select id="pagination-posts">
										<option <?php if ( isset( $_GET['spp'] ) && $_GET['spp'] == 8 ) : ?> selected="selected" <?php endif; ?>
														value="8">8
										</option>
										<option <?php if ( isset( $_GET['spp'] ) && $_GET['spp'] == 16 ) : ?> selected="selected" <?php endif; ?>
														value="16">16
										</option>
										<option <?php if ( isset( $_GET['spp'] ) && $_GET['spp'] == 24 ) : ?> selected="selected" <?php endif; ?>
														value="24">24
										</option>
										<option <?php if ( isset( $_GET['spp'] ) && $_GET['spp'] == 32 ) : ?> selected="selected" <?php endif; ?>
														value="32">32
										</option>
										<option <?php if ( isset( $_GET['spp'] ) && $_GET['spp'] == 40 ) : ?> selected="selected" <?php endif; ?>
														value="40">40
										</option>
										<option <?php if ( isset( $_GET['spp'] ) && $_GET['spp'] == 48 ) : ?> selected="selected" <?php endif; ?>
														value="48">48
										</option>
										<option <?php if ( isset( $_GET['spp'] ) && $_GET['spp'] == 100 ) : ?> selected="selected" <?php endif; ?>
														value="100">100
										</option>
									</select>
									<label>на сторінці</label>
								</div>
							</div>

							<!-- End Product-Menu -->
							<div class="clear"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<!-- Start Product -->
							<div class="product">
								<div class="tab-content">
									<!-- Product -->
									<div role="tabpanel" class="tab-pane fade" id="display-1-1">
										<div class="row">
											<div class="listview">
											 <?php if ( have_posts() ):
												 while ( have_posts() ): the_post(); ?>
														<!-- Start Single-Product -->
											<div class="single-product">
												<div class="col-md-3 col-sm-4 col-xs-12">
													<div class="label_new">
								            <?php woocommerce_show_product_sale_flash(); ?>
													</div>
													<div class="product-img">
														<a href="<?php the_permalink(); ?>">
															<?php the_post_thumbnail( 'thumbnail', 'Product' ); ?>
														</a>
													</div>
												</div>
												<div class="col-md-9 col-sm-8 col-xs-12">
													<div class="product-description">
														<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
														<div class="price-box">
														<?php
														global $product;
														echo $product->get_price_html(); ?>
															</div>
															<span class="rating">
													<?php stars_rating(); ?>
												</span>
													<p class="description"><?php the_excerpt(); ?></p>
													<div class="product-action">
														<div class="button-group">
															<div class="product-button">
									              <?php woocommerce_template_single_add_to_cart(); ?>
																<div class="product-button-2">
																  <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
																  <?php echo do_shortcode('[yith_compare_button]');?>
																  <?php echo do_shortcode('[yith_quick_view]');?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									<!-- End Single-Product -->
										 <?php endwhile; ?>
									 <?php else: ?>
										 В даній категорії товарів не знайдено!
									 <?php endif; ?>
											</div>
										</div>
										<!-- Start Pagination Area -->
										<div class="pagination-area">
											<div class="row">
												<div class="col-xs-5">
													<div class="pagination">
									  <?php the_posts_pagination( [
										  'end_size'           => 1,     // количество страниц на концах
										  'mid_size'           => 1,     // количество страниц вокруг текущей
										  'prev_text'          => '<',
										  'next_text'          => '>',
										  'screen_reader_text' => ' '
									  ] ); ?>
													</div>
												</div>
												<div class="col-xs-7">
													<div class="product-result">
														<span><?php woocommerce_result_count(); ?></span>
													</div>
												</div>
											</div>
										</div>
										<!-- End Pagination Area -->
									</div>
									<!-- End Product -->
									<!-- Start Product-->
									<div role="tabpanel" class="tab-pane fade in active not-listview" id="display-1-2">
										<div class="row">
							  <?php if ( have_posts() ):
								  while ( have_posts() ): the_post(); ?>
														<div class="col-md-3 col-sm-4 col-xs-12">
										 <?php get_template_part( 'template-parts/product-item' ); ?>
														</div>
								  <?php endwhile; ?>
							  <?php else: ?>
												 В даній категорії товарів не знайдено!
							  <?php endif; ?>
											<!-- Start Single-Product -->
											<!-- End Single-Product -->
										</div>
										<!-- Start Pagination Area -->
										<div class="pagination-area">
											<div class="row">
												<div class="col-xs-5">
													<div class="pagination">
									  <?php the_posts_pagination( [
										  'end_size'           => 1,     // количество страниц на концах
										  'mid_size'           => 1,     // количество страниц вокруг текущей
										  'prev_text'          => '<',
										  'next_text'          => '>',
										  'screen_reader_text' => ' '
									  ] ); ?>
													</div>
												</div>
												<div class="col-xs-7">
													<div class="product-result">
														<span><?php woocommerce_result_count(); ?></span>
													</div>
												</div>
											</div>
										</div>
										<!-- End Pagination Area -->
									</div>
									<!-- End Product = TV -->
								</div>
							</div>
							<!-- End Product -->
						</div>
					</div>
				</div>
				<!-- END PRODUCT-AREA -->
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
