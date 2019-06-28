<?php 

class Posts
{
	public static function getAllPosts()
	{
		global $conn;
		$query = 'select posts.id, posts.title, posts.body, posts.post_image, posts.created_at, posts.category_id, posts.user_id, categories.name from posts join categories on posts.category_id = categories.id ORDER BY posts.created_at DESC';
		$res = $conn->query($query);
		$posts = [];
		while ($post = $res->fetch_object()) {
			$posts[] = $post; 
		}
		return $posts;
	}


	public function getPostsById($id)
	{

		global $conn;
		$query = 'select * from posts where id =' . $id;
		$res = $conn->query($query);
		$post = $res->fetch_object();
		return $post;
	}

	/*
	*method for storing new post in database
	*/

	public function create_post($title, $body, $image, $category, $user_id)
	{

		global $conn;

		//escape variables for security
		$title = $conn->real_escape_string($title);
		$body = $conn->real_escape_string($body);
		$image = $conn->real_escape_string($image);
		$category = $conn->real_escape_string($category);


		$query = 'insert into posts (title, body, post_image, category_id, user_id) values("'.$title.'", "'.$body.'", "'.$image.'", '.$category.', '.$user_id.')';
		var_dump($query);
		$res = $conn->query($query);
		return $res;
	}

	/*
	*method for deleting specific post from database
	*/


	public function delete($id)
	{
		global $conn;
		$query = 'delete from posts where id = '.$id;
		$res = $conn->query($query);
		return $res;
	}

	/*
	*method for updating specific post from database
	*/


	public function edit($id, $title, $body, $category)
	{
		global $conn;

		$id = $conn->real_escape_string($id);
		$title = $conn->real_escape_string($title);
		$body = $conn->real_escape_string($body);
		$category = $conn->real_escape_string($category);
		
		$query = 'update posts set title = "'.$title.'", body = "'.$body.'", category_id = '.$category.' WHERE id = '. $id;
		var_dump($query);
		$res = $conn->query($query);
		return $res;
	}

}