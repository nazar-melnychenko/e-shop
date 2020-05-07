<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="subscribe-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-7 col-xs-12">
				<div class="subscribe">
			  <?php echo do_shortcode('[newsletter_form button_label="Підписатись"]
																					[newsletter_field name="email" label="ПІДПИШІТЬСЯ НА НОВИНИ:" placeholder="Введіть Ваш E-mail"]
																					[/newsletter_form]');
			  ?>
				</div>
			</div>
			<div class="col-md-4 col-sm-5 col-xs-12">
			<?php dynamic_sidebar('socials'); ?>
			</div>
		</div>
	</div>
</div>
