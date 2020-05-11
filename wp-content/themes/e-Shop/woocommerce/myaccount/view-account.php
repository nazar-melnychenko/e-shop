<?php
defined( 'ABSPATH' ) || exit;
global $wp;
?>

<!-- entry-header-area start -->
<div class="entry-header-area">
	<div class="row">
		<div class="col-md-12">
			<div class="entry-header">
				<h2 class="entry-title">Обліковий запис</h2>
			</div>
		</div>
	</div>
</div>
<!-- entry-header-area end -->
<!-- Start checkout-area -->
<div class="checkout-area">
	<div class="row">
		<div class="col-md-12">
			<!-- Accordion start -->
			<div class="panel-group" id="accordion">
				<!-- Start Order History And Details -->
				<div class="panel panel_default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-trigger" data-toggle="collapse" data-parent="#accordion" href="#account_orders">Замовлення <i class="fa fa-caret-down"></i> </a>
						</h4>
					</div>
					<div id="account_orders" class="collapse">
						<div class="panel-body">
							<?php ! empty ($wp->query_vars['orders']) ? $orders = $wp->query_vars['orders'] : $orders = '';
							do_action('woocommerce_account_orders_endpoint', $orders);?>
						</div>
					</div>
				</div>
				<!-- End Order History And Details -->
				<!-- Start Order History And Details -->
				<div class="panel panel_default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#account_downloads">Завантаження <i class="fa fa-caret-down"></i> </a>
						</h4>
					</div>
					<div id="account_downloads" class="collapse">
						<div class="panel-body">
							<?php do_action('woocommerce_account_downloads_endpoint');?>
						</div>
					</div>
				</div>
				<!-- End Order History And Details -->
				<!-- Start My-First-Address -->
				<div class="panel panel_default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#account_edit-address">Адреси <i class="fa fa-caret-down"></i> </a>
						</h4>
					</div>
					<div id="account_edit-address" class="collapse">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6 col-xs-12">
						      <?php do_action('woocommerce_account_edit-address_endpoint','оплата');?>
								</div>
								<div class="col-md-6 col-xs-12">
						      <?php do_action('woocommerce_account_edit-address_endpoint', 'доставка');?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End My-First-Address -->
				<!-- Start My Address -->
				<div class="panel panel_default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#account_edit-account">Профіль <i class="fa fa-caret-down"></i> </a>
						</h4>
					</div>
					<div id="account_edit-account" class="collapse">
						<div class="panel-body">
							 <?php do_action('woocommerce_account_edit-account_endpoint');?>
						</div>
					</div>
				</div>
				<!-- End My Address -->
			</div>
			<!-- Accordion end -->
		</div>
	</div>
</div>
<!-- End Shopping-Cart -->

