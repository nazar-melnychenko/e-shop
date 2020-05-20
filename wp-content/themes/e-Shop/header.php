<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php bloginfo( 'name' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,600,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	<?php wp_head();
	global $current_user;
  global $wp;
	?>
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
						<div class="currency">
							<?php echo do_shortcode('[woocs show_flags=1 flag_position=right style=1]'); ?>
						</div>
						<!-- End Currency -->
						<p class="welcome-msg">Ласкаво просимо на сайт якісної техніки!</p>
					</div>
					<!-- Start Top-Link -->
					<div class="top-link">
						<ul class="link">
							<?php dynamic_sidebar('wish_list');?>
							<li><a href="<?php echo home_url('/checkout/')?>"><i class="fa fa-share"></i> Оформити покупки</a></li>
							<?php if (is_user_logged_in()) :?>
								<li><a href="<?php echo home_url('/my-account/')?>"><i class="fa fa-user"></i> Мій акаунт</a></li>
								<li class="logout">Вітаємо, <?php echo '<strong>' . esc_html( $current_user->display_name ) . '</strong>'?> <a class="logout" href="<?php echo wp_logout_url(home_url( $wp->request )); ?>">Вийти</a> </li>
							<?php else : ?>
								<li><a href="#" class="lrm-login"><i class="fa fa-unlock-alt"></i> Увійдіть в особистий кабінет</a></li>
				      <?php endif; ?>
						</ul>
					</div>
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
				<div class="col-md-9 col-sm-12 search-field-header">
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

