<?php 


class AdminCategoriesController extends AdminBaseController
{
	public function index()
	{
		// var_dump('cao iz konstrakta admin categories kontrolera');
		$view = new View();
		$view->data['title'] = 'Create New Category';
		$view->data['title2'] = 'List of Categories:';
		$view->data['categories'] = Categories::getAllCategories();
		$view->load('pages', 'categories', $this->accessability_scope);
	}

	// CREATE CATEGORY
	public function create()
	{
		$name = $_POST['name'];

		$categories_model = new Categories();
		$res = $categories_model->create_category($name);

		header('Location: http://final.com/admin/categories?success=Category is created!');
	}

	// VIEW OF POSTS FOR EACH CATEGORY
	public function review()
	{
		$view = new View();
		$category_model = new Categories();

		$category_id = $this->request->requested_path_parts[3];
		$categories = $category_model->getAllCategories();
		$view->data['categories'] = $categories;

		$posts_by_cat = $category_model->getPostsByCategory($category_id);
		$view->data['data'] = $posts_by_cat;

		foreach ($categories as $category) {
			if ($category_id === $category->id) {
				$view->data['category_name'] = $category->name;
			}
		}


		$view->load('pages', 'posts_by_cat', $this->accessability_scope);
	}

	//DELETE CATEGORY FROM DB
	public function delete()
	{
		$category_id = $this->request->requested_path_parts[3];	
		$categories_model = new Categories();
		$result = $categories_model->set_new_category($category_id);
		$res = $categories_model->delete_category($category_id);


		if ($result && $res) {
			var_dump('prebaceno i izbrisano');
			header('Location: http://final.com/admin/categories?deleted=Category deleted!');
		} else {
			var_dump('nije uspelo prebacivanje i brisanje');
		}
	}

}