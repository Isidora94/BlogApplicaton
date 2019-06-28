<div class="container">
	<h1><?php echo $this->data['title']; ?></h1>

	<?php foreach ($this->data['posts'] as $post): ?>

		<div class="post">
			<h2><?php echo $post->title; ?></h2>
			<img class="img" src="<?php echo DOMAIN; ?>/<?php echo $post->post_image; ?>">
			<div class="post_info">
				<small>Posted on: <strong><?php echo $post->created_at; ?></strong> in category: <strong><?php echo $post->name; ?></strong></small><br>
				<p><?php echo mb_strimwidth($post->body, 0, 60); ?></p>
				<br>
				<br>
				<p><a class="btn" href="<?php echo DOMAIN.'/page/posts/view/'.$post->id; ?>">Read More</a></p>
			</div>
		</div>
		<hr style="margin-bottom: 40px;">

	<?php endforeach; ?>

</div>



<a class="back_to_top" href="#"><span>&uarr;</span></a>




<div class="pop-up-form access_form" id="pop-up">
	<div class="login">
		<form action="users/login" method="post">
			<h2>Login</h2>

			<div class="form-article">
				<label for="username">Username:</label>
				<input type="text" name="login_username" id="login_username">
				<p></p>
			</div>


			<div class="form-article">
				<label for="password">Password:</label>
				<input type="password" name="login_password" id="login_password">
				<p></p>
			</div>
			<input type="submit" value="Login" class="btn">
		</form>


		<?php if(isset($_GET['error'])) : ?>
			<small style="color: red; background-color: transparent;">
				<?php echo $_GET['error']; ?>	
			</small>
		<?php endif; ?>

		<a href="<?php echo DOMAIN; ?>/admin">Continue As Admin</a>
	</div>


	<div class="register">
		<form action="users/register" method="post" enctype="multipart/form-data">
			<h2>Register</h2>

			<div class="form-article">
				<label for="first_name">First name:</label>
				<input type="text" name="first_name" id="first_name">
				<p></p>
			</div>
			<div class="form-article">
				<label for="last_name">Last name:</label>
				<input type="text" name="last_name" id="last_name">
				<p></p>
			</div>
			<div class="form-article">
				<label for="email">Email:</label>
				<input type="email" name="email" id="email">
				<p></p>

				<?php if(isset($_GET['err'])) : ?>
					<small style="color: red; background-color: transparent;">
						<?php echo $_GET['err'][0]; ?>	
					</small>
				<?php endif; ?>

			</div>
			<div class="form-article">
				<label for="username">Username:</label>
				<input type="text" name="username" id="username">
				<p></p>

				<?php if(isset($_GET['err'][1])) : ?>
					<small style="color: red; background-color: transparent;">
						<?php echo $_GET['err'][1]; ?>
					</small>
				<?php endif; ?>
			</div>
			<div class="form-article">
				<label for="password">Password:</label>
				<input type="password" name="password" id="password">
				<p></p>
			</div>
			<div class="form-article">
				<label for="re_password">Re_Type Password:</label>
				<input type="password" name="re_password" id="re_password">
				<p></p>
			</div>

			<div class="form-article">
				<label>Profile Image</label>
				<input type="file" name="user_image" id="user_image" style="color: transparent; width: 35%;">
			</div>

			<input type="submit" value="Register" class="btn">

			<?php if(isset($_GET['success'])): ?>
				<small style="color: green; background-color: transparent; margin-top: 5px; ">
					<?php echo $_GET['success']; ?>
				</small>
			<?php endif; ?>

		</form>
	</div>
	<a class="btn" href="<?php echo DOMAIN; ?>">&times;</a>

</div>

<div id="overlay" class="access_form"></div>



<?php if(isset($_SESSION['user'])) : ?>
	<script type="text/javascript" src="<?php echo DOMAIN; ?>/assets/public/js/remove_form_pop_up.js"></script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo DOMAIN; ?>/assets/public/js/form_pop_up.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN; ?>/assets/public/js/back_to_top.js"></script>