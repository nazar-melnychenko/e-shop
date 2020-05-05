<?php
/*Template Name: About Template*/
	get_header();
?>

<div class="hero-wrap js-fullheight" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/bg_1.jpg);"
     data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
			<div class="col-md-12 ftco-animate text-center">
				<h1 class="mb-4 mb-md-0"><?php wp_title(null); ?></h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo home_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span>
					<span>About <i class="ion-ios-arrow-forward"></i></span>
				</p>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row d-flex">
		 <?php the_post(); ?>
		  <?php the_content(); ?>
		</div>
	</div>
</section>

<section class="ftco-section testimony-section">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Testimonial</span>
				<h2 class="mb-4">Happy Clients</h2>
			</div>
		</div>
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel ftco-owl">
			  <?php $resp = new WP_Query( ['post_type' => 'reviews'] );
		      while ( $resp->have_posts() ) : $resp->the_post();?>
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="text">
								<p class="mb-4"><?php the_content(); ?></p>
								<div class="d-flex align-items-center">
									<div class="user-img" style="background-image: url(<?php the_field('about_photo');?>)"></div>
									<div class="pl-3">
										<p class="name"><?php the_title(); ?></p>
										<span class="position"><?php the_field('about_position');?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
		    <?php endwhile;
		      wp_reset_postdata();?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
