<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );


if ( ! empty( $tabs ) ) : ?>

			<ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
	        <?php $i = 0;?>
			<?php foreach ( $tabs as $key => $tab ) : ?>
				
			<li class="test-class <?php if($i == 0) :?> active <?php endif;?>">
				<a class="deco-none misc-class" href="#<?php echo $key;?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
			</li>
				<?php $i++;?>
			<?php endforeach; ?>
			</ul>
		
		<div class="tab-content responsive hidden-xs hidden-sm">
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<?php call_user_func( $tab['callback'], $key, $tab ); ?>
		<?php endforeach; ?>
		</div>

<?php endif; ?>
