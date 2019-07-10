<?php 


class EntityAboutController extends EntityBaseController
{

	public function index()
	{
		$name = $this->request->requested_path_parts[1];
		$page_model = new Pages();
		$pages = $page_model->getPageContent($name);
		$view = new View();
		$view->data['title'] = 'About Us';
		$view->data['content'] = $pages->content;
		$view->load('pages', 'about', $this->accessability_scope);
	}

}