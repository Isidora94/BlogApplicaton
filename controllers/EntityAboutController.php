<?php 


class EntityAboutController extends EntityBaseController
{

	public function index()
	{
		
		$view = new View();
		$view->data['title'] = 'About';
		$view->data['content'] = 'This is Blog application version 1.0';
		$view->load('pages', 'about', $this->accessability_scope);
		//prikazi view
	}

}