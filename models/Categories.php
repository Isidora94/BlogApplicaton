<?php 

class Categories
{
	public static function getAllCategories()
	{
		global $conn;
		$query = 'select * from categories';
		$res = $conn->query($query);
		$categories = [];
		while ($category = $res->fetch_object()) {
			$categories[] = $category; 
		}
		return $categories;
	}

	public function getPostsByCategory($category_id)
	{
		global $conn;
		$query = 'select posts.id, posts.title, posts.body, posts.post_image, posts.created_at, posts.category_id, categories.name 
					from posts 
		 			join categories 
		 			on posts.category_id = categories.id where category_id = '. $category_id .' order by posts.created_at desc';
		$res = $conn->query($query);
		$posts_by_category = [];
		while ($post_by_category = $res->fetch_object()) {
			$posts_by_category[] = $post_by_category; 
		}
		return $posts_by_category;
	}

	public function create_category($name)
	{
		global $conn;

		$name = $conn->real_escape_string($name);

		$query = 'insert into categories (name) values("'.$name.'")';
		var_dump($query);
		$res = $conn->query($query);
		return $res;
	}

	public function delete_category($id)
	{
		global $conn;
		$query = 'delete from categories where id = '.$id;
		$res = $conn->query($query);
		return $res;
	}

	public function set_new_category($category_id)
	{
		global $conn;

		$query = 'update posts set category_id = 19 where category_id = '.$category_id;
		$res = $conn->query($query);
		return $res;
	}

}