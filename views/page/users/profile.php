<div id="user_info">
	<div>
		<p><?php echo ucfirst($this->data['user']->first_name); ?></p>
		<p><?php echo ucfirst($this->data['user']->last_name); ?></p>
		<p><?php echo ucfirst($this->data['user']->email); ?></p>
	</div>
	<img src="<?php echo DOMAIN; ?>/<?php echo $this->data['user']->user_image; ?>">
</div>


<div class="container">
	<h1><?php echo $this->data['title']; ?></h1>
		

	<?php foreach ($this->data['posts'] as $u_post): ?>

		<h2><?php echo htmlspecialchars_decode($u_post->title); ?></h2>
		<small>Posted on: <strong><?php echo $u_post->created_at; ?></strong> in category: <strong>
			<?php foreach ($this->data['categories'] as $category) : ?>
				<?php if($u_post->category_id === $category->id): ?>
					<?php echo $category->name; ?>
				<?php endif; ?>
			<?php endforeach; ?>
		</strong></small><br>
		<img src="<?php echo DOMAIN ?>/<?php echo $u_post->post_image; ?>">
		<div>
			<?php echo htmlspecialchars_decode($u_post->body); ?>
		</div>

		<hr>
		
		<button class="btn btn_delete">Delete</button>
		<div class="pop-up" id="pop-up">
			<p>Are you sure you want to delete this post?</p>
			<a class="delete" href="<?php echo DOMAIN.'/page/posts/delete/'. $u_post->id;?>">Delete</a>
			<a class="cancel">Cancel</a>
		</div>

		<div id="overlay"></div>


		<a href="<?php echo DOMAIN.'/page/posts/edit/'.$u_post->id; ?>" class="btn">Edit</a>

	<?php endforeach; ?>
</div>


<a class="back_to_top" href="#"><span>&uarr;</span></a>

<script type="text/javascript" src="<?php echo DOMAIN; ?>/assets/public/js/pop_up.js"></script> 
<script type="text/javascript" src="<?php echo DOMAIN; ?>/assets/public/js/back_to_top.js"></script>

