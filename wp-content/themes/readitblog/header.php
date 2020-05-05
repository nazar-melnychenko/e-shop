<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title>Readit</title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>

<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="<?php echo home_url();?>"><?php the_field('logo', 'options');?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
		        aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
                <?php wp_nav_menu([
                    'theme_location'  => 'header_menu',
                    'container'       => null,
                    'items_wrap'      => '<ul class="navbar-nav ml-auto">%3$s</ul>',
                ]);?>
		</div>
	</div>
</nav>
<!-- END nav -->