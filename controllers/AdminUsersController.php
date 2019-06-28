<?php 

class AdminUsersController extends AdminBaseController
{
	public function index()
	{
		$view = new View();
		$view->data['title'] = 'List of All Users';
		
		$users_model = new Users();
		$view->data['users'] = $users_model->getAllUsers();

		$view->load('pages', 'users', $this->accessability_scope);
	}

	public function posts()
	{
		$id = $this->request->requested_path_parts[3];
		$view = new View();
		$users_model = new Users();
		$category_model = new Categories();


		$users = $users_model->getAllUsers();
		foreach ($users as $user) {
			if ($id === $user->id) {
				$username = ucfirst($user->username);
			}
		}
		$view->data['title'] = $username.'\'s Posts';

		$user_posts = Users::getPostsForUsers($id);
		$view->data['posts'] = $user_posts;

		$categories = $category_model->getAllCategories();
		$view->data['categories'] = $categories;


		$view->load('pages', 'user_posts', $this->accessability_scope);
	}

	public function delete_user()
	{
		$user_id = $this->request->requested_path_parts[3];
		// var_dump($user_id);
		$res = Users::delete_user($user_id);

		if ($res) {
			// var_dump('uspesno si obrisala ovog korisnika');
			header('Location: http://final.com/admin/users');
			exit;
		} else {
			var_dump('neuspesno brisanje korisnika');

		}
	}

	public function delete_post()
	{
		$post_id = $this->request->requested_path_parts[3];
		$post_model = new Posts();
		$res = $post_model->delete($post_id);

		if ($res) {
			var_dump('proslo brisanje');
			// var_dump();
			header('Location: '.$_SERVER['HTTP_REFERER']);
		} else {
			var_dump('nije proslo brisanje');

		}
	}

}