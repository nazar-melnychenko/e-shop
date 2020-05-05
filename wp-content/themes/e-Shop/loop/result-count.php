<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<p class="woocommerce-result-count">
	<?php
	if ( 1 === $total ) {
		__( 'Показано один результат', 'woocommerce' );
	} elseif ( $total <= $per_page || -1 === $per_page ) {
		/* translators: %d: total results */
		printf( __( 'Кількість товарів: %d', 'Кількість товарів: %d', $total, 'woocommerce' ), $total );
	} else {
		$first = ( $per_page * $current ) - $per_page + 1;
		$last  = min( $total, $per_page * $current );
		echo wc_get_loop_prop( 'all_page' );
		/* translators: 1: first result 2: last result 3: total results */
		printf( __( 'Показано %1$d&ndash;%2$d з %3$d результатів', 'Показано %1$d&ndash;%2$d з %3$d результатів', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
	}
	?>
</p>
