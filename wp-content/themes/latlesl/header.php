<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<?php wp_head();?>
<!--<title>Eshop a Flat E-Commerce Bootstrap Responsive Website Template | Home :: w3layouts</title>
--><!--<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
--><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="js/jquery.min.js"></script>
--><!-- Custom Theme files -->
<!--<link href="<?php bloginfo('template_directory');?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
--><!-- Custom Theme files -->
<!--<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Eshop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<!-- for bootstrap working -->
	<!--<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>-->
<!-- //for bootstrap working -->
<!-- cart -->
	<!--<script src="js/simpleCart.min.js"> </script>-->
<!-- cart -->
<!--<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
--></head>
<body>
	<!-- header-section-starts -->
	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<ul>
						<li><a href="account.html"><span class="glyphicon glyphicon-user"> </span>Login</a></li>
						<li><a href="register.html"><span class="glyphicon glyphicon-lock"> </span>Create an Account</a></li>			
					</ul>
				</div>
				<div class="header-right">
						<div class="cart box_1 widget_shopping_cart_content">
							<a href="/cart">
								<h3> <p class="total"><?php echo WC()->cart->get_cart_subtotal(); ?></p><img src="images/bag.png" alt=""></h3>
							</a>	
							<p><a href="<?php echo WC()->cart->get_cart_url();?>?empty-cart" class="simpleCart_empty">Empty cart</a></p>
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- header-section-ends -->