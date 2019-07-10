<?php 


class BasePageController
{
	private $request = null;
	private $allowed_routes = array(
		'access',
		'about',
		'posts',
		'categories',
	);

	public function __construct($request)
	{
		$this->request = $request;
		// var_dump($request);

		if (!isset($request->requested_path_parts[1])) {
			$this->home();
			exit;
		} else {
			if (!$this->checkIfControllerExists($request->requested_path_parts[1])) {
				$this->show404();
				exit;
			}
			$controller = $this->instantiateController();
			$controller->setScope(false);

			//setting the index method if no method in the url
			if (!isset($this->request->requested_path_parts[2]) || $this->request->requested_path_parts[2] == '') {
				$method = 'index';
			} else {
				$method = $this->request->requested_path_parts[2];
			}

			if (method_exists($controller, $method)) {
				$controller->$method();
			} else {
				var_dump('method ' . $method . ' jos uvek nije definisan');
			}


		}
	}



	private function routeExists($route)
	{
		return in_array($route[1], $this->allowed_routes);
	}

	public function home()
	{
		$page_model = new Pages();
		$page = $page_model->getPageContent('home');
		$view = new View();
		$view->data['title'] = 'Home';
		$view->data['content'] = $page->content;
		$view->load('pages', 'home', false);
	}

	public function show404()
	{
		$view = new View();
		$view->load('home', '404', false);
	}

	private function checkIfControllerExists($controller_slug)
	{

		// $controller_slug = substr($controller_slug, 0, strlen($controller_slug) - 1);
		$controller_name = 'Entity' . ucfirst($controller_slug) . 'Controller';

		$controllers = glob('./controllers/'.$controller_name.'.php');
		if (count($controllers) > 0){
			return true;
		}
		return false;
	}


	private function instantiateController()
	{
		$controller_slug = $this->request->requested_path_parts[1];
		// $controller_slug = substr($controller_slug, 0, strlen($controller_slug) - 1);
		$controller_name = 'Entity' . ucfirst($controller_slug) . 'Controller';
		return new $controller_name($this->request);
	}

}