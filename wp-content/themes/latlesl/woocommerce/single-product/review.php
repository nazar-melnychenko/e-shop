<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>


<div id="comment-<?php comment_ID(); ?>" class="media response-info">
<?php
if ( '0' === $comment->comment_approved ) : ?>

	<p class="meta"><em><?php esc_attr_e( 'Your comment is awaiting approval', 'woocommerce' ); ?></em></p>

<?php else : ?>

	<div class="media-left response-text-left">
								<a href="<?php echo get_comment_author_url( $comment );?>">
									
									<?php
		/**
		 * The woocommerce_review_before hook
		 *
		 * @hooked woocommerce_review_display_gravatar - 10
		 */
		do_action( 'woocommerce_review_before', $comment );
		
		do_action( 'woocommerce_review_meta', $comment );
		
		
		?>
		
		
									</a>
								<h5><a href="<?php echo get_comment_author_url( $comment );?>"><?php echo get_comment_author( $comment )?></a></h5>
	</div>
	

<?php endif;?>


							
							<div class="media-body response-text-right">
							
							
								<p>
									
									
									<?php 
									do_action( 'woocommerce_review_before_comment_meta', $comment );
									do_action( 'woocommerce_review_before_comment_text', $comment );

									do_action( 'woocommerce_review_comment_text', $comment );
									
									do_action( 'woocommerce_review_after_comment_text', $comment ); ?>

									
									
									
								</p>
								
								<ul>
									<li><?php echo get_comment_date( 'F jS, Y' ); ?></li>
									<li><a href="#respond" onclick='return addComment.moveForm("comment-<?php comment_ID();?>", "<?php comment_ID();?>", "respond", "")' >Reply</a></li>
								</ul>		
							</div>
							<div class="clearfix"> </div>
						</div>