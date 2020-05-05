
<?php get_header();?>

<div class="hero-wrap js-fullheight" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/bg_1.jpg);"
     data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
		     data-scrollax-parent="true">
			<div class="col-md-12 ftco-animate">
				<h2 class="subheading"><?php the_field('subtitle', 'options');?></h2>
				<h1 class="mb-4 mb-md-0"><?php the_field('title', 'options');?></h1>
				<div class="row">
					<div class="col-md-7">
						<div class="text">
							<p><?php the_field('description', 'options');?></p>
							<div class="mouse">
								<a href="#" class="mouse-icon">
									<div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row d-flex">
		 <?php
		 if (have_posts()):
		  while (have_posts()): the_post(); ?>
				<div class="col-md-4 d-flex ftco-animate">
				<div class="blog-entry justify-content-end">
					<a href="<?php the_permalink(); ?>" class="block-20"><?php the_post_thumbnail('large'); ?></a>
					<div class="text p-4 float-right d-block">
						<div class="topper d-flex align-items-center">
							<div class="one py-2 pl-3 pr-1 align-self-stretch">
								<span class="day"><?php the_time('d'); ?></span>
							</div>
							<div class="two pl-0 pr-3 py-2 align-self-stretch">
								<span class="yr"><?php the_time('Y'); ?></span>
								<span class="mos"><?php the_time('F'); ?></span>
							</div>
						</div>
						<h3 class="heading mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_excerpt()?></p>
						<i><?php the_taxonomies(); ?></i>
						<p><a href="<?php the_permalink(); ?>" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
	  <?php else: ?>
			 Зиписів немає!
	  <?php endif; ?>
		</div>
		<div class="row mt-5">
			<div class="col text-center">
				<div class="block-27">
			  <?php the_posts_pagination([
				  'end_size' => 1,
				  'mid_size' => 1,
				  'prev_text' => '<',
				  'next_text' => '>',
				  'screen_reader_text' => ' '
			  ]); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer();?>
