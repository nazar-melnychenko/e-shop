<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="sort">
               	   <div class="sort-by">
               	   
 <form method="get" class="woocommerce-ordering">             	   
               	   
               	   
			            <label>Sort By</label>
			            <select name="orderby" class="orderby">
			            <?php foreach($catalog_orderby_options as $id => $name) :?>
			                       <option value="<?php echo esc_attr($id) ?>"><?php echo esc_html($name) ?></option>

			             <?php endforeach;?>       
			            </select>
			            <!--<a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a>-->



<?php
		// Keep query string vars intact
		foreach ( $_GET as $key => $val ) {
			if ( 'orderby' === $key || 'submit' === $key ) {
				continue;
			}
			if ( is_array( $val ) ) {
				foreach( $val as $innerVal ) {
					echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
				}
			} else {
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			}
		}
	?>
	</form> 
		                   </div>
	    		   </div>


