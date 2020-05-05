<?php
if(post_password_required() ){
	return;
}
?>
<div class="pt-5 mt-5">
	<h3 class="mb-5"><?php echo get_comments_number();?> Comments</h3>

	<ul class="comment-list">
		<?php
	    wp_list_comments('type=comment&callback=format_comment');
	    echo 111;
		?>
	</ul>


	<div class="row mt-5">
		<div class="col text-center">
			<div class="block-27">
			<?php the_comments_pagination([
				'end_size' => 1,
				'mid_size' => 1,
				'prev_text' => '<',
				'next_text' => '>',
				'screen_reader_text' => ' '
			]); ?>
			</div>
		</div>
	</div>

	<div class="comment-form-wrap pt-5">
		<?php

		comment_form([
			'comment_field' => '<div class="form-group">
													<label for="message">Message</label>
													<textarea id="comment" name="comment" cols="30" rows="10" class="form-control"></textarea>
												</div>',

			'fields' => [
				'author' => '<div class="form-group">
											<label for="name">Name *</label>
											<input id="author" name="author" type="text" class="form-control">
										</div>',
				'email' => '<div class="form-group">
											<label for="email">Email *</label>
											<input id="email" name="email" type="email" class="form-control">
										</div>',
				'website' => '<div class="form-group">
												<label for="website">Website</label>
												<input id="website" name="website" type="url" class="form-control" >
											</div>',

			],

			'class_submit'  => 'btn py-3 px-4 btn-primary',
			'label_submit'  => __('Post Comment'),
			'title_reply'   => __('Leave a comment'),
			'class_form'    => 'p-5 bg-light',
		]);

		?>
	</div>
</div>
