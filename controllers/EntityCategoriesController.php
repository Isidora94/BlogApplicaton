<?php 

class EntityCategoriesController extends EntityBaseController
{
	public function index()
	{
		$view = new View();
		$view->data['title'] = 'Categories';
		$view->data['categories'] = Categories::getAllCategories();
		$view->load('categories', 'categories', $this->accessability_scope);
	}

	public function show()
	{
		$view = new View();
		$category_model = new Categories();

		$category_id = $this->request->requested_path_parts[3];
		$categories =$category_model->getAllCategories();

		$posts_by_cat = $category_model->getPostsByCategory($category_id);
		$view->data['data'] = $posts_by_cat;

		foreach ($categories as $category) {
			if ($category_id === $category->id) {
				$view->data['category_name'] = $category->name;
			}
		}

		$view->load('categories', 'view', $this->accessability_scope);
	}

	public function create()
	{
		$view = new View();
		$view->data['title'] = 'Create New Category';
		$view->load('categories', 'create', $this->accessability_scope);
	}

	public function save()
	{
		$name = $_POST['name'];

		$categories_model = new Categories();
		$res = $categories_model->create_category($name);

		header('Location: http://final.com/page/categories');

	}

}