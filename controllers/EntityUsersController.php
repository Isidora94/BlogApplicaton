<?php 


class EntityUsersController extends EntityBaseController
{
	public function register()
	{

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		if ($_FILES['user_image']['error'] != 0) {
			$_FILES['user_image']['name'] = 'avatar.jpg';
			$_FILES['user_image']['type'] = 'image/jpeg';
			$_FILES['user_image']['tmp_name'] = 'C:\wamp64\tmp\php353A.tmp';
			$_FILES['user_image']['error'] = 0;
			$_FILES['user_image']['size'] = 6166;
		}

		$current_month = date('m');
		$image = 'uploads/2019/'.$current_month.'/'.$_FILES['user_image']['name'];

		$salt = substr(hash('md5', time()), 0, 8);
		// echo $salt;
		// die;
		$enc_password = hash('md5', $salt.$password);
		// var_dump($_POST);
		// var_dump($_FILES);
		// var_dump($image);
		// die;

		$user_model = new Users();
		$users = $user_model->getAllUsers();
		// var_dump($users);


		$err = [];
		foreach ($users as $user) {

			$existing_emails[] = $user->email;
			$existing_username[] = $user->username;
		}

		if (in_array($email, $existing_emails)) {
			$err[] = 'Email already exists';
		} 
		if (in_array($username, $existing_username)){
			$err[] = 'Username already exists';
		}

		if (count($err) > 0) {
			if (count($err) == 1) {
				$err_str = 'err[]=' . $err[0];
				$err_str = '?' . $err_str;
				header('Location: http://final.com/page/posts' . $err_str);
				exit; 	
			} else {
				// var_dump($err);
				$err_str = implode('&err[]=', $err); 
				$err_str = '?err[]=' . $err_str;
				header('Location: http://final.com/page/posts' . $err_str);
				exit;
			}
		}

		$res = $user_model->create_user($first_name, $last_name, $email, $username, $salt, $enc_password, $image);
		// die;
		if ($res) {
			header('Location: http://final.com/page/posts?success=Successfully registreted!');
			
		}
	}	

	public function login()
	{
		// var_dump('uloguj korisnika');

		$username = $_POST['login_username'];
		$password = $_POST['login_password'];
		$db_psw = Users::getPassword($username);
		// $enc_password = hash('md5', $db_psw->salt.$password); 


		if ($db_psw !== null) {
			$enc_password = hash('md5', $db_psw->salt.$password);
		} else {
			$err = '?error=Wrong credentials!';
			header('Location: http://final.com/page/posts'. $err);
		}

		if ($db_psw->password === $enc_password) {
			$user_model = new Users();
			$res = $user_model->login_user($username, $enc_password);
			if ($res) {
				$_SESSION['user'] = $username;
					header('Location: http://final.com/page/posts'); //sad napraviti da ova strana nema pop up
				}

			} else {
				$err = '?error=Wrong credentials!';
				header('Location: http://final.com/page/posts'. $err);
			}
		}

		public function logout()
		{
			$user = new Users();
			$user->logout($_SESSION['user']);
			unset($_SESSION['user']);
			header('Location: http://final.com/page/posts');
		}

		public function profile()
		{
			$username = $_SESSION['user'];
			$user = Users::getCurrentUser($username);
			$user_id = $user->id;
			$profile_picture = $user->user_image;

			$view = new View();
			$view->data['title'] = ucfirst($username).'\'s Profile';
			$view->data['profile_picture'] = $profile_picture;
			$view->data['posts'] = Users::getPostsForUsers($user_id);
			$view->data['categories'] = Categories::getAllCategories();

			$view->load('users', 'profile', $this->accessability_scope);
		}


	}