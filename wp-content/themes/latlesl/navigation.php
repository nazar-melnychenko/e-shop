<?php if(is_home()):?>
	<div class="banner-top">
		<div class="container">
<?php else :?>
<div class="inner-banner">
		<div class="container">
			<div class="banner-top inner-head">
<?php endif;?>		
				<nav class="navbar navbar-default" role="navigation">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
				<div class="logo">
					<h1><a href="index.html"><span>E</span> -Shop</a></h1>
				</div>
	    </div>
	    <!--/.navbar-header-->
	
	<?php wp_nav_menu(array(
				
				'theme_location' => 'top',
				'container' => 'div',
				'container_class' => 'collapse navbar-collapse',
				'menu_class' => "nav navbar-nav",
				'walker' => new Custom_Walker_Nav_Menu()
				));
				
				?>
	
	   
	    <!--/.navbar-collapse-->
	</nav>
	<!--/.navbar-->
</div>
</div>
<?php if(!is_home()) :?>
	</div>
<?php endif;?>