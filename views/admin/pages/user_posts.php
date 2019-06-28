<?php if(isset($_SESSION['admin'])): ?>

	<a href="#" class="btn filter">Filter badwords</a>

	<div class="container">
		<h1><?php echo $this->data['title']; ?></h1>
		<?php foreach($this->data['posts'] as $post): ?>
			<h2><?php echo $post->title; ?></h2>

			<?php foreach ($this->data['categories'] as $category): ?>
				<?php if ($category->id === $post->category_id): ?>

			<small>Posted on: <strong><?php echo $post->created_at; ?></strong> in category: <strong><?php echo $category->name; ?></strong></small><br>

				<?php endif; ?>				
			<?php endforeach; ?>				

			<img src="<?php echo DOMAIN ?>/<?php echo $post->post_image; ?>">

			<div class="body">
				<?php echo $post->body; ?>
			</div>

			<hr style="width: 80%; margin: 0;">
			<a href="<?php echo DOMAIN .'/admin/users/delete_post/'.$post->id; ?>" class="btn btn_delete">Delete Post</a>
		<?php endforeach; ?>		
	</div>
<?php endif; ?>

<script type="text/javascript" src="<?php echo DOMAIN; ?>/assets/admin/js/badwords.js"></script>