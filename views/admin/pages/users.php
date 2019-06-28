<div class="container">
	<h1><?php echo $this->data['title']; ?></h1>

	<?php foreach($this->data['users'] as $user): ?>
		<div class="card">

			<a class="delete_user">&times;</a> 

			<div class="pop-up" id="pop-up">
				<p>Are you sure you want to delete this user?</p>
				<a class="delete" href="<?php echo DOMAIN.'/admin/users/delete_user/'. $user->id;?>">Delete</a>
				<a class="cancel">Cancel</a>
			</div>

			<div id="overlay"></div>

			
			<img src="<?php echo DOMAIN.'/'.$user->user_image; ?>">

			<p>
				<!-- <label>Username: </label> -->
				<a href="<?php echo DOMAIN; ?>/admin/users/posts/<?php echo $user->id; ?>"><strong><?php echo ucfirst($user->username); ?></strong></a>
			</p>

			<p>
				<label>Email: </label>
				<a href="mailto:<?php echo $user->email; ?>"><?php echo $user->email; ?></a>
			</p>

			<p><label>Id: </label><?php echo $user->id; ?></p>
			

			<p>
				<label>Full Name: </label>
				<?php echo ucfirst($user->first_name); ?> <?php echo ucfirst($user->last_name); ?>
			</p>

			
			<?php if($user->logged_in == 1): ?>
				<p><label>Status: </label><?php echo 'online'; ?></p>
				<?php else: ?>
					<p><label>Status: </label><?php echo 'offline'; ?></p>
				<?php endif; ?>

				<?php if($user->role == 0): ?>
					<p><label>Permission: </label><?php echo 'user'; ?></p>
					<?php else: ?>
						<p><label>Permission: </label><?php echo 'admin'; ?></p>
					<?php endif; ?>

				</div>
			<?php endforeach; ?>
		</div>



<script type="text/javascript" src="<?php echo DOMAIN; ?>/assets/admin/js/animate_cards.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN; ?>/assets/admin/js/pop_up_delete_user.js"></script>