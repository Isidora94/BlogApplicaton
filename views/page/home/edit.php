<div class="container">
	<h1><?php echo $this->data['title']; ?></h1>

	<div id="errorContainer">
		<p>Please correct the following errors and try again:</p>
		<ul />
	</div>

	<form class="my-form" action="<?php echo DOMAIN; ?>/page/posts/update/<?php echo $this->data['post']->id; ?>" method="post" enctype="multipart/form-data">
		<div class="form-member">
			<label>Title</label>
			<input type="text" name="title" placeholder="Add Title" size="20" value="<?php echo $this->data['post']->title; ?>">
		</div>

		<div class="form-member">
			<label>Body</label>
			<textarea id="editor1" name="body" placeholder="Add Body"><?php echo $this->data['post']->body; ?></textarea>
		</div>

		<div class="form-member">
			<label>Category</label>
			<select name="category_id">
				<?php foreach ($this->data['categories'] as $category) : ?>
					<?php if ($category->id === $this->data['post']->category_id) : ?>
						<option value="<?php echo $category->id; ?>" selected><?php echo $category->name; ?></option>
					<?php else : ?>
						<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
			<small style="color: grey; background-color: white;">Please note if you don't pick category of post, it will be setted by default.</small>
		</div>

		<button type="submit" class="btn create_btn">Update</button>
	</form>
</div>

<script>
	CKEDITOR.replace( 'editor1' );
</script>

<script type="text/javascript">
	$("form").validate({
		ignore: [],

		rules:{
			title:{
				required:true
			},
			body: {
				required: function(textarea) {
					CKEDITOR.instances[textarea.id].updateElement();
					var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
					return editorcontent.length === 0;
				},

			}
		},messages:{
			title:{
				required:"Plese enter title for your post!"
			},

			body: {
				required: 'Content for new post is required!',
			},

		},
		errorContainer: $('#errorContainer'),
		errorLabelContainer: $('#errorContainer ul'),
		wrapper: 'li'
		
	});
</script>