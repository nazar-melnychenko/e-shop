<?php
defined( 'ABSPATH' ) || exit;

$our_teams = get_field('about_our_teams');
?>

<!-- Start Our-Team -->
<div class="our-team">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="f-title text-center">
					<h3 class="title text-uppercase"><?php the_field('about_our_team_title'); ?></h3>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($our_teams as $our_team) :?>
				<div class="col-md-3 col-sm-3">
				<div class="item-team text-center">
					<div class="team-info">
						<div class="team-img">
							<img alt="Team" class="img-responsive" src="<?php echo $our_team['our_team_img']; ?>">
							<div class="mask">
								<div class="mask-inner">
									<?php if ($our_team['our_team_facebook']) : ?>
										<a href="<?php echo $our_team['our_team_facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
									<?php endif; ?>
									<?php if ($our_team['our_team_twitter']) : ?>
										<a href="<?php echo $our_team['our_team_twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<h4><?php echo $our_team['our_team_name']; ?></h4>
					<h5><?php echo $our_team['our_team_position']; ?></h5>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<!-- End Our-Team -->