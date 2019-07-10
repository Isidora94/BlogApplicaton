<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN; ?>/assets/admin/css/main.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	</head>
	<body>
		<header>
			<ul>
				<?php if(!isset($_SESSION['admin'])): ?>
					<li><a href="<?php echo DOMAIN; ?>/admin/access">Admin</a></li>
				<?php endif; ?>

				<?php if(isset($_SESSION['admin'])): ?>
					<li><a href="<?php echo DOMAIN; ?>/admin/categories">Categories</a></li>
				<?php endif; ?>			
				<?php if(isset($_SESSION['admin'])): ?>
					<li><a href="<?php echo DOMAIN; ?>/admin/users">Users</a></li>
				<?php endif; ?>		
				<?php if(isset($_SESSION['admin'])): ?>
					<li><a href="<?php echo DOMAIN; ?>/admin/pages">Fill Pages</a></li>
				<?php endif; ?>
			</ul>
			<ul class="right_nav">
				<?php if(isset($_SESSION['admin'])): ?>
					<li><a href="<?php echo DOMAIN; ?>/admin/access/logout">Logout</a></li>
				<?php endif; ?>
			</ul>
		</header>
