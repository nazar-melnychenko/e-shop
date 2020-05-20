<?php
/* Template Name: Shop */
defined( 'ABSPATH' ) || exit;
get_header(); ?>

<?php if(is_search()) :?>
	<?php get_template_part('search');?>
<?php else:?>
	<div class="category-slider-area">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<?php get_template_part( 'template-parts/category' ); ?>
				</div>
				<div class="col-md-9">
					<?php $ms_filds = get_field('main_slider', 'options'); ?>
					<!-- slider -->
					<div class="slider-area">
						<div class="bend niceties preview-1">
							<div id="ensign-nivoslider" class="slides">
								<?php
								$i = 1;
								foreach ($ms_filds as $ms_fild) :?>
									<img src="<?php echo $ms_fild['main_slider_img']; ?>" alt="<?php echo $ms_fild['main_slider_title']; ?>" title="#slider-direction-<?php echo $i; ?>"/>
									<?php
									$i++;
								endforeach; ?>
							</div>
							<?php
							$j = 1;
							foreach ($ms_filds as $ms_fild) :?>
								<div id="slider-direction-<?php echo $j; ?>" class="slider-direction">
									<div class="slider-progress"></div>
									<div class="layer-2 ">
										<h1 class="title2"><?php echo $ms_fild['main_slider_title']; ?></h1>
									</div>
									<div class="layer-1">
										<p class="title1"><?php echo $ms_fild['main_slider_description']; ?></p>
									</div>
									<div class="layer-3">
										<h2 class="title3"><?php echo $ms_fild['main_slider_price']; ?></h2>
									</div>
									<div class="layer-4">
										<a href="<?php echo $ms_fild['main_slider_url']; ?>" class="title4">Купити зараз</a>
									</div>
								</div>
								<?php
								$j++;
							endforeach; ?>
						</div>
					</div>
					<!-- slider end-->
				</div>
			</div>
		</div>
	</div>
	<section class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3">
					<!-- START HOT-DEALS-AREA -->
					<?php get_template_part( 'template-parts/main-baner' ); ?>
					<!-- END RECENT-POSTS -->
				</div>
				<div class="col-md-9 col-sm-9">
					<!-- START PRODUCT-BANNER -->
					<div class="product-banner home1-banner">
						<div class="row">
							<div class="col-md-7 banner-box1">
								<div class="single-product-banner">

									<a href="<?php the_field('mini_banner_top_big_url', 'options'); ?>">
										<img src="<?php the_field('mini_banner_top_big_img', 'options'); ?>" alt="Product Banner">
									</a>
									<div class="banner-text banner-1">
										<h2><?php the_field('mini_banner_top_big_title', 'options'); ?></h2>
									</div>
								</div>
							</div>
							<div class="col-md-5 banner-box2">
								<div class="single-product-banner">
									<a href="<?php the_field('mini_banner_top_small_url', 'options'); ?>">
										<img src="<?php the_field('mini_banner_top_small_img', 'options'); ?>" alt="Product Banner">
									</a>
									<div class="banner-text banner-2">
										<h2><?php the_field('mini_banner_top_small_title', 'options'); ?></h2>
										<p><?php the_field('mini_banner_top_small_description', 'options'); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PRODUCT-BANNER -->
					<?php
					if ( have_posts() ){
						while ( have_posts() ){
							the_post();
							the_content();
						}
					}
					?>
					<!-- START PRODUCT-BANNER -->
					<div class="product-banner">
						<div class="row">
							<div class="col-md-7 banner-box1">
								<div class="single-product-banner">
									<a href="<?php the_field('mini_banner_bottom_big_url', 'options'); ?>">
										<img src="<?php the_field('mini_banner_bottom_big_img', 'options'); ?>" alt="Product Banner">
									</a>
									<div class="banner-text banner-1">
										<h2><?php the_field('mini_banner_bottom_big_title', 'options'); ?></h2>
										<p><?php the_field('mini_banner_bottom_big_description', 'options'); ?></p>
										<span><?php the_field('mini_banner_bottom_big_price', 'options'); ?></span>
									</div>
								</div>
							</div>
							<div class="col-md-5 banner-box2">
								<div class="single-product-banner">
									<a href="<?php the_field('mini_banner_bottom_small_url', 'options'); ?>">
										<img src="<?php the_field('mini_banner_bottom_small_img', 'options'); ?>" alt="Product Banner">
									</a>
									<div class="banner-text banner-2">
										<h2><?php the_field('mini_banner_bottom_small_title', 'options'); ?></h2>
										<p><?php the_field('mini_banner_bottom_small_description', 'options'); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PRODUCT-BANNER -->
					<?php get_template_part('template-parts/small-product-area'); ?>
				</div>
			</div>
		</div>
		<!-- END HOME-PAGE-CONTENT -->
		<?php

		?>
	</section>

<?php endif; ?>

<?php get_footer(); ?>