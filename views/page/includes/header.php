<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN; ?>/assets/public/css/main.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
		<script src="http://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
	</head>
	<body>
		<header>
			<a class="blog_link" href="<?php echo DOMAIN; ?>">Blog</a>
			<ul class="main_left_nav">
				<li><a href="<?php echo DOMAIN; ?>">Home</a></li>
				<li><a href="<?php echo DOMAIN; ?>/page/about">About</a></li>
				<li><a href="<?php echo DOMAIN; ?>/page/posts">Blog</a></li>
				<li><a href="<?php echo DOMAIN; ?>/page/categories">Categories</a></li>
			</ul>
			<ul class="main_right_nav">				
				<?php if(isset($_SESSION['user'])) : ?>
					<li><a href="<?php echo DOMAIN; ?>/page/users/profile">Profile</a></li>		
				<?php endif; ?>
				<?php if(isset($_SESSION['user'])) : ?>
					<li><a href="<?php echo DOMAIN; ?>/page/posts/create">Create Post</a></li>		
				<?php endif; ?>				
				<!-- <li><a href="<?php //echo DOMAIN; ?>/page/categories/create">Create Category</a></li> PREBACITI ZA ADMINA-->
				<?php if(isset($_SESSION['user'])) : ?>
					<li><a href="<?php echo DOMAIN; ?>/page/users/logout">Logout</a></li>
				<?php endif; ?>
			</ul>
		</header>
