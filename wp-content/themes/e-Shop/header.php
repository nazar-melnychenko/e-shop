<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php bloginfo( 'name' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,600,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/solid.css" integrity="sha384-29Ax2Ao1SMo9Pz5CxU1KMYy+aRLHmOu6hJKgWiViCYpz3f9egAJNwjnKGgr+BXDN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/fontawesome.css" integrity="sha384-Lyz+8VfV0lv38W729WFAmn77iH5OSroyONnUva4+gYaQTic3iI2fnUKtDSpbVf0J" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>
<body>

<!-- HEADER-AREA START -->
<header class="header-area">
	<!-- HEADER-TOP START -->
	<div class="header-top hidden-xs">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="top-menu">
						<!-- Start Currency -->
						<ul class="currency">
							<li><a href="#"><strong>$</strong> USD<i class="fa fa-caret-down left-5"></i></a>
								<ul>
									<li><a href="#">$ EUR3</a></li>
									<li><a href="#">$ GBP2</a></li>
									<li><a href="#">$ USD1</a></li>
								</ul>
							</li>
						</ul>
						<!-- End Currency -->
						<p class="welcome-msg">Ласкаво просимо на сайт якісної техніки!</p>
					</div>
					<!-- Start Top-Link -->
					<div class="top-link">
						<ul class="link">
							<li><a href="my-account.html"><i class="fa fa-user"></i> Мій акаунт</a></li>
							<?php dynamic_sidebar('wish_list');?>
							<li><a href="checkout.html"><i class="fa fa-share"></i> Вийти</a></li>
							<li><a href="account.html"><i class="fa fa-unlock-alt"></i> Зайти...</a></li>
						</ul>
					</div>
					<!-- End Top-Link -->
				</div>
			</div>
		</div>
	</div>
	<!-- HEADER-TOP END -->
	<!-- HEADER-MIDDLE START -->
	<div class="header-middle">
		<div class="container">
			<!-- Start Support-Client -->
			<div class="support-client hidden-xs">
				<div class="row">
					<!-- Start Single-Support -->
					<div class="col-md-3 hidden-sm">
						<div class="single-support">
							<div class="support-content">
								<i class="fa fa-clock-o"></i>
								<div class="support-text">
									<h1 class="zero gfont-1"><?php the_field( 'header_title', 'options' ); ?></h1>
									<p><?php the_field( 'first_day', 'options' ); ?> - <?php the_field( 'last_day', 'options' ); ?>
										: <?php the_field( 'first_time', 'options' ); ?> - <?php the_field( 'last_time', 'options' ); ?></p>
								</div>
							</div>
						</div>
					</div>
					<!-- End Single-Support -->
					<!-- Start Single-Support -->
					<div class="col-md-3 col-sm-4">
						<div class="single-support">
							<i class="fa fa-truck"></i>
							<div class="support-text">
								<h1 class="zero gfont-1"><?php the_field( 'shipping_title', 'options' ); ?></h1>
								<p><?php the_field( 'shipping_description', 'options' ); ?></p>
							</div>
						</div>
					</div>
					<!-- End Single-Support -->
					<!-- Start Single-Support -->
					<div class="col-md-3 col-sm-4">
						<div class="single-support">
							<i class="fa fa-money"></i>
							<div class="support-text">
								<h1 class="zero gfont-1"><?php the_field( 'money_back', 'options' ); ?></h1>
								<p><?php the_field( 'money_description', 'options' ); ?></p>
							</div>
						</div>
					</div>
					<!-- End Single-Support -->
					<!-- Start Single-Support -->
					<div class="col-md-3 col-sm-4">
						<div class="single-support">
							<i class="fa fa-phone-square"></i>
							<div class="support-text">
								<h1 class="zero gfont-1"><?php the_field( 'order_phone', 'options' ); ?></h1>
								<p><?php the_field( 'phone_description', 'options' ); ?></p>
							</div>
						</div>
					</div>
					<!-- End Single-Support -->
				</div>
			</div>
			<!-- End Support-Client -->
			<!-- Start logo & Search Box -->
			<div class="row vam">
				<div class="col-md-3 col-sm-12">
					<div class="logo">
						<a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a>
					</div>
				</div>
				<div class="col-md-9 col-sm-12">
					<div class="quick-access">
				    <?php get_search_form();?>
						<div class="top-cart">
							<?php global $woocommerce; ?>
							<ul>
								<li>
									<a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
										<span class="cart-icon"><i class="fa fa-shopping-cart"></i></span>
										<span class="cart-total">
                    <span class="cart-title">Корзина</span>
                    <span class="cart-item"><?php echo $woocommerce->cart->cart_contents_count ?> шт. </span>
                    <span class="top-cart-price"><?php echo $woocommerce->cart->get_cart_total()?></span>
                  </span>
									</a>
									<div class="mini-cart-content">
										<div class="cart-img-details">
											<div class="cart-img-photo">
												<a href="#"><img
																	src="<?php echo get_template_directory_uri(); ?>/assets/img/product/total-cart.jpg"
																	alt="#"></a>
											</div>
											<div class="cart-img-content">
												<a href="#"><h4>Prod Aldults</h4></a>
												<span>
															<strong class="text-right">1 x</strong>
															<strong class="cart-price text-right">$180.00</strong>
														</span>
											</div>
											<div class="pro-del">
												<a href="#"><i class="fa fa-times"></i></a>
											</div>
										</div>
										<div class="clear"></div>
										<div class="cart-inner-bottom">
													<span class="total">
														Total:
														<span class="amount"><?php echo $woocommerce->cart->get_cart_total()?></span>
													</span>
											<span class="cart-button-top">
														<a href="cart.html">View Cart</a>
														<a href="checkout.html">Checkout</a>
													</span>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
			<!-- End logo & Search Box -->
		</div>
	</div>
	<!-- HEADER-MIDDLE END -->
	<?php get_template_part('template-parts/navigation');?>
	<!-- HEADER AREA END -->
</header>

