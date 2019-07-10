<?php 

class Users
{
	public function create_user($first_name, $last_name, $email, $username, $salt, $password, $user_image)
	{

		global $conn;

		//escape variables for security

		$first_name = $conn->real_escape_string($first_name);
		$last_name = $conn->real_escape_string($last_name);
		$email = $conn->real_escape_string($email);
		$username = $conn->real_escape_string($username);
		$password = $conn->real_escape_string($password);
		$user_image = $conn->real_escape_string($user_image);
		

		$query = 'insert into users values(null, "'.$first_name.'", "'.$last_name.'", "'.$email.'", "'.$username.'",  "'.$salt.'", "'.$password.'", "'.$user_image.'", 0, 0)';
		var_dump($query);
		// die;
		$res = $conn->query($query);
		return $res;

	}

	public function login_user($username, $password)
	{
		
		global $conn;
		$query = 'select * from users where username = "'.$username.'" and password = "'.$password.'"';
		$res = $conn->query($query);
		if($res->num_rows == 1){
			$query = 'update users set logged_in = 1 where username = "'.$username.'"';
			$update_res = $conn->query($query);
			if ($update_res) {
				$user = $res->fetch_object();
				return $user;
			}

			return false;
		} else {
			return false;
		}
	}

	public function logout($username)
	{
		global $conn;
		$query = 'update users set logged_in = 0 where username = "'.$username.'"';
		var_dump($query);
		$res = $conn->query($query);
	}


	public function getAllUsers()
	{
		global $conn;
		$query = 'select * from users';
		$res = $conn->query($query);

		$users = [];
		while ($user = $res->fetch_object()) {
			$users[] = $user; 
		}
		return $users;
	}

	public static function getPassword($username)
	{
		global $conn;
		$query = 'select salt, password from users where username = "'.$username.'"';
		$res = $conn->query($query);	
		if($res->num_rows == 1){
			$pass = $res->fetch_object();
			return $pass;
		}
	} 

	public static function getCurrentUser($username)
	{
		global $conn;
		$query = 'select * from users where username = "'.$username.'"';
		$res = $conn->query($query);
		if($res->num_rows == 1){
			$id = $res->fetch_object();
			return $id;
		}
	}

	public static function getPostsForUsers($user_id)
	{
		global $conn;
		$query = 'select * from posts where user_id = '.$user_id.' ORDER BY created_at DESC';
		$res = $conn->query($query);
		$u_posts = [];
		while ($u_post = $res->fetch_object()) {
			$u_posts[] = $u_post; 
		}
		return $u_posts;
	}

	public static function delete_user($id)
	{
		global $conn;
		$query = 'delete from users where id = '.$id;
		$res = $conn->query($query);
		return $res;
	}
}