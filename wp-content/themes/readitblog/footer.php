<footer class="ftco-footer ftco-bg-dark ftco-section">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="logo"><a href="<?php echo home_url();?>"><?php the_field('logo-footer', 'options');?></a></h2>
					<p><?php the_field('description-footer', 'options');?></p>
            <?php dynamic_sidebar('social_links');?>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
						<?php dynamic_sidebar('latest_news');?>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4 ml-md-5">
					<?php dynamic_sidebar('information');?>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<?php dynamic_sidebar('questions');?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<p><?php the_field('copy', 'options');?></p>
			</div>
		</div>
	</div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
	<svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
	</svg>
</div>
<?php wp_footer();?>
</body>
</html>