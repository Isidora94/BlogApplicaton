<?php 


class Request
{

	public $requested_path_parts;
	public $get = array();
	public $post = array();
	
	public function __construct()
	{
		$this->extractGet();
		$this->extractPost();
	}


	private function extractGet()
	{
		$requested_path = substr($_SERVER['REQUEST_URI'], 1);
		$requested_path = explode('?', $requested_path)[0];

		$this->requested_path_parts = explode('/', $requested_path);

		if (strpos($_SERVER['REQUEST_URI'], '?')){

			$raw_get_args = explode("&", explode("?", $_SERVER['REQUEST_URI'])[1]);
			foreach ($raw_get_args as $key_value) {
				$get_param_parts = explode('=', $key_value);
				$this->get[$get_param_parts[0]] = $get_param_parts[1];
			}
		}
	}

	private function extractPost()
	{
		foreach ($_POST as $name => $value) {
			$this->post[$name] = $value;
		}
	}
}