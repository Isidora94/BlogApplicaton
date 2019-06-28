<?php 

class View
{
	public $data = array();

	public function __construct()
	{

	}

	public function load($entity_name, $partial_name, $view_scope)
	{
		$scope_dir = ($view_scope === true) ? 'admin' : 'page';

		require('./views/'.$scope_dir.'/includes/header.php');	

		require('./views/'.$scope_dir.'/'.$entity_name.'/'.$partial_name.'.php');

		require('./views/'.$scope_dir.'/includes/footer.php');
	}
}