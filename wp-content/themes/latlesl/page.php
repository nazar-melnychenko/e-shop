<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

get_navigation();

?>

<?php if(is_cart() || is_checkout() ):?>

<div class="cart-items">
	<div class="container">

<?php elseif(is_account_page()) :?>

	<div class="container">
		<div class="login-page">

<?php endif; ?>


		
		<?php while(have_posts()): the_post() ?>
		
			<?php if(is_cart() || is_checkout() || is_account_page()) :?>
			
				<?php get_template_part( 'template-parts/content', 'page');?>
			
			<?php endif; ?>
		
		<?php endwhile;?>



	</div>
</div>
   <?php 
   get_footer();

?>