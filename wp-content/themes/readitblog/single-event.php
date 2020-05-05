<?php get_header();?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/bg_1.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center ">
				<h1 class="mb-3 bread"><?php the_field('title_event', 'options');?></h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-degree-bg">
	<div class="container">
		<div class="row">
			<?php the_post(); ?>
				<div class="ftco-animate">
					<div class="img-fluid"><?php the_post_thumbnail( 'large' ); ?></div>
					<h2 class="mb-3"><?php the_title(); ?></h2>
					<div><?php the_content(); ?></div>

				  <?php if(get_field('field_1')){
						echo '<p>'; the_field('field_1');echo '</p>';
			    }?>

				  <?php if(get_field('field_2')){
					  echo '<p>'; the_field('field_2');echo '</p>';
				  }?>

				  <?php if(get_field('field_3')){
					  echo '<p>'; the_field('field_3');echo '</p>';
				  }?>

			<div class="tag-widget post-tag-container mb-5 mt-5">
				<div class="tagcloud">
					<?php the_tags('',null, null);?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer();?>
