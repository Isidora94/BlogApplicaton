<div class="container">
	<?php $post_data = $this->data['data']; ?>
	<h1><?php echo $post_data->title; ?></h1>
	<small>Posted on: <strong><?php echo $post_data->created_at; ?></strong> in category: <strong>
		<?php foreach ($this->data['categories'] as $category) : ?>
			<?php if($post_data->category_id === $category->id): ?>
				<?php echo $category->name; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</strong></small><br>
	<img src="<?php echo DOMAIN ?>/<?php echo $post_data->post_image; ?>">
	<div>
		<?php echo $post_data->body; ?>
	</div>
</div>


<hr>


<!-- <button class="btn btn_delete">Delete</button>

		<div class="pop-up" id="pop-up">
			<p>Are you sure you want to delete this post?</p>
			<a class="delete" href="<?php// echo DOMAIN.'/page/posts/delete/'.$this->data['data']->id;?>">Delete</a>
			<a class="cancel">Cancel</a>
		</div>

		<div id="overlay"></div>
<a href="<?php// echo DOMAIN.'/page/posts/edit/'.$this->data['data']->id;?>" class="btn">Edit</a>


<script type="text/javascript" src="<?php //echo DOMAIN; ?>/assets/public/js/pop_up.js"></script>  -->