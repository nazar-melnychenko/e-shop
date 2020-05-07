<!-- START SMALL-PRODUCT-AREA -->
<?php dynamic_sidebar('bestseller'); ?>
<!-- END SMALL-PRODUCT-AREA -->

<!-- START SIDEBAR-BANNER -->
<?php $sb_filds = get_field('sidebar_banner', 'options'); ?>
<div class="sidebar-banner">
	<div class="active-sidebar-banner">
		<?php foreach ($sb_filds as $sb_fild) :?>
		<div class="single-sidebar-banner">
			<a href="<?php echo $sb_fild['sidebar_banner_url']; ?>">
				<img src="<?php echo $sb_fild['sidebar_banner_img']; ?>" alt="Product Banner">
			</a>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- END SIDEBAR-BANNER -->
