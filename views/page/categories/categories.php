<div class="container">
	<h1><?php echo $this->data['title']; ?></h1>
	<ul class="category_group">
		<?php foreach($this->data['categories'] as $category): ?>
			<li class="animated bounceInLeft fast"><a href="<?php echo DOMAIN.'/page/categories/show/'.$category->id; ?>"><?php echo $category->name; ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>
