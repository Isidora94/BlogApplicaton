<div class="container animated bounceInDown fast">
<h1><?php echo $this->data['category_name']; ?></h1>
	<?php $cat_data = $this->data['data']; ?>
	<?php foreach($cat_data as $data): ?>
			<h2><?php echo htmlspecialchars_decode($data->title); ?></h2>
			<small>Posted on: <strong><?php echo $data->created_at; ?></strong></small><br>
			<img src="<?php echo DOMAIN ?>/<?php echo htmlspecialchars_decode($data->post_image); ?>">
			<div class="post_body">
				<?php echo htmlspecialchars_decode($data->body); ?>
			</div>
			<hr>
	<?php endforeach; ?>
</div>