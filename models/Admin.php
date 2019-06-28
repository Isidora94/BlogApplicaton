<?php 

class Admin
{
	public static function allow_access($username, $password, $role)
	{
		global $conn;
		$query = 'select * from users where username = "'.$username.'" and password = "'.$password.'" and role = "'.$role.'"';
		var_dump($query);
		$res = $conn->query($query);
		var_dump($res);
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


}