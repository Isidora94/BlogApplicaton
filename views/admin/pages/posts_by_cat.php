<div class="container">

	<h1><?php echo $this->data['category_name']; ?></h1>
	

		<?php foreach($this->data['data'] as $post): ?>

			<h2><?php echo $post->title; ?></h2>
			<small>Posted on: <strong><?php echo $post->created_at; ?></strong></small><br>
			<img src="<?php echo DOMAIN ?>/<?php echo $post->post_image; ?>">
			<div class="post_body">
				<?php echo $post->body; ?>
			</div>

			<hr style="width: 100%; margin-left: 0;">

		<?php endforeach; ?>
</div>