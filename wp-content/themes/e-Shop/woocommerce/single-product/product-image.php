<?php
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}
global $product;

$post_thumbnail_id = $product->get_image_id();
$attachment_ids    = $product->get_gallery_image_ids();

?>

<div class="tab-content">
	<?php if ( $post_thumbnail_id ) : ?>
		 <div role="tabpanel" class="tab-pane fade in active" id="display-1">
			 <div class="row">
				 <div class="col-xs-12">
					 <div class="toch-photo">
						 <div><img src="<?php echo wp_get_attachment_image_src($post_thumbnail_id,'large')[0];?>" data-imagezoom="true" alt="#" /></div>
					 </div>
				 </div>
			 </div>
		 </div>
		<?php
		$i = 2;
		foreach ( $attachment_ids as $attachment_id ) :?>
				<div role="tabpanel" class="tab-pane fade" id="display-<?php echo $i; ?>">
					<div class="row">
						<div class="col-xs-12">
							<div class="toch-photo">
								<div ><img src="<?php echo wp_get_attachment_image_src($attachment_id,'large')[0];?>" data-imagezoom="true" alt="#" /></div>
							</div>
						</div>
					</div>
				</div>
			<?php
			$i ++;
		endforeach; endif; ?>
</div>

<div class="toch-prond-menu">
	<ul role="tablist">
	  <?php if ( $post_thumbnail_id ) : ?>
			<li role="presentation" class=" active">
				<a href="#display-1" role="tab" data-toggle="tab"><img src="<?php echo wp_get_attachment_image_src($post_thumbnail_id,'large')[0];?>" alt="#" /></a>
			</li>
	  <?php
	  $j = 2;
	  foreach ( $attachment_ids as $attachment_id ) :?>
			<li role="presentation">
				<a href="#display-<?php echo $j; ?>" role="tab" data-toggle="tab"><img src="<?php echo wp_get_attachment_image_src($attachment_id,'large')[0];?>" alt="#" /></a>
			</li>
	    <?php
	    $j ++;
    endforeach; endif; ?>
	</ul>
</div>

