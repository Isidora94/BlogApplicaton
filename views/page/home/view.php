<div class="container">
	<?php $post_data = $this->data['data']; ?>
	<h1><?php echo htmlspecialchars_decode($post_data->title); ?></h1>
	<small>Posted on: <strong><?php echo $post_data->created_at; ?></strong> in category: <strong>
		<?php foreach ($this->data['categories'] as $category) : ?>
			<?php if($post_data->category_id === $category->id): ?>
				<?php echo $category->name; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</strong></small><br>
	<img src="<?php echo DOMAIN ?>/<?php echo $post_data->post_image; ?>">
	<div>
		<?php echo htmlspecialchars_decode($post_data->body); ?>
	</div>
</div>

<hr>
