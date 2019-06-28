<div class="container animated shake slow">
	<form action="http://final.com/admin/access/login" method="post">
		<h2>Confirm That You're Admin</h2>

		<div>
			<label for="username">Username:</label>
			<input type="text" name="login_username" id="login_username">
			<p></p>
		</div>


		<div>
			<label for="password">Password:</label>
			<input type="password" name="login_password" id="login_password">
			<p></p>
		</div>
		<input type="submit" value="Login" class="btn">
	</form>
</div>


<?php if(isset($_GET['error'])) : ?>
	<small style="background-color: transparent;" class="err animated bounceInLeft fast">
		<?php echo $_GET['error']; ?>	
	</small>
<?php endif; ?>

<script type="text/javascript" src="<?php echo DOMAIN; ?>/assets/admin/js/login.js"></script>