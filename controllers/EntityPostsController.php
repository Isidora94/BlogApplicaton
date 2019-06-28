<?php 

class EntityPostsController extends EntityBaseController
{

	public function index()
	{	
		$view = new View();
		$view->data['title'] = 'Latest Posts';
		$view->data['posts'] = Posts::getAllPosts();
		$view->load('home', 'posts', $this->accessability_scope);
	}

	public function view()
	{
		$id = $this->request->requested_path_parts[3];
		$view = new View();
		$post_model = new Posts();
		$post = $post_model->getPostsById($id);
		$view->data['data'] = $post;
		$view->data['categories'] = categories::getAllCategories();
		$view->load('home', 'view', $this->accessability_scope);
	}

	public function create()
	{
		$view = new View();
		$view->data['title'] = 'Create New Post';
		$view->data['categories'] = categories::getAllCategories();
		$view->load('home', 'create', $this->accessability_scope);
	}

	/*
	* route for storing new post in the database.
	*/
	public function save()
	{
		//TODO: raspremiti malo ovde krs, i pobrisatin sta ne treba kad se zavrsi projekat
		// var_dump($_POST);
		// var_dump($_FILES);

		//cache vars
		$title = $_POST['title'];
		$body = $_POST['body'];
		$category = $_POST['category_id'];
		$username = $_SESSION['user'];
		$user_id = Users::getCurrentUser($username);
		$user_id = $user_id->id;


		if ($_FILES['post_image']['error'] != 0) {
			$_FILES['post_image']['name'] = 'avatar.jpg';
			$_FILES['post_image']['type'] = 'image/jpeg';
			$_FILES['post_image']['tmp_name'] = 'C:\wamp64\tmp\php353A.tmp';
			$_FILES['post_image']['error'] = 0;
			$_FILES['post_image']['size'] = 6166;
		}

		$current_month = date('m');
		$image = 'uploads/2019/'.$current_month.'/'.$_FILES['post_image']['name'];

		$posts_model = new Posts();
		$res = $posts_model->create_post($title, $body, $image, $category, $user_id);


		if ($res) {
			header('Location: http://final.com/page/users/profile');
		} else {
			var_dump('neuspesno cuvanje u bazi');
		}


		$fileUpload = new UploadPostImage();
		$fileUpload->upload($_FILES['post_image']);
	}


	public function delete()
	{
		$id = $this->request->requested_path_parts[3];

		$post_model = new Posts();
		$res = $post_model->delete($id);

		if ($res) {
			// var_dump('uspesno brisanje u bazi');
			header('Location: http://final.com/page/users/profile');
		} else {
			var_dump('neuspesno brisanje u bazi');
		}
	}

	public function edit()
	{
		$id = $this->request->requested_path_parts[3];
		$post_model = new Posts();
		$post = $post_model->getPostsById($id);

		$view = new View();
		$view->data['title'] = 'Edit This Post';
		$view->data['post'] = $post;
		$view->data['categories'] = categories::getAllCategories();

		$view->load('home', 'edit', $this->accessability_scope);

	}


	public function update()
	{
		$id = $this->request->requested_path_parts[3];
		$title = $_POST['title'];
		$body = $_POST['body'];
		$category = $_POST['category_id'];

		var_dump($_POST);


		$posts_model = new Posts();
		$res = $posts_model->edit($id, $title, $body, $category);

		if ($res) {
			header('Location: http://final.com/page/posts/view/'.$id);
		} else {
			var_dump('neuspesno update-ovanje ovog posta u bazi, nadji gresku');
		}
	}

}