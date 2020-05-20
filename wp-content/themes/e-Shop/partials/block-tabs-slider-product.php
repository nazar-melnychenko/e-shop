<?php
defined( 'ABSPATH' ) || exit;
?>

<!-- Start About-Area -->
<div class="about-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="f-title text-center">
					<h3 class="title text-uppercase"><?php the_field('about_page_title'); ?></h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="about-page-cntent">
					<h3><?php the_field('about_text_title'); ?></h3>
					<p><?php the_field('about_text'); ?></p>
				</div>
			</div>
			<div class="col-md-5 col-sm-12 col-xs-12">
				<div class="img-element">
					<img alt="banner1" src="<?php the_field('about_img'); ?>">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End About-Area -->
