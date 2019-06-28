<?php if(isset($_SESSION['admin'])): ?>
	<div class="container">
		<h1><?php echo $this->data['title']; ?></h1>

		<div id="errorContainer">
			<p>Please correct the following errors and try again:</p>
		</div>

		<form method="post" action="<?php echo DOMAIN; ?>/admin/categories/create">
			<div class="form-member">
				<label>Name:</label>
				<input type="text" name="name" placeholder="Enter name of new category">
			</div>
			<button type="submit" class="btn create_btn">Submit</button>
		</form>


		<?php if(isset($_GET['success'])): ?>
			<small class="success animated bounceInLeft fast">
				<?php echo $_GET['success']; ?>
			</small>
		<?php endif; ?>


<hr>



<h2 style="margin-left: 20px;"><?php echo $this->data['title2']; ?></h2>

		<div class="wrap">
			<?php foreach($this->data['categories'] as $category): ?>
				<nav>
					<ul>
						<li><a href="<?php echo DOMAIN.'/admin/categories/review/'.$category->id; ?>"><?php echo $category->name; ?></a></li>
					</ul>
				</nav>
				<hr style="width: 100%">
			<?php endforeach; ?>
		</div>

		<div class="shell">
			<?php foreach($this->data['categories'] as $category): ?>
				<nav>
					<ul>
						<li><a href="<?php echo DOMAIN.'/admin/categories/delete/'.$category->id; ?>" >Delete this category</a></li>
					</ul>
				</nav>
				
				<hr style="width: 100%">
			<?php endforeach; ?>
		</div>


</div>

		<?php if(isset($_GET['deleted'])): ?>
			<small class="deleted animated bounceInLeft fast">
				<?php echo $_GET['deleted']; ?>
			</small>
		<?php endif; ?>



<script type="text/javascript" src="<?php echo DOMAIN; ?>/assets/admin/js/validate_create_category.js"></script>

<?php endif; ?>