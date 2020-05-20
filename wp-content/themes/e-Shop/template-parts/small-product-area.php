<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$brands_logos = get_field('brands_logo', 'options');

?>

<div class="brand-logo-area carosel-navigation">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="area-title">
					<h3 class="title-group border-red gfont-1"><?php the_field('brands_logo_title', 'options'); ?></h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="active-brand-logo">
				<?php foreach ($brands_logos as $brands_logo) : ?>
				<div class="col-md-2">
					<div class="single-brand-logo">
						<a href="<?php echo $brands_logo['brands_logo_url']; ?>" target="_blank">
							<img src="<?php echo $brands_logo['brands_logo_img']; ?>" alt="Зображення бренда">
						</a>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
