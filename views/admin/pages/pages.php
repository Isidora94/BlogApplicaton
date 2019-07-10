<div class="container">
	<form action="<?php echo DOMAIN; ?>/admin/pages/save" method="post">


		<div class="form-member">
			<label>Page Text Content:</label>
			<textarea name="content" placeholder="Type desired text content" rows="20"></textarea>
			<span></span>
		</div>

		<div class="form-member">
			<label>Choose page:</label>
			<select name="page_name">
				<?php foreach($this->data['pages'] as $page): ?>
				<option><?php echo ucfirst($page->page_name); ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<button type="submit" class="btn create_btn">Submit</button>
	</form>

	<?php if(isset($_GET['success'])): ?>
		<small class="success animated bounceInLeft fast"><?php echo $_GET['success']; ?></small>
	<?php endif; ?>

	<?php if(isset($_GET['err'])): ?>
		<small class="animated bounceInLeft fast" style="color: red; margin-left: 20px;"><?php echo $_GET['err']; ?></small>
	<?php endif; ?>
</div>

<script type="text/javascript" src="<?php echo DOMAIN; ?>/assets/admin/js/validate_form_fill_pages.js"></script>