<footer class="footer-area">
	<!-- FOOTER-AREA START -->
	<section>
		<!-- START BRAND-LOGO-AREA -->
	  <?php get_template_part( 'template-parts/brands-logo' ); ?>
		<!-- END BRAND-LOGO-AREA -->
		<!-- START SUBSCRIBE-AREA -->
	  <?php get_template_part( 'template-parts/subscribe' ); ?>
		<!-- END SUBSCRIBE-AREA -->
	</section>
	<!-- Footer Start -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3">
			    <?php dynamic_sidebar( 'left_footer_menu' ); ?>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
			    <?php dynamic_sidebar( 'center_footer_menu' ); ?>
				</div>
				<div class="col-xs-12 hidden-sm col-md-3">
			    <?php dynamic_sidebar( 'right_footer_menu' ); ?>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<div class="footer-title">
						<h5>Контакти</h5>
					</div>
					<nav>
						<ul class="menu box-information">
							<li>
								<i class="fa fa-home"></i><?php the_field('footer_address', 'options'); ?></span>
							</li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<p><a href="mailto:<?php the_field('footer_e-mail', 'options'); ?>"><?php the_field('footer_e-mail', 'options'); ?></a></p>
							</li>
							<li>
								<i class="fa fa-phone"></i>
								<a href="tel:<?php the_field('footer_phone-1', 'options'); ?>"><?php the_field('footer_phone-1', 'options'); ?></a>
							</li>
							<?php if ( get_field('footer_phone-2', 'options') ) : ?>
							<li>
								<i class="fa fa-phone"></i>
								<a href="tel:<?php the_field('footer_phone-2', 'options'); ?>"><?php the_field('footer_phone-2', 'options'); ?></a>
							</li>
							<?php endif;?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer End -->
	<!-- Copyright-area Start -->
	<div class="copyright-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="copyright">
						<p>Copyright &copy; <?php echo date('Y'); ?> Всі права захищені.</p>
						<div class="payment">
							<a href="<?php the_field('footer_payment_url', 'options'); ?>" target="_blank">
								<img src="<?php the_field('footer_payment_img', 'options'); ?>"
							                 alt="Payment">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Copyright-area End -->
	<div id="quickview-wrapper">
		<!-- QUICKVIEW PRODUCT -->
		<!-- Modal -->
		<div class="modal fade" id="productModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
											aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="modal-product">
							<div class="product-images">
								<div class="main-image images">
									<img alt="#"
									     src="<?php echo get_template_directory_uri(); ?>/assets/img/product/quickview-photo.jpg"/>
								</div>
							</div><!-- .product-images -->
							<div class="product-info" style="width:60%;">
								<h1>Aenean eu tristique</h1>
								<div class="price-box-3">
									<hr/>
									<div class="s-price-box">
										<span class="new-price">$160.00</span>
										<span class="old-price">$190.00</span>
									</div>
									<hr/>
								</div>
								<a href="shop.html" class="see-all">See all features</a>
								<div class="quick-add-to-cart">
									<form method="post" class="cart">
										<div class="numbers-row">
											<input type="number" id="french-hens" value="3">
										</div>
										<button class="single_add_to_cart_button" type="submit">Add to cart</button>
									</form>
								</div>
								<div class="quick-desc">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor.
									Donec non est at libero.
								</div>
								<div class="social-sharing">
									<div class="widget widget_socialsharing_widget">
										<h3 class="widget-title-modal">Share this product</h3>
										<ul class="social-icons">
											<li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i
																	class="fa fa-facebook"></i></a></li>
											<li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i
																	class="fa fa-twitter"></i></a></li>
											<li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i
																	class="fa fa-pinterest"></i></a></li>
											<li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i
																	class="fa fa-google-plus"></i></a></li>
											<li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i
																	class="fa fa-linkedin"></i></a></li>
										</ul>
									</div>
								</div>
							</div><!-- .product-info -->
						</div><!-- .modal-product -->
					</div><!-- .modal-body -->
				</div><!-- .modal-content -->
			</div><!-- .modal-dialog -->
		</div>
		<!-- END Modal -->
		<!-- END QUICKVIEW PRODUCT -->
	</div>
	<!-- FOOTER-AREA END -->
</footer>
<?php wp_footer(); ?>
</body>
</html>