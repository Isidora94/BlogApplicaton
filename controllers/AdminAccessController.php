<?php 

class AdminAccessController extends AdminBasecontroller
{
	public function index()
	{
		$view = new View();
		$view->load('pages', 'access', $this->accessability_scope);
	}

	public function login()
	{
		
		$username = $_POST['login_username'];
		$password = $_POST['login_password'];
		$db_psw = Users::getPassword($username);
		$role = 1;


		if ($db_psw !== null) {
			$enc_password = hash('md5', $db_psw->salt.$password);
		} else {
			$err = '?error=Wrong credentials!';
			header('Location: http://final.com/admin/access'. $err);
		}

		if ($db_psw->password === $enc_password) {
			$access = Admin::allow_access($username, $enc_password, $role);
			var_dump($access);
		} else {
			echo "haha";
		}

		if (!$access) {
			$err = '?error=Wrong credentials!';
			header('Location: http://final.com/admin/access'. $err);
		} else {
			$_SESSION['admin'] = $username;
			header('Location: http://final.com/admin/categories');
		}

	}

	public function logout()
	{
		$admin = new Admin();
		$admin->logout($_SESSION['admin']);
		unset($_SESSION['admin']);
		header('Location: http://final.com/admin/access');	
	}
}