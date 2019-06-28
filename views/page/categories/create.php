<div class="container">
	<h1><?php echo $this->data['title']; ?></h1>

	<div id="errorContainer">
    	<p>Please correct the following errors and try again:</p>
	</div>

	<form method="post" action="<?php echo DOMAIN; ?>/page/categories/save">
		<div class="form-member">
			<label>Name</label>
			<input type="text" name="name" placeholder="Enter name of new category">
		</div>
		<button type="submit" class="btn create_btn">Submit</button>
	</form>
</div>

<script type="text/javascript" src="<?php echo DOMAIN; ?>/assets/public/js/validate_create_category.js"></script>