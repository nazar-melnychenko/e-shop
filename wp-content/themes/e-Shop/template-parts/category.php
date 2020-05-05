
	<!-- CATEGORY-MENU-LIST START -->
	<div class="left-category-menu hidden-sm hidden-xs">
		<div class="left-product-cat">
			<div class="category-heading">
				<h2>Каталог товарів</h2>
			</div>
			<div class="category-menu-list">
			  <?php wp_nav_menu([
				  'theme_location'  => 'category_menu',
			    'container' => '',
			    'container_class' => '',
				  'walker' => new Custom_Walker_Nav_Menu()
			  ]);?>
			</div>

		</div>
	</div>
	<!-- END CATEGORY-MENU-LIST -->
