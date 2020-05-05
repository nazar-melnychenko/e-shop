<?php
//
//if ( ! defined( 'ABSPATH' ) ) {
//	exit; // Exit if accessed directly
//}
//
//global $product;
//
//if ( ! comments_open() ) {
//	return;
//}
//
//?>
<!--<div class="tab-pane" id="reviews">-->
<!--		  -->
<!--		  <div class="response">-->
<!--		  -->
<!---->
<!--		--><?php //if ( have_comments() ) : ?>
<!---->
<!--			-->
<!--				--><?php //wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
<!--			-->
<!---->
<!--			--><?php //if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
//				echo '<nav class="woocommerce-pagination">';
//				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
//					'prev_text' => '&larr;',
//					'next_text' => '&rarr;',
//					'type'      => 'list',
//				) ) );
//				echo '</nav>';
//			endif; ?>
<!---->
<!--		--><?php //else : ?>
<!---->
<!--			<p class="woocommerce-noreviews">--><?php //_e( 'There are no reviews yet.', 'woocommerce' ); ?><!--</p>-->
<!---->
<!--		--><?php //endif; ?>
<!--		  -->
<!--		  -->
<!--					</div>-->
<!--					-->
<!--					-->
<!--					-->
<!--					--><?php //if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>
<!---->
<!--		<div id="review_form_wrapper">-->
<!--			<div id="review_form">-->
<!--				--><?php
//					$commenter = wp_get_current_commenter();
//
//					$comment_form = array(
//						'title_reply'          => have_comments() ? __( 'Add a review', 'woocommerce' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
//						'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
//						'comment_notes_after'  => '',
//						'fields'               => array(
//							'author' => '<input id="author" name="author" type="text"  placeholder="Username" value="' . esc_attr( $commenter['comment_author'] ) . '" aria-describedby="basic-addon1">',
//							'email'  => '<input id="email" name="email" type="text"  placeholder="Email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" aria-describedby="basic-addon1">'
//
//							),
//						'label_submit'  => __( 'Submit', 'woocommerce' ),
//						'logged_in_as'  => '',
//						'comment_field' => '',
//						'class_form'  => 'contact-form'
//					);
//
//					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
//						$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'woocommerce' ), esc_url( $account_page_url ) ) . '</p>';
//					}
//
//					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
//						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'woocommerce' ) .'</label><select name="rating" id="rating" aria-required="true" required>
//							<option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
//							<option value="5">' . __( 'Perfect', 'woocommerce' ) . '</option>
//							<option value="4">' . __( 'Good', 'woocommerce' ) . '</option>
//							<option value="3">' . __( 'Average', 'woocommerce' ) . '</option>
//							<option value="2">' . __( 'Not that bad', 'woocommerce' ) . '</option>
//							<option value="1">' . __( 'Very Poor', 'woocommerce' ) . '</option>
//						</select></p>';
//					}
//
//					$comment_form['comment_field'] .= '<div class="review_form"><textarea id="comment" name="comment"  placeholder="Message" required></textarea></div>';
//					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
//				?>
<!--			</div>-->
<!--		</div>-->
<!---->
<!--	--><?php //else : ?>
<!---->
<!--		<p class="woocommerce-verification-required">--><?php //_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?><!--</p>-->
<!---->
<!--	--><?php //endif; ?>
<!--					-->
<!--					-->
<!--        </div>-->
<!---->
