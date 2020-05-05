<!-- START MAINMENU-AREA -->
<div class="mainmenu-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mainmenu hidden-sm hidden-xs">
					<nav>
						<?php wp_nav_menu([
							'theme_location'  => 'header_menu',
						]);?>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN-MENU-AREA -->
<!-- Start Mobile-menu -->
<div class="mobile-menu-area hidden-md hidden-lg">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<nav id="mobile-menu">
					<?php wp_nav_menu([
						'theme_location'  => 'header_menu',
					]);?>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- End Mobile-menu -->