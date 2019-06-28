<?php 


class BaseAdminController
{
	private $request = null;
	
	public function __construct($request)
	{
		$this->request = $request;
		// var_dump($request);
		if (!isset($request->requested_path_parts[1])) {
			$this->accessScreen();
			exit;
		} else {
			if (!$this->checkIfControllerExists($request->requested_path_parts[1])) {
				$this->show404();
				exit;
			}
			$controller = $this->instantiateController();
			$controller->setScope(true);

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


	public function accessScreen()
	{
		$view = new View();
		$view->load('pages', 'access', true);
	}

	public function show404()
	{
		$view = new View();
		$view->load('pages', '404', true);
	}


	private function checkIfControllerExists($controller_slug)
	{

		// $controller_slug = substr($controller_slug, 0, strlen($controller_slug) - 1);
		$controller_name = 'Admin' . ucfirst($controller_slug) . 'Controller';

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
		$controller_name = 'Admin' . ucfirst($controller_slug) . 'Controller';
		return new $controller_name($this->request);
	}



}