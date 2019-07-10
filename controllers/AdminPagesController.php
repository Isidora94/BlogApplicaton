<?php 


class AdminPagesController extends AdminBaseController
{
	public function index()
	{
		$pages = Pages::AllPages();
		$view_model = new View;
		$view_model->data['pages'] = $pages;
		$view_model->load('pages', 'pages', $this->accessability_scope);
	}

	public function save()
	{
		var_dump($_POST);
		$name = $_POST['page_name'];
		$content = $_POST['content'];
		// var_dump($name);
		$page_model = new Pages();
		$res = $page_model->edit_content($name, $content);
		var_dump($res);
		// die;

		if ($res) {
			header('Location: http://final.com/admin/pages?success=You\'ve Just Updated Your Page!');
		} else {
			header('Location: http://final.com/admin/pages?err=Something Went Wrong!');
		}
	}

}