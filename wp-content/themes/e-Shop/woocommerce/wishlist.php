<?php

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>


<?php
/**
 * Hook: yith_wcwl_wishlist_before_wishlist_content.
 *
 * @hooked \YITH_WCWL_Frontend::wishlist_header - 10
 */

?>

<?php
/**
 * Hook: yith_wcwl_wishlist_main_wishlist_content.
 *
 * @hooked \YITH_WCWL_Frontend::main_wishlist_content - 10
 */
do_action( 'yith_wcwl_wishlist_main_wishlist_content', $var );
?>

<?php
/**
 * Hook: yith_wcwl_wishlist_after_wishlist_content.
 *
 * @hooked \YITH_WCWL_Frontend::wishlist_footer - 10
 */

do_action( 'yith_wcwl_wishlist_after_wishlist_content', $var );
?>